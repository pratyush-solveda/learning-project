<?php
namespace Solveda\Theme\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Catalog\Model\Product;

class ProductSaveAfter implements ObserverInterface
{
    protected $_categoryLinkManagement;

    public function __construct(
        \Magento\Catalog\Api\CategoryLinkManagementInterface $categoryLinkManagement
    ) {
        $this->_categoryLinkManagement = $categoryLinkManagement;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getProduct();

        if ($product->getData('offer_product')) {
            $categoryId = 41;
            $this->_categoryLinkManagement->assignProductToCategories(
                $product->getSku(),
                [$categoryId]
            );
        }
    }
}
