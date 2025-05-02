$htmlFiles = @(
    @{Path="logo_placeholder.html"; Output="assets/images/logo.png"; Width=200; Height=60},
    @{Path="banner_placeholder.html"; Output="assets/images/banner.jpg"; Width=1200; Height=500},
    @{Path="product_placeholder.html"; Output="assets/images/product1.jpg"; Width=300; Height=220},
    @{Path="product_placeholder.html"; Output="assets/images/product2.jpg"; Width=300; Height=220},
    @{Path="product_placeholder.html"; Output="assets/images/product3.jpg"; Width=300; Height=220},
    @{Path="about_placeholder.html"; Output="assets/images/about-us.jpg"; Width=400; Height=300}
)

# Check if Edge is installed
$edgePath = "C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe"
if (-not (Test-Path $edgePath)) {
    $edgePath = "C:\Program Files\Microsoft\Edge\Application\msedge.exe"
    if (-not (Test-Path $edgePath)) {
        Write-Host "Microsoft Edge not found. Please install it or update the script with the correct path."
        exit
    }
}

# Create a temporary directory for the screenshots
$tempDir = ".\temp_screenshots"
if (-not (Test-Path $tempDir)) {
    New-Item -ItemType Directory -Path $tempDir | Out-Null
}

# Ensure the images directory exists
if (-not (Test-Path "assets/images")) {
    New-Item -ItemType Directory -Path "assets/images" -Force | Out-Null
}

foreach ($file in $htmlFiles) {
    $fullPath = Resolve-Path $file.Path
    $outputPath = $file.Output
    
    # Get the filename without extension
    $fileNameWithoutExt = [System.IO.Path]::GetFileNameWithoutExtension($file.Path)
    
    # For product files, modify the HTML to show the correct product
    if ($fileNameWithoutExt -eq "product_placeholder") {
        $productNumber = [int]($outputPath -replace ".*product(\d+)\.jpg", '$1')
        $content = Get-Content $file.Path -Raw
        $content = $content -replace '<div id="product\d+" class="product">PRODUCT \d+</div>', "<div id=`"product$productNumber`" class=`"product`">PRODUCT $productNumber</div>"
        $tempFile = "$tempDir\temp_product$productNumber.html"
        Set-Content -Path $tempFile -Value $content
        $fullPath = Resolve-Path $tempFile
    }
    
    # Use Edge in headless mode to capture the screenshot
    $url = "file:///$fullPath"
    $tempScreenshot = "$tempDir\temp_screenshot.png"
    
    # Capture screenshot using Edge in headless mode
    & $edgePath --headless --screenshot="$tempScreenshot" --window-size=$($file.Width),$($file.Height) $url
    
    # Wait for the screenshot to be created
    Start-Sleep -Seconds 2
    
    # Move the screenshot to the final location
    if (Test-Path $tempScreenshot) {
        Move-Item -Path $tempScreenshot -Destination $outputPath -Force
        Write-Host "Created $outputPath"
    } else {
        Write-Host "Failed to create screenshot for $($file.Path)"
    }
}

# Clean up
Remove-Item -Path $tempDir -Recurse -Force
Write-Host "All screenshots created successfully!"
