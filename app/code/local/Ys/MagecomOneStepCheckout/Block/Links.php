<?php
class Ys_MagecomOneStepCheckout_Block_Links extends Mage_Checkout_Block_Links
{
    public function addCheckoutLink()
    {
        if (!$this->helper('magecomonestepcheckout')->isRewriteCheckoutLinksEnabled()){
            return parent::addCheckoutLink();
        }

        if (!$this->helper('checkout')->canOnepageCheckout()) {
            return $this;
        }

        $parentBlock = $this->getParentBlock();

        if (!is_object($parentBlock)) {
            $text = $this->__('Checkout');
            $parentBlock->addLink($text, 'magecomonestepcheckout', $text, true, array('_secure'=>true), 60, null, 'class="top-link-magecomonestepcheckout"');
        }
        return $this;
    }

}
