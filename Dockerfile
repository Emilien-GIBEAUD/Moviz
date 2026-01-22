FROM dunglas/frankenphp:1.10.1-php8.3.28

# add additional extensions here:
RUN install-php-extensions \
	pdo_mysql \
	gd \
	intl \
	opcache