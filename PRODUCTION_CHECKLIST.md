# Production Deployment Checklist for EZofz.lk

## Pre-Deployment Checklist ✅

### Environment & Configuration
- [ ] Production `.env` file configured with correct database credentials
- [ ] `APP_ENV=production` and `APP_DEBUG=false` set
- [ ] `APP_URL` set to `https://ezofz.web.lk`
- [ ] Database credentials verified: `velocity254_easyofficedb`
- [ ] Mail configuration tested with hosting email
- [ ] SSL certificate installed and HTTPS enforced
- [ ] Production `.htaccess` file deployed with security headers

### Database & Storage
- [ ] Database migrations run successfully
- [ ] Storage symlink created (`php artisan storage:link`)
- [ ] File permissions set correctly (755 for app, 775 for storage)
- [ ] Database connection tested from production server

### Performance & Optimization
- [ ] Composer dependencies installed with `--no-dev --optimize-autoloader`
- [ ] Laravel caches generated:
  - [ ] `php artisan config:cache`
  - [ ] `php artisan route:cache`  
  - [ ] `php artisan view:cache`
- [ ] Static assets optimized and compressed

### Security
- [ ] Production security headers configured
- [ ] Sensitive files blocked in `.htaccess`
- [ ] HTTPS redirect enabled
- [ ] Admin routes protected
- [ ] Session security configured
- [ ] CSRF protection enabled

### SEO & Marketing
- [ ] Sitemap.xml updated with current dates
- [ ] Robots.txt configured properly
- [ ] Meta tags and structured data implemented
- [ ] Google Analytics/Search Console configured
- [ ] Open Graph tags for social sharing

### Monitoring & Backups
- [ ] Error logging configured
- [ ] Database backup strategy in place  
- [ ] File backup strategy in place
- [ ] Monitoring alerts configured
- [ ] Log rotation configured

## Deployment Commands

```bash
# 1. Deploy to production
./deploy.sh

# 2. Verify deployment
php artisan config:cache
php artisan route:cache
php artisan migrate:status

# 3. Test critical functionality
curl https://ezofz.web.lk
curl https://ezofz.web.lk/sitemap.xml
curl https://ezofz.web.lk/robots.txt
```

## Post-Deployment Verification

### Functionality Tests
- [ ] Homepage loads correctly
- [ ] All main navigation links work
- [ ] Tools functionality:
  - [ ] Unicode typing tool
  - [ ] Name converter
  - [ ] ID card details
  - [ ] Document downloads
- [ ] User registration/login
- [ ] Admin panel access
- [ ] Database operations

### Performance Tests  
- [ ] Page load speeds < 3 seconds
- [ ] Images optimized and loading
- [ ] CSS/JS files compressed
- [ ] GZIP compression active

### SEO Tests
- [ ] Meta tags present on all pages
- [ ] Structured data validated
- [ ] Sitemap accessible and valid
- [ ] Robots.txt accessible
- [ ] SSL certificate valid

### Security Tests
- [ ] HTTPS redirect working
- [ ] Security headers present
- [ ] Admin areas password protected
- [ ] Sensitive files not accessible
- [ ] Error pages don't reveal sensitive info

## Monitoring URLs

- **Main Site**: https://ezofz.web.lk
- **Sitemap**: https://ezofz.web.lk/sitemap.xml  
- **Robots**: https://ezofz.web.lk/robots.txt
- **Admin Panel**: https://ezofz.web.lk/admin/dashboard
- **API Health**: https://ezofz.web.lk/api/health (if implemented)

## Emergency Procedures

### Rollback Commands
```bash
# Quick rollback to previous commit
git checkout HEAD~1
./deploy.sh
```

### Debug Commands  
```bash
# Check logs
tail -f storage/logs/laravel.log
tail -f /var/log/apache2/error.log

# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Contact Information
- **Hosting Support**: support@ezofz.web.lk
- **Server IP**: 46.250.226.182
- **System User**: ezofzweb
- **Database**: velocity254_easyofficedb

## Maintenance Schedule

### Daily
- [ ] Check error logs
- [ ] Monitor site availability  

### Weekly  
- [ ] Review performance metrics
- [ ] Check SSL certificate status
- [ ] Verify backup completion

### Monthly
- [ ] Update dependencies (security patches)
- [ ] Review and rotate logs
- [ ] Performance optimization review
- [ ] Security audit

## Success Criteria

✅ **Deployment is successful when:**
- Site loads at https://ezofz.web.lk
- All tools function correctly  
- Admin panel accessible
- No PHP errors in logs
- SSL certificate valid
- Performance acceptable (< 3s load time)
- SEO elements properly configured
