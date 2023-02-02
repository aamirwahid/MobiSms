<?php
	
	namespace MobiSms\Notify\Helper;
	
	use \Magento\Framework\App\ObjectManager as ObjectManager;
	use \Magento\Framework\Event\Observer as Observer;
	use \Magento\Store\Model\ScopeInterface as ScopeInterface;
	use \Magento\Framework\App\Helper\AbstractHelper as AbstractHelper;
	
	class Data extends AbstractHelper
	{
		
		/**
			* To be used by the API
			* @var string
		*/
		//protected $_host             = 'https://api.smsmobi.com/';
		protected $_host             = 'http://mshastra.com/';
		/**
			* Getting Basic Configuration
			* These functions are used to get the api username and password
		*/
		
		/**
			* Getting MobiSMS API Username
			* @return string
		*/
		public function getMobiSmsApiUsername()
		{
			return $this->getConfig('mobisms_notify_configuration/basic_configuration/notify_username');
		}
		
		/**
			* Getting MobiSMS API Password
			* @return string
		*/
		public function getMobiSmsApiPassword()
		{
			return $this->getConfig('mobisms_notify_configuration/basic_configuration/notify_password');
		}
		
		
		/**
			* Checking Admin SMS is enabled or not
			* @return string
		*/
		public function isAdminNotificationsEnabled()
		{
			return $this->getConfig('mobisms_notify_admins/admin_configuration/notify_admin_enabled');
		}
		
		/**
			* Getting Admin Mobile Number
			* @return string
		*/
		public function getAdminSenderId()
		{
			return $this->getConfig('mobisms_notify_admins/admin_configuration/notify_admin_mobile');
		}
		
		/**
			* Getting admin message for new order
			* @return string
		*/
		public function getAdminMessageForNewOrder()
		{
			return $this->getConfig('mobisms_notify_admins/admin_configuration/notify_new_order_admin_message');
		}
		
		/**
			* Getting Admin message for order Hold
			* @return string
		*/
		public function getAdminMessageForOrderHold()
		{
			return $this->getConfig('mobisms_notify_admins/admin_configuration/notify_hold_admin_message');
		}
		
		/**
			* Getting Admin message for order unhold
			* @return string
		*/
		public function getAdminMessageForOrderUnHold()
		{
			return $this->getConfig('mobisms_notify_admins/admin_configuration/notify_unhold_admin_message');
		}
		
		/**
			* Getting Admin message for order cancelled
			* @return string
		*/
		public function getAdminMessageForOrderCancelled()
		{
			return $this->getConfig('mobisms_notify_admins/admin_configuration/notify_cancelled_admin_message');
		}
		

		
		/**
			* Getting Admin message for Invoiced
			* @return string
		*/
		public function getAdminMessageForInvoiced()
		{
			return $this->getConfig('mobisms_notify_admins/admin_configuration/notify_invoiced_admin_message');
		}
		
		
		/**
			* Getting Admin message for Sign up
			* @return string
		*/
		public function getAdminMessageForRegister()
		{
			return $this->getConfig('mobisms_notify_admins/admin_configuration/notify_register_admin_message');
		}
		/**
			* Getting Customer Configuration
			* These functions are used to get the customer information when Shipment is created
		*/
		
		/**
			* Checking Customer SMS is enabled or not
			* @return string
		*/
		public function isCustomerNotificationsEnabledOnShipment()
		{
			return $this->getConfig('mobisms_notify_orders/shipment_save/notify_shipment_save_enabled');
		}
		
		/**
			* Getting Customer Sender ID
			* @return string
		*/
		public function getCustomerSenderIdOnShipmentSave()
		{
			return $this->getConfig('mobisms_notify_orders/shipment_save/notify_shipment_save_sender_id');
		}
		
		/**
			* Getting Customer Message
			* @return string
		*/
		public function getCustomerMessageOnShipmentSave()
		{
			return $this->getConfig('mobisms_notify_orders/shipment_save/notify_shipment_save_message');
		}
		
		/**
			* Checking Customer SMS is enabled or not
			* @return string
		*/
		public function isCustomerNotificationsEnabledOnRegister()
		{
			return $this->getConfig('mobisms_notify_orders/new_registration/notify_new_customer_enabled');
		}
		
		/**
			* Getting Customer Sender ID
			* @return string
		*/
		public function getCustomerSenderIdOnRegister()
		{
			return $this->getConfig('mobisms_notify_orders/new_registration/notify_new_customer_sender_id');
		}
		
		/**
			* Getting Customer Message
			* @return string
		*/
		public function getCustomerMessageOnRegister()
		{
			return $this->getConfig('mobisms_notify_orders/new_registration/notify_new_customer_message');
		}
		
		
		/**
			* Getting Customer Configuration
			* These functions are used to get the customer information when new order is placed
		*/
		
		/**
			* Checking Customer SMS is enabled or not
			* @return string
		*/
		public function isCustomerNotificationsEnabledOnOrder()
		{
			return $this->getConfig('mobisms_notify_orders/new_order/notify_new_order_enabled');
		}
		
		/**
			* Getting Customer Sender ID
			* @return string
		*/
		public function getCustomerSenderId()
		{
			return $this->getConfig('mobisms_notify_orders/new_order/notify_new_order_sender_id');
		}
		
		/**
			* Getting Customer Message
			* @return string
		*/
		public function getCustomerMessageOnOrder()
		{
			return $this->getConfig('mobisms_notify_orders/new_order/notify_new_order_message');
		}
		
		/**
			* Getting Customer Configuration
			* These functions are used to get the customer information when order is on hold
		*/
		
		/**
			* Checking Customer SMS is enabled or not
			* @return string
		*/
		public function isCustomerNotificationsEnabledOnHold()
		{
			return $this->getConfig('mobisms_notify_orders/hold_order/notify_hold_order_enabled');
		}
		
		/**
			* Getting Customer Sender ID
			* @return string
		*/
		public function getCustomerSenderIdonHold()
		{
			return $this->getConfig('mobisms_notify_orders/hold_order/notify_hold_order_sender_id');
		}
		
		/**
			* Getting Customer Message
			* @return string
		*/
		public function getCustomerMessageOnHold()
		{
			return $this->getConfig('mobisms_notify_orders/hold_order/notify_hold_order_message');
		}
		
		/**
			* Getting Customer Configuration
			* These functions are used to get the customer information when order is on un hold
		*/
		
		/**
			* Checking Customer SMS is enabled or not
			* @return string
		*/
		public function isCustomerNotificationsEnabledOnUnHold()
		{
			return $this->getConfig('mobisms_notify_orders/unhold_order/notify_unhold_order_enabled');
		}
		
		/**
			* Getting Customer Sender ID
			* @return string
		*/
		public function getCustomerSenderIdonUnHold()
		{
			return $this->getConfig('mobisms_notify_orders/unhold_order/notify_unhold_order_sender_id');
		}
		
		/**
			* Getting Customer Message
			* @return string
		*/
		public function getCustomerMessageOnUnHold()
		{
			return $this->getConfig('mobisms_notify_orders/unhold_order/notify_unhold_order_message');
		}
		
		/**
			* Getting Customer Configuration
			* These functions are used to get the customer information when order is Cancelled
		*/
		
		/**
			* Checking Customer SMS is enabled or not
			* @return string
		*/
		public function isCustomerNotificationsEnabledOnCancelled()
		{
			return $this->getConfig('mobisms_notify_orders/cancelled_order/notify_cancelled_order_enabled');
		}
		
		/**
			* Getting Customer Sender ID
			* @return string
		*/
		public function getCustomerSenderIdonCancelled()
		{
			return $this->getConfig('mobisms_notify_orders/cancelled_order/notify_cancelled_order_sender_id');
		}
		
		/**
			* Getting Customer Message
			* @return string
		*/
		public function getCustomerMessageOnCancelled()
		{
			return $this->getConfig('mobisms_notify_orders/cancelled_order/notify_cancelled_order_message');
		}
		
		/**
			* Getting Customer Configuration
			* These functions are used to get the customer information when invoice is created
		*/
		
		/**
			* Checking Customer SMS is enabled or not
			* @return string
		*/
		public function isCustomerNotificationsEnabledOnInvoiced()
		{
			return $this->getConfig('mobisms_notify_orders/invoiced_order/notify_invoiced_order_enabled');
		}
		
		/**
			* Getting Customer Sender ID
			* @return string
		*/
		public function getCustomerSenderIdonInvoiced()
		{
			return $this->getConfig('mobisms_notify_orders/invoiced_order/notify_invoiced_order_sender_id');
		}
		
		/**
			* Getting Customer Message
			* @return string
		*/
		public function getCustomerMessageOnInvoiced()
		{
			return $this->getConfig('mobisms_notify_orders/invoiced_order/notify_invoiced_order_message');
		}
		
		/**
			* The Basics:
			* These functions are used to do the basic functionality
		*/
		
		/**
			* Send Configuration path to this function and get the module admin Config data
			* @param @var $configPath
			* @return string
		*/
		public function getConfig($configPath)
		{
			return $this->scopeConfig->getValue(
            $configPath,
            ScopeInterface::SCOPE_STORE);
		}
		
		/**
			* Curl Function to get the result from MobiSMS API
			* @param @var $url
			* @return string
		*/
		public function curl($url)
		{   
			return file_get_contents($url);
			
		}
		
		/**
			* Verification of API Account
			* @param @var $username
			* @param @var $password
			* @return bool
		*/
		public function verifyApi($username, $password)
		{
			return  true;
		}
		
		
		/**
			* Sending SMS
			* @param @var $username
			* @param @var $password
			* @param @var $senderID
			* @param @var $destination
			* @param @var $message
			* @return void
		*/
		public function sendSms($username, $password, $senderID, $destination, $message)
		{
		    $_destination=ltrim(ltrim($destination, '+'), '0');
			$_host       = $this->_host;
			$path       = 'sendurlcomma.aspx?';
			$cc="ALL";
			$data       = 'user='.urlencode($username).
			'&pwd='.urlencode($password).
			'&senderid='.urlencode($senderID).
			'&mobileno='.$destination.             
			'&msgtext='.urlencode($message).
			'&CountryCode='.$cc;
			$url        = $_host.$path.$data;
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$curl_scraped_page = curl_exec($ch);			
		}
		
		
		/**
			* Insert Admin Config Values in the message using order data
			* @param @var $message
			* @param @var $data
			* @return string
		*/
		public function manipulateSMS($message, $data)
		{
			$keywords   = [
            '{order_id}',
            '{firstname}',
            '{middlename}',
            '{lastname}',
            '{dob}',
            '{email}',
            '{price}',
            '{cc}',
            '{gender}',
            '{pc}'
			];
			$message            = str_replace($keywords, $data, $message);
			return $message;
		}
		public function manipulateSMS2($message, $data)
		{
			$keywords   = [
            '{id}',
            '{createdat}',
            '{email}',
            '{firstname}',
            '{lastname}'
			];
			$message            = str_replace($keywords, $data, $message);
			return $message;
		}
		
		/**
			* The Fetchers
			* These functions are used to fetch the details using observer
		*/
		
		/**
			* Getting Products
			* @param Observer $observer
			* @return string
		*/
		public function getProduct(Observer $observer)
		{
			$productId          = $observer->getProduct()->getId();
			$objectManager      = ObjectManager::getInstance();
			$product            = $objectManager->get('Magento\Catalog\Model\Product')->load($productId);
			return $product;
		}
		
		/**
			* Getting Order Details
			* @param Observer $observer
			* @return string
		*/
		public function getOrder(Observer $observer)
		{
			$order              = $observer->getOrder();
			$orderId            = $order->getIncrementId();
			$objectManager      = ObjectManager::getInstance();
			$order              = $objectManager->get('Magento\Sales\Model\Order');
			$orderInformation   = $order->loadByIncrementId($orderId);
			return $orderInformation;
		}
	}				