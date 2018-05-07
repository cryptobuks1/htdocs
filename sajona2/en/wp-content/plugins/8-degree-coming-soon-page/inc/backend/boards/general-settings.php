<div class="general-settings-wrap settings-content">
        <h2><?php _e('General Settings', '8degree-maintenance') ?></h2>
        <?php
        $maintenance_setting = get_option('maintenance_settings');
        $subscriber_setting = get_option('maintenance_subscriber_settings');
        $maintenance_setting = (empty($maintenance_setting))?array('status'=>'', 'headline_text'=>'', 'description'=>'', 'headline_color'=>''):$maintenance_setting;
        ?>
    
            <div class="select-status-div">
            
                
                <label class="disabled"><input type="radio" name="status" value="0" class="status-mode disable"  <?php if($maintenance_setting['status']=='0') echo 'checked' ?>/><?php _e('Disable', '8degree-maintenance') ?></label>
                <label class="enabled"><input type="radio" name="status" value="1" class="status-mode enable" <?php if($maintenance_setting['status']=='1') echo 'checked' ?>/><?php _e('Enable Maintenance Mode', '8degree-maintenance') ?></label>
                
                <div class="info-note"><span class="note-text">Note:</span> Check to enable to enable coming soon page.</div>
            </div>
        
            <div class="headline-div general-common-section" style="display:none;">
                <h3>Header Section</h3>
                <div class="head-section">
                    <label class="edmm_strong_texts"><?php _e('Show', '8degree-maintenance') ?> <input type="checkbox" name="show_head" value="1" class="field-display-trigger" id="display-1" <?php if($maintenance_setting['show_head']=='1') echo 'checked' ?> /> </label>
                    <div class="head-text-field" style="display: none;" id="field-1">
                        <label class="edmm_form_label edmm_text_field_label"><?php _e('Header Text', '8degree-maintenance') ?></label>
                        <input type="text" name="headline_text" class="head-section-input" value="<?php echo esc_attr($maintenance_setting ['headline_text']);?>"  />
                    </div>
                </div>
            </div>
        
            <div class="description general-common-section" style="display:none;">
                <h3><?php _e('Description Section', '8degree-maintenance') ?></h3> 
                <label class="edmm_strong_texts edmm_desc_strong"> <?php _e('Show', '8degree-maintenance') ?> <input type="checkbox" name="show_description" value="1" class="field-display-trigger" id="display-2" <?php if($maintenance_setting['show_description']=='1') echo 'checked' ?> /> </label> 
                <div class="desc-text-field" style="display: none;" id="field-2">
                    <label class="edmm_form_label edmm_text_field"><?php _e('Description', '8degree-maintenance') ?></label>
                    <textarea rows="5" class="textarea-general-settings" cols="40" name="description"><?php  echo esc_attr($maintenance_setting ['description']);?></textarea>
                </div> 
                <?php /*
                $content = $maintenance_setting ['description'];
                $editor_id = 'description';

                wp_editor( $content, $editor_id );
                */?>
            
            </div>
            
            <div class="subscribe-section general-common-section" style="display:none;">
                <h3><?php _e('Subscriber Section', '8degree-maintenance') ?></h3>
                <label class="edmm_strong_texts"><?php _e('Show', '8degree-maintenance') ?> <input type="checkbox" name="show_subscribe" value="1" class="field-display-trigger" id="display-3" <?php if($maintenance_setting['show_subscribe']=='1') echo 'checked' ?> /> </label>
                <div class="subscribe-fields" style="display: none;" id="field-3">
                    <div class="edmm-sigle-field">
                        <label class="edmm_form_label"><?php _e('Confirm Email Address', '8degree-maintenance') ?>
                            <input type="checkbox" class="subscribe-input1" name="confirm_email_subscribe" value="1" <?php if($maintenance_setting['confirm_email_subscribe']=='1') echo 'checked' ?> />
                        </label>
                         <div class="info-note"><span class="note-text">Note:</span> Check confirm email address to enable the email confirmation system for valid subscribers.</div>
                    </div>
                    <div class="edmm-sigle-field">
                        <label class="edmm_form_label"><?php _e('Heading Text', '8degree-maintenance') ?></label>
                        <input type="text" name="subscribe_heading_text" class="subscribe-input" value="<?php echo esc_attr($maintenance_setting ['subscribe_heading_text']);?>" />
                    </div>
                    <div class="edmm-sigle-field"> 
                        <label class="edmm_form_label"><?php _e('Form Label', '8degree-maintenance') ?></label>
                        <input type="text" name="subscribe_form_label" class="subscribe-input" value="<?php echo esc_attr($maintenance_setting ['subscribe_form_label']);?>" />
                    </div> 
                    <div class="edmm-sigle-field">     
                        <label class="edmm_form_label"><?php _e('Subscribe Button Text', '8degree-maintenance') ?></label>
                        <input type="text" class="subscribe-input" name="subscribe_button_text" value="<?php echo esc_attr($maintenance_setting ['subscribe_button_text']);?>" />
                    </div>
                    <div class="edmm-sigle-field">      
                        <label class="edmm_form_label edmm_thankyou"><?php _e('Thank you note', '8degree-maintenance') ?></label>
                        <textarea name="note_subscriber" class="subscribe-input" class="textarea-sub-section"><?php echo esc_attr($maintenance_setting ['note_subscriber']);?></textarea>
                    </div>
                
                </div>
            </div>
            
            <div class="social-network-section general-common-section" style="display:none;">
                <h3><?php _e('Social Network Section', '8degree-maintenance') ?></h3>
                <label class="social-show edmm_strong_texts"><?php _e('Show', '8degree-maintenance') ?><input type="checkbox" name="show_social_network" value="1" class="field-display-trigger" id="display-4"  <?php if($maintenance_setting['show_social_network']=='1') echo 'checked' ?> /> </label>
                 <div class="social-network-fields" style="display: none;" id="field-4">
                 <ul class="sortable">
                    <?php if(empty($maintenance_setting['social_name'])){ ?>
                    <li>
                        <div class="single-social-bar">
                        <label class="first-social-wrap"><?php _e('facebook', '8degree-maintenance') ?></label>
                           <label class="edmm_strong_texts">Show<input type="checkbox"  name="social_controls[facebook]" class="space1"  value="1" <?php if($maintenance_setting['social_controls']['facebook']=='1') echo 'checked' ?> /></label>
                            <label class="url edmm_strong_texts">URL<input type="text" class="widthbar social-url-wrap" name="social_url[facebook][url]" placeholder="e.g; https://www.facebook.com/8DegreeThemes" value="<?php echo esc_attr($maintenance_setting['social_url']['facebook']['url']);?>"  /></label>
                            <input type="hidden" name="social_name[]" value="facebook" />
                        </div>    
                        
                    </li>
                    <li>
                        <div class="single-social-bar">
                        <label class="first-social-wrap"><?php _e('twitter', '8degree-maintenance') ?></label>
                        <label class="edmm_strong_texts"> Show<input type="checkbox" name="social_controls[twitter]" value="1" <?php if($maintenance_setting['social_controls']['twitter']=='1') echo 'checked' ?> /></label>
                        <label class="url edmm_strong_texts">URL<input type="url" class="widthbar social-url-wrap" name="social_url[twitter][url]" value="<?php echo esc_attr($maintenance_setting['social_url']['twitter']['url']);?>" placeholder="e.g; https://twitter.com/8degreethemes" /></label>
                            <input type="hidden" name="social_name[]" value="twitter" />
                        </div>
                         
                    </li>
                    <li>
                        <div class="single-social-bar">
                        <label class="first-social-wrap"><?php _e('pinterest', '8degree-maintenance') ?></label>
                            <label class="edmm_strong_texts"> Show<input type="checkbox" name="social_controls[pinterest]" value="1" <?php if($maintenance_setting['social_controls']['pinterest']=='1') echo 'checked' ?> /></label>
                            <label class="url edmm_strong_texts">URL<input type="url" class="widthbar social-url-wrap" name="social_url[pinterest][url]" value="<?php echo esc_attr($maintenance_setting['social_url']['pinterest']['url']);?>" placeholder="e.g; https://www.pinterest.com/8degreethemes/"  /></label>
                            <input type="hidden" name="social_name[]" value="pinterest" />
                        </div> 
                    </li>
                    <li>
                        <div class="single-social-bar">
                        <label class="first-social-wrap"><?php _e('linked in', '8degree-maintenance') ?></label>
                             <label class="edmm_strong_texts"> Show<input type="checkbox" name="social_controls[linkedin]" value="1" <?php if($maintenance_setting['social_controls']['linkedin']=='1') echo 'checked' ?> /></label>
                            <label class="url edmm_strong_texts">URL<input type="url" class="widthbar social-url-wrap" name="social_url[linkedin][url]" value="<?php echo esc_attr($maintenance_setting['social_url']['linkedin']['url']);?>" placeholder="e.g; https://www.linkedin.com/8degreethemes/" /></label>
                            <input type="hidden" name="social_name[]" value="linkedin" />
                        </div> 
                    </li>
                    <li>
                        <div class="single-social-bar">
                        <label class="first-social-wrap"><?php _e('google plus', '8degree-maintenance') ?></label>
                             <label class="edmm_strong_texts"> Show<input type="checkbox" name="social_controls[googleplus]" value="1" <?php if($maintenance_setting['social_controls']['googleplus']=='1') echo 'checked' ?> /></label>
                            <label class="url edmm_strong_texts">URL<input type="url" class="widthbar social-url-wrap" name="social_url[googleplus][url]" value="<?php echo esc_attr($maintenance_setting['social_url']['googleplus']['url']);?>" placeholder="e.g; https://plus.google.com/+8DegreeThemes" /></label>
                            <input type="hidden" name="social_name[]" value="googleplus" />
                        </div>
                    </li>
                    <li>
                        <div class="single-social-bar">
                        <label class="first-social-wrap"><?php _e('tumblr', '8degree-maintenance') ?></label>
                            <label class="edmm_strong_texts"> Show<input type="checkbox" name="social_controls[tumblr]" value="1" <?php if($maintenance_setting['social_controls']['tumblr']=='1') echo 'checked' ?> /></label>
                            <label class="url edmm_strong_texts">URL<input type="url" class="widthbar social-url-wrap" name="social_url[tumblr][url]" value="<?php echo esc_attr($maintenance_setting['social_url']['tumblr']['url']);?>" placeholder="e.g; https://www.tumblr.com/8DegreeThemes" /></label>
                            <input type="hidden" name="social_name[]" value="tumblr" />
                        </div> 
                    </li> 
                    <?php } else{ 
                        foreach ($maintenance_setting['social_name'] as $social_icon)
                    {
                        
                            ?>
                                <li>
                                   <div class="single-social-bar">
                                   <label class="first-social-wrap"><?php _e(ucfirst($social_icon), '8degree-maintenance') ?></label>
                                   <label class="edmm_strong_texts"><?php _e('Show', '8degree-maintenance') ?> <input type="checkbox" name="social_controls[<?php echo $social_icon; ?>]" value="1" <?php if(isset($maintenance_setting['social_controls'][$social_icon]) && $maintenance_setting['social_controls'][$social_icon] == '1') echo 'checked' ?> /></label>
                                   <label class="url edmm_strong_texts"><?php _e('URL', '8degree-maintenance') ?><input type="url" class="social-url-wrap" name="social_url[<?php echo $social_icon ?>][url]" value="<?php echo esc_attr($maintenance_setting['social_url'][$social_icon]['url']);?>" placeholder="e.g; https://example.com/8degreethemes" /></label>
                                   <input type="hidden" name="social_name[]" value="<?php echo $social_icon; ?>" />
                                   </div>
                                </li>
                            <?php
                        
                    } 
                   } ?>
                 </ul>
                 
                  </div>
            </div>
            
            <div class="contactus-section general-common-section" style="display:none;">
                <h3><?php _e('Contact Us Section', '8degree-maintenance') ?></h3>
                <label class="contact-show"><?php _e('Show', '8degree-maintenance') ?><input type="checkbox" name="show_contact" value="1" class="field-display-trigger" id="display-5" <?php if($maintenance_setting['show_contact']=='1') echo 'checked' ?> /> </label>
                <div class="social-network-fields" style="display: none;" id="field-5">
                    <div class="edmm-sigle-field">
                        <label class="edmm_form_label"><?php _e('Email address', '8degree-maintenance') ?></label><input type="email" class="subscribe-input" name="email_address" value="<?php if($maintenance_setting['email_address']== ''){$admin_email = get_option( 'admin_email' ); echo $admin_email; }else{ echo esc_attr($maintenance_setting['email_address']); }?>" />
                    </div>
                    <div class="edmm-sigle-field">     
                        <label class="edmm_form_label"><?php _e('Name Label', '8degree-maintenance') ?></label><input type="text" class="subscribe-input" name="name_label" value="<?php echo esc_attr($maintenance_setting['name_label']);?>" />
                    </div>
                    <div class="edmm-sigle-field"> 
                        <label class="edmm_form_label"><?php _e('Email Label', '8degree-maintenance') ?></label><input type="text" name="email_label" class="subscribe-input" value="<?php echo esc_attr($maintenance_setting['email_label']);?>" />
                    </div>
                    <div class="edmm-sigle-field"> 
                        <label class="edmm_form_label"><?php _e('Message Label', '8degree-maintenance') ?></label><input type="text" class="subscribe-input" name="message_label" value="<?php echo esc_attr($maintenance_setting['message_label']);?>" />
                    </div>
                    <div class="edmm-sigle-field"> 
                        <label class="edmm_form_label"><?php _e('Submit Button Label', '8degree-maintenance') ?></label><input type="text" class="subscribe-input" name="submit_label" value="<?php echo esc_attr($maintenance_setting['submit_label']);?>" />
                    </div>
                </div>
            </div>
            
            <div class="timer-section general-common-section" style="display:none;">
                <h3><?php _e('Countdown Timer Section', '8degree-maintenance') ?></h3>
                <label class="edmm_strong_texts"><?php _e('Enable Countdown', '8degree-maintenance') ?><input type="checkbox" name="show_countdown" value="1" class="field-display-trigger" id="display-6" <?php if($maintenance_setting['show_countdown']=='1') echo 'checked' ?> /> </label>
                
                <div class="info-note" id="countdown-note"><span class="note-text">Note:</span> Check enable countdown to display countdown timer in coming soon page.</div>
                                                                
               
                <div class="countdown-fields" style="display: none;" id="field-6">
					<label class="edmm_strong_texts"><?php _e('Countdown Expiry Date:', '8degree-maintenance') ?></label><input type="text"  name="countdown_date" class="custom_date"  value="<?php echo esc_attr($maintenance_setting['countdown_date']);?>" placeholder=""/>   
                  <label class="timer-time edmm_form_label"><?php _e('Hour Label', '8degree-maintenance') ?></label><input type="text"  class="subscribe-input size" name="hour_timer"  id="input-hour" value="<?php echo esc_attr($maintenance_setting['hour_timer']);?>" placeholder="<?php _e('Hour','8degree-maintenance');?>" />
                  
                  <label class="timer-time edmm_form_label"><?php _e('Minute Label', '8degree-maintenance') ?></label><input type="text" class="subscribe-input size" name="minute_timer"  id="input-minute" value="<?php echo esc_attr($maintenance_setting['minute_timer']);?>" placeholder="<?php _e('Min','8degree-maintenance');?>" />
                  
                  <label class="timer-time edmm_form_label"><?php _e('Second Label', '8degree-maintenance') ?></label><input type="text" class="subscribe-input size" name="second_timer"  id="input-second" value="<?php echo esc_attr($maintenance_setting['second_timer']);?>" placeholder="<?php _e('Sec','8degree-maintenance');?>" />
                  <div class="error-number"></div>
                                  
                </div>
            </div>
         
         
    
  
 
 </div> <!--General Settings Wrap End-->