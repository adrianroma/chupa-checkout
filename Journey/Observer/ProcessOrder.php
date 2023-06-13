<?php

namespace Chupa\Journey\Observer;

class ProcessOrder implements \Magento\Framework\Event\ObserverInterface
{

    protected $_logger;
    protected $_scopeConfig;

    public function __construct(
        \Chupa\Journey\Logger\Log $logger,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->_logger = $logger;
        $this->_scopeConfig = $scopeConfig;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if($this->_scopeConfig->getValue('journey/configuration/logs')){
         
            $order = $observer->getOrder();
            $quote = $observer->getQuote();

            $order_json =json_encode($order,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

            $this->_logger->info($order_json);

            
            json_encode($quote,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    
            $shippingAddress = $order->getShippingAddress();

            json_encode($shippingAddress,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

           
        
        }
    }
}
