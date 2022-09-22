#!/bin/bash
php /app/artisan schedule:run --verbose --no-interaction >> /dev/null 2>&1
sleep 60
