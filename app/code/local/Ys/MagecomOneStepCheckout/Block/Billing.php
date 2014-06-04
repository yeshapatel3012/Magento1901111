<?php
/**
 *    MagecomOneStepCheckout main block
 *    @author Yesha Patel <mail@magecomonestepcheckout.com>
 *    @copyright Yesha Patel <mail@magecomonestepcheckout.com>
 *
 */

class Ys_MagecomOneStepCheckout_Block_Billing extends Mage_Checkout_Block_Onepage_Abstract    {

    var $formErrors;
    var $settings;
    var $log = array();

    public function __construct()
    {
        $this->settings = Mage::helper('magecomonestepcheckout/checkout')->loadConfig();
    }
}