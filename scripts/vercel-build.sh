#!/usr/bin/env bash
set -euo pipefail

# Download and run Composer installer, install PHP deps, then build frontend
php -r "copy('https://getcomposer.org/installer','composer-setup.php');"
php composer-setup.php --quiet
php composer.phar install --no-dev --prefer-dist --no-interaction --optimize-autoloader || true
rm -f composer-setup.php composer.phar

npm install
npm run build

echo "vercel build script completed"
