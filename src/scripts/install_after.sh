#!/bin/bash

if [ "$DEPLOYMENT_GROUP_NAME" == "Prod" ]; then
    aws s3 sync /var/www/html/public/asset s3://lemon-sour-prod/asset
    aws s3 cp s3://lemon-sour-env/prod-env /var/www/html/.env
elif [ "$DEPLOYMENT_GROUP_NAME" == "dev-deploy" ]; then
    aws s3 sync /var/www/html/public/asset s3://lemon-sour-dev/asset
fi

cd /var/www/html
sudo -u apache php artisan optimize:clear
sudo -u apache php artisan config:cache
sudo -u apache php artisan view:cache
sudo -u apache php artisan route:cache

chmod -R 777 /var/www/html/storage/logs


