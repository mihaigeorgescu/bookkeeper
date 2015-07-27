bookkeeper
==========

A Symfony project created on July 1, 2015, 4:46 pm.

vhost configuration:
<VirtualHost *:80>
  ServerName www.bookkeeper.dev

  ## Vhost docroot
  DocumentRoot "/var/www/html/bookkeeper/web"

  ## Directories, there should at least be a declaration for /var/www/codeception-ii
  <Directory "/var/www/html/bookkeeper/web/">
    Options Indexes FollowSymlinks MultiViews
    AllowOverride All
    Require all granted
  </Directory>

  ## Logging
  ErrorLog "/var/log/apache2/bookkeeper_error.log"
  ServerSignature Off
  CustomLog "/var/log/apache2/bookkeeper_access.log" combined
</VirtualHost>
