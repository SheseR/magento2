<?php

namespace Training\Test\Plugin\Controller\Product;

class View
{
    /** @var \Magento\Customer\Model\Session  */
    private $customerSession;

    /** @var \Magento\Framework\Controller\Result\RedirectFactory  */
    private $redirectFactory;

    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory
    ){
        $this->customerSession = $customerSession;
        $this->redirectFactory = $redirectFactory;
    }

    /**
     * @param \Magento\Catalog\Controller\Product\View $subject
     * @param \Closure $proceed
     * @return mixed
     */
    public function aroundExecute(
        \Magento\Catalog\Controller\Product\View $subject,
        \Closure $proceed
    ) {

        if ((!$this->customerSession->isLoggedIn())){
           return $this->redirectFactory->create()->setPath('customer/account/login');
        }

        return $proceed();
    }
}