<!-- Footer -->
<footer class="col_12 column">
                <?php foreach($menus as $menu) : ?>
                 <?php  $cols = (count($menu['MenuLink'],0)); ?>
                  <div class="col_4 column">
                    <h5><?php echo $menu['Menu']['label']; ?></h5>
                        <?php for ($i = 0; $i < $cols; $i++) { ?><br>
                           <a href="<?php echo $menu_links[$i]['Page']['link']; ?>">
                                <?php echo $menu['MenuLink'][$i]['label']; ?>
                           </a>
                     <?php } ?>
                  </div>
            <?php endforeach; ?>
    <hr>
    <p><small>Copyright JobsIn &copy; 2015. All rights reserved.</small></p>
</footer>