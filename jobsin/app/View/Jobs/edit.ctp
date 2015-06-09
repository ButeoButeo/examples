<?php echo $this->Form->create('Job'); ?>
<fieldset>
    <legend><?php echo __('Edit Job Listing'); ?></legend>
    <?php
    		echo $this->Form->create('Job');
    echo $this->Form->input('title'); //Text field
    echo $this->Form->input('company_name'); //Text field
    echo $this->Form->input('category_id', array(
    'type' => 'select',
    'options' => $categories,
    'empty' => 'Select Category'
    ));
    echo $this->Form->input('type_id', array(
    'type' => 'select',
    'options' => $types,
    'empty' => 'Select Job Type'
    ));
    echo $this->Form->input('description', array('rows' => '3')); //Textarea with 3 rows
    echo $this->Form->input('city'); //Text field
    echo $this->Form->input('state'); //Text field
    echo $this->Form->input('contact_email'); //Text field
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Update Job'); //Generates submit button
    ?>
</fieldset>