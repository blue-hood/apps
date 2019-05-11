#!/bin/sh

docker run --name bluehood-apps -p 80:80 -v `pwd`/html:/usr/share/nginx/html --restart=always -d static
