<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "bolnica_baza");
$id_doktora = $_SESSION['id_doktora'];
//opsti podaci doktora
$query1 = "SELECT * FROM doktori WHERE id_doktora = '$id_doktora'";
$result1 = mysqli_query($db, $query1);
//broj odrzanih pregleda doktora
$query2 = "SELECT COUNT(id_doktora) AS 'br_preg' FROM pregledi WHERE id_doktora = '$id_doktora' AND dijagnoza != ''";
$result2 = mysqli_query($db,$query2);
//broj pacijenata doktora
$query3 = "SELECT COUNT(DISTINCT id_pacijenta) AS 'br_pac' FROM pregledi WHERE id_doktora = '$id_doktora' ";
$result3 = mysqli_query($db,$query3);
//broj zakazanih pregleda doktora
$query4 = "SELECT COUNT(id_doktora) AS 'br_zak_preg' FROM pregledi WHERE id_doktora = '$id_doktora' AND dijagnoza = ''";
$result4 = mysqli_query($db,$query4);

$ret = []; // [[pod0],[pod2],[pod3],[pod4]] niz podataka pacijenata koji se vraca

$pom = [];
while($row = mysqli_fetch_object($result1))
{
    $el = new stdClass();
    $el->opsti_podaci = $row;
    $ret[]=$el;
}

$pom = [];
while($row = mysqli_fetch_object($result2))
{
    $el = new stdClass();
    $el->broj_pregleda = $row;
    $ret[]=$el;
}

$pom = [];
while($row = mysqli_fetch_object($result3))
{
    $el = new stdClass();
    $el->broj_pacijenata = $row;
    $ret[]=$el;
}

$pom = [];
while($row = mysqli_fetch_object($result4))
{
    $el = new stdClass();
    $el->broj_zakazanih_pregleda = $row;
    $ret[]=$el;
}

echo json_encode($ret);
?>