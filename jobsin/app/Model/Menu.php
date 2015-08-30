<?php
class Menu extends AppModel {
    public $hasMany = array(
            'MenuLink' => array(
            'className' => 'MenuLink'
        )
    );

    public function getMenus()
    {
        $menus = $this->find("all", array('recursive' => 2));

        $aMenus = array();
        foreach($menus as $menu)
        {
            $aMenus[$menu["Menu"]["name"]] = $menu;
        }

        return $aMenus;
    }
}