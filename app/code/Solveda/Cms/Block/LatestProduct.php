<?php
namespace Solveda\Cms\Block;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\StoreManagerInterface;

class LatestProduct extends Template
{
    protected $productRepository;

    public function __construct(
        Context $context,
        CollectionFactory $productCollectionFactory,
        StoreManagerInterface $storeManager,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->storeManager = $storeManager;
        $this->productCollectionFactory = $productCollectionFactory;
    }

    public function getImageUrl($product)
    {
        $store = $this->storeManager->getStore();
        return $store->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'catalog/product' . $product->getImage();
    }

    public function getLatestProducts()
    {
        $collection = $this->productCollectionFactory->create()
            ->addAttributeToSelect('*')
            ->setPageSize(5)
            ->setOrder('created_at', 'desc');
        return $collection;
    }
}

?>