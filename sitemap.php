<?php
require'_file/_db-connect.php';

$base_url="https://collegewalla.co";
$sitemap_query="SELECT * FROM `college-details`";
$sitemap_result=mysqli_query($connect,$sitemap_query);
header("Content-type: text/xml");

echo '<?xml version="1.0" encoding="UTF-8" ?>'.PHP_EOL;
echo'  <urlset
xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
      http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'.PHP_EOL;
while ($row=mysqli_fetch_assoc($sitemap_result)) {
   echo'<url>'.PHP_EOL;
   echo'<loc>'.$base_url.''.$row['slug_url'].'</loc>'.PHP_EOL;
   echo' <changefreq>daily</changefreq>';
   echo'</url>'.PHP_EOL;
}

echo'</urlset>'.PHP_EOL;

?>
