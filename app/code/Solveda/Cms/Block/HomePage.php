<?php

namespace Solveda\Cms\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;

class HomePage extends Template
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

    public function getUpperImage()
    {
        return $this->scopeConfig->getValue('solveda_custom/homepgimg/upperimage');
    }

    public function getRightImage1()
    {
        return $this->scopeConfig->getValue('solveda_custom/homepgimg/rtimgu');
    }

    public function getRightImage2()
    {
        return $this->scopeConfig->getValue('solveda_custom/homepgimg/rtimgl');
    }

    public function getLowerImage()
    {
        return $this->scopeConfig->getValue('solveda_custom/homepgimg/lowerimage');
    }

    public function getCommunityFirst()
    {
        return $this->scopeConfig->getValue('solveda_custom/spencerscommunity/firstimg');
    }

    public function getCommunitySecond()
    {
        return $this->scopeConfig->getValue('solveda_custom/spencerscommunity/secondimg');
    }

    public function getCommunityThird()
    {
        return $this->scopeConfig->getValue('solveda_custom/spencerscommunity/thirdimg');
    }

    public function getCommunityFourth()
    {
        return $this->scopeConfig->getValue('solveda_custom/spencerscommunity/fourthimg');
    }

    public function getFirstPost()
    {
        return $this->scopeConfig->getValue('solveda_custom/spencerslowerpost/firstpost');
    }

    public function getSecondPost()
    {
        return $this->scopeConfig->getValue('solveda_custom/spencerslowerpost/secondpost');
    }

    public function getThirdPost()
    {
        return $this->scopeConfig->getValue('solveda_custom/spencerslowerpost/thirdpost');
    }

    public function getFourthPost()
    {
        return $this->scopeConfig->getValue('solveda_custom/spencerslowerpost/fourthpost');
    }
}
