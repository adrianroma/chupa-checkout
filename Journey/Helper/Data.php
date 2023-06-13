<?php

namespace Chupa\Journey\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
	const XML_PATH_JOURNEY = 'journey/';


	public function __construct(     
        \Magento\Store\Model\StoreManagerInterface $storeManager,
		\Magento\Framework\App\Config\ScopeConfigInterface $scopeconfig
    )
    {        
		$this->_scopeConfig = $scopeconfig;
        $this->_storeManager = $storeManager;        
    }

	public function getConfigValue($field, $storeId = null)
	{
		return $this->_scopeConfig->getValue(
			$field, ScopeInterface::SCOPE_STORE, $storeId
		);
	}

	public function getGeneralConfig($code, $storeId = null)
	{
		return $this->getConfigValue(self::XML_PATH_JOURNEY . $code, $storeId);
	}

    public function getSystemValue($config_path){
		
        return $this->_scopeConfig->getValue(
            $config_path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
    }

	public function getStoreUrl($fromStore = true)
    {
        return $this->_storeManager->getStore()->getCurrentUrl($fromStore);
    }


}