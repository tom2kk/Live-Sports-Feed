<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery.parseXML demo</title>
  <script src="fetch-feed.php"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
 
<p id="someElement"></p>
<p id="anotherElement"></p>
 
<?php
    $html = "";
    // URL containing rss feed
    $url = "http://newsrss.bbc.co.uk/rss/sportonline_uk_edition/football/rss.xml";
    $xml = simplexml_load_file($url);
    for($i = 0; $i < 10; $i++){
    
        $title = $xml->channel->item[$i]->title;
        $link = $xml->channel->item[$i]->link;
        $description = $xml->channel->item[$i]->description;
        $pubDate = $xml->channel->item[$i]->pubDate;
        

        $html .= "<a target='_blank' href='$link'><b>$title</b></a>"; // Title of post
        $html .= "<br />$description"; // Description
        $html .= "<br />$pubDate<br /><br />"; // Date Published
    }
    echo "$html<br />";
?>
 
</body>
</html>