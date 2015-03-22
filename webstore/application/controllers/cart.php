<?php
class cart extends CI_Controller {
	public $total = 0;
	
	//Cart Index
	 public function index(){
		//Load View
		$data['main_content'] = 'cart';
		$this->load->view('layouts/main', $data);
	 }
	
	// Add To Cart
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
	
	//Remove from Card
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
	
	//Update Cart
	public function update($in_cart = null) {
		$data = $_POST;
		$this->cart->update($data);
		
		//Show Cart Page
		redirect('cart', 'refresh');
	}
	
	//Checkout
	public function process() {
		if ($_POST) {
			//Validation Rules
			$this->form_validation->set_rules('address','Address','trim|required|max_length[45]');
			$this->form_validation->set_rules('address2','Address2','trim|max_length[45]');
			$this->form_validation->set_rules('city','City','trim|required|max_length[45]');
			$this->form_validation->set_rules('state','State','trim|required|max_length[45]');
			$this->form_validation->set_rules('zipcode','Zipcode','trim|required|min_length[4]|max_length[16]');
			
			if ($this->form_validation->run() == FALSE) {
				//Show View
				$data['main_content'] = 'cart';
				$this->load->view('layouts/main', $data);
			} else {
				foreach($this->input->post('item_name') as $key => $value){
					
					$item_id = $this->input->post('item_code')[$key];
					$item_name = $this->input->post('item_name')[$key];
					$product = $this->Product_model->get_product_details($item_id);
					
					//Price x Quanity
					$subtotal = ($product->price * $this->input->post('item_qty')[$key]);
					$this->total = $this->total + $subtotal;
					
					//Create Order Array
					$order_data = array(
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
					
					//Load Email Library
					$this->load->library('email');
					
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					//Set Email Message
					$output = '<h3>The order has been submitted!</h3></br>
								<h4>Product details:</h4></br>
								<p>Item: '.$item_name.'</p></br>
								<p>Quantity: '.$this->input->post('item_qty')[$key].'</p></br>
								<p>Price: &euro;'.$subtotal.'</p></br>
								<h4>Location details:</h4></br>
								<p>Address: '.$this->input->post('address').'</p></br>
								<p>Second Address: '.$this->input->post('address2').'</p></br>
								<p>City: '.$this->input->post('city').'</p></br>
								<p>State: '.$this->input->post('state').'</p></br>
								<p>Zipcode: '.$this->input->post('zipcode').'</p>';
					
					//Set Email Values
					$this->email->from('WebStore', $this->session->userdata('username'));
					$this->email->to('mianjegovan@gmail.com'); 
					$this->email->subject('Order '.$this->session->userdata('user_id'));
					$this->email->message($output);
					
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