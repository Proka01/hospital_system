<?php
$db = mysqli_connect("localhost", "root", "", "bolnica_baza");
$ime = $_POST["ime"];
$prezime = $_POST["prez"];
$telefon = $_POST["tel"];
$datum = $_POST["datum"];
$br_knjiz = $_POST["brz_knjiz"];
$query1 = "SELECT * FROM pacijenti WHERE broj_knjizice = '$br_knjiz'";

if (mysqli_num_rows(mysqli_query($db, $query1)) == 0)
{
    $query2 = "INSERT INTO pacijenti (ime, prezime, datum_rodjenja, telefon,broj_knjizice) VALUES('$ime','$prezime','$datum','$telefon','$br_knjiz')";
    mysqli_query($db, $query2);
    $ret[] = array("ispravan" => 0);
    echo json_encode($ret);
}
else
{
    $ret[] = array("ispravan" => 1);
    echo json_encode($ret);
}


/*$db = mysqli_connect("localhost", "root", "", "bolnica_baza");
$ime = $_GET["ime"];
$prezime = $_GET["prez"];
$query = "INSERT INTO pacijenti (ime, prezime) VALUES('$ime','$prezime')";
mysqli_query($db, $query);
*/
?>