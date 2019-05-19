#!/bin/sh

docker run --name hood-apps -p 80:80 -v `pwd`/html:/usr/share/nginx/html --restart=always -d static
