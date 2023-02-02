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

1. Go to **STORES** > **Configuration** > **MAGESTAT** > **Sign in With Phone Number**.
2. Select **Enabled** option to enable the module.
3. Under **Settings** tab, change the **Sign in Mode** to fit to your login process.

## Uninstall

```sh
php bin/magento module:uninstall -r MobiSms
```

## Contribution

Want to contribute to this extension? The quickest way is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).


## Support

If you encounter any problems or bugs, please open an issue on [GitHub](https://github.com/aamirwahid/MobiSms/issues).

Need help setting up or want to customize this extension to meet your business needs? Please open an issue and I'll add this feature if it's a good one.
