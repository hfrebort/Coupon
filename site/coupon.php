<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( JPATH_COMPONENT.DS.'controller.php' );

$controller = new CouponController();
$controller->execute( JRequest::getCmd( 'task' ) );
$controller->redirect();
?>