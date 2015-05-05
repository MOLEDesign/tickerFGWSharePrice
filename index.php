<?php

$shareprice=file_get_contents("shareprice.json");

$sharepriceData=json_decode($shareprice);

$date = date("D, j M Y G:i:s O");

header('Content-type: text/xml');

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<rss version=\"2.0\">\n";
echo "<channel>\n";
echo "<lastBuildDate>$date</lastBuildDate>\n";
echo "<pubDate>$date</pubDate>\n";
echo "<title>FGW Shareprice</title>\n";
echo "<description><![CDATA[[FGW Shareprice Summary]]]></description>\n";
echo "<link>http://www.firstgroup.com</link>\n";
echo "<language>English</language>\n";
echo "<managingEditor>morgan.leecy@firstgroup.com</managingEditor>\n";
echo "<webMaster>morgan.leecy@firstgroup.com</webMaster>\n";


$currentPrice = $sharepriceData->Bid;
$dailyChange = $sharepriceData->PercentChange;
$dailyLow = $sharepriceData->DaysLow;
$dailyHigh = $sharepriceData->DaysHigh;
$yearLow = $sharepriceData->YearLow;
$yearHigh = $sharepriceData->YearHigh;

$description = "Daily Low : $dailyLow<br />Daily High : $dailyHigh<br />Years Low : $yearLow<br />Years High : $yearHigh";

echo "<item>\n";
echo "<title>Current Price : $currentPrice (change $dailyChange)</title>\n";
echo "<description>".htmlspecialchars($description)."</description>\n";
echo "</item>\n";

echo "</channel>";
echo "</rss>";


