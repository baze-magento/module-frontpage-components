<?php
namespace Baze\FrontpageComponents\Block\Segment;

use \Baze\FrontpageComponents\Model\SegmentFactory;
use \Magento\Store\Model\StoreManagerInterface;

class Links extends \Magento\Framework\View\Element\Template
{

    protected $segmentFactory;

    protected $storeManager;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        SegmentFactory $segmentFactory,
        StoreManagerInterface $storeManager
    ) {
        $this->segmentFactory = $segmentFactory;
        $this->storeManager = $storeManager;
        return parent::__construct($context);
    }

    public function getSegmentUrl($item)
    {
        return $this->storeManager->getStore()->getBaseUrl()."segment?s=".$item['url_key'];
    }

    public function getActiveSegments()
    {
        $segment = $this->segmentFactory->create();
        $collection = $segment->getCollection()
            ->addFieldToFilter('active', ['eq' => 1]);
        $out = [];
        foreach ($collection as $item) {
            $out[] = $item->getData();
        }
        return $out;
    }

    public function getContactLink()
    {
        return $this->storeManager->getStore()->getBaseUrl().'contact/';
    }
}
