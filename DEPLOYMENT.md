# Laravel Deployment Guide for Plesk Hosting

## Hosting Details
- **Domain**: ezofz.web.lk
- **Server IP**: 46.250.226.182
- **System User**: ezofzweb
- **Document Root**: `/httpdocs/public`
- **Database**: velocity254_easyofficedb
- **DB User**: ezofzweb_user

## Deployment Steps

### 1. Initial Setup via Plesk File Manager or SSH

1. **Access your hosting**: Login to Plesk panel or SSH to your server
2. **Navigate to home directory**: `/var/www/vhosts/ezofz.web.lk/`
3. **Clone your repository**:
   ```bash
   cd /var/www/vhosts/ezofz.web.lk/
   git clone https://github.com/Malithmadhushantha/ezofz-website.git
   ```

4. **Move Laravel files to correct location**:
   ```bash
   # Remove default httpdocs content
   rm -rf httpdocs/*
   
   # Move Laravel project contents
   mv ezofz-website/* httpdocs/
   mv ezofz-website/.* httpdocs/ 2>/dev/null || true
   rmdir ezofz-website
   ```

### 2. Configure Web Root

The Laravel `public` directory should be your document root. In Plesk:

1. Go to **Hosting & DNS** → **Apache & nginx Settings**
2. Set **Document root**: `/httpdocs/public`
3. Or create a symlink:
   ```bash
   cd /var/www/vhosts/ezofz.web.lk/httpdocs
   ln -sf ../public/* .
   ln -sf ../public/.htaccess .
   ```

### 3. Set File Permissions

```bash
cd /var/www/vhosts/ezofz.web.lk/httpdocs
chmod -R 755 .
chmod -R 775 storage bootstrap/cache
chown -R ezofzweb:psacln .
```

### 4. Run Deployment Script

```bash
cd /var/www/vhosts/ezofz.web.lk/httpdocs
chmod +x deploy.sh
./deploy.sh
```

### 5. Configure Database

The database should already be created. Verify connection:
```bash
php artisan migrate:status
```

### 6. Set up SSL Certificate

In Plesk:
1. Go to **SSL/TLS Certificates**
2. Install Let's Encrypt certificate
3. Enable "Redirect from HTTP to HTTPS"

## GitHub Integration Setup

### 1. Generate SSH Key on Server

```bash
ssh-keygen -t ed25519 -C "ezofzweb@ezofz.web.lk"
cat ~/.ssh/id_ed25519.pub
```

### 2. Add Deploy Key to GitHub

1. Copy the public key output
2. Go to your GitHub repo → **Settings** → **Deploy keys**
3. Add the public key with "Write access" enabled

### 3. Set up Git Hooks (Auto-deployment)

Create post-receive hook:
```bash
cd /var/www/vhosts/ezofz.web.lk/httpdocs
git remote add origin git@github.com:Malithmadhushantha/ezofz-website.git
```

### 4. Webhook for Auto-deployment (Optional)

Create webhook endpoint:
```bash
# Create webhook.php in public directory
```

## Production Checklist

- [ ] Environment file (.env) configured with production settings
- [ ] Database connection tested
- [ ] SSL certificate installed
- [ ] File permissions set correctly
- [ ] Storage symlink created
- [ ] Caches cleared and optimized
- [ ] Git repository connected
- [ ] Backup strategy in place

## Troubleshooting

### Common Issues:

1. **500 Error**: Check storage permissions
2. **Database Error**: Verify .env database credentials
3. **File Not Found**: Ensure document root points to `public` directory
4. **Permission Denied**: Check file ownership and permissions

### Log Locations:

- Laravel Logs: `/var/www/vhosts/ezofz.web.lk/httpdocs/storage/logs/`
- Apache Logs: `/var/www/vhosts/system/ezofz.web.lk/logs/`
- Plesk Logs: Available in Plesk panel under "Logs"

## Deployment Commands Reference

```bash
# Quick deployment
git pull && composer install --no-dev && php artisan migrate --force && php artisan cache:clear

# Full deployment
./deploy.sh

# Emergency rollback
git checkout HEAD~1 && ./deploy.sh
```
