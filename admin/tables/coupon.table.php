<?php
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableCoupon extends JTable {
    /**
     * Primary Key
     *
     * @var int
     */
    var $couponcode;
    var $orderdate, $orderprocess, $couponamount, $dedication, $use,
            $firstname, $lastname, $email, $phone, $street, $city, $zipcode,
            $agb, $newsletter, $payed, $canceled;

    /**
     * Constructor
     *
     * @param object Database connector object
     */
    function TableCoupon(& $db) {
        parent::__construct('#__coupon', 'couponcode', $db);
    }

    
}