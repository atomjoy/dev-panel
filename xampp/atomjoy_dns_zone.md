# Ovh dns zone

## PHP 8.3

```sh
# php_value display_errors 1
# DirectoryIndex index.html index.php

# PHP 8.x
AddType application/x-httpd-php82 .php
AddType application/x-httpd-php83 .php

# Options -Indexes -MultiViews +SymLinksIfOwnerMatch
# Options -Indexes -MultiViews +FollowSymlinks
Options -Indexes -MultiViews

RewriteEngine On
RewriteBase /

# Non-www
RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]
RewriteRule ^(.*)$ http://%1/$1 [R=301,L]

# Https to http
RewriteCond %{HTTPS} off
RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]

# Https to http
# RewriteCond %{HTTPS} on
# RewriteRule (.*) http://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]
```

## SPF

```txt
So the advice to SPF publishers is this: you should add an SPF record
for each subdomain or hostname that has an A or MX record. Sites with
wildcard A or MX records should also have a wildcard SPF record, of the
form: * IN TXT "v=spf1 -all" but use your subdomain not asterix!!!
```

## SPF subdomains

Spf checker <https://dmarcly.com/tools/spf-record-checker>

```sh
# Always for records A and MX
dev.atomjoy.pl IN TXT    "v=spf1 mx a include:mail2.small.pl -all"
# Works
subdomain IN TXT    "v=spf1 mx include:_spf.google.com ip4:111.13.109.12 -all"
# Doesn't work
* IN TXT    "v=spf1 mx include:_spf.google.com ip4:111.13.109.12 -all"
```

## Strefa DNS na small.pl

```sh
1  *  CNAME    3600  atomjoy.pl
2  atomjoy.pl  A    3600  128.204.223.15
3  atomjoy.pl  MX  10   3600  mail2.small.pl
4  atomjoy.pl  NS    3600  dns1.small.pl
5  atomjoy.pl  NS    3600  dns2.small.pl
6  atomjoy.pl  TXT    3600  v=spf1 mx a include:mail2.small.pl -all
```

## Small.pl DNS

```sh
# Dns NS
dns1.small.pl 212.91.26.139
dns2.small.pl 80.72.35.162

# Ssh
s2.small.pl 128.204.216.31
```

## Strefa DNS OVH dla przekierowania na CT8

```sh
$TTL 3600
@ IN SOA dns112.ovh.net. tech.ovh.net. (2024052601 86400 3600 3600000 60)
        IN NS     dns112.ovh.net.
        IN NS     ns112.ovh.net.
        IN MX     1 mx4.mail.ovh.net.
        IN MX     10 mx3.mail.ovh.net.
        IN A     136.243.156.120
    600 IN TXT     "v=spf1 mx include:mx.ovh.com -all"
www        IN CNAME     atomjoy.pl.
```

## Strefa DNS na CT8

```sh
1  *  CNAME    3600  atomjoy.pl
2  atomjoy.pl  A    3600  136.243.156.120
3  atomjoy.pl  MX  10   3600  mail.ct8.pl
4  atomjoy.pl  NS    3600  dns1.ct8.pl
5  atomjoy.pl  NS    3600  dns2.ct8.pl
6  atomjoy.pl  TXT    3600  v=spf1 mx a include:spf.ct8.pl -all
```
