<!DOCTYPE html>
<html>
<head>
    <title>Pacijenti</title>
    <meta charset="utf-8">
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!-- NOVO ispod 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <style>
body {font-family: Arial, Helvetica, sans-serif;}

.blokovi
{
    margin-bottom: 1rem;
    border:1px solid blue;
    background-color: #c9dbff;
    min-height: 60px;
}


.spacingDiv
{
    height: 40px;
}

/* The Modal (background) */
.modalmy {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  color: red;
  float: right;
  padding-left: 95%;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.div_za_dugme{
    padding-top: 5%;
    padding-left: 60%;
}
</style>
</head>
<body>
<header class = "row" style="width: 100%; height:50px;background-color: #0b1b75; ">
    <div class = "col-2 mt-2" style="font-size: 20px; color:white; text-align:center;" >Pacijenti</div>
    <div class = "col-7"></div>
    <div class = "col-3" style=" line-height: 2;">
        <label for="ime" style="color: white; font-size:20px;" class="mt-1">Pretraži: </label>
        <input type="text" id="ime_pacijenta" name="ime_pacijenta" placeholder="ime_pacijenta" class="mt-1">
    </div>
</header>


<div id = "div_za_prikaz" style="width:80%; margin:auto"></div>

<script>
    /*var lol = document.getElementById("kita");
    lol.addEventListener("click",function(){
        var modal = document.getElementById("myModal");
        console.log("kliknuo");
    });*/
    console.log("USOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO");
        //ucitavanje odma pri ulasku na stranicu
            var pacijenti_ajax = new XMLHttpRequest();
            pacijenti_ajax.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) 
                        {
                            console.log("success! ucitan pri ulasku");
                            console.log("ispis podataka:");
                            var podaci_pacijenata = JSON.parse(pacijenti_ajax.responseText);
                            console.log(podaci_pacijenata);
                            var parent = document.getElementById("div_za_prikaz");
                            parent.textContent = "";
    
                            for(var i = 0; i < podaci_pacijenata.length; i++)
                            {
                                var pacijent = podaci_pacijenata[i].info;
                                var card = createElement("div","pregled-"+i,"",'');
                                var cardTitle = formatTitleHTML(pacijent["ime"],pacijent["prezime"]);
                                var infoTitle = formatInfoHTML(pacijent["broj_knjizice"],pacijent["telefon"],pacijent["datum_rodjenja"]);
                                
                                //novo
                                var inside_card = createElement("div","inside_pregled-"+i,"",'row');
                                var inside_card_left = createElement("div","inside_pregledi_left"+i,"",'col-md-8 mb-1');
                                var inside_card_left_name = createElement("div","inside_card_left_name"+i,cardTitle,"mb-1");
                                var inside_card_left_info = createElement("div","inside_card_left_info"+i,infoTitle,"mb-1");
                                var inside_card_right = createElement("div","inside_card_right"+i,"",'col-md-4');
                                var inside_card_right_button_div = createElement("div","inside_card_right_button_div-"+i,"","div_za_dugme");
                                //dugme za collapse div
                                var inside_card_right_button = createElement("button","button-"+i,"Nalazi","btn btn-primary");
                                inside_card_right_button.setAttribute('data-toggle','collapse');
                                inside_card_right_button.setAttribute('data-target',"#collapseDiv-"+i);
                                inside_card_right_button.setAttribute('aria-expanded',"false");
                                inside_card_right_button.setAttribute('aria-controls',"collapseDiv-"+i);
                                inside_card_right_button.setAttribute('type','button');

                                var collapseDiv = createElement("div","collapseDiv-"+i,"",'collapse');
                                var inside_collapseDiv = createElement("div","inside_collapseDiv-"+i,"",'card card-body')
                                collapseDiv.appendChild(inside_collapseDiv);
                                
                                
                                
                                ///generisanje sadrzaja collapse div-a za preglede
                                var svi_pregledi_pacijenta = podaci_pacijenata[i].podaci_o_pregledima;
                                console.log("/////////////////////");
                                console.log(svi_pregledi_pacijenta);
                                
                                for(var j = 0; j < svi_pregledi_pacijenta.length; j++)
                                {
                                    var podaci_jednog_pregleda = svi_pregledi_pacijenta[j].podaci_pregleda;
                                    var datum = podaci_jednog_pregleda["datum"];
                                    var dijagnoza = podaci_jednog_pregleda["dijagnoza"];
                                    var anamneza = podaci_jednog_pregleda["anamneza"];
                                    var prvi_kontrolni = podaci_jednog_pregleda["vrsta_pregleda"];
                                    var ime = pacijent["ime"];
                                    var prezime = pacijent["prezime"];
                                    var br_knjiz = pacijent["broj_knjizice"];
                                    var html = "Pacijent "+ime+" "+prezime+" pregledan je datuma "+datum+". Pregled je bio "+prvi_kontrolni+".";
                                    var lekovi = svi_pregledi_pacijenta[j].lekovi;
                                    console.log("Lekovi: ");
                                    console.log(lekovi);
                                    var procedure = svi_pregledi_pacijenta[j].procedure;
                                    console.log("Procedure: ");
                                    console.log(procedure);
                                    var lab_analize = svi_pregledi_pacijenta[j].lab_analize;
                                    console.log("Lab_analize: ");
                                    console.log(lab_analize);
                                    var podaci_doktora = svi_pregledi_pacijenta[j].podaci_lekara;
                                    console.log("Podaci doktora: ");
                                    console.log(podaci_doktora);

                                    //modal divs
                                    /*var modalDiv = createElement("div",'myModal:'+i+":"+j,"","modal fade");
                                    modalDiv.setAttribute("role","dialog");
                                    var modalDiv_dialog = createElement("div","modalDiv_dialog:"+i+":"+j,"","");
                                    var modalDiv_content = createElement("div","modalDiv_content:"+i+":"+j,"","");
                                    var modalDiv_header = createElement("div","modalDiv_header:"+i+":"+j,"","");
                                    var modalDiv_close_button = createElement("button","modalDiv_close_button:"+i+":"+j,"&times;","");
                                    modalDiv_close_button.setAttribute('data-dismiss','modal');
                                    var modalDiv_body = createElement("div","modalDiv_body:"+i+":"+j,"","");
                                    var modalDiv_footer = createElement("div","modalDiv_footer:"+i+":"+j,"","");
                                    var modalDiv_footer_button = createElement("button","modalDiv_footer_button:"+i+":"+j,"Close","");
                                    modalDiv_footer_button.setAttribute('data-dismiss','modal');*/

                                    //var content = "<p>Dijagnoza: "+dijagnoza+"</p>"+"<br>"+"<p>Anmneza: "+anamneza+"</p>"+"<br>";
                                    var content = generate_Nalaz(podaci_jednog_pregleda,podaci_doktora,pacijent,lekovi,procedure,lab_analize);
                                    console.log("nalaz:");
                                    console.log(content);
                                    var modal = createElement("div","myModal:"+i+":"+j,"","modalmy");
                                    var span = createElement("span","span:"+i+":"+j,"&times;","close");
                                    var modalContent = createElement("div","modalContent:"+i+":"+j,"","modal-content");
                                    var nalazDiv = createElement("div","nalaz:"+i+":"+j,"","");
                                    nalazDiv.appendChild(content);
                                    modalContent.appendChild(span);
                                    modalContent.appendChild(nalazDiv);
                                    modal.appendChild(modalContent);
                                    //modal.appendChild(modalContent);

                                    //kraj modal div-ova
                                    
                                    if(dijagnoza != "") // jer dijagnoza uvek mora da se popuni
                                    {
                                        var paragraf = createElement("p","paragraf-"+i+":"+j,html,'');
                                        var icon = createElement("i","icon:"+i+":"+j,"",'fas fa-book-medical fa-lg');  // mozda ce morati van ovog if-a
                                        //icon.setAttribute('data-toggle','modal');
                                        //icon.setAttribute('data-target','#myModal:'+i+":"+j);
                                        paragraf.appendChild(icon);
                                        inside_collapseDiv.appendChild(paragraf);
                                        //inside_collapseDiv.appendChild(icon);
                                        card.appendChild(modal);
                                        console.log("karticaaaaaaaaaaa");
                                        console.log(card);
                                        /*       
                                        modalDiv_header.innerHTML = "Nalaz pacijenta: "+ime+" "+prezime+" ,za datum: "+datum;
                                        modalDiv_header.appendChild(modalDiv_close_button);
                                        modalDiv_footer.appendChild(modalDiv_footer_button);
                                        modalDiv_body.innerHTML = "Dijagnoza: \n"+dijagnoza;
                                        modalDiv_dialog.appendChild(modalDiv_header);
                                        modalDiv_dialog.appendChild(modalDiv_body);
                                        modalDiv_dialog.appendChild(modalDiv_footer);
                                        modalDiv.appendChild(modalDiv_dialog);
                                        card.appendChild(modalDiv);
                                        */

                                    }
                                }
                                if(svi_pregledi_pacijenta.length == 0) inside_collapseDiv.innerHTML = "Pacijent nema zabelezenih pregleda.";

                                ///kraj collapse generisanja

                                if(i%2 == 0)
                                {
                                    inside_card.style = 'background-color:#abbeff;'
                                }
                                else
                                {
                                    inside_card.style = 'background-color:#cfdaff;'
                                }
                                inside_card_right_button_div.appendChild(inside_card_right_button);
                                inside_card_right.appendChild(inside_card_right_button_div);
                                inside_card_left.appendChild(inside_card_left_name);
                                inside_card_left.appendChild(inside_card_left_info);
                                inside_card.append(inside_card_left);
                                inside_card.appendChild(inside_card_right);
                                card.appendChild(inside_card);        
                                card.appendChild(collapseDiv);                        
                                parent.appendChild(card);
                            }
                            
                            
                        }
                    };
        pacijenti_ajax.open("POST", "load_pacijenti.php", true);
        pacijenti_ajax.send();
        var ime_prezime = document.getElementById("ime_pacijenta");
        

        ime_prezime.addEventListener('input', function (evt) 
        {
            var input = this.value;
            var formData = new FormData();
            formData.append("keywords", input);

            var pacijenti_ajax = new XMLHttpRequest();
            pacijenti_ajax.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) 
                        {
                            console.log("success! ucitan pri pritisku na dugme");
                            console.log("ispis podataka: na promenu");
                            var podaci_pacijenata = JSON.parse(pacijenti_ajax.responseText);
                            console.log(podaci_pacijenata);
                            var parent = document.getElementById("div_za_prikaz");
                            parent.textContent = "";
                            for(var i = 0; i < podaci_pacijenata.length; i++)
                            {
                                var pacijent = podaci_pacijenata[i].info;
                                var card = createElement("div","pregled-"+i,"",'');
                                var cardTitle = formatTitleHTML(pacijent["ime"],pacijent["prezime"]);
                                var infoTitle = formatInfoHTML(pacijent["broj_knjizice"],pacijent["telefon"],pacijent["datum_rodjenja"]);

                                //novo
                                var inside_card = createElement("div","inside_pregled-"+i,"",'row');
                                var inside_card_left = createElement("div","inside_pregledi_left"+i,"",'col-md-8 mb-1');
                                var inside_card_left_name = createElement("div","inside_card_left_name"+i,cardTitle,"mb-1");
                                var inside_card_left_info = createElement("div","inside_card_left_info"+i,infoTitle,"mb-1");
                                var inside_card_right = createElement("div","inside_card_right"+i,"",'col-md-4');
                                var inside_card_right_button_div = createElement("div","inside_card_right_button_div-"+i,"","div_za_dugme");
                                //var extraDiv = createElement("div","extraDiv-"+i,"<br>","");
                                //dugme
                                var inside_card_right_button = createElement("button","button-"+i,"Nalazi","btn btn-primary");
                                inside_card_right_button.setAttribute('data-toggle','collapse');
                                inside_card_right_button.setAttribute('data-target',"#collapseDiv-"+i);
                                inside_card_right_button.setAttribute('aria-expanded',"false");
                                inside_card_right_button.setAttribute('aria-controls',"collapseDiv-"+i);
                                inside_card_right_button.setAttribute('type','button');

                                var collapseDiv = createElement("div","collapseDiv-"+i,"",'collapse');
                                var inside_collapseDiv = createElement("div","inside_collapseDiv-"+i,"",'card card-body')
                                collapseDiv.appendChild(inside_collapseDiv);
                                
                                
                                
                                ///generisanje sadrzaja collapse div-a za preglede
                                var svi_pregledi_pacijenta = podaci_pacijenata[i].podaci_o_pregledima;
                                console.log("/////////////////////");
                                console.log(svi_pregledi_pacijenta);
                                
                                for(var j = 0; j < svi_pregledi_pacijenta.length; j++)
                                {
                                    var podaci_jednog_pregleda = svi_pregledi_pacijenta[j].podaci_pregleda;
                                    var datum = podaci_jednog_pregleda["datum"];
                                    var dijagnoza = podaci_jednog_pregleda["dijagnoza"];
                                    var anamneza = podaci_jednog_pregleda["anamneza"];
                                    var prvi_kontrolni = podaci_jednog_pregleda["vrsta_pregleda"];
                                    var ime = pacijent["ime"];
                                    var prezime = pacijent["prezime"];
                                    var br_knjiz = pacijent["broj_knjizice"];
                                    var html = "Pacijent "+ime+" "+prezime+" pregledan je datuma "+datum+". Pregled je bio "+prvi_kontrolni+".";
                                    var lekovi = svi_pregledi_pacijenta[j].lekovi;
                                    console.log("Lekovi: ");
                                    console.log(lekovi);
                                    var procedure = svi_pregledi_pacijenta[j].procedure;
                                    console.log("Procedure: ");
                                    console.log(procedure);
                                    var lab_analize = svi_pregledi_pacijenta[j].lab_analize;
                                    console.log("Lab_analize: ");
                                    console.log(lab_analize);
                                    var podaci_doktora = svi_pregledi_pacijenta[j].podaci_lekara;
                                    console.log("Podaci doktora: ");
                                    console.log(podaci_doktora);
                                    //modal divs
                                    /*var modalDiv = createElement("div",'myModal:'+i+":"+j,"","modal fade");
                                    modalDiv.setAttribute("role","dialog");
                                    var modalDiv_dialog = createElement("div","modalDiv_dialog:"+i+":"+j,"","");
                                    var modalDiv_content = createElement("div","modalDiv_content:"+i+":"+j,"","");
                                    var modalDiv_header = createElement("div","modalDiv_header:"+i+":"+j,"","");
                                    var modalDiv_close_button = createElement("button","modalDiv_close_button:"+i+":"+j,"&times;","");
                                    modalDiv_close_button.setAttribute('data-dismiss','modal');
                                    var modalDiv_body = createElement("div","modalDiv_body:"+i+":"+j,"","");
                                    var modalDiv_footer = createElement("div","modalDiv_footer:"+i+":"+j,"","");
                                    var modalDiv_footer_button = createElement("button","modalDiv_footer_button:"+i+":"+j,"Close","");
                                    modalDiv_footer_button.setAttribute('data-dismiss','modal');*/

                                    var content = generate_Nalaz(podaci_jednog_pregleda,podaci_doktora,pacijent,lekovi,procedure,lab_analize);
                                    console.log("nalaz:");
                                    console.log(content);
                                    var modal = createElement("div","myModal:"+i+":"+j,"","modalmy");
                                    var span = createElement("span","span:"+i+":"+j,"&times;","close");
                                    var modalContent = createElement("div","modalContent:"+i+":"+j,"","modal-content");
                                    var nalazDiv = createElement("div","nalaz:"+i+":"+j,"","");
                                    nalazDiv.appendChild(content);
                                    modalContent.appendChild(span);
                                    modalContent.appendChild(nalazDiv);
                                    modal.appendChild(modalContent);
                                    //modal.appendChild(modalContent);

                                    //kraj modal div-ova
                                    
                                    if(dijagnoza != "") // jer dijagnoza uvek mora da se popuni
                                    {
                                        var paragraf = createElement("p","paragraf-"+i+":"+j,html,'');
                                        var icon = createElement("i","icon:"+i+":"+j,"",'fas fa-book-medical fa-lg');  // mozda ce morati van ovog if-a
                                        //icon.setAttribute('data-toggle','modal');
                                        //icon.setAttribute('data-target','#myModal:'+i+":"+j);
                                        paragraf.appendChild(icon);
                                        inside_collapseDiv.appendChild(paragraf);
                                        //inside_collapseDiv.appendChild(icon);
                                        card.appendChild(modal);
                                        /*       
                                        modalDiv_header.innerHTML = "Nalaz pacijenta: "+ime+" "+prezime+" ,za datum: "+datum;
                                        modalDiv_header.appendChild(modalDiv_close_button);
                                        modalDiv_footer.appendChild(modalDiv_footer_button);
                                        modalDiv_body.innerHTML = "Dijagnoza: \n"+dijagnoza;
                                        modalDiv_dialog.appendChild(modalDiv_header);
                                        modalDiv_dialog.appendChild(modalDiv_body);
                                        modalDiv_dialog.appendChild(modalDiv_footer);
                                        modalDiv.appendChild(modalDiv_dialog);
                                        card.appendChild(modalDiv);
                                        */

                                    }
                                }
                                if(svi_pregledi_pacijenta.length == 0) inside_collapseDiv.innerHTML = "Pacijent nema zabelezenih pregleda.";

                                ///kraj collapse generisanja

                                if(i%2 == 0)
                                {
                                    inside_card.style = 'background-color:#abbeff;'
                                }
                                else
                                {
                                    inside_card.style = 'background-color:#cfdaff;'
                                }
                                inside_card_right_button_div.appendChild(inside_card_right_button);
                                inside_card_right.appendChild(inside_card_right_button_div);
                                inside_card_left.appendChild(inside_card_left_name);
                                inside_card_left.appendChild(inside_card_left_info);
                                inside_card.append(inside_card_left);
                                inside_card.appendChild(inside_card_right);
                                card.appendChild(inside_card);        
                                card.appendChild(collapseDiv);   
                                //card.appendChild(extraDiv);                     
                                parent.appendChild(card);
                            }
                            
                            
                        }
                    };
        pacijenti_ajax.open("POST", "load_pacijenti_with_keywords.php", true);
        pacijenti_ajax.send(formData);

        });

    function addElement(parentId, elementTag, elementId, html, elementClass) 
    {
        var p = document.getElementById(parentId);
        var newElement = document.createElement(elementTag);
        newElement.setAttribute('id', elementId);
        newElement.innerHTML = html;
        newElement.setAttribute('class',elementClass);
        p.appendChild(newElement);
    }

    function createElement(elementTag, elementId, html, elementClass)
    {
        var newElement = document.createElement(elementTag);
        if(elementId != "") newElement.setAttribute('id', elementId);
        newElement.innerHTML = html;
        if(elementClass != "") newElement.setAttribute('class',elementClass);
        return newElement;
    }

    function generate_Nalaz(podaci_pregleda,podaci_doktora,podaci_pacijenta,lekovi,procedure,lab_analize)
    {
        var container = createElement("div","","","moj_container"); // za sada mu ne dodeljujes id, ako zatreba nije problem dodeliti ga
        var ime_pac = podaci_pacijenta["ime"];
        var prez_pac = podaci_pacijenta["prezime"];
        var ime_doc = podaci_doktora["ime"];
        var prez_doc = podaci_doktora["prezime"];
        var datum = podaci_pregleda["datum"];
        var anamneza = podaci_pregleda["anamneza"];
        var fizikalni_nalaz = podaci_pregleda["fizikalni_nalaz"];
        var dijagnoza = podaci_pregleda["dijagnoza"];
        var terapija = podaci_pregleda["terapija"];
        var tip_pregleda = podaci_pregleda["vrsta_pregleda"];

        var div_podaci01 = createElement("div","","","nalaz_stavke");
        var p_pacijent = createElement("p","","<strong>Pacijent: </strong>"+ime_pac+" "+prez_pac,"moj_paragraf display-4");
        var p_datum_pregleda = createElement("p","","<strong>Datum pregleda: </strong>"+datum,"moj_paragraf");
        var p_tip_pregleda = createElement("p","","<strong>Vrsta pregleda: </strong>"+tip_pregleda,"moj_paragraf");
        var str_proc = "";
        for(var i = 0; i < procedure.length; i++)
        {  
            //console.log("PROOOOOOOOOOOOOOOOOCEEEEEEDUREEEE"+ime_pac);
            //console.log(procedure[i]);
            var str = procedure[i].naziv;
            if(i != procedure.length-1) str_proc+=str+" ,";
            else str_proc+=str+" ."
        }
        var p_proc = createElement("p","","<strong>Pacijentu je rečeno da obavi sledeće \n imageing-procedure: </strong>"+str_proc,"moj_paragraf");

        div_podaci01.appendChild(p_pacijent);
        div_podaci01.appendChild(p_datum_pregleda);
        div_podaci01.appendChild(p_tip_pregleda);
        if(str_proc != "") div_podaci01.appendChild(p_proc);
        container.appendChild(div_podaci01);
        //////////////////////////
        var div_podaci02 = createElement("div","","","nalaz_blok");
        var p_anamneza = createElement("p","","<strong>Anamneza:</strong>","mb-0");
        var section_anamneza = createElement("section","",anamneza,"blokovi shadow p-3");
        var p_fizikalni_nalaz = createElement("p","","<strong>Fizikalni nalaz:</strong>","mb-0");
        var section_fizikalni_nalaz = createElement("section","",fizikalni_nalaz,"blokovi shadow p-3");
        div_podaci02.appendChild(p_anamneza);
        div_podaci02.appendChild(section_anamneza);
        div_podaci02.appendChild(p_fizikalni_nalaz);
        div_podaci02.appendChild(section_fizikalni_nalaz);
        container.appendChild(div_podaci02);
        ///////////////////////////////
        var div_podaci03 = createElement("div","","","nalaz_stavke");
        var str_lab_analize = "";
        for(var i = 0; i < lab_analize.length; i++)
        {
            var str = lab_analize[i].naziv;
            if(i != lab_analize.length-1) str_lab_analize+=str+" ,";
            else str_lab_analize+=str+" ."
        } 
        var p_lab_analize = createElement("p","","<strong>Pacijent je radio sledeće laboratorijske \n analize: </strong>"+str_lab_analize,"moj_paragraf");
        div_podaci03.appendChild(p_lab_analize);
        if(str_lab_analize != "") {container.appendChild(div_podaci03);}
        /////////////////////////////////
        var div_podaci04 = createElement("div","","","nalaz_blok");
        var p_dijagnoza = createElement("p","","<strong>Dijagnoza:</strong>","mb-0");
        var section_dijagnoza = createElement("section","",dijagnoza,"blokovi shadow p-3");
        div_podaci04.appendChild(p_dijagnoza);
        div_podaci04.appendChild(section_dijagnoza);
        container.appendChild(div_podaci04);
        ///////////////////////////////////
        var div_podaci05 = createElement("div","","","nalaz_stavke");
        var str_lekovi = "";
        for(var i = 0; i < lekovi.length; i++)
        {
            var str = lekovi[i].naziv;
            if(i != lekovi.length-1) str_lekovi+=str+" ,";
            else str_lekovi+=str+" ."
        } 
        var p_lekovi = createElement("p","","<strong>Pacijentu su prepisani sledeći \n lekovi: </strong>"+str_lekovi,"moj_paragraf");
        div_podaci05.appendChild(p_lekovi);
        if(str_lekovi != "") {container.appendChild(div_podaci05);}
        ////////////////////////////////////
        var div_podaci06 = createElement("div","","","nalaz_blok");
        var p_terapija = createElement("p","","<strong>Terapija:</strong>","mb-0");
        var section_terapija = createElement("section","",terapija,"blokovi shadow p-3");
        div_podaci06.appendChild(p_terapija);
        div_podaci06.appendChild(section_terapija);
        container.appendChild(div_podaci06);
        ////////////////////////////////////
        var div_podaci07 = createElement("div","","","nalaz_stavke");
        var p_doktor = createElement("p","","<strong>Pregledao: dr. </strong>"+ime_doc+" "+prez_doc,"moj_paragraf");
        div_podaci07.appendChild(p_doktor);
        container.appendChild(div_podaci07);

        return container;
    }

    function formatTitleHTML(ime,prezime)
    {
        var s = "<strong><big>Pacijent: <big></strong>"+ime.big()+" "+prezime.big();
        return s;
    }
    function formatInfoHTML(broj_knjizice,telefon,datum_rodjenja)
    {
        var s = "<strong>Broj knjižice: </strong>"+broj_knjizice.italics()+"<strong>  ,Telefon: </strong>"+telefon.italics()+"<strong>  ,Datum rođenja: </strong>"+datum_rodjenja.italics();
        return s;
    }

    
    $('#div_za_prikaz').on('click', 'span', function(e)
    {
        var id = e.target.id;
        var klasa = e.target.className;
        console.log(klasa);
        var id1 = e.target.id;
        var i_j = id1.split(":");
        console.log(i_j);
        var i = i_j[1];
        var j = i_j[2];
        var id2 = "myModal:"+i+":"+j;
        console.log(id2);
        modal = document.getElementById(id2);
        modal.style.display = "none";
    });    

    $('#div_za_prikaz').on('click', 'i', function(e)
    {
        var id1 = e.target.id;
        var i_j = id1.split(":");
        console.log(i_j);
        var i = i_j[1];
        var j = i_j[2];
        var id2 = "myModal:"+i+":"+j;
        console.log(id2);
        modal = document.getElementById(id2);
        console.log(modal);
        modal.style.display = "block";
        //modal.show();
        $(id2).modal("show");
        //$($(this).data(id2)).modal("show");
        //'#myModal:'+i+":"+j

        //console.log(e.target.id);
    });

    

</script>

</body>
</html>