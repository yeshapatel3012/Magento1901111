<?php
class Ys_MagecomOneStepCheckout_Block_Checkout_Onepage_Link extends Mage_Checkout_Block_Onepage_Link
{
    public function getCheckoutUrl()
    {
        if (!$this->helper('magecomonestepcheckout')->isRewriteCheckoutLinksEnabled()){
            return parent::getCheckoutUrl();
        }
        return $this->getUrl('magecomonestepcheckout', array('_secure'=>true));
    }
}
