<?php

namespace Training\Render\Controller\Layout;

use Magento\Framework\App\Action\Action;

/**
 * Class Onecolumn
 *
 * @package Training\Render\Controller\Layout
 */
class Onecolumn extends Action
{
    /**
     * @var \Magento\Framework\Controller\Result\RawFactory
     */
    private $pageFactory;

    /**
     * Onecolumn constructor.
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;

        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\Controller\Result\Raw|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {

        return $this->pageFactory->create();
    }
}