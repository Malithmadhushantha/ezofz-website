# PowerShell Script to Prepare Laravel Project for Manual Upload
# Run this in your project root directory

Write-Host "🚀 Preparing Laravel project for manual upload..." -ForegroundColor Green
Write-Host "📅 Started at: $(Get-Date)" -ForegroundColor Yellow

# Function to remove directories safely
function Remove-DirectorySafely {
    param($Path, $Description)
    if (Test-Path $Path) {
        Write-Host "🗑️ Removing $Description..." -ForegroundColor Yellow
        Remove-Item -Path $Path -Recurse -Force -ErrorAction SilentlyContinue
        Write-Host "✅ $Description removed" -ForegroundColor Green
    } else {
        Write-Host "ℹ️ $Description not found (skipping)" -ForegroundColor Gray
    }
}

# Function to create directory if it doesn't exist
function Ensure-Directory {
    param($Path)
    if (!(Test-Path $Path)) {
        New-Item -ItemType Directory -Path $Path -Force | Out-Null
    }
}

try {
    # 1. Clean unnecessary files for production upload
    Write-Host "`n📦 Cleaning project for production upload..." -ForegroundColor Cyan

    Remove-DirectorySafely "node_modules" "Node.js modules"
    Remove-DirectorySafely "vendor" "Composer vendor directory (will be regenerated)"
    Remove-DirectorySafely ".git" "Git repository"
    Remove-DirectorySafely "tests" "Test files"

    # Clean cache and log files
    if (Test-Path "storage\logs") {
        Remove-Item "storage\logs\*" -Force -ErrorAction SilentlyContinue
        Write-Host "🧹 Cleaned log files" -ForegroundColor Green
    }

    if (Test-Path "bootstrap\cache") {
        Remove-Item "bootstrap\cache\*" -Force -ErrorAction SilentlyContinue
        Write-Host "🧹 Cleaned bootstrap cache" -ForegroundColor Green
    }

    # 2. Ensure required directories exist
    Write-Host "`n📁 Ensuring required directories exist..." -ForegroundColor Cyan
    Ensure-Directory "storage\app\public"
    Ensure-Directory "storage\framework\cache"
    Ensure-Directory "storage\framework\sessions"
    Ensure-Directory "storage\framework\views"
    Ensure-Directory "storage\logs"
    Ensure-Directory "bootstrap\cache"

    # 3. Copy production files
    Write-Host "`n⚙️ Setting up production files..." -ForegroundColor Cyan

    if (Test-Path ".env.production") {
        Write-Host "✅ Production environment file ready" -ForegroundColor Green
    } else {
        Write-Host "⚠️ Warning: .env.production not found!" -ForegroundColor Red
    }

    if (Test-Path "public\.htaccess.production") {
        Write-Host "✅ Production .htaccess file ready" -ForegroundColor Green
    } else {
        Write-Host "⚠️ Warning: public\.htaccess.production not found!" -ForegroundColor Red
    }

    # 4. Create upload package
    Write-Host "`n📦 Creating upload package..." -ForegroundColor Cyan
    $timestamp = Get-Date -Format "yyyy-MM-dd_HH-mm"
    $zipName = "ezofz-website-production-$timestamp.zip"

    # Use PowerShell's built-in compression
    $source = Get-Location
    $destination = Join-Path (Get-Location) $zipName

    Write-Host "🗜️ Compressing project files..." -ForegroundColor Yellow
    Compress-Archive -Path "$source\*" -DestinationPath $destination -Force

    # 5. Display results
    Write-Host "`n🎉 Upload package created successfully!" -ForegroundColor Green
    Write-Host "📁 File: $zipName" -ForegroundColor White
    Write-Host "📊 Size: $([math]::Round((Get-Item $zipName).Length / 1MB, 2)) MB" -ForegroundColor White

    Write-Host "`n📋 Next Steps:" -ForegroundColor Cyan
    Write-Host "1. Upload $zipName to your Plesk hosting" -ForegroundColor White
    Write-Host "2. Extract it in /httpdocs directory" -ForegroundColor White
    Write-Host "3. Set document root to /httpdocs/public" -ForegroundColor White
    Write-Host "4. Install Composer dependencies via Plesk" -ForegroundColor White
    Write-Host "5. Run deploy-manual.php via browser" -ForegroundColor White
    Write-Host "6. Configure SSL certificate" -ForegroundColor White

    Write-Host "`n🔗 Important URLs after deployment:" -ForegroundColor Cyan
    Write-Host "• Deployment Script: https://ezofz.web.lk/deploy-manual.php?key=your_secret_deploy_key_2025" -ForegroundColor White
    Write-Host "• Website: https://ezofz.web.lk" -ForegroundColor White
    Write-Host "• Admin Panel: https://ezofz.web.lk/admin/dashboard" -ForegroundColor White

    Write-Host "`n✅ Project preparation completed successfully!" -ForegroundColor Green

} catch {
    Write-Host "`n❌ Error occurred: $($_.Exception.Message)" -ForegroundColor Red
    Write-Host "Please check the error and try again." -ForegroundColor Red
}

Write-Host "`n📅 Completed at: $(Get-Date)" -ForegroundColor Yellow
