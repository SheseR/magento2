<?php

namespace Training\CustomerPersonalSite\ViewModel;

class CustomerAttribute implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * CustomerAttribute constructor.
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param $customerData
     * @return mixed|string
     */
    public function getPersonalSite($customerData)
    {
        $customer = $this->customerRepository->getById($customerData->getId());

        $attribute = $customer->getCustomAttribute('personal_site');
        if ($attribute) {
            return $attribute->getValue();
        }

        return '';
    }
}