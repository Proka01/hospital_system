<?php
$db = mysqli_connect("localhost", "root", "", "bolnica_baza");
$query = "SELECT * FROM imaging_procedure";
$tbl = mysqli_query($db, $query);
$niz = [];
while ($row = mysqli_fetch_assoc($tbl))
    array_push($niz,
               Array("naziv_img_pcde" => $row["naziv"],
               "id_imgpcd" => $row["id_procedure"])
              );

echo json_encode($niz);
?>