<?php
  include_once 'dbh.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">

    <style type="text/css">
/* .search_bar input[type="text"]{
  position:relative;
  left:200%;
  top:25%;
  width:30%;
} */
* {box-sizing: border-box;}

.seach_bar {
  float: right;
  padding: 18px 30px;
}

.seach_bar button {
  background: #ddd;
  font-size: 20px;
  cursor: pointer;
}

.seach_bar button:hover {
  background: lightblue;
}


    /* table, td, tr, th {
      position: relative;
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width:600PX;
    } */

    td, th {
      border: 0px solid;
      text-align: left;
      padding: 8px;
      /* vertical-align:bottom; */
    }

    tr:nth-child(even) {
      background-color: pink;
      text-align: left;
    }


/* .track-container  */
  table, td, tr, th{
      float:left;
      position: relative;
      font-family: arial, sans-serif;
      /* border-collapse: collapse; */
      width : 450px;
      margin: 10;

  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}

    </style>

  </head>
<body>
<div class="seach_bar">
<form action="search.php" method="POST">

  <input type="text" name="search" placeholder="Search by Song...">
  <button type="sumbit" name="submit-search">Search</button>
  <!-- <input type="submit" value="submit" /> -->
</form>
</div>
<!-- <h1>Front page</h1>
<h2>All Albums:</h2>

<div class="album-container">
  <?php
    $sql = "SELECT * FROM album";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

    if ($queryResults > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='album-box'>
            <h3>".$row['Album_id']."</h3>
            <p>".$row['album_name']."</p>

        </div>";
      }
    }
  ?>
</div> -->

<h1>Music library</h1>
<h2>All Tracks:</h2>
<br>

<div class="track-container">
  <?php
    $sql = "SELECT * FROM front_page";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);


    if ($queryResults > 0) {

      while ($row = mysqli_fetch_assoc($result)) {

        echo "<table>";
        echo "<tr><th>SONG</th><th>SINGER</th></tr>";
        // echo "<div class='track-box'>
        //   <table >
        //     <tr>
        //       <th>SONG</th>
        //       <th>SINGER</th>
        //     </tr>
        //     <tr>
        //       <td>".$row['track_name']."</a></td>
        //       <td>".$row['artist_name']."</td>
        //     </tr>
        //     <br>
            // </table>

    echo "<tr onmouseover=\"hilite(this)\" onmouseout=\"lowlite(this)\">
          <td>".$row['track_name']."</td>
          <td>".$row['artist_name']."</td>
          </tr>
          ";

    echo "</table>";
        // </div>";

      }
    }
  ?>
</div>

</body>
</html>
