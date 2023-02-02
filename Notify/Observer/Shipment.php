<?php

namespace MobiSms\Notify\Observer;

use Magento\Framework\Event\ObserverInterface;

use \Magento\Framework\View\Element\Context as Context;
use \MobiSms\Notify\Helper\Data                 as Helper;
use Magento\Sales\Api\Data\ShipmentInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Sales\Api\ShipmentRepositoryInterface;
/**
 * Customer login observer
 */
class Shipment implements ObserverInterface
{
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
	 
	 /**
		 * @var eventManager
     */
     protected $_eventManager;

    /**
     * @var ObjectManagerInterface
     */
    protected $_objectManager;

    protected $_shipmentItemCollectionFactory;

	 
    public function __construct(
        \Magento\Framework\Event\Manager $eventManager,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Sales\Model\ResourceModel\Order\Shipment\Item\CollectionFactory $shipmentItemCollectionFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
		Context $context,
        Helper $helper
    ) {
        $this->_eventManager = $eventManager;
        $this->_objectManager = $objectManager;  
        $this->_storeManager = $storeManager;
		$this->_helper  = $helper;
        $this->_request = $context->getRequest();
        $this->_layout  = $context->getLayout();
    }

    /**
     * The execute class
     * @param Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
    	
        /**
         * Checking either this call is for order hold or not
         */

       // if (strpos($_SERVER['REQUEST_URI'], 'order/hold') !== false) {
     
            /**
             * Getting Module Configuration from admin panel
             */
            //Getting Username
            $this->username         = $this->_helper->getMobiSmsApiUsername();

            //Getting Password
            $this->password         = $this->_helper->getMobiSmsApiPassword();

            //Getting Sender ID
            $this->senderId        = $this->_helper->getCustomerSenderIdOnShipmentSave();

            //Getting Message
            $this->message          = $this->_helper->getCustomerMessageOnShipmentSave();

            //Getting Customer Notification value
            $this->enabled          = $this->_helper->isCustomerNotificationsEnabledOnShipment();

            if ($this->enabled == 1) {
            	
                /**
                 * Verification of API Account
                 */

                //Verification of API
                $verificationResult     = $this->_helper->verifyApi($this->username, $this->password);
                if ($verificationResult == true) {

                    $shipment = $observer->getEvent()->getShipment();
                    $order = $shipment->getOrder();
                   $orderData = [
                    'orderId'       => $order->getIncrementId(),
                    'firstname'     => $order->getBillingAddress()->getName(),
                    '$middlename'   => $order->getCustomerMiddlename(),
                    'lastname'      => $order->getCustomerLastname(),
                    'totalPrice'    => number_format($order->getGrandTotal(), 2),
                    'countryCode'   => $order->getOrderCurrencyCode(),
                    'protectCode'   => $order->getProtectCode(),
                    'customerDob'   => $order->getCustomerDob(),
                    'customerEmail' => $order->getCustomerEmail(),
                    'gender'        => ($order->getCustomerGender() ? 'Female' : 'Male')
                ];

                    $this->destination  = $order->getBillingAddress()->getTelephone();
                    //Manipulating SMS
                    $this->message      = $this->_helper->manipulateSMS($this->message, $orderData);

                    //Sending SMS
                    $this->_helper->sendSms(
                        $this->username,
                        $this->password,
                        $this->senderId,
                        $this->destination,
                        $this->message
                    );

                    //Sending SMS to Admin
                    if ($this->_helper->isAdminNotificationsEnabled()==1) {
                    	
                        $this->destination  = $this->_helper->getAdminSenderId();
                        $this->message      = $this->_helper->getAdminMessageForOrderHold();
                       // $this->message      = $this->_helper->manipulateSMS($this->message, $orderData);
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
        //}
    }
}