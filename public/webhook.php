<?php

/**
 * GitHub Webhook Handler for Auto-deployment
 * Place this file in your public directory as webhook.php
 * Configure GitHub webhook to point to: https://ezofz.web.lk/webhook.php
 */

// Security: Verify GitHub webhook secret (recommended)
$webhookSecret = 'your_webhook_secret_here'; // Change this!
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload = file_get_contents('php://input');

// Verify signature (uncomment and set secret for production)
/*
$expectedSignature = 'sha256=' . hash_hmac('sha256', $payload, $webhookSecret);
if (!hash_equals($signature, $expectedSignature)) {
    http_response_code(403);
    exit('Unauthorized');
}
*/

// Parse webhook payload
$data = json_decode($payload, true);

// Only deploy on push to main branch
if ($data['ref'] !== 'refs/heads/main') {
    http_response_code(200);
    exit('Ignoring non-main branch push');
}

// Log the deployment attempt
$logFile = __DIR__ . '/../storage/logs/deployment.log';
$timestamp = date('Y-m-d H:i:s');
file_put_contents($logFile, "[$timestamp] Deployment triggered by GitHub webhook\n", FILE_APPEND | LOCK_EX);

// Change to Laravel root directory
$laravelRoot = dirname(__DIR__);
chdir($laravelRoot);

// Execute deployment script
$output = [];
$returnCode = 0;

// Run deployment in background to avoid timeout
$command = 'nohup ./deploy.sh > /tmp/deploy_output.log 2>&1 & echo $!';
$pid = exec($command);

// Log the process ID
file_put_contents($logFile, "[$timestamp] Deployment started with PID: $pid\n", FILE_APPEND | LOCK_EX);

// Return success response immediately
http_response_code(200);
echo json_encode([
    'status' => 'success',
    'message' => 'Deployment started',
    'timestamp' => $timestamp,
    'pid' => $pid
]);

// Optional: Send notification (email, Slack, etc.)
// You can add notification logic here
?>
