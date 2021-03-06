<?php
namespace Magento\Backend\Model\Menu\Builder;

/**
 * Interceptor class for @see \Magento\Backend\Model\Menu\Builder
 */
class Interceptor extends \Magento\Backend\Model\Menu\Builder implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\Model\Menu\Item\Factory $menuItemFactory)
    {
        $this->___init();
        parent::__construct($menuItemFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function processCommand(\Magento\Backend\Model\Menu\Builder\AbstractCommand $command)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'processCommand');
        return $pluginInfo ? $this->___callPlugins('processCommand', func_get_args(), $pluginInfo) : parent::processCommand($command);
    }

    /**
     * {@inheritdoc}
     */
    public function getResult(\Magento\Backend\Model\Menu $menu)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getResult');
        return $pluginInfo ? $this->___callPlugins('getResult', func_get_args(), $pluginInfo) : parent::getResult($menu);
    }
}
