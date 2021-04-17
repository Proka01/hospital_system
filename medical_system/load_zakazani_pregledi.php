<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "bolnica_baza");
$datum = $_POST["datum"];
$id_doktora = $_SESSION['id_doktora'];
$query1 = "SELECT * FROM pregledi WHERE id_doktora = '$id_doktora'  AND datum = '$datum' AND dijagnoza = ''";
$result = mysqli_query($db, $query1);

$ret = []; // [[pod0],[pod2],[pod3],[pod4],[pod5]] niz podataka pacijenata koji se vraca

while ($row = mysqli_fetch_assoc($result))
{
    //echo $row["datum"]." dijagnoza: ".$row["dijagnoza"]." id_pacijenta: ".$row["id_pacijenta"]."<br>";
    $id_pacijenta = $row["id_pacijenta"];
    $zak_datum = $row["datum"];
    $id_pregleda = $row["id_pregleda"];
    $query2 = "SELECT * FROM pacijenti WHERE id_pacijenta = '$id_pacijenta' ";
    $result2 = mysqli_query($db,$query2);
    $podaci_pacijenta = new StdClass(); // podaci jednog pacijenta sa id = $id_pacijenta

    while ($row2 = mysqli_fetch_assoc($result2))
    {
        $podaci_pacijenta->ime = $row2['ime'];
        $podaci_pacijenta->prezime = $row2['prezime'];
        $podaci_pacijenta->telefon = $row2['telefon'];
        $podaci_pacijenta->br_knjiz = $row2['broj_knjizice'];
        $podaci_pacijenta->datum_rodjenja = $row2['datum_rodjenja'];
        //echo $row2["ime"]." ".$row2["prezime"]." ".$row2["telefon"]."<br>";
    }
    $podaci_pacijenta->zak_datum = $zak_datum;
    $podaci_pacijenta->id_pregleda = $id_pregleda; // novo
    $el = new stdClass();
    $el->podaci = $podaci_pacijenta;
    $ret[]=$el;
}

echo json_encode($ret);

/*$niz = [];
while ($row = mysqli_fetch_assoc($tbl))
    array_push($niz,
               Array("naziv_lab_analize" => $row["naziv"],
               "id_lab_analize" => $row["id_lab_analize"])
              );

echo json_encode($niz);*/
?>