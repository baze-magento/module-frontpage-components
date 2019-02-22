<?php
namespace Baze\FrontpageComponents\Block\Segment;

class Page extends \Magento\Framework\View\Element\Template
{

    protected $segmentFactory;

    protected $segmentImageFactory;

    protected $request;

    protected $storeManager;

    public $segment;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Baze\FrontpageComponents\Model\SegmentFactory $segmentFactory,
        \Baze\FrontpageComponents\Model\SegmentImageFactory $segmentImageFactory,
        \Magento\Framework\App\Request\Http $request,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->segmentFactory = $segmentFactory;
        $this->segmentImageFactory = $segmentImageFactory;
        $this->request = $request;
        $this->storeManager = $storeManager;
        return parent::__construct($context);
    }

    public function getThisSegment()
    {
        $segmentKey = $this->request->getParam('s');

        $Segment = $this->segmentFactory->create();
        $Collection = $Segment->getCollection()
            ->addFieldToFilter('active', ['eq' => 1])
            ->addFieldToFilter('url_key', ['eq' => $segmentKey]);
        if (count($Collection) == 0) {
            header("Location: ".$this->storeManager->getStore()->getBaseUrl().'404/');
            die();
        }
        $this->segment = $Collection->getFirstItem()->toArray();
        return $this->segment;
    }

    public function getSegmentImages()
    {
        $SegmentImage = $this->segmentImageFactory->create();
        $Collection = $SegmentImage->getCollection()
            ->addFieldToFilter('page_id', ['eq' => $this->segment['id']]);
        return $Collection->toArray()['items'];
    }

    public function getContactLink()
    {
        return $this->storeManager->getStore()->getBaseUrl().'contact/';
    }
}
