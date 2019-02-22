<?php
namespace Baze\FrontpageComponents\Model\ResourceModel\SegmentImage;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'baze_segment_image_collection';
    protected $_eventObject = 'segment_image_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Baze\FrontpageComponents\Model\SegmentImage',
            'Baze\FrontpageComponents\Model\ResourceModel\SegmentImage'
        );
    }
}
