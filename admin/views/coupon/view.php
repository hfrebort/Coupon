<?php
// Ensure this file is included via Joomla Framework
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class CouponViewCoupon extends JView {
    /**
     * Draws the menu for coupon and shows all parameters
     */
    function display($tpl=null) {
        JToolBarHelper::title( JText::_( 'CM_COUPON_CONFIGURATION' ), 'config.png' );
        JToolBarHelper::preferences( 'com_coupon', '800', '600' );

        $document = & JFactory::getDocument();
        $document->setTitle(JText::_('Coupon configuration'));

        $model = $this->getModel();
        $params = $model->getItems();
        
        $this->assignRef('params', $params );
        parent::display($tpl);

    }
}?>
