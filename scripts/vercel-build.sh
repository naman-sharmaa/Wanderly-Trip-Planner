#!/usr/bin/env bash
set -euo pipefail

# If PHP is available, download and run Composer installer and install PHP deps.
if command -v php >/dev/null 2>&1; then
	php -r "copy('https://getcomposer.org/installer','composer-setup.php');"
	php composer-setup.php --quiet
	php composer.phar install --no-dev --prefer-dist --no-interaction --optimize-autoloader || true
	rm -f composer-setup.php composer.phar
else
	echo "php not found in build environment; skipping Composer install."
	echo "If your deployment requires PHP dependencies at runtime, commit the 'vendor/' directory or use a PHP-capable host."
fi

# Frontend build (Node/npm)
if command -v npm >/dev/null 2>&1; then
	npm install
	npm run build
else
	echo "npm not found in build environment; skipping frontend build."
fi

echo "vercel build script completed"
