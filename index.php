<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Live Football Feed</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">

</head>
<body>
 
<p id="someElement"></p>
<p id="anotherElement"></p>
<div id="feedTable">
  <?php
      echo gmdate("h:i:s") . "\n";
      
      $html = "";
      
      $url = "http://feeds.reuters.com/reuters/UKTopNews";
      $xml = simplexml_load_file($url);
      $html .= "<table class='table table-hover'><tr><th>Date</th><th>Title</th><th>Description</th></tr>";
      for($i = 0; $i < 10; $i++){
      
          $title = $xml->channel->item[$i]->title;
          $link = $xml->channel->item[$i]->link;
          $description = $xml->channel->item[$i]->description;
          $pubDate = $xml->channel->item[$i]->pubDate;
          
          $html .= "<tr scope='row'>";
          $html .= "<td>$pubDate</td>";
          $html .= "<td><a target='_blank' href='$link'><b>$title</b></a></td>";
          $html .= "<td>$description</td>";
          $html .= "</tr>";
      }
      $html .= "</table>";
      echo "$html<br />";
  ?>
</div>
<script>
  $("document").ready(function(){
    var auto_refresh = setInterval(
    function () {
        $('#feedTable').load('#feedTable');
    }, 1000);
  });
</script>
</body>
</html>