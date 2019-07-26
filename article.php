<?php
  include 'dbh.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">

<style>
</style>
  </head>
  <body>

<h1>Article page</h1>

<div class="album-container">
  <?php
  $song = $_GET['fp.track_name'];
  $singer = $_GET['fp.artist_name'];
  $sql = "SELECT fp.track_name, fp.artist_name, tr.year, tr.lyrics
                FROM front_page AS fp, tracks AS tr
                WHERE fp.artist_name LIKE'$singer' AND fp.track_name LIKE '$song'";
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
    // $result = mysqli_stmt_get_result($stmt);
    $resultCount = mysqli_num_rows($result);

    if ($resultCount > 0) {
      echo "There are ".$resultCount." results!";

      while ($row = mysqli_fetch_assoc($result)) {
          // echo "<a href='article.php?title=".$row['fp.track_name']."&
          // singer=".$row['fp.artist_name']."'>";
          echo "<div class='article-box'>";
          echo "<p>".$row[fp.track_name]."</p>";
          echo "<p>".$row[fp.artist_name]."</p>";
          echo "<p>".$row[tr.year]."</p>";
          echo "<p>".$row[tr.lyrics]."</p>";
          echo"</div>";
          echo"</a>";
}
      } else {
echo "There are no results matching your search!";
    }

  ?>
</div>

</body>
</html>
