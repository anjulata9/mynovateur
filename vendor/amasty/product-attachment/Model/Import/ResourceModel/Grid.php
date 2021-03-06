<?php

namespace Amasty\ProductAttachment\Model\Import\ResourceModel;

use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Psr\Log\LoggerInterface as Logger;

class Grid extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult
{
    public function __construct(
        EntityFactory $entityFactory,
        Logger $logger,
        FetchStrategy $fetchStrategy,
        EventManager $eventManager,
        $mainTable = \Amasty\ProductAttachment\Setup\Operation\CreateImportTable::TABLE_NAME,
        $resourceModel = \Amasty\ProductAttachment\Model\Import\ResourceModel\Import::class
    ) {
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel);
    }
}
