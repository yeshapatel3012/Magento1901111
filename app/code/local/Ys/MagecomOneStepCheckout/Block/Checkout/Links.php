<?php
class Ys_MagecomOneStepCheckout_Block_Checkout_Links extends Mage_Checkout_Block_Links
{
    /**
     * Add link on checkout page to parent block
     *
     * @return Mage_Checkout_Block_Links
     */
    public function addCheckoutLink()
    {

        if (!$this->helper('magecomonestepcheckout')->isRewriteCheckoutLinksEnabled()){
            return parent::addCheckoutLink();
        }

        if (!$this->helper('checkout')->canOnepageCheckout()) {
            return $this;
        }
        if ($parentBlock = $this->getParentBlock()) {
            $text = $this->__('Checkout');
            $parentBlock->addLink($text, 'magecomonestepcheckout', $text, true, array('_secure'=>true), 60, null, 'class="top-link-magecomonestepcheckout"');
        }
        return $this;
    }
}
