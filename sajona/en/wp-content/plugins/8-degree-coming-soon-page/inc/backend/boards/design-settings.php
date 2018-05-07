<div class="design-wrap settings-content" style="display: none;">

	<h2><?php _e('Design Settings', '8degree-maintenance') ?></h2>

    <div class="text-color">
        <h3><?php _e('Text Options', '8degree-maintenance') ?></h3>
        <div class="edmm-sigle-field">
            <label class="edmm_strong_texts"><?php _e('Header Text Color', '8degree-maintenance') ?></label>
            <input type="text" name="headline_color" value="<?php echo esc_attr($maintenance_setting ['headline_color']);?>" id="headline_color" class="cpa-color-picker" data-default-color="#333333" />
        </div>
        <div class="edmm-sigle-field">    
            <label class="edmm_strong_texts"><?php _e('Description Text Color', '8degree-maintenance') ?></label>
            <input type="text" name="description_color" value="<?php echo esc_attr($maintenance_setting ['description_color']);?>" id="description_color" class="cpa-color-picker" data-default-color="#333333" />
        </div>    
    </div>
    
     
     <div class="background-option">
     
            <h3><?php _e('Background Options', '8degree-maintenance') ?></h3>
            <div class="bg-type-choose">
                <label class="edmm_strong_texts"><?php _e('Select Background Type', '8degree-maintenance') ?></label>
                      
                        <label class="edmm_form_label"><input type="radio" name="bg_type" value="color" class="background-image-type" id="option_colorbg" <?php if($maintenance_setting['bg_type']=='color') echo 'checked' ?>/><?php _e('Color', '8degree-maintenance') ?></label> 
                        <label class="edmm_form_label"><input type="radio" name="bg_type" value="image" class="background-image-type" id="option_imagebg"  <?php if($maintenance_setting['bg_type']=='image') echo 'checked' ?>/><?php _e('Image', '8degree-maintenance') ?></label>
            </div>
            <div class="bg-color-type bg-common-class" style="display:none;">
                <label class="edmm_strong_texts"><?php _e('Background Color', '8degree-maintenance') ?></label>
                <input type="text" name="bg_color" class="cpa-color-picker2" id="background_color" data-default-color="#ffffff" value="<?php if(empty($maintenance_setting['bg_color'])){echo '#fff';}else{ echo esc_attr($maintenance_setting ['bg_color']); }?>" />
            </div>
            
            <div class="background-image bg-common-class" style="display: none;">
                <label class="edmm_form_label"><?php _e('Background Image', '8degree-maintenance') ?></label>
                <select name="bg-image" class="bg-image-choose">
                    <option value="0" <?php if(isset($maintenance_setting['bg-image']) && $maintenance_setting['bg-image'] =='') echo 'selected' ?> >Choose</option>
                    <option value="pre" id="pre_img" <?php if(isset($maintenance_setting['bg-image']) && $maintenance_setting['bg-image'] =='pre') echo 'selected' ?>>Pre-available</option>
                    <option value="new" id="new_img" <?php if(isset($maintenance_setting['bg-image']) && $maintenance_setting['bg-image'] =='new') echo 'selected' ?>>New</option>
                </select>
            </div>
            
            <div class="bg-available-type image-bg-common " style="display: none;">
                <label class="edmm_strong_texts"><?php _e('Pre Available Image', '8degree-maintenance') ?></label>
                <select name="bg-available-options" class="bg-select-class">
                    <option value="image0" <?php if(isset($maintenance_setting['bg-available-options']) && $maintenance_setting['bg-available-options'] =='') echo 'selected' ?>>Choose Image</option>
                    <option value="image1" id="bg_img1" <?php if(isset($maintenance_setting['bg-available-options']) && $maintenance_setting['bg-available-options']=='image1') echo 'selected' ?>>Image 1</option>
                    <option value="image2" id="bg_img2"<?php if(isset($maintenance_setting['bg-available-options']) && $maintenance_setting['bg-available-options']=='image2') echo 'selected' ?>>Image 2</option>
                    <option value="image3" id="bg_img3"<?php if(isset($maintenance_setting['bg-available-options']) && $maintenance_setting['bg-available-options']=='image3') echo 'selected' ?>>Image 3</option>
                    <option value="image4" id="bg_img4"<?php if(isset($maintenance_setting['bg-available-options']) && $maintenance_setting['bg-available-options']=='image4') echo 'selected' ?>>Image 4</option>
                    <option value="image5" id="bg_img5"<?php if(isset($maintenance_setting['bg-available-options']) && $maintenance_setting['bg-available-options']=='image5') echo 'selected' ?>>Image 5</option>
                    <option value="image6" id="bg_img6"<?php if(isset($maintenance_setting['bg-available-options']) && $maintenance_setting['bg-available-options']=='image6') echo 'selected' ?>>Image 6</option>
                    <option value="image7" id="bg_img7"<?php if(isset($maintenance_setting['bg-available-options']) && $maintenance_setting['bg-available-options']=='image7') echo 'selected' ?>>Image 7</option>
                    <option value="image8" id="bg_img8"<?php if(isset($maintenance_setting['bg-available-options']) && $maintenance_setting['bg-available-options']=='image8') echo 'selected' ?>>Image 8</option>
                    <option value="image9" id="bg_img9"<?php if(isset($maintenance_setting['bg-available-options']) && $maintenance_setting['bg-available-options']=='image9') echo 'selected' ?>>Image 9</option>
                    <option value="image10" id="bg_img10"<?php if(isset($maintenance_setting['bg-available-options']) && $maintenance_setting['bg-available-options']=='image10') echo 'selected' ?>>Image 10</option>
                    <option value="image11" id="bg_img11"<?php if(isset($maintenance_setting['bg-available-options']) && $maintenance_setting['bg-available-options']=='image11') echo 'selected' ?>>Image 11</option>
                    <option value="image12" id="bg_img12"<?php if(isset($maintenance_setting['bg-available-options'])&& $maintenance_setting['bg-available-options']=='image12') echo 'selected' ?>>Image 12</option>
                </select>
                <div class="image-preview-div">
                    <div class="image-preview-1 bg-img-preview" style="display: none;">
                        <p><?php _e('Preview:', '8degree-maintenance') ?></p><img src="<?php echo MAINTENANCE_IMAGE_DIR.'/bg1.jpg' ?>" height="200px" /> 
                    </div>
                    <div class="image-preview-2 bg-img-preview" style="display: none;">
                        <p><?php _e('Preview:', '8degree-maintenance') ?></p><img src="<?php echo MAINTENANCE_IMAGE_DIR.'/bg2.jpg' ?>" height="200px" />
                    </div>
                    <div class="image-preview-3 bg-img-preview" style="display: none;">
                        <p><?php _e('Preview:', '8degree-maintenance') ?></p><img src="<?php echo MAINTENANCE_IMAGE_DIR.'/bg3.jpg' ?>" height="200px" />
                    </div>
                    <div class="image-preview-4 bg-img-preview" style="display: none;">
                        <p><?php _e('Preview:', '8degree-maintenance') ?></p><img src="<?php echo MAINTENANCE_IMAGE_DIR.'/bg4.jpg' ?>" height="200px" />
                    </div>
                    <div class="image-preview-5 bg-img-preview" style="display: none;">
                        <p><?php _e('Preview:', '8degree-maintenance') ?></p><img src="<?php echo MAINTENANCE_IMAGE_DIR.'/bg5.jpg' ?>" height="200px" />
                    </div>
                    <div class="image-preview-6 bg-img-preview" style="display: none;">
                        <p><?php _e('Preview:', '8degree-maintenance') ?></p><img src="<?php echo MAINTENANCE_IMAGE_DIR.'/bg6.jpg' ?>" height="200px" />
                    </div>
                    <div class="image-preview-7 bg-img-preview" style="display: none;">
                        <p><?php _e('Preview:', '8degree-maintenance') ?></p><img src="<?php echo MAINTENANCE_IMAGE_DIR.'/bg7.jpg' ?>" height="200px" />
                    </div>
                    <div class="image-preview-8 bg-img-preview" style="display: none;">
                        <p><?php _e('Preview:', '8degree-maintenance') ?></p><img src="<?php echo MAINTENANCE_IMAGE_DIR.'/bg8.jpg' ?>" height="200px" />
                    </div>
                    <div class="image-preview-9 bg-img-preview" style="display: none;">
                        <p><?php _e('Preview:', '8degree-maintenance') ?></p><img src="<?php echo MAINTENANCE_IMAGE_DIR.'/bg9.jpg' ?>" height="200px" />
                    </div>
                    <div class="image-preview-10 bg-img-preview" style="display: none;">
                        <p><?php _e('Preview:', '8degree-maintenance') ?></p><img src="<?php echo MAINTENANCE_IMAGE_DIR.'/bg10.jpg' ?>" height="200px" />
                    </div>
                    <div class="image-preview-11 bg-img-preview" style="display: none;">
                        <p><?php _e('Preview:', '8degree-maintenance') ?></p><img src="<?php echo MAINTENANCE_IMAGE_DIR.'/bg11.jpg' ?>" height="200px" />
                    </div>
                    <div class="image-preview-12 bg-img-preview" style="display: none;">
                        <p><?php _e('Preview:', '8degree-maintenance') ?></p><img src="<?php echo MAINTENANCE_IMAGE_DIR.'/bg12.jpg' ?>" height="200px" />
                    </div>
                </div>
                
            </div>
                
            <div class="bg-img-type image-bg-common" style="display:none;">
                <label class="edmm_strong_texts"><?php _e('Choose Image', '8degree-maintenance') ?></label>
                    <label for="upload_image">
                        <input id="upload_image" type="text" size="36" placeholder="<?php _e('Enter a URL or upload an image', '8degree-maintenance') ?>" name="ad_image" value="<?php if(!empty($maintenance_setting ['ad_image'])){ echo esc_attr($maintenance_setting ['ad_image']); }?>" /> 
                        <input id="upload_image_button" class="edm_upload_image button" type="button" value="Upload Image" />
                         <p><?php _e('Current', '8degree-maintenance') ?></p><?php if(!empty($maintenance_setting['ad_image'])){ ?><img src="<?php echo esc_attr($maintenance_setting ['ad_image']);?>" height="100px" /> <?php } ?>
                    </label>
            </div>
            
     </div>
     
     <div class="timer-options">
     
        <h3><?php _e('Timer Layouts', '8degree-maintenance') ?></h3>
        <div class="edmm_timer_layout_wrap">
            <label class="edmm_form_label">
                <input type="radio" name="timerlayout" value="layout1" id="layout1-trigger" class="timer_layout" <?php if($maintenance_setting['timerlayout']=='layout1') echo 'checked' ?> /><?php _e('Layout 1', '8degree-maintenance') ?>
            </label>
            <div class="timer-layout1-preview timer-common-layout" style="">
                <img src="<?php echo MAINTENANCE_IMAGE_DIR.'/counter-layout1.png' ?>" height="200px" /> 
            </div>
        </div>
        <div class="edmm_timer_layout_wrap">
            <label class="edmm_form_label">
                <input type="radio" name="timerlayout" value="layout2" class="timer_layout" <?php if($maintenance_setting['timerlayout']=='layout2') echo 'checked' ?> /><?php _e('Layout 2', '8degree-maintenance') ?>
            </label>
            <div class="timer-layout2-preview timer-common-layout" style="">
                <img src="<?php echo MAINTENANCE_IMAGE_DIR.'/counter-layout2.png' ?>" height="200px" /> 
            </div>
        
        </div>
        
     </div>
     
     <div class="subscribe-options">
        <h3><?php _e('Subscribe Form Layouts', '8degree-maintenance') ?></h3>
        <div class="edmm_form_label_wrapper">
        <label class="edmm_form_label"><input type="radio" name="subs_layout" value="layout1" class="subscriber_layout1" <?php if($maintenance_setting['subs_layout']=='layout1') echo 'checked' ?> />&nbsp;<?php _e('Layout 1', '8degree-maintenance') ?></label>
        <div class="subscriber-layout1-preview">
            <img src="<?php echo MAINTENANCE_IMAGE_DIR.'/sub-lay1.png' ?>"  /> 
        </div>
        </div>
        <div class="edmm_form_label_wrapper">
        <label class="edmm_form_label">
            <input type="radio" name="subs_layout" value="layout2" class="subscriber_layout2" <?php if($maintenance_setting['subs_layout']=='layout2') echo 'checked' ?> />
            <?php _e('Layout 2', '8degree-maintenance') ?>
        </label>
        <div class="subscriber-layout2-preview">
             <img src="<?php echo MAINTENANCE_IMAGE_DIR.'/sub-lay2.png' ?>"  /> 
        </div>
        </div>
        
     </div>
     
     <div class="contactus-options">
        <h3><?php _e('Contact Us Button Options', '8degree-maintenance') ?></h3> 
        <div class="edmm-sigle-field">
            <label class="edmm_form_label bg-color"><?php _e('Background Color', '8degree-maintenance') ?> </label>
                <input type="text" name="contactus_bg_color" value="<?php echo esc_attr($maintenance_setting ['contactus_bg_color']);?>" id="contactus_bg_color" class="cpa-color-picker" data-default-color="#ffff" />
            
        </div>
        <div class="edmm-sigle-field">
            <label class="edmm_form_label bg-color"><?php _e('Font Color', '8degree-maintenance') ?> </label>
                <input type="text" name="contactus_font_color" value="<?php echo esc_attr($maintenance_setting ['contactus_font_color']);?>" id="contactus_font_color" class="cpa-color-picker" data-default-color="#000000" />
            
        </div> 
        
        <div class="edmm-sigle-field">
            <label class="edmm_form_label hover-bg-color"><?php _e('Hover Background Color', '8degree-maintenance') ?></label>
                <input type="text" name="contactus_hoverbg_color" value="<?php echo esc_attr($maintenance_setting ['contactus_hoverbg_color']);?>" id="contactus_hoverbg_color" class="cpa-color-picker" data-default-color="#ffff" />
            
        </div>
        <div class="edmm-sigle-field">     
            <label class="edmm_form_label hover-bg-color"><?php _e('Hover Font Color', '8degree-maintenance') ?></label>
                <input type="text" name="contactus_hovertext_color" value="<?php echo esc_attr($maintenance_setting ['contactus_hovertext_color']);?>" id="contactus_hovertext_color" class="cpa-color-picker" data-default-color="#ffff" />
            
        </div>     
     </div>
     
     <div class="social-network-options">
        <h3><?php _e('Social Icon Options', '8degree-maintenance') ?></h3>
        <div class="edmm-sigle-field">
            <label class="edmm_form_label bg-color"><?php _e('Background Color', '8degree-maintenance') ?></label>
            <input type="text" name="socialicon_bg_color" value="<?php echo esc_attr($maintenance_setting ['socialicon_bg_color']);?>" id="socialicon_bg_color" class="cpa-color-picker" data-default-color="#ffff" />
        </div>
        <div class="edmm-sigle-field">
            <label class="edmm_form_label bg-color"><?php _e('Font Color', '8degree-maintenance') ?></label>
            <input type="text" name="socialicon_font_color" value="<?php echo esc_attr($maintenance_setting ['socialicon_font_color']);?>" id="socialicon_font_color" class="cpa-color-picker" data-default-color="#000000" />
        </div>
        <div class="edmm-sigle-field">
            <label class="edmm_form_label hover-bg-color"><?php _e('Hover Background Color', '8degree-maintenance') ?> </label>
            <input type="text" name="socialicon_hoverbg_color" value="<?php echo esc_attr($maintenance_setting ['socialicon_hoverbg_color']);?>" id="socialicon_hoverbg_color" class="cpa-color-picker" data-default-color="#ffff" /> 
        </div>
        <div class="edmm-sigle-field">   
            <label class="edmm_form_label hover-bg-color"><?php _e('Hover Font Color', '8degree-maintenance') ?>  </label> 
            <input type="text" name="socialicon_hovertext_color" value="<?php echo esc_attr($maintenance_setting ['socialicon_hovertext_color']);?>" id="socialicon_hovertext_color" class="cpa-color-picker" data-default-color="#ffff" />
       </div>
        
     </div>
        
            
     
</div>  
   