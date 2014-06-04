<?php
class Ys_MagecomOneStepCheckout_Block_Checkout_Cart_Sidebar extends Mage_Checkout_Block_Cart_Sidebar
{
    /**
     * Get one page checkout page url
     *
     * @return bool
     */
    public function getCheckoutUrl()
    {
        if (!$this->helper('magecomonestepcheckout')->isRewriteCheckoutLinksEnabled()){
            return parent::getCheckoutUrl();
        }
        return $this->getUrl('magecomonestepcheckout', array('_secure'=>true));
    }
}
