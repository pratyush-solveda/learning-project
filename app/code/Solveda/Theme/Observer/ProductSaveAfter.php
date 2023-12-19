<?php
namespace Solveda\Theme\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Catalog\Model\Product;

class ProductSaveAfter implements ObserverInterface
{
    protected $_categoryLinkManagement;

    public function __construct(
        \Magento\Catalog\Api\CategoryLinkManagementInterface $categoryLinkManagement,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->_categoryLinkManagement = $categoryLinkManagement;
        $this->scopeConfig = $scopeConfig;
    }

    public function getSelectedCategory()
    {
        return $this->scopeConfig->getValue('solveda_custom/offer/selected_offer_categories');
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();

        if ($product->getData('offer_product')) {

            $categoryId = $this->getSelectedCategory();

            $this->_categoryLinkManagement->assignProductToCategories(
                $product->getSku(),
                [$categoryId]
            );
        }
    }
}
