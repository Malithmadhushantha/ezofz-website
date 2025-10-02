#!/bin/bash

# Laravel Deployment Script for Plesk Hosting
# This script should be run in the root directory of your Laravel project

set -e # Exit on any error

echo "🚀 Starting Laravel Deployment..."
echo "📅 Deployment started at: $(date)"

# Function to handle errors
handle_error() {
    echo "❌ Deployment failed at step: $1"
    echo "📧 Check logs and contact support if needed"
    exit 1
}

# 1. Pull latest changes from Git
echo "📥 Pulling latest changes..."
git pull origin main || handle_error "Git pull"

# 2. Install/Update Composer dependencies (production only)
echo "📦 Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction || handle_error "Composer install"

# 3. Copy production environment file
echo "⚙️ Setting up environment..."
if [ -f ".env.production" ]; then
    cp .env.production .env || handle_error "Environment file copy"
else
    echo "⚠️ Warning: .env.production not found, using existing .env"
fi

# 4. Generate application key if needed
echo "🔑 Checking application key..."
php artisan key:generate --show --no-interaction || handle_error "Key generation"

# 5. Clear and cache configurations
echo "🧹 Clearing caches..."
php artisan config:clear || handle_error "Config clear"
php artisan cache:clear || handle_error "Cache clear"
php artisan view:clear || handle_error "View clear"
php artisan route:clear || handle_error "Route clear"

# 6. Cache configurations for performance
echo "⚡ Caching configurations..."
php artisan config:cache || handle_error "Config cache"
php artisan route:cache || handle_error "Route cache"
php artisan view:cache || handle_error "View cache"

# 7. Run database migrations
echo "🗄️ Running database migrations..."
php artisan migrate --force || handle_error "Database migration"

# 8. Seed database if needed (uncomment if you want to seed)
# php artisan db:seed --force

# 9. Create storage symlink
echo "🔗 Creating storage symlink..."
php artisan storage:link || echo "⚠️ Storage link already exists or failed"

# 10. Set proper permissions
echo "🔒 Setting permissions..."
chmod -R 755 storage bootstrap/cache 2>/dev/null || echo "⚠️ Permission setting may require manual adjustment"
chmod -R 775 storage/app/public 2>/dev/null || echo "⚠️ Storage public permission may require manual adjustment"

# 11. Copy production htaccess if exists
if [ -f "public/.htaccess.production" ]; then
    echo "📋 Copying production .htaccess..."
    cp public/.htaccess.production public/.htaccess || handle_error "htaccess copy"
fi

# 12. Final verification
echo "🔍 Running final verification..."
php artisan config:cache --no-interaction || handle_error "Final config cache"

echo "✅ Deployment completed successfully!"
echo "🌐 Your Laravel application is now live at: https://ezofz.web.lk"
echo "📅 Deployment finished at: $(date)"
echo "🎉 Happy coding!"
