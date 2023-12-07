<?php
namespace Solveda\Theme\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;

class ContactInfo extends Template
{
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
        return $this->scopeConfig->getValue('solveda_custom/general/email');
    }

    public function getAddress()
    {
        return $this->scopeConfig->getValue('solveda_custom/general/address');
    }

    public function getPhone()
    {
        return $this->scopeConfig->getValue('solveda_custom/general/phoneno');
    }
}
