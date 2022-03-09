<?php
$feed_url = "http://localhost/rss/index.php";
$object = new DOMDocument();
$object->load($feed_url);
$content = $object->getElementsByTagName("item");
?>

<html>
  <htmllang="en">
    <head>
      <metacharset="UTF-8">
        <metahttp - equiv="X-UA-Compatible" content="IE=edge">
          <metaname="viewport" content="width=device-width, initial-scale=1.0">
            <title> BeritaPerang </title>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">undefined</script>
                  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
               </head>
               <body>
                    <div class="container">
                      <br>
                      <h2 align="center">Berita Dunia</h2>
                      <br>
                      <?php
                              foreach ($content as $row){
                                   echo '<h3 class="text-info>
                                             <a href="' . $row->getElementsByTagName("link")->item(0)->nodeValue . '">' . $row->getElementsByTagName("title")->item(0)->nodeValue . '</a>
                                        </h3>';
                                   echo '<hr />';
                                   echo '<div class="row">
                                             <div class="col-md-3">
                                                  <p>' . $row->getElementsByTagName("putDate")->item(0)->nodeValue . '</p>
                                                  <br />
                                                  <img src="' . $row->getElementsByTagName("enclosure")->item(0)->attributes["url"]->nodeValues . '" class="img-responsive img-thumbnail/>
                                             </div>
                                             <div class="col-md-9">
                                                  <p align="right"><b><i>By ' . $row->getElementsByTagNameNS("ns:1, " * ")->item(0)->nodeValue .'</i></b></p>
                                                  <br />
                                                  <p>' . $row->getElementsByTagName("description")->item(0)->nodeValue . '</p>
                                             </div>
                                        </div>';
                                   echo '<br />';
                                   echo '<span class="labellabel - primary">' .$row->getElementsByTagName("category")->item(0)->nodeValue . </span>';
                                   echo '<br />;
                                   echo '<br />;
                                   echo '<br />;
                              }
                       ?>
                    </div>
                  </body>
                  </html>
