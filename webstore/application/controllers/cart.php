<?php
class cart extends CI_Controller {
	public $total = 0;

    /**
     * Cart Index - Load View
     */
	 public function index(){
		//Load View
		$data['main_content'] = 'cart';
		$this->load->view('layouts/main', $data);
	 }

    /**
     * Add to Cart and Redirect
     */
	public function add() {
		//Item Data
		$data = array(
			'id' => $this->input->post('item_number'),
			'qty' => $this->input->post('qty'),
			'price' => $this->input->post('price'),
			'name' => $this->input->post('title')
		);
		//print_r($data);die();
		
		//Insert Into Cart
		if ($this->cart->insert($data)) {
		$this->session->set_flashdata('added', 'Item was successfully added to your cart');
		redirect('products');
		}
	}

    /**
     * Remove from Card and Redirect
     * @param $rowid
     */
	public function remove($rowid) {
		if ($rowid==="all"){
			$this->cart->destroy();
		} else {
			$data = array(
			'rowid' => $rowid,
			'qty' => 0
			);

			$this->cart->update($data);
		}
		//Show Cart Page
		redirect('cart');
	}

    /**
     * Update Cart and Redirect
     */
	public function update() {
		$data = $_POST;
		$this->cart->update($data);
		
		//Show Cart Page
		redirect('cart', 'refresh');
	}

    /**
     * Order Submitted
     * Check Data Validity, Add to DB, Send Email and Load View
     */
	public function process() {
		if ($_POST) {
			if (!$this->Product_model->verify_order_data()) {
				//Show View
				$data['main_content'] = 'cart';
				$this->load->view('layouts/main', $data);
			} else {
                /**
                 * Collect Data, Add to DB, Send Email and Load View
                 */
				foreach($this->input->post('item_name') as $key => $value){

                    //Get Data
					$item_id = $this->input->post('item_code')[$key];
					$item_name = $this->input->post('item_name')[$key];
					$product = $this->Product_model->get_product_details($item_id);
					//Price x Quantity
					$subtotal = ($product->price * $this->input->post('item_qty')[$key]);
					$this->total = $this->total + $subtotal;

					//Create Order Array
					$data['order_data'] = $order_data = array(
                        'product_id' 		=> $item_id,
                        'user_id'  			=> $this->session->userdata('user_id'),
                        'transaction_id'  	=> 0,
                        'qty'            	=> $this->input->post('item_qty')[$key],
                        'price'      		=> $subtotal,
                        'address'   		=> $this->input->post('address'),
                        'address2'      	=> $this->input->post('address2'),
                        'city'      		=> $this->input->post('city'),
                        'state'      		=> $this->input->post('state'),
                        'zipcode'      		=> $this->input->post('zipcode')
					);

					//Add Order Data
					$this->Product_model->add_order($order_data);

					//Load Email Configuration, Library and Message
                    $email = $this->config->load('email');
					$this->load->library('email', $email);
                    $html_email = $this->load->view('order_email', $data, true);

					//Set Email Values
					$this->email->from('WebStore', $this->session->userdata('username'));
					$this->email->to('mianjegovan@gmail.com');
					$this->email->subject('Order '.$this->session->userdata('user_id'));
					$this->email->message($html_email);

                    //Send Email and Destroy Cart
					if ($this->email->send()) {
						$this->cart->destroy();
					}
					//echo $this->email->print_debugger();
				}

				//Load View
				$data['main_content'] = 'thankyou';
				$this->load->view('layouts/main', $data);
			}
		}
	}
}