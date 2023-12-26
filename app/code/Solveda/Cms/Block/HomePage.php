<?php

namespace Solveda\Cms\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Catalog\Model\CategoryFactory;

class HomePage extends Template
{
    const XML_PATH_HOMEPAGE_BANNER = 'solveda_custom/homepgimg/upperimage';
    const XML_PATH_HOMEPAGE_FNM = 'solveda_custom/homepgimg/rtimgu';
    const XML_PATH_HOMEPAGE_FNV = 'solveda_custom/homepgimg/rtimgl';
    const XML_PATH_HOMEPAGE_MONTHLY = 'solveda_custom/homepgimg/lowerimage';
    const XML_PATH_COMMUNITY_FIRST = 'solveda_custom/spencerscommunity/firstimg';
    const XML_PATH_COMMUNITY_SECOND = 'solveda_custom/spencerscommunity/secondimg';
    const XML_PATH_COMMUNITY_THIRD = 'solveda_custom/spencerscommunity/thirdimg';
    const XML_PATH_COMMUNITY_FOURTH = 'solveda_custom/spencerscommunity/fourthimg';
    const XML_PATH_LOWER_FIRST = 'solveda_custom/spencerslowerpost/firstpost';
    const XML_PATH_LOWER_SECOND = 'solveda_custom/spencerslowerpost/secondpost';
    const XML_PATH_LOWER_THIRD = 'solveda_custom/spencerslowerpost/thirdpost';
    const XML_PATH_LOWER_FOURTH = 'solveda_custom/spencerslowerpost/fourthpost';

    //Sidebar categories
    const XML_PATH_SIDE_CATEGORY = 'solveda_custom/sidebarcategories/select_categories';

    protected $scopeConfig;
    protected $storeManager;

     /**
     * @var CategoryFactory
     */
    protected $categoryFactory;

    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager,
        CategoryFactory $categoryFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
        $this->_storeManager = $storeManager;
        $this->categoryFactory = $categoryFactory;
    }

    public function getCategories()
    {
        $categories = [];

        $categoryIds = $this->_scopeConfig->getValue(self::XML_PATH_SIDE_CATEGORY);
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
    
    public function getCategoryImage($category)
    {
        if ($category->getImage()) {
            $mediaUrl = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
            $imageUrl = $mediaUrl . 'catalog/category/' . $category->getImage();
            return $imageUrl;
        } else {
            return null;
        }
    }


    public function getImageUrl($imageip)
    {
        $basurl=$this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        $storeid=$this->_storeManager->getStore()->getId();
        $imagedata= $this->_scopeConfig->getValue($imageip,\Magento\Store\Model\ScopeInterface::SCOPE_STORE,$storeid);

        return $basurl.'homepgimg_folder/'.$imagedata;
        
    }

    public function getUpperImage()
    {
        return $this->getImageUrl(self::XML_PATH_HOMEPAGE_BANNER);
    }

    public function getRightImage1()
    {
        return $this->getImageUrl(self::XML_PATH_HOMEPAGE_FNM);
    }

    public function getRightImage2()
    {
        return $this->getImageUrl(self::XML_PATH_HOMEPAGE_FNV);
    }

    public function getLowerImage()
    {
        return $this->getImageUrl(self::XML_PATH_HOMEPAGE_MONTHLY);
    }

    public function getCommunityFirst()
    {
        return $this->getImageUrl(self::XML_PATH_COMMUNITY_FIRST);
    }

    public function getCommunitySecond()
    {
        return $this->getImageUrl(self::XML_PATH_COMMUNITY_SECOND);
    }

    public function getCommunityThird()
    {
        return $this->getImageUrl(self::XML_PATH_COMMUNITY_THIRD);
    }

    public function getCommunityFourth()
    {
        return $this->getImageUrl(self::XML_PATH_COMMUNITY_FOURTH);
    }

    public function getFirstPost()
    {
        return $this->getImageUrl(self::XML_PATH_LOWER_FIRST);
    }

    public function getSecondPost()
    {
        return $this->getImageUrl(self::XML_PATH_LOWER_SECOND);
    }

    public function getThirdPost()
    {
        return $this->getImageUrl(self::XML_PATH_LOWER_THIRD);
    }

    public function getFourthPost()
    {
        return $this->getImageUrl(self::XML_PATH_LOWER_FOURTH);
    }
}
