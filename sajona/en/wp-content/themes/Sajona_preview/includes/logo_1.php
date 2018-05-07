<?php
function theme_logo_1(){
?>
<?php
    $logoAlt = get_option('blogname');
    $logoSrc = theme_get_option('theme_logo_url');
    $logoLink = theme_get_option('theme_logo_link');
?>

<a class="data-control-id-1411555 bd-logo-1" href="<?php
    if (!theme_is_empty_html($logoLink)) {
        echo $logoLink;
    } else {
        ?><?php
    }
?>">
<img class="data-control-id-1411553 bd-imagestyles-8" src="<?php
                if (!theme_is_empty_html($logoSrc)) {
                    echo $logoSrc;
                } else {
                    ?><?php echo theme_get_image_path('images/5aa136f19a7d9ed31b2a53bef71d337f_Sajonalogo03.png'); ?><?php
                } ?>" alt="<?php echo $logoAlt ?>">
</a>
<?php
}