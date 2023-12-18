<?php

namespace Solveda\Cms\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Catalog\Api\CategoryRepositoryInterface;

class LoadSubcategories extends Action
{
    protected $jsonFactory;
    protected $categoryRepository;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        CategoryRepositoryInterface $categoryRepository
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->categoryRepository = $categoryRepository;
    }

    public function execute()
    {
        $categoryId = $this->getRequest()->getParam('category_id');

        $result = $this->jsonFactory->create();

        try {
            $category = $this->categoryRepository->get($categoryId);
            $childCategories = [];
            
            foreach ($category->getChildrenCategories() as $childCategory) {
                if ($childCategory->getIsActive()) {
                    $childCategories[] = [
                        'id' => $childCategory->getId(),
                        'name' => $childCategory->getName(),
                    ];
                }
            }

            $result->setData(['success' => true, 'categories' => $childCategories]);
        } catch (\Exception $e) {
            $result->setData(['success' => false, 'error' => $e->getMessage()]);
        }

        return $result;
    }
}
