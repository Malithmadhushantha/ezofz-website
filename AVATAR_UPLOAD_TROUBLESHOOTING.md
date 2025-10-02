# Avatar Upload Troubleshooting Guide

## Issue
Users getting "500 | Server Error" when uploading profile pictures on the production website.

## Root Causes & Solutions

### 1. **Storage Directory Permissions**
The most common cause is insufficient write permissions on the storage directories.

**Solution:**
1. Upload and run the `setup-storage.php` script from your project root:
   ```bash
   https://ezofz.web.lk/setup-storage.php
   ```

2. Manually set directory permissions via Plesk File Manager:
   - Navigate to `storage/app/public` - set permissions to 755
   - Navigate to `storage/app/public/avatars` - set permissions to 755
   - Navigate to `public/storage/avatars` - set permissions to 755

### 2. **Missing Storage Symbolic Link**
Some hosting environments don't support or properly create symbolic links.

**Solution:**
- The updated UserController now creates directories and copies files manually as a fallback
- Run the `setup-storage.php` script to ensure all necessary directories exist

### 3. **PHP Upload Limits**
Server upload limits might be too low.

**Check via Plesk:**
1. Go to PHP Settings in Plesk
2. Verify these settings:
   - `upload_max_filesize`: 2M or higher
   - `post_max_size`: 8M or higher
   - `max_execution_time`: 30 or higher
   - `memory_limit`: 128M or higher

### 4. **File Extension/MIME Type Issues**
Invalid file types can cause upload failures.

**Allowed formats:**
- JPEG (.jpg, .jpeg)
- PNG (.png)
- GIF (.gif)
- Maximum size: 2MB

### 5. **Database Issues**
Avatar path might not be saving to the database.

**Check:**
- Verify `users` table has `avatar` column
- Check if the column allows NULL values
- Ensure proper string length (VARCHAR 255 recommended)

## Implementation Details

### Enhanced UserController Features:
1. **Directory Creation**: Automatically creates missing directories
2. **Fallback Storage**: Copies files to both `storage/app/public` and `public/storage`
3. **Better Error Logging**: Detailed error messages in logs
4. **Unique Filenames**: Prevents naming conflicts with timestamp + unique ID
5. **Cleanup**: Properly removes old avatar files

### Files Modified:
- `app/Http/Controllers/UserController.php` - Enhanced avatar upload handling
- `setup-storage.php` - New script for storage setup

## Testing Steps

1. **Test Upload Functionality:**
   - Login to your profile: https://ezofz.web.lk/profile
   - Try uploading a small JPEG image (< 1MB)
   - Check if the upload succeeds

2. **Check Error Logs:**
   - Via Plesk: Go to Logs → Error Logs
   - Look for entries containing "Avatar upload failed"

3. **Verify File Storage:**
   - Check if files are created in `storage/app/public/avatars/`
   - Check if files are accessible via `https://ezofz.web.lk/storage/avatars/filename.jpg`

## Quick Fix Commands

### If you have SSH access:
```bash
# Set proper permissions
chmod 755 storage/app/public
chmod 755 storage/app/public/avatars
chmod 755 public/storage
chmod 755 public/storage/avatars

# Create symbolic link (if not exists)
php artisan storage:link
```

### If no SSH access:
1. Upload `setup-storage.php` to your domain root
2. Visit: `https://ezofz.web.lk/setup-storage.php`
3. Check the output for any errors

## Additional Notes

- The system now provides more detailed error messages to help identify specific issues
- Avatar uploads work without symbolic links (manual file copying fallback)
- All uploaded files are validated for security
- Old avatar files are automatically cleaned up when new ones are uploaded

If issues persist after following this guide, check the server error logs for specific PHP errors or contact your hosting provider about file upload permissions.
