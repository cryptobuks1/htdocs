<?php
function theme_blog() {
    global $post;
    $need_reset_query = false;
    if (is_page()){
        $page_id = get_queried_object_id();
        if(theme_get_meta_option($page_id, 'theme_show_categories')){
            $need_reset_query = true;
            query_posts(
                wp_parse_args(
                    'category_name=' . theme_get_meta_option($page_id, 'theme_categories'),
                    array('paged' => get_query_var( 'paged', get_query_var( 'page', 1 ))
                    )
                )
            );
        }
    }
?>
    <div class=" bd-blog">
        
        
<?php
    if (have_posts()) { ?>
        <div class=" bd-grid-8">
          <div class="container-fluid">
            <div class="separated-grid row">
<?php       while (have_posts()) {
            the_post();

            $id = theme_get_post_id();
            $class = theme_get_post_class();
?>
                
                <div class="separated-item-28 col-md-24 ">
                
                    <div class="bd-griditem-28">
                        <article id="<?php echo $id; ?>" class=" bd-article-6 clearfix <?php echo $class; ?>">
    <?php
if (!is_page() || theme_get_meta_option($post->ID, 'theme_show_page_title')) {
    $title = get_the_title();
    if(!is_singular()) {
        $title = sprintf('<a href="%s" rel="bookmark" title="%s">%s</a>', get_permalink($post->ID), strip_tags($title), $title);;
    }
    if (!theme_is_empty_html($title)) {
?>
<h2 class=" bd-postheader-6">
    <div class="bd-container-inner">
        <?php echo $title; ?>
    </div>
</h2>
<?php
    }
}
?>
	
		<div class=" bd-layoutbox-14 clearfix">
    <div class="bd-container-inner">
        <div class=" bd-posticondate-12">
    <span class=" bd-icon-56"><span><?php echo get_the_date(); ?></span></span>
</div>
	
		<div class=" bd-posticonauthor-13">
    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>" title="<?php echo esc_attr(__('View all posts by ' . get_the_author(), THEME_NS)) ?>">
        <span class=" bd-icon-58"><span><?php echo get_the_author(); ?></span></span>
    </a>
</div>
	
		<div class=" bd-posticonedit-14">
    <?php if (current_user_can('edit_post', $post->ID)): ?>
    <?php edit_post_link('<span class=" bd-icon-60"><span>'.__('Edit', THEME_NS).'</span></span>', ''); ?>
    <?php endif; ?>
</div>
    </div>
</div>
	
		<div class=" bd-layoutbox-16 clearfix">
    <div class="bd-container-inner">
        <?php echo theme_get_post_thumbnail(array('imageClass' => ' bd-imagestyles', 'class' => ' bd-postimage-5')); ?>
	
		<div class=" bd-postcontent-10 bd-tagstyles">
    <div class="bd-container-inner">
        <?php echo(is_singular() ? theme_get_content() : theme_get_excerpt()); ?>
    </div>
</div>
	
		<?php
if($post && !is_singular()) {
    $text = "Continue reading...";
    if (!theme_is_empty_html($text)) { ?>
<a class="bd-postreadmore-6 bd-button " title="<?php echo strip_tags($text) ?>" href="<?php echo get_permalink($post->ID) ?>"><?php echo $text; ?></a>
<?php
    }
}
?>
    </div>
</div>
	
		<div class=" bd-layoutbox-18 clearfix">
    <div class="bd-container-inner">
        <div class=" bd-posticontags-20">
    <?php $tags_list = get_the_tag_list('', ', '); ?>
    <?php if ($tags_list): ?>
    <span class=" bd-icon-15"><span><?php echo $tags_list; ?></span></span>
    <?php endif; ?>
</div>
	
		<div class=" bd-posticoncategory-15">
    <?php
        $categories = get_the_category_list(', ');
        if (theme_strlen($categories) > 0) : ?>
    <span class=" bd-icon-61"><span><?php echo get_the_category_list(', ');?></span></span>
    <?php endif ?>
</div>
	
		<div class=" bd-posticoncomments-17">
    <?php if (comments_open() && theme_get_option('theme_allow_comments')) : ?>
    <?php comments_popup_link(
                '<span class=" bd-icon-63"><span>'.__('Leave a comment', THEME_NS).'</span></span>',
    '<span class=" bd-icon-63"><span>'.__('1 Comment', THEME_NS).'</span></span>',
    '<span class=" bd-icon-63"><span>'.__('% Comments', THEME_NS).'</span></span>'); ?>
    <?php endif ?>
</div>
    </div>
</div>
</article>
                        <?php
                        global $withcomments;
                        if (is_singular() || $withcomments){  ?>
                            <?php
    if (theme_get_option('theme_allow_comments')) {
        comments_template('/comments_5.php');
    }
?>
                        <?php } ?>
                    </div>
                </div>
<?php
        }
?>
                </div>
            </div>
        </div>
<?php
        } else {
?>
        <div class="bd-container-inner"><?php theme_404_content(); ?></div>
<?php
    }
?>
        <div class=" bd-blogpagination-5">
    <?php
if (is_single()){
    $prev_link = theme_get_next_post_link('%link', '%title &raquo;');
    $next_link = theme_get_previous_post_link('%link', '&laquo; %title');
    if ($prev_link || $next_link) { ?>
<ul class=" bd-pagination-6 pagination">
    <?php if ($next_link): ?>
    <li class=" bd-paginationitem-6">
        <?php echo $next_link; ?>
    </li>
    <?php endif ?>

    <?php if ($prev_link): ?>
    <li class=" bd-paginationitem-6">
        <?php echo $prev_link; ?>
    </li>
    <?php endif ?>
</ul>
<?php
    }
} else {
    global $wp_query;
    if ( $wp_query->max_num_pages > 1 ) {
        echo preg_replace(
            array(
                '/<li(.*current)/',
                '/<ul class=\'page-numbers\'/',
                '/<li>/'
            ),
            array(
                '<li class="  bd-paginationitem-6 active"$1',
                '<ul class="  bd-pagination-6 pagination"',
                '<li class=" bd-paginationitem-6">'
            ),
            paginate_links( array(
                'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999, false ) ),
                'format' 		=> '',
                'current' 		=> max( 1, get_query_var('paged') ),
                'total' 		=> $wp_query->max_num_pages,
                'prev_text' 	=> '&larr;',
                'next_text' 	=> '&rarr;',
                'type'			=> 'list',
                'end_size'		=> 3,
                'mid_size'		=> 3
            ) )
        );
    }
}
?>
</div>
    </div>
<?php
    if($need_reset_query){
        wp_reset_query();
    }
}