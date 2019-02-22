<?php
namespace Baze\FrontpageComponents\Block\Segment;

class Page extends \Magento\Framework\View\Element\Template
{

    protected $_segmentFactory;

    protected $_request;

    protected $_storeManager;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Baze\FrontpageComponents\Model\SegmentFactory $segmentFactory,
        \Magento\Framework\App\Request\Http $request,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->_segmentFactory = $segmentFactory;
        $this->_request = $request;
        $this->_storeManager = $storeManager;
        return parent::__construct($context);
    }

    public function getThisSegment()
    {
        $segment_key = $this->_request->getParam('s');

        $segment = $this->_segmentFactory->create();
        $collection = $segment->getCollection()
            ->addFieldToFilter('active', ['eq' => 1])
            ->addFieldToFilter('url_key', ['eq' => $segment_key]);
        if (count($collection) == 0) {
            header("Location: ".$this->_storeManager->getStore()->getBaseUrl().'404/');
            die();
        }
        return $collection->getFirstItem()->toArray();
    }

    public function getSegmentImages($id)
    {
        return;
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
