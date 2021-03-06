<?php

namespace Amasty\ProductAttachment\Block\Adminhtml\Widget;

class FileRows extends \Magento\Backend\Block\Template
{
    protected $_template = 'Amasty_ProductAttachment::files_rows.phtml';

    private $files;

    public function setFiles($files)
    {
        $this->files = $files;
    }

    public function getFiles()
    {
        if (empty($this->files)) {
            return [];
        }

        return $this->files;
    }
}
