<?php

namespace Amasty\ProductAttachment\Model\Import\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class ImportFileCollection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init(
            \Amasty\ProductAttachment\Model\Import\ImportFile::class,
            \Amasty\ProductAttachment\Model\Import\ResourceModel\ImportFile::class
        );
        $this->_setIdFieldName($this->getResource()->getIdFieldName());
    }
}
