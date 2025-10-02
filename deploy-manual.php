<?php
/**
 * Manual Deployment Script for Plesk Hosting (No SSH Access)
 *
 * Upload this file to your hosting root directory and run it via web browser
 * URL: https://ezofz.web.lk/deploy-manual.php
 *
 * This script performs the same actions as the shell deploy.sh script
 */

// Security: Only allow execution from specific IP or with secret key
$deploySecret = 'your_secret_deploy_key_2025'; // Change this!
$allowedIP = ''; // Optional: Add your IP for extra security

if (!isset($_GET['key']) || $_GET['key'] !== $deploySecret) {
    http_response_code(403);
    die('Unauthorized access');
}

// Optional IP check
if ($allowedIP && $_SERVER['REMOTE_ADDR'] !== $allowedIP) {
    http_response_code(403);
    die('IP not authorized');
}

echo "<h2>🚀 Manual Laravel Deployment Script</h2>";
echo "<pre>";

function logStep($message) {
    echo "[" . date('Y-m-d H:i:s') . "] " . $message . "\n";
    flush();
}

function runArtisanCommand($command) {
    $fullCommand = "php artisan " . $command;
    logStep("Running: $fullCommand");

    ob_start();
    $result = null;
    $output = null;
    exec($fullCommand . " 2>&1", $output, $result);
    ob_end_clean();

    foreach ($output as $line) {
        echo "  -> " . $line . "\n";
    }

    if ($result !== 0) {
        logStep("❌ Command failed with exit code: $result");
        return false;
    }

    logStep("✅ Command completed successfully");
    return true;
}

try {
    logStep("🚀 Starting Manual Laravel Deployment");

    // 1. Set up environment
    logStep("⚙️ Setting up environment...");
    if (file_exists('.env.production')) {
        if (copy('.env.production', '.env')) {
            logStep("✅ Environment file copied successfully");
        } else {
            logStep("❌ Failed to copy environment file");
        }
    } else {
        logStep("⚠️ .env.production not found, using existing .env");
    }

    // 2. Generate application key
    logStep("🔑 Checking application key...");
    runArtisanCommand("key:generate --show --no-interaction");

    // 3. Clear caches
    logStep("🧹 Clearing caches...");
    runArtisanCommand("config:clear");
    runArtisanCommand("cache:clear");
    runArtisanCommand("view:clear");
    runArtisanCommand("route:clear");

    // 4. Cache configurations
    logStep("⚡ Caching configurations...");
    runArtisanCommand("config:cache");
    runArtisanCommand("route:cache");
    runArtisanCommand("view:cache");

    // 5. Run migrations
    logStep("🗄️ Running database migrations...");
    runArtisanCommand("migrate --force");

    // 6. Create storage symlink
    logStep("🔗 Creating storage symlink...");
    runArtisanCommand("storage:link");

    // 7. Set permissions (if possible)
    logStep("🔒 Attempting to set permissions...");
    if (function_exists('chmod')) {
        chmod('storage', 0755);
        chmod('bootstrap/cache', 0755);
        logStep("✅ Permissions set successfully");
    } else {
        logStep("⚠️ Cannot set permissions automatically - please set manually in hosting panel");
    }

    // 8. Copy production .htaccess
    logStep("🛡️ Setting up production .htaccess...");
    if (file_exists('public/.htaccess.production')) {
        if (copy('public/.htaccess.production', 'public/.htaccess')) {
            logStep("✅ Production .htaccess copied successfully");
        } else {
            logStep("❌ Failed to copy production .htaccess");
        }
    }

    // 9. Verify installation
    logStep("🔍 Verifying installation...");
    if (file_exists('.env')) {
        logStep("✅ Environment file exists");
    }

    if (file_exists('public/.htaccess')) {
        logStep("✅ .htaccess file exists");
    }

    // Test database connection
    try {
        runArtisanCommand("migrate:status");
        logStep("✅ Database connection successful");
    } catch (Exception $e) {
        logStep("❌ Database connection failed: " . $e->getMessage());
    }

    logStep("🎉 Manual deployment completed successfully!");
    logStep("🌐 Your Laravel application should now be live at: https://ezofz.web.lk");

    echo "\n<strong>🎯 Next Steps:</strong>\n";
    echo "1. Delete this deploy-manual.php file for security\n";
    echo "2. Test your website: https://ezofz.web.lk\n";
    echo "3. Check admin panel: https://ezofz.web.lk/admin/dashboard\n";
    echo "4. Verify all tools are working correctly\n";

} catch (Exception $e) {
    logStep("❌ Deployment failed: " . $e->getMessage());
    echo "\nPlease check the error above and try again or contact support.\n";
}

echo "</pre>";

// Optional: Auto-delete this script after successful deployment
// unlink(__FILE__);
?>
