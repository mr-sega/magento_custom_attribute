<?php

namespace Sega\ProductHeight\Block;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Catalog\Model\Session as CatalogSession;
use Magento\Catalog\Model\Product;
use Magento\Framework\View\Element\Template;
use Magento\Catalog\Helper\Data;

class Height extends Template
{

    protected $catalogSession;

    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @var Product
     */
    protected $product;

    public function __construct(
        Template\Context $context,
        CatalogSession $catalogSession,
        Data $helper,
        Registry $registry,
        array $data)
    {
        $this->registry = $registry;
        $this->catalogSession = $catalogSession;
        $this->helper = $helper;

        parent::__construct($context, $data);
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        if (is_null($this->product)) {
            $this->product = $this->helper->getProduct();
        }

        return $this->product;
    }

    public function getProductEnableHeight()
    {
        return $this->getProduct()->getData('product_height_enable');
    }

    public function getProductHeight()
    {
        return $this->getProduct()->getData('product_height');
    }
}
