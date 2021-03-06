<?php

namespace Amasty\Storelocator\Controller\Adminhtml\Attributes;

/**
 * Class NewAction
 */
class NewAction extends \Amasty\Storelocator\Controller\Adminhtml\Attributes
{

    public function execute()
    {
        $resultForward = $this->forwardFactory->create();
        $resultForward->forward('edit');

        return $resultForward;
    }
}
