<?php
class MenuLink extends AppModel {
    public $belongsTo = array(
        'Page' => array(
            "fields" => array("Page.link", "Page.id", "Page.name")
        )
    );
}