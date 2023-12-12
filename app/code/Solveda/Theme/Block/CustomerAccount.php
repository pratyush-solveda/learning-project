<?php

namespace Solveda\Theme\Block;

use Magento\Framework\View\Element\Template;

class CustomerAccount extends Template
{
    public function getLoginUrl()
    {
        return $this->getUrl('customer/account/login');
    }

    public function getRegisterUrl()
    {
        return $this->getUrl('customer/account/create');
    }
}