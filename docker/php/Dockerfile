FROM php:8.2.0-fpm

# Instalar extensões necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Copiar arquivos de configuração personalizados (opcional)
# COPY php.ini /usr/local/etc/php/

# Definir o diretório de trabalho
WORKDIR /var/www

# Expor a porta 9000 (default para php-fpm)
# EXPOSE 9000


# Copiar o código-fonte para o contêiner
COPY ./serve /var/www

# Expor a porta 8000
EXPOSE 8000

# Comando para iniciar o servidor PHP embutido
CMD ["php", "-S", "0.0.0.0:8000", "-t", "/var/www"]

