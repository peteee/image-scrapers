<?php
function saveImageFromURL($imageUrl, $destinationFolder)
{
    // Create the destination folder if it doesn't exist
    if (!file_exists($destinationFolder)) {
        mkdir($destinationFolder, 0777, true);
    }

    // Extract the image file name from the URL
    $imageName = basename($imageUrl);

    // Generate the full path to save the image
    $imagePath = $destinationFolder . '/' . $imageName;

    // Download the image and save it to the specified folder
    file_put_contents($imagePath, file_get_contents($imageUrl));

    echo "Image saved successfully: " . $imagePath;
}

// Example usage:
$imageUrl = 'https://example.com/image.jpg';
$destinationFolder = 'temp';

saveImageFromURL($imageUrl, $destinationFolder);
?>
