<?php
class Idev_OneStepCheckout_IndexController extends Mage_Core_Controller_Front_Action {

    /**
     * @return Mage_Checkout_OnepageController
     */
    public function preDispatch()
    {
        parent::preDispatch();
        $this->_preDispatchValidateCustomer();

        return $this;
    }

    public function getOnepage() {
        return Mage::getSingleton('checkout/type_onepage');
    }

    public function successAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function indexAction() {

        $routeName = $this->getRequest()->getRouteName();

        if (!Mage::helper('onestepcheckout')->isRewriteCheckoutLinksEnabled() && $routeName != 'onestepcheckout'){
            $this->_redirect('checkout/onepage', array('_secure'=>true));
        }

        $quote = $this->getOnepage()->getQuote();
        if (!$quote->hasItems() || $quote->getHasError()) {
            $this->_redirect('checkout/cart');
            return;
        }
        if (!$quote->validateMinimumAmount()) {
            $error = Mage::getStoreConfig('sales/minimum_order/error_message');
            Mage::getSingleton('checkout/session')->addError($error);
            $this->_redirect('checkout/cart');
            return;
        }
        $this->loadLayout();

        if(Mage::helper('onestepcheckout')->isEnterprise() && Mage::helper('customer')->isLoggedIn()){

            $customerBalanceBlock = $this->getLayout()->createBlock('enterprise_customerbalance/checkout_onepage_payment_additional', 'customerbalance', array('template'=>'onestepcheckout/customerbalance/payment/additional.phtml'));
            $customerBalanceBlockScripts = $this->getLayout()->createBlock('enterprise_customerbalance/checkout_onepage_payment_additional', 'customerbalance_scripts', array('template'=>'onestepcheckout/customerbalance/payment/scripts.phtml'));

            $rewardPointsBlock = $this->getLayout()->createBlock('enterprise_reward/checkout_payment_additional', 'reward.points', array('template'=>'onestepcheckout/reward/payment/additional.phtml', 'before' => '-'));
            $rewardPointsBlockScripts = $this->getLayout()->createBlock('enterprise_reward/checkout_payment_additional', 'reward.scripts', array('template'=>'onestepcheckout/reward/payment/scripts.phtml', 'after' => '-'));

            $this->getLayout()->getBlock('choose-payment-method')
            ->append($customerBalanceBlock)
            ->append($customerBalanceBlockScripts)
            ->append($rewardPointsBlock)
            ->append($rewardPointsBlockScripts)
            ;
        }

        if(is_object(Mage::getConfig()->getNode('global/models/googleoptimizer')) && Mage::getStoreConfigFlag('google/optimizer/active')){
            $googleOptimizer = $this->getLayout()->createBlock('googleoptimizer/code_conversion', 'googleoptimizer.conversion.script', array('after'=>'-'))
            ->setScriptType('conversion_script')
            ->setPageType('checkout_onepage_success');
            $this->getLayout()->getBlock('before_body_end')
            ->append($googleOptimizer);
        }

        $this->renderLayout();
    }

    /**
     * Make sure customer is valid, if logged in
     * By default will add error messages and redirect to customer edit form
     *
     * @param bool $redirect - stop dispatch and redirect?
     * @param bool $addErrors - add error messages?
     * @return bool
     */
    protected function _preDispatchValidateCustomer($redirect = true, $addErrors = true)
    {
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        if ($customer && $customer->getId()) {
            $validationResult = $customer->validate();
            if ((true !== $validationResult) && is_array($validationResult)) {
                if ($addErrors) {
                    foreach ($validationResult as $error) {
                        Mage::getSingleton('customer/session')->addError($error);
                    }
                }
                if ($redirect) {
                    $this->_redirect('customer/account/edit');
                    $this->setFlag('', self::FLAG_NO_DISPATCH, true);
                }
                return false;
            }
        }
        return true;
    }
}
