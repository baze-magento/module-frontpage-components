<?php
namespace Baze\FrontpageComponents\Model\ResourceModel\Segment;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'baze_segment_collection';
    protected $_eventObject = 'segment_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Baze\FrontpageComponents\Model\Segment', 'Baze\FrontpageComponents\Model\ResourceModel\Segment');
    }
}
