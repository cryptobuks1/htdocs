<?php
function theme_vmenu_block_1($title = '', $content = '', $class = '', $id = '') {
?>
    <div class=" bd-block <?php echo $class; ?>" data-block-id="<?php echo $id; ?>">
        <?php if (!theme_is_empty_html($title)){ ?>
            
            <div class=" bd-container-58 bd-tagstyles">
                <h4><?php echo $title; ?></h4>
            </div>
            
        <?php } ?>

        <?php echo $content; ?>
    </div>
<?php
}