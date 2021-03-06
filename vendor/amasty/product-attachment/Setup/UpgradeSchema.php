<?php

namespace Amasty\ProductAttachment\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * @var Operation\CreateFileTable
     */
    private $createFileTable;

    /**
     * @var Operation\CreateIconTable
     */
    private $createIconTable;

    /**
     * @var Operation\CreateFileScopeTables
     */
    private $createFileScopeTables;

    /**
     * @var Operation\RenameOldTables
     */
    private $renameOldTables;

    /**
     * @var Operation\CreateIconExtensionTable
     */
    private $createIconExtensionTable;

    /**
     * @var Operation\CreateReportTable
     */
    private $createReportTable;

    /**
     * @var Operation\CreateImportTable
     */
    private $createImportTable;

    /**
     * @var Operation\CreateImportFileTable
     */
    private $createImportFileTable;

    /**
     * @var Operation\UpgradeSchemaTo230
     */
    private $upgradeSchemaTo230;

    /**
     * @var Operation\UpgradeSchemaTo235
     */
    private $upgradeSchemaTo235;

    /**
     * @var Operation\UpgradeSchemaTo235
     */
    private $createTriggers;

    public function __construct(
        Operation\CreateFileTable $createFileTable,
        Operation\CreateIconTable $createIconTable,
        Operation\CreateIconExtensionTable $createIconExtensionTable,
        Operation\CreateFileScopeTables $createFileScopeTables,
        Operation\CreateReportTable $createReportTable,
        Operation\RenameOldTables $renameOldTables,
        Operation\CreateImportTable $createImportTable,
        Operation\CreateImportFileTable $createImportFileTable,
        Operation\UpgradeSchemaTo230 $upgradeSchemaTo230,
        Operation\UpgradeSchemaTo235 $upgradeSchemaTo235,
        Operation\CreateTriggers $createTriggers
    ) {
        $this->createFileTable = $createFileTable;
        $this->createIconTable = $createIconTable;
        $this->createFileScopeTables = $createFileScopeTables;
        $this->renameOldTables = $renameOldTables;
        $this->createIconExtensionTable = $createIconExtensionTable;
        $this->createReportTable = $createReportTable;
        $this->createImportTable = $createImportTable;
        $this->createImportFileTable = $createImportFileTable;
        $this->upgradeSchemaTo230 = $upgradeSchemaTo230;
        $this->upgradeSchemaTo235 = $upgradeSchemaTo235;
        $this->createTriggers = $createTriggers;
    }

    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface   $setup
     * @param ModuleContextInterface $context
     *
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (!$context->getVersion() || version_compare($context->getVersion(), '2.0.0', '<')) {
            if ($context->getVersion()) {
                $this->renameOldTables->execute($setup);
            }

            $this->createFileTable->execute($setup);
            $this->createIconTable->execute($setup);
            $this->createIconExtensionTable->execute($setup);
            $this->createFileScopeTables->execute($setup);
            $this->createReportTable->execute($setup);
            $this->createTriggers->execute($setup);
        }

        if (!$context->getVersion() || version_compare($context->getVersion(), '2.2.0', '<')) {
            $this->createImportTable->execute($setup);
            $this->createImportFileTable->execute($setup);
        }

        if ($context->getVersion() && version_compare($context->getVersion(), '2.3.0', '<')) {
            $this->upgradeSchemaTo230->execute($setup);
        }

        if ($context->getVersion() && version_compare($context->getVersion(), '2.3.5', '<')) {
            $this->upgradeSchemaTo235->execute($setup);
            $this->createTriggers->execute($setup);
        }

        $setup->endSetup();
    }
}
