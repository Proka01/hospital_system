<?php
$db = mysqli_connect("localhost", "root", "", "bolnica_baza");
$query = "SELECT * FROM lekovi";
$tbl = mysqli_query($db, $query);
$niz = [];
while ($row = mysqli_fetch_assoc($tbl))
    array_push($niz,
               Array("naziv_leka" => $row["naziv"],
               "id_leka" => $row["id_leka"])
              );

echo json_encode($niz);
?>