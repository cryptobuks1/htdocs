<?php
function theme_shopping_cart_block_4($class = '', $id = '', $title = '', $content = ''){
?>
    
    <div class=" bd-block-4 <?php echo $class; ?>" id="<?php echo $id; ?>">
        <div class="bd-container-inner">
            <?php if (!theme_is_empty_html($title)){ ?>
<div class=" bd-container-40 bd-tagstyles bd-custom-blockquotes bd-custom-button bd-custom-image bd-custom-table">
    <h4><?php echo $title; ?></h4>
</div>
<?php }?>
            <div class=" bd-container-43 bd-tagstyles bd-custom-blockquotes bd-custom-button bd-custom-image bd-custom-table">
    <?php echo $content; ?>
</div>
        </div>
    </div>
    
<?php
}