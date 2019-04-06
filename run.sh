#!/bin/sh

docker run --name bluehood-apps -p 8080:80 -v `pwd`/apps.bluehood.local:/usr/share/nginx/html -d static
