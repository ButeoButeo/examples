<h2 style="color: #8A4F6B">The order has been submitted!</h2></br>
    <table class="table table-striped">
        <?php  $i = 1; ?>
        <?php foreach($this->input->post('item_name') as $key => $value) :?>
        <?php
            //Collect Data
            $item_id = $this->input->post('item_code')[$key];
            $item_name = $this->input->post('item_name')[$key];
            $product = $this->product_model->get_product_details($item_id);

            //Price x Quantity
            $subtotal = ($product->price * $this->input->post('item_qty')[$key]);
            $this->total = $this->total + $subtotal;
        ?>

            <thead>
                <th width="200"><h3><?php echo $i++; ?>. Product details:</h3></th>
            </thead>
            <tbody>
                <td width="200"><strong> Item:  </strong><?php echo $item_name; ?> </td></br>
                <td width="200"><strong> Quantity:   </strong><?php echo $this->input->post('item_qty')[$key]; ?></td></br>
                <td width="200"><strong>Price:  </strong> &euro; <?php echo $subtotal; ?></td></br>
            </tbody>
            <br>
        <?php endforeach; ?>
    </table>
<br>
    <p><strong>TOTAL:  &euro;<?php echo $this->cart->format_number($this->cart->total()); ?></strong></p>
    <br><hr>
    <h3>Location details:</h3></br>
    <p><strong>Address:   </strong><?php echo  $this->input->post('address'); ?> </p></br>
    <p><strong>Second Address:  </strong><?php echo $this->input->post('address2'); ?> </p></br>
    <p><strong>City:  </strong><?php echo $this->input->post('city'); ?></p></br>
    <p><strong>State:  </strong><?php echo $this->input->post('state'); ?> </p></br>
    <p><strong>Zipcode:  </strong><?php echo $this->input->post('zipcode'); ?></p>