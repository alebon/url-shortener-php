### URL Shortener in (pure) PHP ###

This project doesn't use any PHP frameworks to implement a simple URL shortener. Links are stored in MongoDB.

### Install ###

    - Install Apache2 Web-Server (ensure mode rewrite module is enabled)
    - Install MongoDB
    - Install MongoDB PHP extension
    - Copy files of the project into /var/www/shortener
    
### Sample configuration VHost ###

    # url-shortener-php.com
    <VirtualHost *:80>
        ServerName url-shortener-php.com
        ServerAlias vm.url-shortener-php.com
    
        DocumentRoot /var/www/shortener/
    
        CustomLog /var/www/log/apache2/shortener-request.log combined
        ErrorLog  /var/www/log/apache2/shortener-error.log
    
    </VirtualHost>