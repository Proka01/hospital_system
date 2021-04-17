<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "bolnica_baza");
$br_knjizice = $_POST["br_knjiz"];

$query0 = "SELECT id_pacijenta FROM pacijenti WHERE broj_knjizice = '$br_knjizice' ";
$result0 = mysqli_query($db, $query0);
$row0 = $result0->fetch_row();
$id_pacijenta = $row0[0];

$query1 = "SELECT * FROM pregledi WHERE id_pacijenta = '$id_pacijenta' ";
$result1 = mysqli_query($db, $query1);

$ret = []; // [[pod0],[pod2],[pod3],[pod4],[pod5]] niz podataka pacijenata koji se vraca

if($result1->num_rows > 0)
{
    while ($row = mysqli_fetch_object($result1))
    {
       $ret[]=$row;
    }
}
else
{
    $el = new stdClass();
    $el->podaci = "prazno";
    $ret[]=$el;
}


echo json_encode($ret);
?>