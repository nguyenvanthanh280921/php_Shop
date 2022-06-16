<?php
$uris = $_SERVER["REQUEST_URI"];
$uris = explode('/',$uris);
$currentModule = !empty($uris[3]) ? $uris[3] : 'dashboard';
$baseUrl = sprintf(
    "%s://%s/%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $uris[1].'/'.$uris[2]
);
function sendMail($mailTo, $subject, $content){
    require "../../PHPMailer-master/src/PHPMailer.php"; 
    require "../../PHPMailer-master/src/SMTP.php"; 
    require '../../PHPMailer-master/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'nguyenvanthanh280921@gmail.com'; // SMTP username
        $mail->Password = 'vanthanh28092001';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('nguyenvanthanh280921@gmail.com' ); 
        $mail->addAddress($mailTo); 
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $content;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $flageSendMail = $mail->send();
        if($flageSendMail == true){
            return true;
        }else{
            return false;
        }
    } catch (Exception $e) {
        //$error = $e->getMessage();
        return false;
    }
    return true;
}