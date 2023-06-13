<?php

namespace Chupa\Journey\Controller\Checkout;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Checkout\Controller\Cart;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Store\Model\StoreManagerInterface;


use Magento\Catalog\Controller\Product\View\ViewInterface;
use Magento\Checkout\Model\Cart as CustomerCart;

/**
 * Class Index
 * @package Chupa\Journey\Controller\Add
 */
class Index extends Cart
{

        public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator,
        CustomerCart $cart,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->_formKeyValidator = $formKeyValidator;
        $this->_scopeConfig = $scopeConfig;
        $this->checkoutSession = $checkoutSession;
        $this->_storeManager = $storeManager;
        $this->cart = $cart;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context,$scopeConfig,$checkoutSession,$storeManager,$formKeyValidator,$cart);
     }

    /**
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute()
    {
 
    
        return $this->_pageFactory->create();


        //$this->getResponse()->representJson(
        //    $this->_objectManager->get(\Magento\Framework\Json\Helper\Data::class)->jsonEncode($result)
        // );
    }

    public function getCheckoutSession()
    {
        return $this->checkoutSession;
    }

}
