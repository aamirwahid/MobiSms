# Mobishastra SMS for Magento 2

This extension allow your customers to send SMS from your Magento store using Mobishastra API. 
- Send SMS to customer on events like New Order,New Registration, Order Cancelled, Order on Hold etc.
- Registration using Mobile Number

## Installation

### Using GIT clone

Run the following command in Magento 2 root folder:
```sh
git clone https://github.com/aamirwahid/MobiSms.git app/code/MobiSms/
```

## Activation

Run the following command in Magento 2 root folder:
```sh
php bin/magento module:enable MobiSms
```
```sh
php bin/magento setup:upgrade
```

Clear the caches:
```sh
php bin/magento cache:clean
```

## Configuration

1. Go to **MobiSMS** > **Configuration** > **Mobishastra SMS** > **Basic Configuration** > **Enter Your API Credentials**.
2. Go to  **Order Notiications** > **Select Module and change to Yes to Enable Customer Notiications**.
3. Enter your **Sender ID** and **Message** and then Click on **Save**.
4. Do same for **Admin Notifications**. 
5. You can use following variables in message **{order_id} {firstname} {middlename} {lastname} {dob} {email} {price} {gender}**
            
## Uninstall

```sh
php bin/magento module:uninstall -r MobiSms
```
## Please Note:

1) For Registration SMS to customer install the below plugin:

https://github.com/williankeller/magento2-sign-in-with-phone-number

2) If you are manually installing the extension by downloading from github please make sure the directory structure should be like below:
```sh
YourMagentoRootDirectory/app/code/Mobisms/Notify/..
```
## Contribution

Want to contribute to this extension? The quickest way is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).


## Support

If you encounter any problems or bugs, please open an issue on [GitHub](https://github.com/aamirwahid/MobiSms/issues).

Need help setting up or want to customize this extension to meet your business needs? Please open an issue and I'll add this feature if it's a good one.
