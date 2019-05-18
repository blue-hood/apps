#/bin/bash

domain="https://apps.bluehood.net"

# クローリング
mv html/ old/ 2> /dev/null
cp -rL apps/public localhost
wget -q --mirror --page-requisites --html-extension localhost
curl -s localhost/404.html -o localhost/404.html
curl -s localhost/50x.html -o localhost/50x.html
mv localhost html

# ドメイン置換
grep -lr 'http://localhost' html/* | xargs sed -i -e "s#http://localhost#${domain}#g"

# 不要ファイルの削除
rm html/index.php html/mix-manifest.json html/storage/.gitignore

# sitemap.xml 登録リストの生成
sitemaps=`find html/ -name *.html`
sitemaps=${sitemaps//html\//}
sitemaps=${sitemaps/404.html/}
sitemaps=${sitemaps/50x.html/}

# https://github.com/blue-hood/static-sitemap
sitemap ${domain} html/ old/ ${sitemaps[@]} > html/sitemap.xml

# ファイル名置換
for path in `find html/ -name '*.html?*'`
do
  rename="${path//index.html?/_}"
  rename="${rename//.html?/.html_}"
  mv "${path}" "${rename}"
done

# 古いクローリングを削除
rm -rf old/
