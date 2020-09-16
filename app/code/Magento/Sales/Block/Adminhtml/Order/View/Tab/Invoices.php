<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Sales\Block\Adminhtml\Order\View\Tab;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\AuthorizationInterface;
use Magento\Framework\View\Element\Context;

/**
 * Order Invoices grid
 *
 * @api
 * @since 100.0.2
 */
class Invoices extends \Magento\Framework\View\Element\Text\ListText implements
    \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var AuthorizationInterface
     */
    private $authorization;

    /**
     * Invoices constructor.
     *
     * @param Context $context
     * @param array $data
     * @param AuthorizationInterface|null $authorization
     */
    public function __construct(
        Context $context,
        array $data = [],
        ?AuthorizationInterface $authorization = null
    ) {
        $this->authorization = $authorization ?? ObjectManager::getInstance()->get(AuthorizationInterface::class);
        parent::__construct($context, $data);
    }

    /**
     * @inheritdoc
     */
    public function getTabLabel()
    {
        return __('Invoices');
    }

    /**
     * @inheritdoc
     */
    public function getTabTitle()
    {
        return __('Order Invoices');
    }

    /**
     * @inheritdoc
     */
    public function canShowTab()
    {
        return $this->authorization->isAllowed('Magento_Sales::invoice');
    }

    /**
     * @inheritdoc
     */
    public function isHidden()
    {
        return false;
    }
}
