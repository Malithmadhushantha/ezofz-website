<?php
/**
 * Storage Setup Script for Production
 *
 * This script creates necessary directories and symbolic links for file uploads
 * Run this once on your hosting environment after deployment
 */

// Ensure we're in the right directory
$basePath = __DIR__;
$storagePath = $basePath . '/storage/app/public';
$publicStoragePath = $basePath . '/public/storage';

echo "EZofz Storage Setup Script\n";
echo "========================\n\n";

// Create storage/app/public directories if they don't exist
if (!is_dir($storagePath)) {
    mkdir($storagePath, 0755, true);
    echo "✓ Created storage/app/public directory\n";
} else {
    echo "✓ storage/app/public directory already exists\n";
}

// Create avatars directory
$avatarsPath = $storagePath . '/avatars';
if (!is_dir($avatarsPath)) {
    mkdir($avatarsPath, 0755, true);
    echo "✓ Created storage/app/public/avatars directory\n";
} else {
    echo "✓ avatars directory already exists\n";
}

// Create documents directory
$documentsPath = $storagePath . '/documents';
if (!is_dir($documentsPath)) {
    mkdir($documentsPath, 0755, true);
    echo "✓ Created storage/app/public/documents directory\n";
} else {
    echo "✓ documents directory already exists\n";
}

// Check if public/storage symlink exists
if (!file_exists($publicStoragePath)) {
    // Try to create symbolic link
    if (function_exists('symlink')) {
        if (symlink($storagePath, $publicStoragePath)) {
            echo "✓ Created symbolic link from public/storage to storage/app/public\n";
        } else {
            echo "✗ Failed to create symbolic link - will create directory instead\n";

            // Fallback: copy files manually (not ideal but works on restricted hosting)
            if (!is_dir($publicStoragePath)) {
                mkdir($publicStoragePath, 0755, true);
                echo "✓ Created public/storage directory (manual fallback)\n";
            }

            // Create subdirectories in public/storage
            if (!is_dir($publicStoragePath . '/avatars')) {
                mkdir($publicStoragePath . '/avatars', 0755, true);
                echo "✓ Created public/storage/avatars directory\n";
            }

            if (!is_dir($publicStoragePath . '/documents')) {
                mkdir($publicStoragePath . '/documents', 0755, true);
                echo "✓ Created public/storage/documents directory\n";
            }
        }
    } else {
        echo "✗ symlink() function not available - creating directories manually\n";

        if (!is_dir($publicStoragePath)) {
            mkdir($publicStoragePath, 0755, true);
            echo "✓ Created public/storage directory\n";
        }

        if (!is_dir($publicStoragePath . '/avatars')) {
            mkdir($publicStoragePath . '/avatars', 0755, true);
            echo "✓ Created public/storage/avatars directory\n";
        }

        if (!is_dir($publicStoragePath . '/documents')) {
            mkdir($publicStoragePath . '/documents', 0755, true);
            echo "✓ Created public/storage/documents directory\n";
        }
    }
} else {
    echo "✓ public/storage link/directory already exists\n";
}

// Set appropriate permissions
chmod($storagePath, 0755);
chmod($avatarsPath, 0755);
chmod($documentsPath, 0755);

if (is_dir($publicStoragePath)) {
    chmod($publicStoragePath, 0755);
    if (is_dir($publicStoragePath . '/avatars')) {
        chmod($publicStoragePath . '/avatars', 0755);
    }
    if (is_dir($publicStoragePath . '/documents')) {
        chmod($publicStoragePath . '/documents', 0755);
    }
}

echo "✓ Set directory permissions to 0755\n";

// Test write permissions
$testFile = $avatarsPath . '/test.txt';
if (file_put_contents($testFile, 'test') !== false) {
    unlink($testFile);
    echo "✓ Write permissions test passed\n";
} else {
    echo "✗ Write permissions test failed - check directory ownership and permissions\n";
}

echo "\nSetup completed!\n";
echo "\nIf you're still experiencing upload issues, please:\n";
echo "1. Check that your web server has write permissions to storage/app/public\n";
echo "2. Verify that PHP upload settings allow files up to 2MB\n";
echo "3. Check server error logs for more specific error messages\n";
?>
