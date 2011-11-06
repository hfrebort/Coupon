<?php
// Ensure this file is included via Joomla Framework
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class CouponController extends JController
{
	/**
	 * Show Coupon configuration
	 */
	function display()
	{
		$model	=& $this->getModel( 'Coupon' );
		$view   =& $this->getView( 'Coupon' );
		$view->setModel( $model, true );
		$view->display();
	}

	/**
	 * Reset configuration
	 */
	function reset()
	{
		$model	=& $this->getModel( 'Coupon' );
		$model->reset();
		$this->setRedirect('index.php?option=com_coupon');
	}
}
?>
