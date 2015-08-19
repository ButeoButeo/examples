<?php
class Menu extends AppModel {
    public $hasMany = array(
            'MenuLink' => array(
            'className' => 'MenuLink'
        )
    );
}