<?php
  include 'dbh.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Details</title>
    <link rel="stylesheet" href="style.css">

<style>
</style>
  </head>
  <body>

<h1>Article page</h1>

<div class="album-container">
  <?php
    if(isset($_GET['song'], $_GET['singer'])) {
        $song = $_GET['song'];
        $singer = $_GET['singer'];
        $sql = "SELECT * FROM music_library.article WHERE track_name='$song'
                  AND artist_name='$singer'";
  // $sql = "SELECT * FROM article Where track_name='$song' AND artist_name='$singer'";
    // $song = mysqli_real_escape_string($conn, $_GET['fp.track_name']);
    // $singer = mysqli_real_escape_string($conn, $_GET['fp.artist_name']);




//Prepared statement
    // $stmt = mysqli_stmt_init($conn);
    // if (!mysqli_stmt_prepare($stmt, $sql)) {
    // echo "SQL error";
    // } else {
    // mysqli_stmt_bind_param($stmt, "ss", $search, $search);
    // mysqli_stmt_execute($stmt);
    // $result = mysqli_stmt_get_result($stmt);

      $result = mysqli_query($conn, $sql);
      //print "<pre>";
      //var_dump($result);
//      $result = mysqli_stmt_get_result($stmt);
      $resultCount = mysqli_num_rows($result);

      if ($resultCount > 0) {
        echo "There are " . $resultCount . " results!";

        while ($row = mysqli_fetch_assoc($result)) {
          //echo "<a href='article.php?song=" .
          //echo $row['track_name'] . "&
          //singer=" . $row['artist_name'] . "'>";
          echo "<div class='article-box'>";
          echo "<p>" . $row['track_name'] . "</p>";
          echo "<p>" . $row['artist_name'] . "</p>";
          // echo "<p>" . $row['publish_year'] . "</p>";
          echo "Lyrics";
          echo "<p>" . $row['lyrics'] . "</p>";
          echo "</div>";
          //echo "</a>";
        }
      } else {
        echo "There are no results matching your search!";
      }
    }
  ?>
</div>

<div class="button">
<button onclick="history.go(-1);">Back </button>
</div>
<br>

</body>
</html>
