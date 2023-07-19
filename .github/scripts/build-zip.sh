#!/bin/bash
# Inspired by Elementor Releasing Pipeline https://github.com/elementor/elementor
set -eo pipefail

if [[ -z "$PACKAGE_VERSION" ]]; then
	echo "Missing PACKAGE_VERSION env var"
	exit 1
fi

rm -rf node_modules vendor .git .idea .github .husky *.md *.lock .editorconfig .eslintignore .eslintrc .gitignore .stylelintrc composer.json gulpfile.js commitlint.config.js package.json phpcs.xml
cd ./lib/widgets/qu-howtos/ && rm -rf node_modules package.json yarn.lock webpack.config.js

cd ../../..

PLUGIN_ZIP_FILENAME="postaffiliatepro_${PACKAGE_VERSION}.zip"
dir_name="postaffiliatepro"
mkdir "$dir_name"
for file in *; do
    if [ "$file" != "$dir_name" ]; then
        mv "$file" "$dir_name"
    fi
done

zip -r $PLUGIN_ZIP_FILENAME ./postaffiliatepro/ -x "*.zip"
echo "PLUGIN_ZIP_FILENAME=${PLUGIN_ZIP_FILENAME}" >> $GITHUB_ENV
echo "PLUGIN_ZIP_PATH=./**/*" >> $GITHUB_ENV
