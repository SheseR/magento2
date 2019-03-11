<?php

namespace Training\Feedback\Model;

class Feedback extends \Magento\Framework\Model\AbstractModel
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\Feedback::class);
    }
}