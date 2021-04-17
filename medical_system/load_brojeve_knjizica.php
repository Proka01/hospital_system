<?php
$db = mysqli_connect("localhost", "root", "", "bolnica_baza");
$query = "SELECT broj_knjizice FROM pacijenti";
$tbl = mysqli_query($db, $query);
$niz = [];
while ($row = mysqli_fetch_assoc($tbl))
    array_push($niz,
               Array("broj_knjizice" => $row["broj_knjizice"])
              );

echo json_encode($niz);
?>