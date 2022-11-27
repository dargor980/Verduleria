#!/bin/sh

set -e

echo 'Installing dependencias'
npm install

echo 'Watching changes'
npm run watch
