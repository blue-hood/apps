#!/bin/sh

docker run --name bluehood-apps -p 80:80 -v `pwd`/apps.bluehood.local:/usr/share/nginx/html -d static
