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

        if ($subject->getNameInLayout() === 'product.info.sku') {
            $subject->setTemplate('Training_Test::description.phtml');
        }
    }
}