# Google OAuth Setup Instructions

## Overview
This guide will help you set up Google OAuth authentication for your Laravel application, allowing users to "Sign in with Google".

## Prerequisites
- Google account
- Access to Google Cloud Console
- Laravel application with Socialite package installed ✅

## Step-by-Step Setup

### 1. Create Google Cloud Project

1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Click "Select a project" dropdown at the top
3. Click "New Project"
4. Enter project name (e.g., "EZofz Website OAuth")
5. Click "Create"

### 2. Enable Google+ API

1. In your Google Cloud project, go to "APIs & Services" > "Library"
2. Search for "Google+ API"
3. Click on "Google+ API" and click "Enable"
4. Also enable "People API" for better user information access

### 3. Configure OAuth Consent Screen

1. Go to "APIs & Services" > "OAuth consent screen"
2. Choose "External" user type (unless you have G Suite)
3. Fill in the required information:
   - **App name**: EZofz.lk
   - **User support email**: Your email
   - **Developer contact email**: Your email
   - **Authorized domains**: localhost (for testing), your-domain.com (for production)
4. Add scopes:
   - `../auth/userinfo.email`
   - `../auth/userinfo.profile`
5. Save and continue

### 4. Create OAuth 2.0 Credentials

1. Go to "APIs & Services" > "Credentials"
2. Click "Create Credentials" > "OAuth 2.0 Client IDs"
3. Choose "Web application"
4. Enter name: "EZofz Website OAuth Client"
5. Add authorized redirect URIs:
   - For local development: `http://localhost:8000/auth/google/callback`
   - For production: `https://yourdomain.com/auth/google/callback`
6. Click "Create"
7. Copy the **Client ID** and **Client Secret**

### 5. Update Your .env File

Add the following to your `.env` file:

```env
# Google OAuth Configuration
GOOGLE_CLIENT_ID=your_google_client_id_here
GOOGLE_CLIENT_SECRET=your_google_client_secret_here
GOOGLE_REDIRECT_URL="${APP_URL}/auth/google/callback"
```

Replace:
- `your_google_client_id_here` with your actual Google Client ID
- `your_google_client_secret_here` with your actual Google Client Secret

### 6. Test the Setup

1. Start your Laravel development server:
   ```bash
   php artisan serve
   ```

2. Visit your login page: `http://localhost:8000/login`

3. Click "Sign in with Google" button

4. You should be redirected to Google's OAuth page

## Features Implemented ✅

- **User Registration**: New users are automatically created when they sign in with Google
- **Account Linking**: Existing users with the same email are automatically linked to their Google account
- **Avatar Support**: User's Google profile picture is saved and can be displayed
- **Secure Authentication**: Passwords are optional for OAuth users
- **Email Verification**: Google accounts are automatically marked as verified

## Database Changes ✅

The following fields have been added to the `users` table:
- `google_id` - Stores the user's Google ID
- `avatar` - Stores the user's profile picture URL
- `password` - Made nullable for OAuth users

## Important Security Notes

1. **Environment Variables**: Never commit your `.env` file with real credentials
2. **HTTPS**: Always use HTTPS in production
3. **Domain Validation**: Google will only redirect to authorized domains
4. **Client Secret**: Keep your client secret secure and never expose it in frontend code

## Troubleshooting

### Common Issues:

1. **"redirect_uri_mismatch" error**
   - Ensure the redirect URI in Google Console exactly matches your route
   - Check for typos in the URL
   - Make sure the protocol (http/https) matches

2. **"invalid_client" error**
   - Verify your Client ID and Client Secret are correct
   - Check that the OAuth consent screen is properly configured

3. **"access_denied" error**
   - User cancelled the OAuth flow
   - Normal behavior, no action needed

### Debug Mode

To debug OAuth issues, you can add logging to the `GoogleAuthController`:

```php
Log::info('Google OAuth Debug', [
    'google_user' => $googleUser,
    'google_id' => $googleUser->id,
    'email' => $googleUser->email,
]);
```

## Production Considerations

1. Update your `.env` file with production credentials
2. Add your production domain to Google Console
3. Ensure HTTPS is properly configured
4. Consider implementing rate limiting on OAuth routes
5. Monitor OAuth usage in Google Cloud Console

## Support

If you encounter issues:
1. Check Laravel logs: `storage/logs/laravel.log`
2. Review Google Cloud Console error logs
3. Verify all credentials and URLs are correct

## Files Modified

- ✅ `composer.json` - Added Laravel Socialite
- ✅ `database/migrations/add_google_oauth_to_users_table.php` - Database migration
- ✅ `app/Models/User.php` - Updated fillable fields
- ✅ `config/services.php` - Added Google configuration
- ✅ `routes/web.php` - Added Google OAuth routes
- ✅ `app/Http/Controllers/Auth/GoogleAuthController.php` - OAuth controller
- ✅ `resources/views/auth/login.blade.php` - Added Google sign-in button
- ✅ `resources/views/auth/register.blade.php` - Added Google sign-up button

---

**Next Steps**: Add your Google OAuth credentials to the `.env` file and test the integration!
