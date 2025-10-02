#!/bin/bash

# Plesk Auto-Deployment Script
# This runs automatically when Git updates are pulled

echo "Starting auto-deployment..."

# Install/Update Composer dependencies
echo "Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Set up environment
echo "Setting up environment..."
if [ -f ".env.production" ]; then
    cp .env.production .env
    echo "Environment file copied from .env.production"
else
    echo "Warning: .env.production not found"
fi

# Clear and rebuild caches
echo "Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

echo "Building caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Database operations
echo "Running migrations..."
php artisan migrate --force

# Storage link
echo "Creating storage symlink..."
php artisan storage:link

# Set permissions
echo "Setting permissions..."
chmod -R 755 storage bootstrap/cache 2>/dev/null || echo "Permission setting skipped"

# Copy production .htaccess if exists
if [ -f "public/.htaccess.production" ]; then
    cp public/.htaccess.production public/.htaccess
    echo "Production .htaccess copied"
fi

echo "Auto-deployment completed successfully!"
