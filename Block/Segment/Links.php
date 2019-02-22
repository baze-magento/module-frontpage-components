<?php
namespace Baze\FrontpageComponents\Block\Segment;

use \Baze\FrontpageComponents\Model\SegmentFactory;
use \Magento\Store\Model\StoreManagerInterface;

class Links extends \Magento\Framework\View\Element\Template
{

    protected $_segmentFactory;

    protected $_storeManager;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        SegmentFactory $segmentFactory,
        StoreManagerInterface $storeManager
    ) {
        $this->_segmentFactory = $segmentFactory;
        $this->_storeManager = $storeManager;
        return parent::__construct($context);
    }

    public function getSegmentUrl($item)
    {
        return $this->_storeManager->getStore()->getBaseUrl()."segment?s=".$item['url_key'];
    }

    public function getActiveSegments()
    {
        $segment = $this->_segmentFactory->create();
        $collection = $segment->getCollection()
            ->addFieldToFilter('active', ['eq' => 1]);
        $out = [];
        foreach ($collection as $item) {
            $out[] = $item->getData();
        }
        return $out;
    }
}
