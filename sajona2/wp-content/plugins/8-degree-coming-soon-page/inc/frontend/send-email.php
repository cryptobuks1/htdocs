<?php 
    //die('reached');
    
    
    $name = $_POST['name'];
    $admin_email = $_POST['ademail'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $no_reply = 'noreply@'.site_url();
    $site_name = site_url();
    
    $message = 'Hi there, <br/><br/>
                You have got a new visitor at '.$site_name.'<br/><br/> 
                <strong>Visitor Details</strong> <br>
                Name: '.$name.'<br/>
                Email: '.$email.'<br/>Message: '.$msg.'<br/><br/> Thank you!';

     $subject = 'Contact Details From Visitors';
     
    $headers = "X-Mailer: php\n";
    $headers .= 'Content-type: text/html'."\r\n"."From: $name <$no_reply>"."\r\n" .
    'Reply-To: '.$email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    $mail = wp_mail( $admin_email, $subject, $message, $headers);   
    
     
    
    
    //$email = $_POST['email'];
   
     
  /*  echo $name; die();
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
    } */