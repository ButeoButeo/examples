<?php
class MenuLink extends AppModel {
    public $belongsTo = array(
            'Page' => array(
            'className' => 'Page'
        )
    );
}