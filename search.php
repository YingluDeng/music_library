<?php
  include_once 'header.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">

    <style>
.button button:hover {
      background: lightpink;
    }
.header {background-color: lightpink;}
.article-container {background-color: lightblue;}

p.a{font-style: italic;}
p.b{font-style: oblique;}
  </style>

  </head>
<body>
<div class="header">
<h1><strong>Search page</h1>
<h2>Your search results:</h2>
<br>
</div>

<div class="article-container">
<?php
      // if(isset($_POST['submit'])){
          if(isset($_POST['search'])) {
          $search = $_POST['search'];
          $sql = "SELECT *
          -- , tr.year, tr.lyrics
                FROM search_page
                WHERE artist_name LIKE '%$search%' OR track_name LIKE '%$search%'
                 -- OR publish_year LIKE '%$search%' OR lyrics LIKE '%$search%'";
//
// -- artist_name LIKE '%?%' OR track_name LIKE '%?%'";
                //Prepared statement
        // $stmt = mysqli_stmt_init($conn);
        // if (!mysqli_stmt_prepare($stmt, $sql)) {
        // echo "SQL error";
        // }else {
        //   mysqli_stmt_bind_param($stmt, "ss", $artist_name, $track_name );
        //   mysqli_stmt_execute($stmt);

          $result = mysqli_query($conn, $sql);
          // $result = mysqli_stmt_get_result($stmt);
          $resultCount = mysqli_num_rows($result);

      if($resultCount > 0){
        // echo '<div style="font-size: 1.25em"> "There are"
        // <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;">'.$resultCount.'</span> results!"</div>";
        // echo "<font size="18" >";
        echo  "<h3><strong>There are ".$resultCount." results!";


        while($row = mysqli_fetch_assoc($result)) {
          echo "<a href='article.php?song=".$row['track_name'].
          "&singer=".$row['artist_name']."'>";
// &year=".$row['publish_year']." &lyrics=".$row['lyrics']."
          echo "<div class='article-box'>";
          echo "<p>".$row['track_name']."</p>";
          echo "<p>".$row['artist_name']."</p>";
          // echo "<p>".$row['publish_year']."</p>";
          // echo "<p>".$row['lyrics']."</p>";
          echo"</div>";
          echo"</a>";

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
