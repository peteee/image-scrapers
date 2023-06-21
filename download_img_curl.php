<?php
$imageUrl = $argv[1];
$destinationFolder = 'temp';
$cookieValue = 'your_cookie_value';
$userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36';

// Create the destination folder if it doesn't exist
if (!file_exists($destinationFolder)) {
    mkdir($destinationFolder);
}

// Extract the image file name from the URL
$imageName = basename($imageUrl);

// Generate the full path to save the image
$imagePath = $destinationFolder . '/' . $imageName;

// Initialize cURL
$curl = curl_init();

// Set the URL to download
curl_setopt($curl, CURLOPT_URL, $imageUrl);

// Set the cookie
curl_setopt($curl, CURLOPT_COOKIE, "cookie_name=$cookieValue");

// Set the user agent
curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);

// Set the file to save the image
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
curl_setopt($curl, CURLOPT_FILE, fopen($imagePath, 'wb'));

// Execute the cURL request
$response = curl_exec($curl);

// Close cURL
curl_close($curl);

if ($response) {
    echo "Image saved successfully: " . $imagePath;
} else {
    echo "Image download failed.";
}
?>
