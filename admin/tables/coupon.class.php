<?php
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class CouponConfig extends JTable {

    function  __construct( &$database ) {
        jimport( 'joomla.application.component.helper' );
        $cm_params =& JComponentHelper::getParams('com_coupon');
        $GLOBALS['cm_params'] = $cm_params;
    }
}