<?php
  $db_host = "localhost";
  $db_user = "blog_user";
  $db_pass = "abhishek";
  $db_name = "my_blog";

  $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
  if (mysqli_connect_error()) {
    echo mysqli_connect_error;
    exit;
  }

  $sql = "SELECT * FROM articles ORDER BY published_at;";

  $results = mysqli_query($connect, $sql);

  if ($results === false) {
    echo mysqli_error($connect);
  } else {
    $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP AND HTML MIXINS</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <section>
      <div class="wrapper">
        <h1 class="logo">Articles</h1>
        <ul>
          <?php foreach($articles as $article): ?>
            <li class="card">
              <h1 class="card-heading"><?= $article["title"] ?></h1>
              <p class="card-text"><?= $article["content"] ?></p>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
    </section>
  </body>
</html>
