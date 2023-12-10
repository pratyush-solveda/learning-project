<?php

namespace Solveda\Theme\Model;

use Magento\Framework\Option\ArrayInterface;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;

class Category implements ArrayInterface
{
    protected $categoryCollectionFactory;

    public function __construct(CollectionFactory $categoryCollectionFactory)
    {
        $this->categoryCollectionFactory = $categoryCollectionFactory;
    }

    public function toOptionArray()
    {
        $options = [];
        $categoryCollection = $this->categoryCollectionFactory->create();
        $categoryCollection->addAttributeToSelect('name');

        foreach ($categoryCollection as $category) {
            $options[] = [
                'value' => $category->getId(),
                'label' => $category->getName()
            ];
        }

        return $options;
    }
}
