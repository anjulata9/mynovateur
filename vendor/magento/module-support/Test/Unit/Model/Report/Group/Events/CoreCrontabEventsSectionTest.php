<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Support\Test\Unit\Model\Report\Group\Events;

use Magento\Framework\App\Area;
use Magento\Framework\Event\ConfigInterface;
use Magento\Support\Model\Report\Group\Events\CoreCrontabEventsSection;

class CoreCrontabEventsSectionTest extends AbstractEventsSectionTest
{
    /**
     * {@inheritdoc}
     */
    protected function getExpectedTitle()
    {
        return (string)__('Core Crontab Events');
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedType()
    {
        return ConfigInterface::TYPE_CORE;
    }

    /**
     * {@inheritdoc}
     */
    protected function getSectionName()
    {
        return CoreCrontabEventsSection::class;
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedAreaCode()
    {
        return Area::AREA_CRONTAB;
    }
}
