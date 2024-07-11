#!/bin/bash
set -e

# Install necessary dependencies
apt-get update && apt-get install -y libssl1.0.0 libssl-dev

# Install Composer dependencies
composer install --no-dev --optimize-autoloader --prefer-dist

# Remove apt cache to reduce size
apt-get clean

# Proceed with the standard Vercel build process
# vercel build
