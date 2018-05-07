<?php $maintenance_setting = get_option('maintenance_settings'); ?>
<div class="extra-wrap settings-content" style="display: none;">

	<h2><?php _e('Extra Setting', '8degree-maintenance') ?></h2>

    <div class="disable-mode-wrap">
        <label class="edmm_strong_texts"><?php _e('Disable Coming Soon Mode For: ', '8degree-maintenance') ?></label>
       
         <?php 
        global $wp_roles;

        
        $wp_roles = new WP_Roles();

        $all_roles = $wp_roles->get_names();
        foreach($all_roles as $roles=>$value){ 
            ?>
        
          <label class="edmm_form_label"><?php echo $value; ?><input type="checkbox" name="roles[]" value="<?php echo $roles; ?>" <?php if(isset($maintenance_setting['roles']) && in_array($roles, $maintenance_setting['roles'] ) ){ echo 'checked';} ?> /></label>  
       <?php }  ?>
        
       
        
        <div class="note">
        
        </div>
       
    </div> 
    
    <div class="google-analytics-wrap">
        <label class="edmm_form_label"><?php _e('Google Analytics Code: ', '8degree-maintenance') ?></label>
        <textarea name="google_analytics" rows="10" cols="70" class="width100"><?php echo $maintenance_setting['google_analytics'];?></textarea>
         <div class="info-note"><span class="note-text">Note:</span> Copy and paste the google analytics code in this area.</div>
    </div> 
    
    <div class="searchengines-hide-wrap">
        <label class="edmm_form_label"><?php _e('Hide From Search Engines:', '8degree-maintenance') ?><input type="checkbox" name="hide_search_engines" value="1" <?php if($maintenance_setting['hide_search_engines']=='1') echo 'checked' ?> /></label> 
        <div class="note"></div>
    </div> 
    
    <div class="search-engine-meta">
        <label class="edmm_strong_texts"><?php _e('Search Engine Meta-Tags:', '8degree-maintenance') ?></label> 
        <div class="edmm_search-meta">
             <label class="edmm_form_label"><?php _e('Meta Tag Name', '8degree-maintenance') ?></label>
             <input type="text" name="meta_name" value="<?php echo $maintenance_setting['meta_name']; ?>" /> 
         </div>
         <div class="edmm_search-meta">
             <label class="edmm_form_label"><?php _e('Meta Tag Content', '8degree-maintenance') ?></label>
             <input type="text" name="meta_content" value="<?php echo $maintenance_setting['meta_content']; ?>" /> 
         </div>
    </div>
    
    <div class="edmm_search-meta">
        <label class="edmm_form_label"><?php _e('Choose Favicon', '8degree-maintenance') ?></label>
        <input id="upload_favicon" type="text" placeholder="<?php _e('Enter a URL or upload favicon', '8degree-maintenance') ?>" name="favicon" value="<?php if(!empty($maintenance_setting ['favicon'])){ echo esc_attr($maintenance_setting ['favicon']); }?>" /> 
        <input class="edm_upload_image button" type="button" value="Upload Favicon" />
        <p><?php _e('Current', '8degree-maintenance') ?></p><?php if(!empty($maintenance_setting['favicon'])){ ?><img src="<?php echo esc_attr($maintenance_setting ['favicon']);?>" height="100px" /> <?php } ?>
    </div>

</div>