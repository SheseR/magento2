<?php

namespace Training\Test\Block;

use Magento\Framework\View\Element\AbstractBlock;

/**
 * Class Test
 *
 * @package Training\Test\Block
 */
class Test extends AbstractBlock
{
    /**
     * @return string
     */
    public function _toHtml()
    {
        return "<b>Hello world from block!</b>";
    }
}