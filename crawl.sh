#/bin/bash

#if [ $# -lt 1 ]; then
#  echo "Syntax: crawl.sh (host)"
#  exit 1;
#fi

rm -rf html/
cp -rL apps/public apps.bluehood.net
wget -q --mirror --page-requisites --html-extension apps.bluehood.net # -w 1 --random-wait
mv apps.bluehood.net html
rm html/index.php html/mix-manifest.json

for path in `find html/ -name '*.html?*'`
do
  rename="${path//index.html?/_}"
  rename="${rename//.html?/.html_}"
  mv "${path}" "${rename}"
done
