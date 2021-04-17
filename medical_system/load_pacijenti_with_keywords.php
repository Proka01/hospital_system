<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "bolnica_baza");
$input = $_POST["keywords"];
$keywords = explode(" ",$input);
$ret = []; // [[pod0],[pod2],[pod3],[pod4],[pod5]] niz podataka pacijenata koji se vraca

for($i = 0; $i < count($keywords); $i++)
{
    $word = $keywords[$i];
    $query = "SELECT * FROM pacijenti WHERE ime LIKE '%{$word}%' OR prezime LIKE '%{$word}%'";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result))
    {
        $id_pacijenta = $row["id_pacijenta"];
        $pac_pregled = new stdClass();
        $pac_pregled->info = $row;
        
        $query1 = "SELECT * FROM pregledi WHERE id_pacijenta = '$id_pacijenta' ";
        $result1 = mysqli_query($db,$query1);

        $pomNiz = [];
        if($result1->num_rows > 0)
        {
            while($row = mysqli_fetch_assoc($result1))
            {
                $pregled = new stdClass();
                $pregled->podaci_pregleda = $row;
                //$pomNiz[]=$pregled;

                $id_pregleda = $row["id_pregleda"];
                $id_doktora = $row["id_doktora"];

                //ucitavanje podataka doktora
                $query2 = "SELECT * FROM doktori
                           WHERE id_doktora = '$id_doktora' ";
                $result2 = mysqli_query($db,$query2);
    
                $podaci_lekara = [];
                while($row2 = mysqli_fetch_object($result2))
                {
                    $podaci_lekara = $row2;
                }
                $pregled->podaci_lekara = $podaci_lekara;

                //ucitavanje lekova
                $query2 = "SELECT naziv FROM pacijent_lek
                        JOIN lekovi USING(id_leka)
                        WHERE id_pregleda = '$id_pregleda' ";
                $result2 = mysqli_query($db,$query2);

                $lekovi = [];
                while($row2 = mysqli_fetch_object($result2))
                {
                    $lekovi[]=$row2;
                }
                $pregled->lekovi = $lekovi;

                // ucitavanje procedura
                $query2 = "SELECT naziv FROM pacijent_procedura
                        JOIN imaging_procedure USING(id_procedure)
                        WHERE id_pregleda = '$id_pregleda' ";
                $result2 = mysqli_query($db,$query2);

                $procedure = [];
                while($row2 = mysqli_fetch_object($result2))
                {
                    $procedure[]=$row2;
                }
                $pregled->procedure = $procedure;

                //ucitavanje lab_analiza
                $query2 = "SELECT naziv FROM pacijent_lab_analize
                        JOIN laboratorijske_analize USING(id_lab_analize)
                        WHERE id_pregleda = '$id_pregleda' ";
                $result2 = mysqli_query($db,$query2);

                $lab_analize = [];
                while($row2 = mysqli_fetch_object($result2))
                {
                    $lab_analize[]=$row2;
                }
                $pregled->lab_analize = $lab_analize;

                $pomNiz[]=$pregled;
            }
        }
        
        $pac_pregled->podaci_o_pregledima = $pomNiz;

        $ret[]=$pac_pregled;
    }

    /*while ($row = mysqli_fetch_object($result))
    {
        $ret[]=$row;
    }*/
}


echo json_encode($ret);

/*
$query = "SELECT * FROM pacijenti";
$result = mysqli_query($db, $query);

$ret = []; // [[pod0],[pod2],[pod3],[pod4],[pod5]] niz podataka pacijenata koji se vraca

while ($row = mysqli_fetch_assoc($result))
{
    $id_pacijenta = $row["id_pacijenta"];
    $pac_pregled = new stdClass();
    $pac_pregled->info = $row;
    
    $query1 = "SELECT * FROM pregledi WHERE id_pacijenta = '$id_pacijenta' ";
    $result1 = mysqli_query($db,$query1);

    $pomNiz = [];
    if($result1->num_rows > 0)
    {
        while($row = mysqli_fetch_object($result1))
        {
            $pregled = new stdClass();
            $pregled->podaci_pregleda = $row;
            $pomNiz[]=$pregled;
        }
    }
    
    $pac_pregled->podaci_o_pregledima = $pomNiz;

    $ret[]=$pac_pregled;
}
*/
?>