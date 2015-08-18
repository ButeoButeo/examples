<?php
class Menu extends AppModel {
    public $hasMany = array(
        'Menu_link' => array(
            'className' => 'Menu_link',
        )
    );
}