<?php

namespace Amasty\ProductAttachment\Exceptions;

class NoSuchSaveProcessorException extends \Magento\Framework\Exception\LocalizedException
{
    /**
     * @param \Magento\Framework\Phrase $phrase
     * @param \Exception $cause
     * @param int $code
     */
    public function __construct(\Magento\Framework\Phrase $phrase = null, \Exception $cause = null, $code = 0)
    {
        if (!$phrase) {
            $phrase = __('No such save processor');
        }
        parent::__construct($phrase, $cause, (int) $code);
    }
}
