# PowerShell Script to Prepare Laravel Project for Manual Upload
Write-Host "🚀 Preparing Laravel project for manual upload..." -ForegroundColor Green

# Clean unnecessary files for production upload
Write-Host "🗑️ Cleaning unnecessary files..." -ForegroundColor Yellow

if (Test-Path "node_modules") {
    Remove-Item "node_modules" -Recurse -Force -ErrorAction SilentlyContinue
    Write-Host "✅ Removed node_modules" -ForegroundColor Green
}

if (Test-Path "vendor") {
    Remove-Item "vendor" -Recurse -Force -ErrorAction SilentlyContinue
    Write-Host "✅ Removed vendor (will be regenerated)" -ForegroundColor Green
}

if (Test-Path ".git") {
    Remove-Item ".git" -Recurse -Force -ErrorAction SilentlyContinue
    Write-Host "✅ Removed .git directory" -ForegroundColor Green
}

if (Test-Path "storage\logs") {
    Remove-Item "storage\logs\*" -Force -ErrorAction SilentlyContinue
    Write-Host "✅ Cleaned log files" -ForegroundColor Green
}

if (Test-Path "bootstrap\cache") {
    Remove-Item "bootstrap\cache\*" -Force -ErrorAction SilentlyContinue
    Write-Host "✅ Cleaned bootstrap cache" -ForegroundColor Green
}

# Create upload package
Write-Host "📦 Creating upload package..." -ForegroundColor Cyan
$timestamp = Get-Date -Format "yyyy-MM-dd_HH-mm"
$zipName = "ezofz-website-production-$timestamp.zip"

# Compress the project
Compress-Archive -Path ".\*" -DestinationPath $zipName -Force

Write-Host "🎉 Upload package created: $zipName" -ForegroundColor Green
$fileSize = [math]::Round((Get-Item $zipName).Length / 1MB, 2)
Write-Host "📊 File size: $fileSize MB" -ForegroundColor White

Write-Host "`n📋 Next Steps:" -ForegroundColor Cyan
Write-Host "1. Upload $zipName to your Plesk /httpdocs folder" -ForegroundColor White
Write-Host "2. Extract the ZIP file in Plesk File Manager" -ForegroundColor White
Write-Host "3. Move all contents to /httpdocs root" -ForegroundColor White
Write-Host "4. Set document root to /httpdocs/public in Plesk" -ForegroundColor White
Write-Host "5. Use Plesk PHP Composer to install dependencies" -ForegroundColor White
Write-Host "6. Run: https://ezofz.web.lk/deploy-manual.php?key=your_secret_deploy_key_2025" -ForegroundColor White

Write-Host "`nReady for upload!" -ForegroundColor Green
