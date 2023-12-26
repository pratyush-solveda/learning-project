<?php
namespace Solveda\Theme\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;

class ContactInfo extends Template
{
    const XML_PATH_CONFIG_EMAIL = 'solveda_custom/general/email';
    const XML_PATH_CONFIG_ADDRESS = 'solveda_custom/general/address';
    const XML_PATH_CONFIG_PHONE = 'solveda_custom/general/phoneno';

    protected $scopeConfig;

    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
    }

    public function getEmail()
    {
        $email =  $this->scopeConfig->getValue(self::XML_PATH_CONFIG_EMAIL);
        if($email){
            return $email;
        }
        else{
            false;
        }
    }

    public function getAddress()
    {
        $address = $this->scopeConfig->getValue(self::XML_PATH_CONFIG_ADDRESS);
        if($address){
            return $address;
        }
        else{
            false;
        }
    }

    public function getPhone()
    {
        $phoneno = $this->scopeConfig->getValue(self::XML_PATH_CONFIG_PHONE);
        if($phoneno){
            return $phoneno;
        }
        else{
            false;
        }
    }
}
