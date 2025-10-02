<?php
/**
 * Admin Dashboard Debug Script
 *
 * This script helps debug admin dashboard issues on production
 * Access via: https://ezofz.web.lk/admin-debug.php
 */

// Include Laravel's bootstrap
require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

try {
    echo "<h1>EZofz Admin Dashboard Debug</h1>";
    echo "<h2>Environment Information</h2>";

    // Check environment
    echo "<p><strong>App Environment:</strong> " . env('APP_ENV', 'unknown') . "</p>";
    echo "<p><strong>App Debug:</strong> " . (env('APP_DEBUG') ? 'true' : 'false') . "</p>";
    echo "<p><strong>Database Connection:</strong> " . env('DB_CONNECTION', 'unknown') . "</p>";
    echo "<p><strong>Database Host:</strong> " . env('DB_HOST', 'unknown') . "</p>";
    echo "<p><strong>Database Name:</strong> " . env('DB_DATABASE', 'unknown') . "</p>";

    echo "<h2>Database Connectivity Tests</h2>";

    // Test database connection
    try {
        $pdo = new PDO(
            'mysql:host=' . env('DB_HOST') . ';dbname=' . env('DB_DATABASE'),
            env('DB_USERNAME'),
            env('DB_PASSWORD')
        );
        echo "<p style='color: green;'>✓ Database connection successful</p>";

        // Test tables exist
        $tables = ['users', 'documents', 'categories'];
        foreach ($tables as $table) {
            $stmt = $pdo->query("SELECT COUNT(*) as count FROM $table");
            $result = $stmt->fetch();
            echo "<p style='color: green;'>✓ Table '$table': {$result['count']} records</p>";
        }

    } catch (Exception $e) {
        echo "<p style='color: red;'>✗ Database connection failed: " . $e->getMessage() . "</p>";
    }

    echo "<h2>File System Checks</h2>";

    // Check critical files exist
    $files = [
        'app/Http/Controllers/AdminController.php',
        'app/Models/Document.php',
        'app/Models/User.php',
        'resources/views/admin/dashboard.blade.php',
        'resources/views/admin/layouts/admin.blade.php',
        'public/css/app.css'
    ];

    foreach ($files as $file) {
        if (file_exists(__DIR__ . '/' . $file)) {
            echo "<p style='color: green;'>✓ File exists: $file</p>";
        } else {
            echo "<p style='color: red;'>✗ Missing file: $file</p>";
        }
    }

    echo "<h2>PHP Configuration</h2>";
    echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";
    echo "<p><strong>Memory Limit:</strong> " . ini_get('memory_limit') . "</p>";
    echo "<p><strong>Max Execution Time:</strong> " . ini_get('max_execution_time') . "</p>";

    // Check if Laravel can boot properly
    echo "<h2>Laravel Boot Test</h2>";
    try {
        $app->boot();
        echo "<p style='color: green;'>✓ Laravel application boots successfully</p>";
    } catch (Exception $e) {
        echo "<p style='color: red;'>✗ Laravel boot error: " . $e->getMessage() . "</p>";
    }

} catch (Exception $e) {
    echo "<h1 style='color: red;'>Debug Script Error</h1>";
    echo "<p>Error: " . $e->getMessage() . "</p>";
    echo "<p>File: " . $e->getFile() . "</p>";
    echo "<p>Line: " . $e->getLine() . "</p>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}

echo "<hr>";
echo "<p><strong>Next Steps:</strong></p>";
echo "<ul>";
echo "<li>If database connection fails, check .env file credentials</li>";
echo "<li>If files are missing, ensure proper deployment</li>";
echo "<li>If Laravel boot fails, check server error logs</li>";
echo "<li>After fixing issues, try accessing <a href='/admin/dashboard'>admin dashboard</a></li>";
echo "</ul>";
?>
