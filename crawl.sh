#/bin/bash

#if [ $# -lt 1 ]; then
#  echo "Syntax: crawl.sh (host)"
#  exit 1;
#fi

# クローリング
rm -rf html/
cp -rL apps/public apps.bluehood.net
wget -q --mirror --page-requisites --html-extension apps.bluehood.net # -w 1 --random-wait
mv apps.bluehood.net html
rm html/index.php html/mix-manifest.json

# sitemap.xml の作成
cat << EOS > html/sitemap.xml
<?xml version=”1.0″ encoding=”UTF-8″?>
<urlset xmlns=”http://www.sitemaps.org/schemas/sitemap/0.9″>
EOS

for page in `find html/ -name *.html`
do
  page=${page#html/}
  page=${page/index.html/}

  echo "<url><loc>`echo "https://apps.bluehood.net/${page}" | recode utf8..html`</loc></url>" >> html/sitemap.xml
done

echo "</urlset>" >> html/sitemap.xml

# ファイル名置換
for path in `find html/ -name '*.html?*'`
do
  rename="${path//index.html?/_}"
  rename="${rename//.html?/.html_}"
  mv "${path}" "${rename}"
done
