<?php
define('CANCEL_URL', 'index.php?option=com_coupon&task=order&Itemid=%Itemid%&orderprocess=cancel&couponcode=%couponcode%&use=%use%&couponamount=%couponamount%&email=%email%&firstname=%firstname%&lastname=%lastname%');

class Coupon {

    public $orderdate, $couponcode, $orderprocess, $couponamount, $dedication, $use,
            $firstname, $lastname, $email, $phone, $street, $city, $zipcode,
            $agb, $newsletter, $fullname;

    public $fieldlist = array(
        'orderdate',
        'couponcode',
        'orderprocess',
        'couponamount',
        'dedication',
        'use',
        'firstname',
        'lastname',
        'email',
        'phone',
        'street',
        'city',
        'zipcode',
        'agb',
        'newsletter',
        'Itemid'
    );

    public function __construct() {
        $this->orderdate = JRequest::getVar('orderdate');
        $this->couponcode = JRequest::getVar('couponcode');
        $this->orderprocess = JRequest::getVar('orderprocess');
        $this->couponamount = JRequest::getVar('couponamount');
        $this->dedication = JRequest::getVar('dedication');
        $this->use = JRequest::getVar('use');
        $this->firstname = JRequest::getVar('firstname');
        $this->lastname = JRequest::getVar('lastname');
        $this->email = JRequest::getVar('email');
        $this->phone = JRequest::getVar('phone');
        $this->street = JRequest::getVar('street');
        $this->city = JRequest::getVar('city');
        $this->zipcode = JRequest::getVar('zipcode');
        $this->agb = JRequest::getVar('agb');
        $this->newsletter = JRequest::getVar('newsletter');

        $this->fullname = $this->firstname . ' ' . $this->lastname;

    }

    public function getSubject() {
        global $mainframe;
        $params = &$mainframe->getParams();
        return $params->get('subject_' . $this->orderprocess) . $this->couponcode;
    }

    public function getHtmlMessage() {
        global $mainframe;
        $params = &$mainframe->getParams();

        $cancel_url         = JURI::base().$this->getMessage(CANCEL_URL, true);
        $replacedmessage    = $this->getMessage($params->get('html_message_' . $this->orderprocess));
        $replacedmessage    = str_replace('%cancel_url%', $cancel_url , $replacedmessage);

        return $replacedmessage;
    }

    public function getMessage($message, $email_url_encoded=false) {
        $replacedmessage = $message;
        foreach ($this->fieldlist as $fieldname) {
            #error_log($fieldname. ':' . JRequest::getVar($fieldname));
            if ( $email_url_encoded == true && strcmp("email", $fieldname) == 0 ) {
                $replacedmessage = str_replace('%'.$fieldname.'%', urlencode(JRequest::getVar($fieldname)), $replacedmessage);
            } else {
                $replacedmessage = str_replace('%'.$fieldname.'%', JRequest::getVar($fieldname), $replacedmessage);
            }
        }
        return $replacedmessage;
    }
}
?>
