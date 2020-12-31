#!/bin/sh
rm -rf backup
mkdir -p backup/js
mkdir -p backup/css
mkdir -p backup/php
cd js
echo "**** JavaScript files ****"
for file in `find . -name "*.js"`
do
    cp --parents $file ../backup/js
    java -jar ../yuicompressor-2.4.8.jar --type js -o $file $file
    mv $file "${file::-3}.min.js"
    echo "- Minified JS file: $file"
done
cd ../css
echo "**** CSS files ****"
for file in `find . -name "*.css"`
do
    cp --parents $file ../backup/css
    java -jar ../yuicompressor-2.4.8.jar --type css -o $file $file
    mv $file "${file::-4}.min.css"
    echo "- Minified CSS file: $file"
done
cd ..
echo "**** PHP files ****"
for file in `find . -type d \( -path ./params -o -path ./functions \) -prune -o -name "*.blade.php" -print`
do
    cp --parents $file backup/php
    java PHPMinifyer $file
    echo "- Minified PHP: $file"
done
