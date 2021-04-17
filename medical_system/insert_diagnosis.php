<?php
//echo json_encode($_POST);
session_start();
$db = mysqli_connect("localhost", "root", "", "bolnica_baza");

$id_doktora = $_SESSION['id_doktora'];
$niz = $_POST["procedure"];
$niz2 = $_POST["lekovi"];
$niz3 = $_POST["analize"];
$br_knjizice = $_POST["broj_knjizice"];
$vrsta_pregleda = $_POST["vrsta_pregleda"];
$anamneza = $_POST["anamneza"];
$fiz_nalaz = $_POST["fiz_nalaz"];
$dijagnoza = $_POST["dijagnoza"];
$terapija = $_POST["terapija"];
$sledeci_pregled = $_POST["datum_sled_pregleda"];
$datum = date("yy-m-d");
$procedure = explode(",",$niz);
$lekovi = explode(",", $niz2);
$analize = explode(",",$niz3);
$br_knjiz_iz_sessiona = $_POST["br_knjiz_iz_sessiona"];
$zak_datum_iz_sessiona = $_POST["zak_datum_iz_sessiona"];
$id_pregleda_iz_sessiona = $_POST["id_pregleda"];

/*if("" != trim($niz))
{
    for($i = 0; $i<count($procedure); $i++)
    {
        echo "uso u for ".$i." ";
    }
}
*/


//generisanje procedura, lekova i analiza pokuljenih iz posta
/*for($i = 0; $i<count($procedure); $i++)
{
    echo $procedure[$i];
}
for($i = 0; $i<count($lekovi); $i++)
{
    echo $lekovi[$i];
}
for($i = 0; $i<count($analize); $i++)
{
    echo $analize[$i];
}*/

if($br_knjizice == "")
{
    echo -1;
    exit;
}

//dobijanje id_pacijenta preko knjizice
$query0 = "SELECT id_pacijenta FROM pacijenti WHERE broj_knjizice = '$br_knjizice'";
$result = mysqli_query($db, $query0);
if($result->num_rows > 0)
{
    $row0 = $result->fetch_row();
    $id_pacijenta = $row0[0];
    echo $id_pacijenta;
}
else
{
    echo -1;
    exit;
}

if($zak_datum_iz_sessiona == "")
{
    if($dijagnoza != "") // mogli bi i ostali atributi da se stave da  budu != ""
    {
        $query1 = "INSERT INTO pregledi (vrsta_pregleda,anamneza,fizikalni_nalaz,datum,dijagnoza,terapija,id_doktora,id_pacijenta) VALUES('$vrsta_pregleda','$anamneza','$fiz_nalaz','$datum','$dijagnoza','$terapija','$id_doktora','$id_pacijenta')";
        mysqli_query($db, $query1);
    }

    //dobijanje id_pregleda nakon njegovog kreiranja
    $query2 = "SELECT id_pregleda FROM pregledi WHERE id_doktora = '$id_doktora' AND id_pacijenta = '$id_pacijenta' AND datum = '$datum'";
    $result2 = mysqli_query($db, $query2);
    $row1 = $result2->fetch_row();
    $id_pregleda = $row1[0];
    echo $id_pregleda;

    //upisivanje pac - pcd, pac - anal , pac - lek
    if("" != trim($niz))
    {
        for($i = 0; $i<count($procedure); $i++)
        {
            $id_procedure = $procedure[$i];
            $query3 = "INSERT INTO pacijent_procedura (id_pregleda,id_procedure) VALUES('$id_pregleda','$id_procedure')";
            mysqli_query($db, $query3);
        }
    }

    if("" != trim($niz2))
    {
        for($i = 0; $i<count($lekovi); $i++)
        {
            $id_leka = $lekovi[$i];
            $query4 = "INSERT INTO pacijent_lek (id_pregleda,id_leka) VALUES('$id_pregleda','$id_leka')";
            mysqli_query($db, $query4);
        }
    }

    if("" != trim($niz3))
    {
        for($i = 0; $i<count($analize); $i++)
        {
            $id_lab_anal = $analize[$i];
            $query5 = "INSERT INTO pacijent_lab_analize (id_pregleda,id_lab_analize) VALUES('$id_pregleda','$id_lab_anal')";
            mysqli_query($db, $query5);
        }
    }

    if("" != trim($sledeci_pregled)){
        $query6 = "INSERT INTO pregledi (datum,id_doktora,id_pacijenta) VALUES('$sledeci_pregled','$id_doktora','$id_pacijenta')";
        mysqli_query($db, $query6);
    }
}
else
{
    $query7 = "UPDATE pregledi
               SET vrsta_pregleda = '$vrsta_pregleda',anamneza = '$anamneza',fizikalni_nalaz = '$fiz_nalaz',dijagnoza='$dijagnoza',datum = '$datum',terapija='$terapija' 
               WHERE id_pregleda = '$id_pregleda_iz_sessiona'";

    mysqli_query($db,$query7);
    echo $id_pregleda_iz_sessiona;

    ///upisivanje lekova , proz, analiza
    if("" != trim($niz))
    {
        for($i = 0; $i<count($procedure); $i++)
        {
            $id_procedure = $procedure[$i];
            $query3 = "INSERT INTO pacijent_procedura (id_pregleda,id_procedure) VALUES('$id_pregleda_iz_sessiona','$id_procedure')";
            mysqli_query($db, $query3);
        }
    }

    if("" != trim($niz2))
    {
        for($i = 0; $i<count($lekovi); $i++)
        {
            $id_leka = $lekovi[$i];
            $query4 = "INSERT INTO pacijent_lek (id_pregleda,id_leka) VALUES('$id_pregleda_iz_sessiona','$id_leka')";
            mysqli_query($db, $query4);
        }
    }

    if("" != trim($niz3))
    {
        for($i = 0; $i<count($analize); $i++)
        {
            $id_lab_anal = $analize[$i];
            $query5 = "INSERT INTO pacijent_lab_analize (id_pregleda,id_lab_analize) VALUES('$id_pregleda_iz_sessiona','$id_lab_anal')";
            mysqli_query($db, $query5);
        }
    }

    if("" != trim($sledeci_pregled)){
        $query6 = "INSERT INTO pregledi (datum,id_doktora,id_pacijenta) VALUES('$sledeci_pregled','$id_doktora','$id_pacijenta')";
        mysqli_query($db, $query6);
    }
    //VALUES('$vrsta_pregleda','$anamneza','$fiz_nalaz',
    //'$datum','$dijagnoza','$terapija','$id_doktora','$id_pacijenta')
    //vrsta_pregleda,anamneza,fizikalni_nalaz,datum,dijagnoza,terapija)
}





//$query2 = "SELECT id_pregleda FROM ";

/*$db = mysqli_connect("localhost", "root", "", "bolnica_baza");
$ime = $_GET["ime"];
$prezime = $_GET["prez"];
$query = "INSERT INTO pacijenti (ime, prezime) VALUES('$ime','$prezime')";
mysqli_query($db, $query);
*/
?>