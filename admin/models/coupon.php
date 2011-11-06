<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );
jimport( 'joomla.application.helper' );

class CouponModelCoupon extends JModel
{
	var $params = null;

	/**
	 * Overridden constructor
	 * @access	protected
	 */
	function __construct()
	{
		parent::__construct();
                $this->getItems();
	}

	function getItems( )
	{
		global $mainframe, $option;
		$database=& JFactory::getDBO();

                $query = "SELECT a.id
                        FROM #__components AS a
                        WHERE a.name = 'Coupon'";
                $database->setQuery( $query );
                $id = $database->loadResult();

                // load the row from the db table
                $row =& JTable::getInstance('component' );
                $row->load( $id );

                // get params definitions
                $additionalPath = JApplicationHelper::getPath ('com_xml', $option);
                $this->params = new JParameter( $row->params, $additionalPath );
		return $this->params;
	}
}
