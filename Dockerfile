# Use the Nginx base image
FROM nginx:alpine

# Copy the website files to the Nginx HTML directory
COPY . /usr/share/nginx/html

# Expose port 80 to access the website
EXPOSE 80
