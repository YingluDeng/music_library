<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "music_library";


$conn = mysqli_connect($server, $username, $password, $dbname);
// or die("Could not connect");
// mysql_select_db("music_library") or die("Could not find db!")
//
// //collect
// if(isset($_POST['search'])) {
//   $searchq =  $_POST['search'];
//   $searchq = preg_replace("#[^0-9a-z]#i"," ",$searchq);
//
//   $query = mysql_query("SELECT *
//   -- , tr.year, tr.lyrics
//         FROM front_page
//         WHERE artist_name LIKE '%$searchq%'
//         OR track_name LIKE '%$searchq%'") or die("could not connect") or die("could not search!");
//         $count = mysql_num_rows($query);
//         if($count == 0){
//           $output = 'There was no search results!';
//         }else{
//           while($row = mysql_fetch_array($query)) {
//             $track_name = $row['fp.track_name'];
//             $artist_name = $row['fp.artist_name'];
//             $year = $row['tr.year'];
//             $lyrics = $row['tr.lyrics'];
//
//             $output .= '<div>'.$track_name.' '.$artist_name.'</div>';
//           }
//         }
// }
//
// <?php print("$output"); ?>
