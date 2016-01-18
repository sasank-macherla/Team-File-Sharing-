<?php

  $filename = $_POST['filename'];
  // do some validation here to ensure id is safe

  $link = mysql_connect("localhost", "host", "sasank");
  mysql_select_db("sasankdb");
  $sql = "SELECT filepath FROM imageinfo WHERE filename=$filename";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);


  ?>
  <!DOCTYPE HTML>
  <html>
  <head>
 <meta http-equiv="Content-Type" content="image/jpg" />
 </head>
  <body>
  <img src="<?php echo $row["filepath"]; ?>" alt="<?php echo $row["filename"]; ?>" width="175" height="200" />
  </body>
  </html>
  