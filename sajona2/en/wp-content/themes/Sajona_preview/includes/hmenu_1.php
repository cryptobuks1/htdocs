<?php

register_nav_menus(array('primary-menu-1' => __('Primary Navigation ', THEME_NS)));

function theme_hmenu_1() {
    $ID = 1;
?>
    <div data-animation-time="1000" class="data-control-id-1418782 bd-smoothscroll-1">
    <nav class="data-control-id-754 bd-hmenu-1" data-responsive-menu="true" data-responsive-levels="all open">
        
            <div class="data-control-id-519297 bd-responsivemenu-11 collapse-button">
    <div class="bd-container-inner">
        <div class="data-control-id-1052428 bd-menuitem-4">
            <a  data-toggle="collapse"
                data-target=".bd-hmenu-1 .collapse-button + .navbar-collapse"
                href="#" onclick="return false;">
                    <span></span>
            </a>
        </div>
    </div>
</div>
            <div class="navbar-collapse collapse">
        
        <div class="data-control-id-171385 bd-horizontalmenu-1 clearfix">
            <div class="bd-container-inner">
            <?php
                echo theme_get_menu(array(
                        'source' => theme_get_option('theme_menu_source'),
                        'depth' => theme_get_option('theme_menu_depth'),
                        'menu' => 'primary-menu-'.$ID,
                        'responsive_levels' => 'all open',
                        'levels' => 'expand on hover',
                        'menu_function' => 'theme_menu_'.$ID.'_1',
                        'menu_item_start_function' => 'theme_menu_item_start_'.$ID.'_1',
                        'menu_item_end_function' => 'theme_menu_item_end_'.$ID.'_1',
                        'submenu_start_function' => 'theme_submenu_start_'.$ID.'_2',
                        'submenu_end_function' => 'theme_submenu_end_'.$ID.'_2',
                        'submenu_item_start_function' => 'theme_submenu_item_start_'.$ID.'_2',
                        'submenu_item_end_function' => 'theme_submenu_item_end_'.$ID.'_2'
                    )
                );
            ?>
            </div>
        </div>
        
        
            </div>
    </nav>
    </div>
<?php
}

function theme_menu_1_1($content = '') {
    ob_start();
    ?><ul class="data-control-id-171386 bd-menu-1 nav nav-pills navbar-left">
    <?php echo $content; ?>
</ul><?php
    return ob_get_clean();
}

function theme_menu_item_start_1_1($class = '', $title = '', $attrs = '', $link_class='') {
    ob_start();
    ?><li class="data-control-id-171387 bd-menuitem-1 <?php echo $class; ?>">
    <a class="<?php echo $link_class; ?>" <?php echo $attrs; ?>>
        <span>
            <?php echo $title; ?>
        </span>
    </a><?php
    return ob_get_clean();
}

function theme_menu_item_end_1_1() {
    ob_start();
?>
    </li>
    
<?php
    return ob_get_clean();
}

function theme_submenu_start_1_2($class = '') {
    ob_start();
    ?><div class="bd-menu-2-popup">
    <ul class="data-control-id-171405 bd-menu-2 <?php echo $class; ?>"><?php
    return ob_get_clean();
}

function theme_submenu_end_1_2() {
    ob_start();
?>
        </ul>
    </div>
    
<?php
    return ob_get_clean();
}

function theme_submenu_item_start_1_2($class = '', $title = '', $attrs = '', $link_class = '') {
    ob_start();
    ?><li class="data-control-id-171406 bd-menuitem-2 <?php echo $class; ?>">
    <a class="<?php echo $link_class; ?>" <?php echo $attrs; ?>>
        <span>
            <?php echo $title; ?>
        </span>
    </a><?php
    return ob_get_clean();
}

function theme_submenu_item_end_1_2() {
    ob_start();
?>
    </li>
    
<?php
    return ob_get_clean();
}