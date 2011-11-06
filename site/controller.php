<?php
// Ensure this file is included via Joomla Framework
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class CouponController extends JController
{
	/**
	 * Show coupon
	 */
	function display()
	{
		$view   =& $this->getView( 'Coupon' );
		$view->display();
	}

	/**
	 * Order coupon
	 */
	function order()
	{
		$model	=& $this->getModel( 'Coupon' );
		$view   =& $this->getView( 'Coupon' );
		$view->orderCoupon();
	}
}
?>