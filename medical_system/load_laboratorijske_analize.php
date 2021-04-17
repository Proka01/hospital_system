<?php
$db = mysqli_connect("localhost", "root", "", "bolnica_baza");
$query = "SELECT * FROM laboratorijske_analize";
$tbl = mysqli_query($db, $query);
$niz = [];
while ($row = mysqli_fetch_assoc($tbl))
    array_push($niz,
               Array("naziv_lab_analize" => $row["naziv"],
               "id_lab_analize" => $row["id_lab_analize"])
              );

echo json_encode($niz);
?>