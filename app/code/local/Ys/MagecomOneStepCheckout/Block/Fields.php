<?php
class Ys_MagecomOneStepCheckout_Block_Fields extends Ys_MagecomOneStepCheckout_Block_Checkout
{
    public function _construct(){
        $this->setSubTemplate(true);
        parent::_construct();
    }
}