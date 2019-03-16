<?php
namespace Training\Feedback\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Action\Action;

class Save extends Action implements HttpPostActionInterface
{
    /**
     * @var \Training\Feedback\Model\FeedbackFactory
     */
    private $feedbackFactory;

    /**
     * @var \Training\Feedback\Model\ResourceModel\Feedback
     */
    private $feedbackResource;

    /**
     * Save constructor.
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Training\Feedback\Model\FeedbackFactory $feedbackFactory
     * @param \Training\Feedback\Model\ResourceModel\Feedback $feedbackResource
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Training\Feedback\Model\FeedbackFactory $feedbackFactory,
        \Training\Feedback\Model\ResourceModel\Feedback $feedbackResource
    ) {
        $this->feedbackFactory = $feedbackFactory;
        $this->feedbackResource = $feedbackResource;

        parent::__construct($context);
    }

    /**
     * @return $this|\Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $result = $this->resultRedirectFactory->create();

        $post = $this->getRequest()->getPostValue();
        if ($post) {
            try {
                $this->validatePost($post);

                $feedback = $this->feedbackFactory->create();
                $feedback->setData($post);

                $this->feedbackResource->save($feedback);

                $this->messageManager->addSuccessMessage(
                    __('Thank you for your feedback.')
                );
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(
                    __('An error occurred while processing your form. Please try again later.')
                );
            $result->setPath('feedback/form');

            return $result;
            }
        }

       return $result->setPath('feedback/form');
    }

    /**
     * @param $post
     *
     * @throws \Exception
     */
    private function validatePost($post)
    {
        if (!isset($post['author_name']) || trim($post['author_name']) === '') {
            throw new LocalizedException(__('Name is missing'));
        }
        if (!isset($post['message']) || trim($post['message']) === '') {
            throw new LocalizedException(__('Comment is missing'));
        }
        if (!isset($post['author_email']) || false === \strpos($post['author_email'], '@')) {
            throw new LocalizedException(__('Invalid email address'));
        }
        if (trim($this->getRequest()->getParam('hideit')) !== '') {
            throw new \Exception();
        }
    }
}