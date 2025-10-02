# Google OAuth Configuration Guide

## 🔐 Secure OAuth Setup for Production

### Part 1: Google Cloud Console Configuration

1. **Access Google Cloud Console**:
   - Go to: https://console.cloud.google.com/
   - Select your project
   - Navigate to: **APIs & Services** → **Credentials**

2. **Update OAuth 2.0 Client ID**: `[YOUR_GOOGLE_CLIENT_ID]`

   **Authorized JavaScript origins**:
   ```
   https://ezofz.web.lk
   ```

   **Authorized redirect URIs**:
   ```
   https://ezofz.web.lk/auth/google/callback
   ```

### Part 2: Plesk Environment Variables Setup

1. **In Plesk Control Panel**:
   - Go to your domain: **ezofz.web.lk**
   - Navigate to: **PHP Settings** → **Environment Variables**

2. **Add these Environment Variables**:
   ```
   Variable Name: GOOGLE_CLIENT_ID
   Value: [YOUR_GOOGLE_CLIENT_ID]

   Variable Name: GOOGLE_CLIENT_SECRET
   Value: [YOUR_GOOGLE_CLIENT_SECRET]
   ```

3. **Save the configuration**

### Part 3: Deploy and Test

1. **Auto-deployment** should pull the latest code with OAuth template
2. **Run deployment script** (if needed):
   ```
   https://ezofz.web.lk/deploy-manual.php?key=your_secret_deploy_key_2025
   ```

3. **Test Google Login**:
   - Go to: https://ezofz.web.lk/login
   - Click "Login with Google"
   - Should redirect to Google OAuth flow

### Part 4: Verify OAuth Configuration

**Test URLs**:
- Login: https://ezofz.web.lk/login
- Google OAuth: https://ezofz.web.lk/auth/google
- Callback: https://ezofz.web.lk/auth/google/callback

### Security Benefits

✅ **Secrets not in Git**: OAuth secrets are stored securely in server environment  
✅ **GitHub Protection**: Prevented accidental secret exposure  
✅ **Production Domain**: OAuth configured for live domain  
✅ **HTTPS Enforced**: Secure OAuth flow over SSL  

## Troubleshooting

**If OAuth doesn't work**:
1. Check Plesk Environment Variables are set correctly
2. Verify Google Cloud Console redirect URLs
3. Ensure SSL certificate is active
4. Check Laravel logs: `/httpdocs/storage/logs/laravel.log`

**Common Issues**:
- **Wrong redirect URI**: Must exactly match `https://ezofz.web.lk/auth/google/callback`
- **Missing environment variables**: Check Plesk PHP settings
- **SSL issues**: Ensure HTTPS is working properly

## Environment Variables Reference

```bash
# In Plesk Environment Variables:
GOOGLE_CLIENT_ID=[YOUR_GOOGLE_CLIENT_ID]
GOOGLE_CLIENT_SECRET=[YOUR_GOOGLE_CLIENT_SECRET]

# In .env.production (references environment variables):
GOOGLE_CLIENT_ID="${GOOGLE_CLIENT_ID}"
GOOGLE_CLIENT_SECRET="${GOOGLE_CLIENT_SECRET}"
GOOGLE_REDIRECT_URL="${APP_URL}/auth/google/callback"
```
