<!-- Footer -->
<footer class="col_12 column">
                <?php foreach($menus as $menu) : ?>
                 <?php  $cols = (count($menu['Menu_link'],0)); ?>
                  <div class="col_4 column">
                    <h5><?php echo $menu['Menu']['label']; ?></h5>
                        <?php for ($i = 0; $i < $cols; $i++) { ?><br>
                           <a href="<?php echo $menu['Menu_link'][$i]['link']; ?>"><?php echo $menu['Menu_link'][$i]['label']; ?></a>
                     <?php } ?>
                  </div>
            <?php endforeach; ?>
    <hr>
    <?php //print_r($menus); ?>
    <p><small>Copyright JobsIn &copy; 2015. All rights reserved.</small></p>
</footer>