#/bin/bash

if [ $# -lt 1 ]; then
  echo "Syntax: crawl.sh (host)"
  exit 1;
fi

rm -rf html/
wget -q -w 1 --random-wait --mirror --page-requisites --html-extension $1
mv $1 html
# ここで sitemap.xml も wget すること。つまり、ルートのリストが必要。

for path in `find html/ -name '*.html?*'`
do
  rename="${path//index.html?/_}"
  rename="${rename//.html?/.html_}"
  mv "${path}" "${rename}"
done
