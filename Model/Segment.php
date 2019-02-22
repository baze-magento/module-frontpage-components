<?php
namespace Baze\FrontpageComponents\Model;

class Segment extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Baze\FrontpageComponents\Model\ResourceModel\Segment');
    }
}
