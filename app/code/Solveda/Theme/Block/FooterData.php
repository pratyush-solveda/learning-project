<?php

namespace Solveda\Theme\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Catalog\Model\CategoryFactory;

class FooterData extends Template
{
    const XML_PATH_FOOTER_CATEGORY = 'solveda_custom/general/footer_categories';
    protected $scopeConfig;

     /**
     * @var CategoryFactory
     */
    protected $categoryFactory;

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

    public function getCategoryCollection()
    {
        $categories = [];

        $categoryIds = $this->_scopeConfig->getValue(self::XML_PATH_FOOTER_CATEGORY);
        if($categoryIds){
            $categoryIds = explode(',', $categoryIds);
            foreach ($categoryIds as $categoryId) {
                $category = $this->categoryFactory->create()->load($categoryId);
                $categories[] = $category;
            }
        }
        else{
            return false;
        }

        return $categories;
    }
}
