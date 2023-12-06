<?php

namespace Solveda\Cms\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $categoryCollectionFactory;

	public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory
    ) {
        $this->categoryCollectionFactory = $categoryCollectionFactory;
		parent::__construct($context);
    }

    public function getCategoryCollection()
    {
        $collection = $this->categoryCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter('level', 2);
        return $collection;
    }

	
}
