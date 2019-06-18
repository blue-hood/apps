#/bin/bash

domain="https://b-hood.site"

# クローリング
cp -rL apps/public localhost
wget -q --mirror --page-requisites localhost
curl -s localhost/404.html -o localhost/404.html
curl -s localhost/50x.html -o localhost/50x.html
rm -rf html/*
cp -rL localhost/* html/
rm -rf localhost

# ドメイン置換
grep -lr 'http://localhost' html/* | xargs sed -i -e "s#http://localhost#${domain}#g"

# 不要ファイルの削除
rm html/index.php html/mix-manifest.json html/storage/.gitignore

# ファイル名置換
for path in `find html/ -name '*.html?*'`
do
  rename="${path//index.html?/_}"
  rename="${rename//.html?/.html_}"
  mv "${path}" "${rename}"
done
