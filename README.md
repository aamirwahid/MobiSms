# MobiSMS
Sign in With Phone Number for Magento 2
This extension allow your customers to login to your Magento store using their phone number. Also it is possible to login using both (email or phone number) at the same field, this extension is capable to handle the field value and access the store with the provided data - Mobile login extention for Magento 2.

Login with mobile phone number or email.
Possibility to create account using mobile phone number.
Change phone number under customer dashboard.
Codacy Badge Build Status Packagist Downloads

Installation
Install via composer (recommended)
Run the following command in Magento 2 root folder:

composer require magestat/module-sign-in-with-phone-number
composer install
Using GIT clone
Run the following command in Magento 2 root folder:

git clone git@github.com:magestat/magento2-sign-in-with-phone-number.git app/code/Magestat/SigninPhoneNumber
Activation
Run the following command in Magento 2 root folder:

php bin/magento module:enable Magestat_SigninPhoneNumber
php bin/magento setup:upgrade
Clear the caches:

php bin/magento cache:clean
Configuration
Go to STORES > Configuration > MAGESTAT > Sign in With Phone Number.
Select Enabled option to enable the module.
Under Settings tab, change the Sign in Mode to fit to your login process.
Uninstall
php bin/magento module:uninstall -r Magestat_SigninPhoneNumber
Contribution
Want to contribute to this extension? The quickest way is to open a pull request on GitHub.

Support
If you encounter any problems or bugs, please open an issue on GitHub.

Need help setting up or want to customize this extension to meet your business needs? Please open an issue and I'll add this feature if it's a good one.
