<!-- Footer -->
<footer class="col_12 column">
     <div class="col_4 column">
         <?=$this->element('footer_menu_list', array('menu' => $menus["about_us"]))?>
     </div>
    <div class="col_4 column">
        <?=$this->element('footer_menu_list', array('menu' => $menus["contact_us"]))?>
    </div>
    <div class="col_4 column">
        <?=$this->element('footer_menu_list', array('menu' => $menus["visit_us"]))?>
    </div>
    <hr>
    <p><small>Copyright JobsIn &copy; 2015. All rights reserved.</small></p>
</footer>