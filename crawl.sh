#/bin/bash

domain="https://apps.bluehood.net"

#if [ $# -lt 1 ]; then
#  echo "Syntax: crawl.sh (host)"
#  exit 1;
#fi

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
rm html/index.php html/mix-manifest.json

# sitemap.xml 登録リストの生成
sitemaps=`find html/ -name *.html`
sitemaps=${sitemaps/html\/404.html/}
sitemaps=${sitemaps/html\/50x.html/}

# sitemap.xml の作成
cat << EOS > html/sitemap.xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
EOS
for path in ${sitemaps}
do
  page=${path#html/}
  old=old/${page}
  page=${page/index.html/}

  # 変更チェック
  if [ -e ${old} ]; then
    prevmod=`date "+%s" -r ${old}`

    if diff ${path} ${old} > /dev/null 2>&1; then
      # 変更なしの場合、古い更新日時を継承する
      mv ${old} ${path}
    fi
  else
    # 新規ファイルの場合、前回の更新時間は1970年1月1日とみなす
    prevmod=0
  fi

  # <loc> の生成
  loc=`echo "${domain}/${page}" | recode utf8..html`

  # <changefreq> の生成
  elapsed=$((`date "+%s"` - ${prevmod}))
  if [ ${elapsed} -le $((60*60)) ];then
    changefreq="hourly"
  elif [ ${elapsed} -le $((60*60*24)) ];then
    changefreq="daily"
  elif [ ${elapsed} -le $((60*60*24*7)) ];then
    changefreq="weekly"
  elif [ ${elapsed} -le $((60*60*24*28)) ];then
    changefreq="monthly"
  else
    changefreq="yearly"
  fi

  # <lastmod> の生成
  # W3C Datetime: https://www.w3.org/TR/NOTE-datetime
  lastmod=`date "+%Y-%m-%dT%H:%M:%S%:z" -r ${path}`

  # <url> の登録
  echo "<url><loc>${loc}</loc><lastmod>${lastmod}</lastmod><changefreq>${changefreq}</changefreq></url>" >> html/sitemap.xml
done
echo "</urlset>" >> html/sitemap.xml

# ファイル名置換
for path in `find html/ -name '*.html?*'`
do
  rename="${path//index.html?/_}"
  rename="${rename//.html?/.html_}"
  mv "${path}" "${rename}"
done

# 古いクローリングを削除
rm -rf old/
