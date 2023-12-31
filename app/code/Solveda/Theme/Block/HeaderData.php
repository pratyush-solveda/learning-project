<?php
namespace Solveda\Theme\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Catalog\Model\CategoryFactory;

class HeaderData extends Template
{
    const XML_PATH_OFFER_CATEGORIES = 'solveda_custom/offer/selected_offer_categories';
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
        return $this->scopeConfig->getValue(self::XML_PATH_OFFER_CATEGORIES);
    }

    public function getCategoryUrl(){

        $categoryId = $this->getOfferProductId();
        $newUrlKey = 'offer';
        if($categoryId){
            $category = $this->categoryFactory->create()->load($categoryId);
            // $category->setUrlKey($newUrlKey);
            // $category->save();

            return $category->getUrl();
        }

        return null;


    }
}
