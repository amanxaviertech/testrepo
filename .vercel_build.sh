#!/bin/bash
set -e

# Install missing dependencies
apt-get update && apt-get install -y libssl1.0.0 libssl-dev

# Continue with the standard build process
vercel build
