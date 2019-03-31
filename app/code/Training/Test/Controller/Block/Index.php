<?php

namespace Training\Test\Controller\Block;

use Magento\Framework\App\Action\Action;

/**
 * Class Index
 *
 * @package Training\Test\Controller\Block
 */
class Index extends Action
{
    /**
     * @var \Magento\Framework\View\LayoutFactory
     */
    private $layoutFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\LayoutFactory $layoutFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\LayoutFactory $layoutFactory
    ) {
        $this->layoutFactory = $layoutFactory;

        parent::__construct($context);
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        $layout = $this->layoutFactory->create();
        $block = $layout->createBlock('Training\Test\Block\Test');

        return $this->getResponse()->appendBody($block->toHtml());
    }
}