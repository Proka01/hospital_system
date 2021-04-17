<?php
//echo json_encode($_POST);
$niz = $_POST["procedure"];
$niz2 = $_POST["lekovi"];
$niz3 = $_POST["analize"];
$procedure = explode(",",$niz);
$lekovi = explode(",", $niz2);
$analize = explode(",",$niz3);
for($i = 0; $i<count($procedure); $i++)
{
    echo $procedure[$i];
}
echo '<br>';
for($i = 0; $i<count($lekovi); $i++)
{
    echo $lekovi[$i];
}
echo '<br>';
for($i = 0; $i<count($analize); $i++)
{
    echo $analize[$i];
}

/*$db = mysqli_connect("localhost", "root", "", "bolnica_baza");
$ime = $_GET["ime"];
$prezime = $_GET["prez"];
$query = "INSERT INTO pacijenti (ime, prezime) VALUES('$ime','$prezime')";
mysqli_query($db, $query);
*/
?>