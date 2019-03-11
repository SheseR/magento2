<?php
namespace Training\Feedback\Block;

class FeedbackList extends \Magento\Framework\View\Element\Template
{
    const PAGE_SIZE = 5;

    /**
     * @var \Training\Feedback\Model\ResourceModel\Feedback\CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var \Training\Feedback\Model\ResourceModel\Feedback\Collection
     */
    private $collection;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\Timezone
     */
    private $timezone;

    /**
     * @var \Training\Feedback\Model\ResourceModel\Feedback
     */
    private $feedbackResource;

    /**
     * FeedbackList constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Training\Feedback\Model\ResourceModel\Feedback\CollectionFactory $collectionFactory
     * @param \Magento\Framework\Stdlib\DateTime\Timezone $timezone
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Training\Feedback\Model\ResourceModel\Feedback\CollectionFactory $collectionFactory,
        \Magento\Framework\Stdlib\DateTime\Timezone $timezone,
        \Training\Feedback\Model\ResourceModel\Feedback $feedbackResource,
        array $data = array()
    ) {
        parent::__construct($context, $data);

        $this->collectionFactory = $collectionFactory;
        $this->timezone = $timezone;
        $this->feedbackResource = $feedbackResource;
    }

    /**
     * @return mixed
     */
    public function getFeedbackCollection()
    {
        if (!$this->collection) {
            $this->collection = $this->collectionFactory->create();
            $this->collection->addFieldToFilter('is_active', 1);
            $this->collection->setOrder('creation_time', 'DESC');
        }
        return $this->collection;
    }

    /**
     * @return string
     */
    public function getPagerHtml()
    {
       $pagerBlock = $this->getChildBlock('feedback_list_pager');

        if ($pagerBlock instanceof \Magento\Framework\DataObject) {
            /* @var $pagerBlock \Magento\Theme\Block\Html\Pager */
            $pagerBlock
                ->setUseContainer(false)
                ->setShowPerPage(false)
                ->setShowAmounts(false)
                ->setLimit($this->getLimit())
                ->setCollection($this->getFeedbackCollection());

            return $pagerBlock->toHtml();
        }

        return '';
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return static::PAGE_SIZE;
    }

    /**
     * @return string
     */
    public function getAddFeedbackUrl()
    {
        return $this->getUrl('feedback/form');
    }

    /**
     * @param $feedback
     * @return string
     */
    public function getFeedbackDate($feedback)
    {
        return $this->timezone->formatDateTime($feedback->getCreationTime());
    }

    /**
     * @return string
     */
    public function getAllFeedbackNumber()
    {
        return $this->feedbackResource->getAllFeedbackNumber();
    }

    /**
     * @return string
     */
    public function getActiveFeedbackNumber()
    {
        return $this->feedbackResource->getActiveFeedbackNumber();
    }
}