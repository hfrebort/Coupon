<?php defined('_JEXEC') or die('Restricted access'); ?>
<form action="index.php?option=com_coupon" method="post" name="adminForm">
    <table style="width:75%;">
        <tr>
            <th class="config">
                        <?php echo JText::_('Coupon Global Settings'); ?>
            </th>
        </tr>
    </table>
    <table style="width:75%;" class="adminform">
        <tr>
            <th><?php JText::_('Parameters');?></th>
        </tr>
        <tr>
            <td><?php echo $this->params->render(); ?></td>
        </tr>
    </table>
    <input type="hidden" name="option" value="com_coupon" />
    <input type="hidden" name="task" value="" />
</form>
