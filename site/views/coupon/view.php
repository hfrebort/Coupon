<?php
// Ensure this file is included via Joomla Framework
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class CouponViewCoupon extends JView {

    function display($tpl=null) {
        global $mainframe;

        $doc =& JFactory::getDocument();
        $doc->addStyleSheet( JURI::base()."components/com_coupon/css/coupon.css" );
        $doc->addScript( JURI::base()."components/com_coupon/js/jquery-1.6.4.js" );
        $doc->addScript( JURI::base()."components/com_coupon/js/jquery.validate.js" );
        $doc->setTitle("Gutscheinbestellung");

        $params = &$mainframe->getParams();
        $this->assignRef('params', $params);

        parent::display($tpl);
    }

    function orderCoupon() {
        global $mainframe;

        $params = &$mainframe->getParams();

        require_once (JPATH_COMPONENT.DS.'coupon.model.php');
        require_once (JPATH_COMPONENT.DS.'coupon.image.php');
        require_once (JPATH_COMPONENT.DS.'phpmailer/class.phpmailer.php');

        $mail = new PHPMailer(true);
        $coupon = new Coupon();

        try {
            error_log('orderprocess in orderCoupon(): '.$coupon->orderprocess.', email_from: '.$params->get('email_from'));
            if ($coupon->orderprocess == 'email') {
                $filename = CouponImage::createImage($coupon);
                $mail->AddAttachment($filename);
            }

            $mail->Subject = $coupon->getSubject();
            $mail->MsgHTML($coupon->getHtmlMessage());

            $mail->AddReplyTo($params->get('email_from'), $params->get('email_from_name'));
            $mail->SetFrom($params->get('email_from'), $params->get('email_from_name'));
            $mail->AddAddress($coupon->email, $coupon->fullname);
            #$mail->AddBCC("glas@kuchlerhaus.at", "Glas Kuchlerhaus");
            #$mail->AddBCC("gabi@kuchlerhaus.at", "Gabriela Kuchler");
            $mail->AddBCC($params->get('email_from'), $params->get('email_from_name'));
            $mail->Send();
        } catch (phpmailerException $e) {
            $error_message = $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            $error_message = $e->getMessage(); //Boring error messages from anything else!
        }

        echo $coupon->getHtmlMessage();
        error_log($error_message);
    }
}?>
