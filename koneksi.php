<?php
$connect  = new PDO('mysql:host=localhost;dbname=rss', "root", "");
$query    =    "SELECT * FROM tb_rss ORDER BY id DESC";
$statement     =    $connect->prepare($query);
$statement->execute();
$result   =    $statement->fetchAll();

header("Content-Type: text/xml;charset=iso-8859-1");

$base_url =    "http://localhost/rss/";

echo "<?xml version='1.0' encoding='UTF-8' ?>" . PHP_EOL;
echo "<rss version'2.0'>".PHP_EOL;
echo "<channel>".PHP_EOL;
echo "<title>Feed Title | RSS</title>".PHP_EOL;
echo "<link>".$base_url."index.php</link>".PHP_EOL;
echo "<description>Cloud RSS</description>".PHP_EOL;
echo "<language>en-us</language>".PHP_EOL;

foreach($result as $row){
     $publish_Date  =    date("D, d M Y H:i:s T", strtotime($row["datetime"]));
     $image_size_array   =    get_headers($base_url . "images/".$row["post_image"],1);
     $image_size         =    $image_size_array["Content-length"];
     $image_mime_array   =    getimagesize($base_url . "images/".$row["post_image"]);
     $image_mime         =    $image_mime_array["mime"];

     echo "<item xmlns:dc='ns:1'>".PHP_EOL;
     echo "<title>".$row["post_title"]."</title>".PHP_EOL;
     echo "<link>".$row["post_url"]."/</link>".PHP_EOL;
     echo "<guide>".md5($row["id"])."</guide>".PHP_EOL;
     echo "<pubDate>".$publish_Date."</pubDate>".PHP_EOL;
     echo "<dc:creator>".$row["author"]."</dc:creator>".PHP_EOL;
     echo "<description><![CDATA[".substr($row["post_description"], 0, 300)."]]></description>".PHP_EOL;
     echo "<enclosure url='".$row["post_image"]."' length='".$image_size."' type='".$image_mime."' />".PHP_EOL;
     echo "<category>PHP tutorial</category>".PHP_EOL;
     echo "</item>".PHP_EOL;
}

echo '<channel>'.PHP_EOL;
echo '<rss>'.PHP_EOL;
