<?php
namespace Solveda\Theme\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Catalog\Model\CategoryFactory;

class HeaderData extends Template
{
    protected $scopeConfig;

    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        CategoryFactory $categoryFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
        $this->categoryFactory = $categoryFactory;
    }

    public function getOfferProductId()
    {
        return $this->scopeConfig->getValue('solveda_custom/offer/selected_offer_categories');
    }
}
