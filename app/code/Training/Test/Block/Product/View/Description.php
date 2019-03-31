<?php

namespace Training\Test\Block\Product\View;

use Magento\Catalog\Block\Product\View\Description as BaseDescription;

/**
 * Class Description
 * @package Training\Test\Block\Product\View
 */
class Description extends BaseDescription
{
    /**
     * @param BaseDescription $subject
     */
    public function beforeToHtml(
        BaseDescription $subject
    ) {

       $subject->getProduct()->setDescription('Test description');
    }
}