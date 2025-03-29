#!/bin/bash

# Change ownership and permissions of the folder
chown -R root:www-data /var/www/public/uploads/
chmod -R 775 /var/www/public/uploads/

# Execute the original command passed to the container
exec "$@"
