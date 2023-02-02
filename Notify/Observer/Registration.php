<?php
	
	namespace MobiSms\Notify\Observer;
	
	use Magento\Framework\Event\ObserverInterface;
	use \Magento\Framework\Event\Observer       as Observer;
	use \Magento\Framework\View\Element\Context as Context;
	use \MobiSms\Notify\Helper\Data                 as Helper;
	use Magento\Customer\Api\CustomerRepositoryInterface;
	/**
		* Customer login observer
	*/
	class Registration implements ObserverInterface
	{
		/** @var CustomerRepositoryInterface */
		protected $customerRepository;
		/**
			* Message manager
			*
			* @var \Magento\Framework\Message\ManagerInterface
		*/
		const AJAX_PARAM_NAME = 'infscroll';
		/**
			*
		*/
		const AJAX_HANDLE_NAME = 'infscroll_ajax_request';
		
		/**
			* Https request
			*
			* @var \Zend\Http\Request
		*/
		protected $_request;
		
		/**
			* Layout Interface
			* @var \Magento\Framework\View\LayoutInterface
		*/
		protected $_layout;
		
		/**
			* Cache
			* @var $_cache
		*/
		protected $_cache;
		
		/**
			* Helper for MobiSms Notify Module
			* @var \MobiSms\Notify\Helper\Data
		*/
		protected $_helper;
		
		/**
			* Message Manager
			* @var $messageManager
		*/
		protected $messageManager;
		
		/**
			* Username
			* @var $username
		*/
		protected $username;
		
		/**
			* Password
			* @var $password
		*/
		protected $password;
		
		/**
			* Sender ID
			* @var $senderId
		*/
		protected $senderId;
		
		/**
			* Destination
			* @var $destination
		*/
		protected $destination;
		
		/**
			* Message
			* @var $message
		*/
		protected $message;
		
		/**
			* Whether Enabled or not
			* @var $enabled
		*/
		protected $enabled;
		
		/**
			* Constructor
			* @param Context $context
			* @param Helper $helper _helper
		*/
		public function __construct(
        Context $context,
        Helper $helper,CustomerRepositoryInterface $customerRepository
		) {
			
			$this->_helper  = $helper;
			$this->_request = $context->getRequest();
			$this->_layout  = $context->getLayout();
			$this->customerRepository = $customerRepository;
		}
		
		/**
			* The execute class
			* @param Observer $observer
			* @return void
		*/
		public function execute(Observer $observer)
		{
			/**
				* Getting Module Configuration from admin panel
			*/
			
			//Getting Username
			$this->username = $this->_helper->getMobiSmsApiUsername();
			
			//Getting Password
			$this->password = $this->_helper->getMobiSmsApiPassword();
			
			

            //Getting Message
            $this->message          = $this->_helper->getCustomerMessageOnRegister();

            //Getting Customer Notification value
            $this->enabled          = $this->_helper->isCustomerNotificationsEnabledOnRegister();
			
			if ($this->enabled == 1) {
			
			/**
				* Verification of API Account
			*/
			
			//Verification of API
			$verificationResult = $this->_helper->verifyApi($this->username, $this->password);
			if ($verificationResult == true) {
				//Getting Order Details
				$event = $observer->getEvent();
				$customer = [
                'id'=>$event->getCustomer()->getId(),
                'createdate'=>$event->getCustomer()->getCreatedAt(),
                'email'=>$event->getCustomer()->getEmail(),
                'firstname'=>$event->getCustomer()->getFirstname(),
                'lastname'=>$event->getCustomer()->getLastname()
				];
				$customerno = $this->customerRepository->getById($event->getCustomer()->getId());
				$phno=$customerno->getCustomAttribute('phone_number')->getValue();
				 $this->message      = $this->_helper->manipulateSMS2($this->message, $customer);
				//Sending SMS
                    $this->_helper->sendSms(
                        $this->username,
                        $this->password,
                        "ABC",
                        $phno,
                        $this->message
                    );
				
				
				//Sending SMS to Admin
				if ($this->_helper->isAdminNotificationsEnabled() == 1) {
					$this->senderId = "Your Magento";
					$this->destination = $this->_helper->getAdminSenderId();
					$this->message = $this->_helper->getAdminMessageForRegister();
					$keywords = ['{customer_id}','{created_at}','{email}','{firstname}','{lastname}'];
					$this->message = str_replace($keywords, $customer, $this->message);
					$this->_helper->sendSms(
                    $this->username,
                    $this->password,
                    $this->senderId,
                    $this->destination,
                    $this->message
					);
				}
			}
		}
		}
	}	