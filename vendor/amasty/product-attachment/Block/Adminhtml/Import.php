<?php

namespace Amasty\ProductAttachment\Block\Adminhtml;

class Import extends \Magento\Backend\Block\Template
{
    public function getGenerateUrl()
    {
        return $this->getUrl('amfile/import/generate', ['import_id' => $this->getRequest()->getParam('import_id')]);
    }

    public function getFinishLink()
    {
        return $this->getUrl('amfile/import/index');
    }
}
