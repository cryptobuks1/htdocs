<?php
defined('ABSPATH') or die("No script kiddies please!");

  
$settings_data = get_option('maintenance_settings');
        //Checking post data
        /*echo '<pre>';
        print_r($settings_data);
        echo '</pre>'; */
        
        ?>
<!--INDEX PAGE FOR DISPLAYING COMMING SOON PAGE-->
<html>

    <head>
        
        <script src="<?php echo MAINTENANCE_JS_DIR.'/frontend/jquery-1.11.3.min.js' ?>"></script>
        <script src="<?php echo MAINTENANCE_JS_DIR.'/frontend/script-frontend.js' ?>"></script>
        <script src="<?php echo MAINTENANCE_JS_DIR.'/jquery.downCount.js'?>"></script>
       
        
        <?php //Display Google analytics 
      
            
        if($settings_data['hide_search_engines'] == '1'){ ?>
            <meta name='robots' content='noindex,nofollow' />
        <?php } ?>
            <!-- Meta Tags-->   
            <meta name="<?php echo $settings_data['meta_name']; ?>" content="<?php echo $settings_data['meta_content']; ?>" />
        
            <!-- Meta Tags end-->
            <link href="<?php echo MAINTENANCE_CSS_DIR.'/TimeCircles.css' ?>" rel="stylesheet" />
            <link href="<?php echo MAINTENANCE_CSS_DIR.'/styles.css' ?>" rel="stylesheet" /> 
            <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />
            <link href="<?php echo MAINTENANCE_CSS_DIR.'/frontend-style.css' ?>" rel="stylesheet" />
            <link rel="shortcut icon" href="<?php if(!empty($settings_data['favicon'])){echo esc_attr($settings_data ['favicon']);}?>" type="images/x-icon" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
 
    <title><?php _e('Site Under Maintenance', '8degree-maintenance') ?></title>
      
    <body style="<?php if($settings_data['bg_type'] == 'color'){ ?>background-color: <?php echo $settings_data['bg_color']; echo ';'; } ?>
                       <?php if($settings_data['bg_type'] == 'image'){ if($settings_data['bg-image']=='new'){ ?>background-image: url(<?php echo $settings_data['ad_image'];   ?>); <?php }
                                                                       if($settings_data['bg-image']=='pre'){ if($settings_data['bg-available-options'] == 'image1'){ ?> background-image: url(<?php echo MAINTENANCE_IMAGE_DIR.'/bg1.jpg';   ?>);<?php } 
                                                                                                              if($settings_data['bg-available-options'] == 'image2'){ ?> background-image: url(<?php echo MAINTENANCE_IMAGE_DIR.'/bg2.jpg';   ?>);<?php } 
                                                                                                              if($settings_data['bg-available-options'] == 'image3'){ ?> background-image: url(<?php echo MAINTENANCE_IMAGE_DIR.'/bg3.jpg';   ?>);<?php }
                                                                                                              if($settings_data['bg-available-options'] == 'image4'){ ?> background-image: url(<?php echo MAINTENANCE_IMAGE_DIR.'/bg4.jpg';   ?>);<?php }
                                                                                                              if($settings_data['bg-available-options'] == 'image5'){ ?> background-image: url(<?php echo MAINTENANCE_IMAGE_DIR.'/bg5.jpg';   ?>);<?php }
                                                                                                              if($settings_data['bg-available-options'] == 'image6'){ ?> background-image: url(<?php echo MAINTENANCE_IMAGE_DIR.'/bg6.jpg';   ?>);<?php }
                                                                                                              if($settings_data['bg-available-options'] == 'image7'){ ?> background-image: url(<?php echo MAINTENANCE_IMAGE_DIR.'/bg7.jpg';   ?>);<?php }
                                                                                                              if($settings_data['bg-available-options'] == 'image8'){ ?> background-image: url(<?php echo MAINTENANCE_IMAGE_DIR.'/bg8.jpg';   ?>);<?php }
                                                                                                              if($settings_data['bg-available-options'] == 'image9'){ ?> background-image: url(<?php echo MAINTENANCE_IMAGE_DIR.'/bg9.jpg';   ?>);<?php }
                                                                                                              if($settings_data['bg-available-options'] == 'image10'){ ?> background-image: url(<?php echo MAINTENANCE_IMAGE_DIR.'/bg10.jpg';   ?>);<?php }
                                                                                                              if($settings_data['bg-available-options'] == 'image11'){ ?> background-image: url(<?php echo MAINTENANCE_IMAGE_DIR.'/bg11.jpg';   ?>);<?php }
                                                                                                              if($settings_data['bg-available-options'] == 'image12'){ ?> background-image: url(<?php echo MAINTENANCE_IMAGE_DIR.'/bg12.jpg';   ?>);<?php } } }?>
																											  " class="edn-coming-soon-body">
                 
        <div class="frontend-all-wrapper">    
              
            <!--Heading and Description Section-->  
                           
            <div class="maintenance-note-wrapper">
                <?php if($settings_data['show_head'] == 1){ ?>
                    <h1 style="text-align: center; color: <?php echo $settings_data['headline_color']; ?>;">
                        <?php echo $settings_data['headline_text']; ?>
                    </h1>
                <?php  } ?>
                
                <?php if($settings_data['show_description'] == 1){ ?>
                    <p style="text-align: center; color: <?php echo $settings_data['description_color']; ?>"><?php echo $settings_data['description']; ?></p>
                 <?php } ?>
            </div>
              
        <?php
       
        $enable_countdown = $settings_data['show_countdown'];
        
        $day = $settings_data['countdown_date'];
        $hour = $settings_data['hour_timer'];
        $minute = $settings_data['minute_timer'];
       
        if($enable_countdown == '1'){ ?> 
        
            <input type="hidden" name="hidden_date" class="date_val" value="<?php echo $settings_data['countdown_date']; ?>" />
            <input type="hidden" name="hidden_hour" class="hour_val" value="<?php echo $settings_data['hour_timer']; ?>" />
            <input type="hidden" name="hidden_minute" class="minute_val" value="<?php echo $settings_data['minute_timer']; ?>" />
            <input type="hidden" name="hidden_second" class="second_val" value="<?php echo $settings_data['second_timer']; ?>" />
        
        <?php    } ?>
        
        <!--Countdown Timer Section--> 
            
        <div class="countdown-wrap"> 
            <?php if($settings_data['show_countdown'] == '1'){ ?>       
            <?php if($settings_data['timerlayout'] == 'layout1'){ ?>
            <ul class="countdown">
                <li>
                    <span class="days">00</span>
                    <p class="days_ref">days</p>
                </li>
                <li>
                    <span class="hours">00</span>
                    <p class="hours_ref">hours</p>
                </li>
                <li>
                    <span class="minutes">00</span>
                    <p class="minutes_ref">minutes</p>
                </li>
                <li>
                    <span class="seconds last">00</span>
                    <p class="seconds_ref">seconds</p>
                </li>
            </ul>
            <?php } ?>
            <?php if($settings_data['timerlayout'] == 'layout2'){ ?>
            <ul class="countdown countdown_layout2">
                <li>
                    <span class="days lay2-days">00</span>
                    <p class="days_ref days-layout2">days</p>
                </li>
                <li>
                    <span class="hours lay2-hours">00</span>
                    <p class="hours_ref hours-layout2">hours</p>
                </li>
                <li>
                    <span class="minutes lay2-minute">00</span>
                    <p class="minutes_ref minute-layout2">minutes</p>
                </li>
                <li>
                    <span class="seconds last lay2-second">00</span>
                    <p class="seconds_ref seconds-layout2">seconds</p>
                </li>
            </ul>
            
           <?php }
           
            } ?>
      
      </div> 
      
       <!--Subscriber Form Section--> 
      
      <div class="subscriber-form-wrap">
       <?php  
        if(isset($_GET['act_code'])){
                    
        $code = $_GET['act_code'];
        $email = $_GET['email'];
        $si_id = $_GET['s_id'];
    
        $current_time = current_time( 'Y-m-d' );
        
        global $wpdb;
        $table_name = $wpdb->prefix . '8degree_maintenance';
        $user_sets = $wpdb->get_results("SELECT * FROM $table_name WHERE act_code = '$code'");
    
            if($user_sets){  
                $query=$wpdb->update( $table_name, array( 'flag' => '1'),array( 'act_code' => $code ), array( '%d' ) );
                $_SESSION['msg']="successfull"; 
                wp_redirect( home_url() ); exit;
            } 
     
            else{
                echo 'please re-try';
            }
    
        }
      if(isset($_POST['submit_subscriber']) && wp_verify_nonce($_POST['subscriber_nonce_field'],'subscriber-nonce')){
            global $wpdb;
            $table_name = $table_name = $wpdb->prefix . "8degree_maintenance";
            $visitor_email = sanitize_text_field($_POST['subscribe_email']);
            $nonce = $_POST['subscriber_nonce_field'];
            $email_check =$wpdb->get_results( "SELECT * FROM $table_name WHERE email = '$visitor_email'" );
            $num_email = $wpdb->num_rows;
                if($email_check)  {
                   $_SESSION['subscribe_msg'] = __('You have already subscribed', '8degree-maintenance');
                    }
                else{
                    
                    if($settings_data['confirm_email_subscribe'] == '1'){
                         $visitor_email = sanitize_text_field($_POST['subscribe_email']);
                         $current_time = current_time( 'Y-m-d' );
                        // $act_code= substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1) . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
                         $act_code = rand(0,10000);
                                           
                         $adminemail=get_bloginfo('admin_email');
                         $plugin_url = site_url();
                        
             
                         //$headers = array('From: '.$adminemail);
                         $headers = "X-Mailer: php\n";
                            $headers .= 'Content-type: text/html'."\r\n"."From:$plugin_url <$adminemail>"."\r\n" .
                            'Reply-To: '.$adminemail . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                         $subject = 'Signup Confirmation';
                         $message = 'Hi there, <br/>'.'	
                         Thanks for Subscribing! Click the link below to get confirmed:
                        <a href="'.$plugin_url.'?act_code='.$act_code.'&'.'email='.$visitor_email.'">Confirm</a>';
                        //echo $act_code; 
               
                
                        $mail= wp_mail( $visitor_email, $subject, $message, $headers ); 
    
                        if($mail){
                            $_SESSION['mail_sent_msg'] = $settings_data['note_subscriber'];
                            global $wpdb;
                            $table_name = $wpdb->prefix . '8degree_maintenance';
                            $query= $wpdb->insert( $table_name, array( 'email' => $visitor_email , 'date' => $current_time, 'act_code' => $act_code, 'flag' => 0 ) );
                 
                            }else{
                             $_SESSION['subscribe_msg'] = __('Unable to subscribe', '8degree-maintenance');
                            }
                
                        }else{
                        $visitor_email = sanitize_text_field($_POST['subscribe_email']);
                        $current_time = current_time( 'Y-m-d' );
            
                        global $wpdb;
                        $table_name = $wpdb->prefix . '8degree_maintenance';
                        $query= $wpdb->insert( $table_name, array( 'email' => $visitor_email , 'date' => $current_time, 'flag' => 1 ) );
                            if($query){
                                $_SESSION['subscribe_msg'] = $settings_data['note_subscriber'];
                                }
                            else{
                                $_SESSION['subscribe_msg'] = __('Unable to subscribe', '8degree-maintenance');
                            }
                        }
                    }
            
            
            
           } ?>
            
         <?php // Session messages
         if(isset($_SESSION['mail_sent_msg'])){
            echo $_SESSION['mail_sent_msg'];
            unset($_SESSION['mail_sent_msg']);
         }
         
         if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
         }
         
          ?>
            
            
        <form method="post" action="" class="subscriber-form" name="subscriber-form">      
            <?php if($settings_data['show_subscribe'] == 1){ ?>
                <div class="subscriber-wrap">
                    <?php if($settings_data['subscribe_heading_text']){
                        echo'<h3>'.$settings_data['subscribe_heading_text'].'</h3>';
                    } else{ ?>
                    
                    <h3>Subscribe Us</h3> <?php } ?>
                        <div class="subscribe-message"> <?php
                        if(isset($_SESSION['subscribe_msg'])){
                            echo $_SESSION['subscribe_msg'];
                             unset($_SESSION['subscribe_msg']);
                            } ?>
                         </div>   
                        <div id="error_email" class="validation_error error_email"></div>
                    <?php if($settings_data['subs_layout'] == 'layout1'){ ?>
                    <?php if(!$settings_data['subscribe_form_label']==''){ ?><span class="sub-email-label"><?php echo $settings_data['subscribe_form_label'];}
                          else{echo 'Email:'; } ?></span><input type="text" name="subscribe_email" class="subscribe-input-layout1 email1" id="edmm-sub-email1" placeholder="Enter your email address"  />
                         
                            <?php 
                            /**
                             * Creating a nonce field
                             * */
                             wp_nonce_field( 'subscriber-nonce', 'subscriber_nonce_field' ); ?>
                            <input type="submit" name="submit_subscriber" class="subscribe-submit-layout1 sub-submit1" value="<?php if($settings_data['subscribe_button_text']){echo $settings_data['subscribe_button_text'];} else{ echo __('Subscribe', '8degree-maintenance'); } ?>" />
                           
                            
                            <?php } if($settings_data['subs_layout'] == 'layout2'){ ?>
                             <div id="error_email2" class="validation_error error_email" style="display: none;"></div>
                            <div class="subscribe-layout2"><input type="text" name="subscribe_email" class="subscribe-input-layout1 s2email" id="edmm-sub-email2" placeholder="Enter your email address" />
                            
                              <?php 
                            /**
                             * Creating a nonce field
                             * */
                             wp_nonce_field( 'subscriber-nonce', 'subscriber_nonce_field' ); ?>
                      
                      
                    <input type="submit" name="submit_subscriber" class="subscribe-submit-layout1 sub-submit" value="<?php if($settings_data['subscribe_button_text']){echo $settings_data['subscribe_button_text'];} else{ echo __('Subscribe', '8degree-maintenance'); } ?>" />
                    </div>
                    <?php  } ?>
                     
                </div>
            <?php } ?>
        </form>      
      </div>
            
             <!--Social icon Section--> 
            
            <?php if($settings_data['show_social_network']=='1'){ ?>
            <div class="social-links-div">
                <?php
                  
                 /* echo '<pre>';
                    print_r($settings_data);
                   echo '</pre>'; */
                   
                    
                    
                    foreach ($settings_data['social_name'] as $social_icon)
                    {
                        if(isset($settings_data['social_controls'][$social_icon])&& $settings_data['social_controls'][$social_icon] ==1)
                        { if($social_icon=='facebook'){$class = 'fa fa-facebook';}elseif($social_icon=='twitter'){$class = 'fa fa-twitter';}elseif($social_icon=='pinterest'){$class = 'fa fa-pinterest-p"';}
                          elseif($social_icon=='linkedin'){$class = 'fa fa-linkedin"';}  elseif($social_icon=='googleplus'){$class = 'fa fa-google-plus"';} elseif($social_icon=='tumblr'){$class = 'fa fa-tumblr"';}      
                            ?><!--<div class="social-icons-bg">-->
                                <a href="<?php echo $settings_data['social_url'][$social_icon]['url']; ?>" target="_blank"><i class="<?php echo $class;?>"></i></a>
                                <!--</div>-->
                            <?php
                        }
                    } 
                ?>
                </div> 
          <?php } ?>
          
                 <!--Contact us Section-->  
          
                <div class="contact-section-wrapper">
                
                
                <?php if($settings_data['show_contact']==1){ ?>
                    <div class="contact-button">
                        <a href="javascript:void(0);" class="contact_pop_trigger"><?php _e('Contact Us', '8degree-maintenance') ?></a>    
                    </div>
                <?php  } ?>
                    <div class="contact-pop-main" style="display: none;">                    
                    <div class="contact-form-div" >
                        <a href="javascript:void(0)" class="contact-close">X</a> 
                        <?php
                       /* if(isset($_POST['submit_contact_details'])){
                            $site_name = site_url();
                            $name = sanitize_text_field($_POST['name_person']);
                            $email = sanitize_text_field($_POST['email_person']);
                            $no_reply = 'noreply@'.site_url();
                            $msg = sanitize_text_field($_POST['message_of_person']);
                            $message = 'Hi there, <br>
                                        You have got a new visitor at'.$site_name.' 
                                        <strong>Visitor Details</strong> <br>
                                        Name: '.$name.'<br/>
                                        Email: '.$email.'<br/>Message: '.$msg.'<br/> Thank you!';
                            $admin_email = $settings_data['email_address'];
                            $subject = 'Contact Details From Visitors';
                            
                            $headers = "X-Mailer: php\n";
                            $headers .= 'Content-type: text/html'."\r\n"."From: $name <$no_reply>"."\r\n" .
                            'Reply-To: '.$email . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                       
                        $mail= wp_mail( $admin_email, $subject, $message, $headers);
                        
                        if($mail){
                            $_SESSION['contact_success']="Success! Thank you for contacting us";
                           // echo "success";
                        }
                        else{
                            $_SESSION['contact_success'] = "Unable to contact. Please re-try";
                            //echo "unable to send";
                        }
                      
                        } */
                        ?>
                    
                         <form method="post" name="form_contact_data" >
                         
                            
                             <span id="edmm-msg"></span>
                             
                             <label class="frontend-form"><?php if($settings_data['name_label']){ echo $settings_data['name_label'];} else{ echo __('Name', '8degree-maintenance');}  ?></label><input type="text" name="name_person" id="edmm-contact-name"  class="contact_name_field empty-common-contact" />
                                <div id="error_contact_name" class="validation_error"></div>
                             <label class="frontend-form"><?php if($settings_data['email_label']){ echo $settings_data['email_label'];} else{ echo __('Email', '8degree-maintenance');}  ?></label><input type="text" name="email_person" id="edmm-contact-email" class="contact_email_field empty-common-contact" />
                                <div id="error_contact_email" class="validation_error"></div>
                             <label class="frontend-form"><?php if($settings_data['message_label']){ echo $settings_data['message_label'];} else{ echo __('Message', '8degree-maintenance'); }  ?></label><textarea rows="5" cols="20" id="edmm-contact-msg" name="message_of_person" class="contact_msg_field empty-common-contact"></textarea>
                                 <div id="error_contact_msg" class="validation_error"></div>
                             <div class="edmm-data" data-url="<?php echo admin_url('admin-ajax.php');?>" ></div>
                             <input type="button" class="submit_contact" name="submit_contact_details" value="<?php if(!$settings_data['submit_label'] == ''){echo $settings_data['submit_label'];}
                                                                                                            else{ _e('Send', '8degree-maintenance'); } ?>" />
                                                                                                                                         
                             <div id="edmm-loading" style="display:none"><img src="<?php echo MAINTENANCE_IMAGE_DIR.'/loader.gif' ?>" /></div>
                             <div class="contact-success-message"></div>
                             <input type="hidden" id="edn-ajax-nonce" value="<?php echo wp_create_nonce('edn-ajax-nonce');?>"  />
                             <input type="hidden" id="edmm-contact-admin" value="<?php echo $settings_data['email_address'];  ?>" />
                            
                             
                        </form>
                    </div>
                    </div>

            </div>
            
        
         
       </div>  
        <!--- Style for social icons --->
        <style>
         
         .social-links-div a{
            background-color: <?php echo $settings_data['socialicon_bg_color'];?>;
         }
         .social-links-div a:hover{
            background-color: <?php echo $settings_data['socialicon_hoverbg_color'];?>;
         }
         .social-links-div a{
            color: <?php echo $settings_data['socialicon_font_color'];?>;
         }
         .social-links-div a:hover{
            color: <?php echo $settings_data['socialicon_hovertext_color'];?>;
         }
         
         .contact-button a{
            background-color: <?php echo $settings_data['contactus_bg_color'];?>;
         }
         .contact-button a:hover{
            background-color: <?php echo $settings_data['contactus_hoverbg_color'];?>;
         }
         .contact-button a{
            color: <?php echo $settings_data['contactus_font_color'];?>;
         }
         .contact-button a:hover{
            color: <?php echo $settings_data['contactus_hovertext_color'];?>;
         }
    </style>
     
     <!--Google Analytics Code-->
        <?php   /* if(!$settings_data['google_analytics'] == ''){
                echo $settings_data['google_analytics'];
            } */
            
        if (strpos($settings_data['google_analytics'],'</script>') == true) {
        //if($settings_data['google_analytics']){
        echo $settings_data['google_analytics'];
        }
         ?>        
         
  </body> <!--Body part end-->
  

</html>