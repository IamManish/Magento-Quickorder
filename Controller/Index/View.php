<?php

namespace Popesites\Quickorder\Controller\Index;

/**
 * Class View
 *
 * Quickorder/view page
 *
 * @category Api
 * @package  Popesites\Quickorder\Controller\Index
 * @author Popesites <info@popesites.tech>
 */
class View extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Magento\Customer\Model\Session  $customerSession
     */
    protected $session;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context  $context
     * @param \Magento\Customer\Model\Session  $customerSession
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->session = $customerSession;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute() {
        if (!$this->session->isLoggedIn()) {

            // if customer is not logged in redirect to login page
            // @var \Magento\Framework\Controller\Result\Redirect $resultRedirect
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('customer/account/login');
            return $resultRedirect;
        }

        // @var \Magento\Framework\View\Result\Page $resultPage
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }

}
