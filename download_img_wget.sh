#!/bin/bash

imageUrl="$1"
destinationFolder="temp"

# Create the destination folder if it doesn't exist
if [ ! -d "$destinationFolder" ]; then
  mkdir "$destinationFolder"
fi

# Extract the image file name from the URL
imageName=$(basename "$imageUrl")

# Generate the full path to save the image
imagePath="$destinationFolder/$imageName"

# Download the image and save it to the specified folder
wget -O "$imagePath" "$imageUrl"

echo "Image saved successfully: $imagePath"
