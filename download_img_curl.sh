#!/bin/bash

imageUrl="$1"
destinationFolder="temp"
cookieValue="your_cookie_value"
userAgent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36"

# Create the destination folder if it doesn't exist
if [ ! -d "$destinationFolder" ]; then
  mkdir "$destinationFolder"
fi

# Extract the image file name from the URL
imageName=$(basename "$imageUrl")

# Generate the full path to save the image
imagePath="$destinationFolder/$imageName"

# Download the image and save it to the specified folder
curl -A "$userAgent" -b "cookie_name=$cookieValue" -o "$imagePath" "$imageUrl"

echo "Image saved successfully: $imagePath"
