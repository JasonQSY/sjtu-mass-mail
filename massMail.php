<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 3/11/16
 * Time: 3:48 PM
 */

namespace massMail;
use PHPMailer;

class massMail
{
    private $mail;

    function __construct()
    {
        /*
         * Settings here comes from SJTU official website.
         * If it does not work, try to fix it according to the new guideline.
         */
        $this->mail = new PHPMailer;
        $this->mail->isSMTP();
        $this->mail->Host = 'mail.sjtu.edu.cn';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = getenv('Account');
        $this->mail->Password = getenv('Password');
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 25;
        $this->mail->setFrom(getenv('Account'), getenv('Username'));
        $this->mail->CharSet="UTF-8"; #Chinese
    }

    function sendSingleMail($address, $attachment = 'NULL'){
        $this->mail->addAddress($address);
        $this->mail->isHTML(true);
        $this->mail->Subject = file_get_contents('title.html');
        $this->mail->Body = file_get_contents('mail.html');
        if($attachment != 'NULL'){
            $this->mail->addAttachment($attachment);
        }
        if($this->mail->send()) {
            echo 'Message to '.$address." has been sent successfully.\n";
        } else{
            echo 'For mail to '.$address.', \n';
            echo $this->mail->ErrorInfo;
        }
        $this->clearAll();
    }

    function sendMassMail($addressArray, $attachment = 'NULL'){
        foreach($addressArray as $address){
            if($attachment == 'NULL') {
                $this->sendSingleMail($address);
            } else{
                $this->sendSingleMail($address, $attachment);
            }
        }
    }

    function clearAll(){
        $this->mail->clearAddresses();
        $this->mail->clearAttachments();
    }
}