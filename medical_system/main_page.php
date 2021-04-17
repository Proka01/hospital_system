<!DOCTYPE html>
<html>
<head>
  <title>Main page</title>
  <meta charset="utf-8">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
  <style>
    header
    {
      background-color: #0b1b75; width:100%; height: 50px; 
      display:inline-block;  line-height: 3.5; /*line-height uzme velicinu fonta i pomnozi sa 3.5 i tolko doda iznad i ispod texta*/
      color:white;
    }
    a
    {
      color:white;
      margin-left: 1%;
    }
    a:hover
    {
      color:white;
      text-decoration: underline;
    }
    #div_za_sliku
    {
      background-image: url("medicon.png");
      background-size:100% 100%;
      margin-top: 15%;
      width: 100%;
      height:100%;
      margin: 0;
    }
    #right
    {
      padding-left: 2%;
      padding-right: 5%;
      padding-top: 2%;
    }
    #welcome
    {
      font-size: 50px;
    }
    .moj_par2
    {
      font-size: 30px;
      text-decoration: underline;
    }
    .moj_par
    {
      font-size: 20px;
    }
    #podaci
    {
      border-left: 5px solid #c9c7c7;
    }
  </style>

</head>
<body>

<header>
  <a href="diagnosis_page.php">Nalaz /dijagnoza</a>
  <a href="zakazani_pregledi.php">Zakazani pregledi</a>
  <a href="pacijenti.php">Pacijenti</a>
</header>

<div class ="row mt-1" id = "div_za_prikaz" >
    <div id="left" class="col-7 pt-3" style="height:600px;">
      <div id="podaci" class="ml-5 pl-2"></div>
    </div>
    <div id="right" class="col-5" style="height:600px;">
      <div id="div_za_sliku"></div>
    </div>
</div>

<script>
  sessionStorage.setItem("br_knjiz", "");
  sessionStorage.setItem("zak_datum","");
  sessionStorage.setItem("id_pregleda","");

  var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        var niz = JSON.parse(ajax.responseText);
                        var opsti_podaci = niz[0].opsti_podaci;
                        var broj_pregleda = niz[1].broj_pregleda.br_preg;
                        var broj_pacijenata = niz[2].broj_pacijenata.br_pac;
                        var br_zak_preg = niz[3].broj_zakazanih_pregleda.br_zak_preg;
                        console.log(opsti_podaci);
                        console.log(broj_pacijenata);
                        console.log(broj_pregleda);
                        console.log(br_zak_preg);
                        console.log(niz);
                        ///////
                        var ime = opsti_podaci["ime"];
                        var prez = opsti_podaci["prezime"];
                        var dat_rodj = opsti_podaci["datum_rodjenja"];
                        var datum_zaposlenja = opsti_podaci["datum_zaposlenja"];
                        var username = opsti_podaci["korisnicko_ime"];
                        var telefon = opsti_podaci["telefon"];
                        var title = "<strong>Doktore </strong>"+"<strong>"+ime+"</strong>"+" "+"<strong>"+prez+"</strong>"+"<strong> ,dobrodošli! </strong>";
                        var welcome_par = createElement("p","welcome",title,"");
                        var opsti_pod_par = createElement("p","opsti_pod_par","<strong>Opšti podaci lekara:</strong>","moj_par2");
                        var par_ime = createElement("p","par_ime","<strong>Ime: </strong>"+ime,"moj_par");
                        var par_prez = createElement("p","par_prezime","<strong>Prezime: </strong>"+prez,"moj_par");
                        var tel_par = createElement("p","tel_par","<strong>Broj telefona: </strong>"+telefon,"moj_par");
                        var dat_rodj_par = createElement("p","dat_rodj_par","<strong>Datum rođenja: </strong>"+dat_rodj,"moj_par");
                        var dat_zap_par = createElement("p","dat_zap_par","<strong>Datum zaposlenja: </strong>"+datum_zaposlenja,"moj_par");
                        var par_statistika = createElement("p","par_statistika","<strong>Statistički podaci: </strong>","moj_par2");
                        var pac_par = createElement("p","pac_par","<strong>Ukupan broj pacijenata: </strong>"+broj_pacijenata,"moj_par");
                        var preg_par = createElement("p","preg_par","<strong>Ukupan broj održanih pregleda: </strong>"+broj_pregleda,"moj_par");
                        var zak_preg_par = createElement("p","zak_preg_par","<strong>Broj zakazanih pregleda: </strong>"+br_zak_preg,"moj_par");
                        var levi = document.getElementById("podaci");
                        levi.appendChild(welcome_par);
                        levi.appendChild(opsti_pod_par);
                        levi.appendChild(par_ime);
                        levi.appendChild(par_prez);
                        levi.appendChild(tel_par);
                        levi.appendChild(dat_rodj_par);
                        levi.appendChild(dat_zap_par);
                        levi.appendChild(par_statistika);
                        levi.appendChild(pac_par);
                        levi.appendChild(preg_par);
                        levi.appendChild(zak_preg_par);
                    }
                };
                ajax.open("post", "load_doctor_info.php"); 
                ajax.send();
</script>

<script>
  function createElement(elementTag, elementId, html, elementClass)
    {
        var newElement = document.createElement(elementTag);
        newElement.setAttribute('id', elementId);
        newElement.innerHTML = html;
        newElement.setAttribute('class',elementClass);'card w-75'
        return newElement;
    }
</script>

</body>
</html>