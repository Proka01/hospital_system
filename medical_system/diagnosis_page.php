<!DOCTYPE html>
<html>
<head>
    <title>Nala /dijagnoza</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/diagnosis_page_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--ove linije si sada dodao -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <!--^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^-->

    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://davidstutz.de/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
    <link href="https://davidstutz.de/bootstrap-multiselect/docs/css/bootstrap-3.3.2.min.css" rel="stylesheet"/>
    <link href="https://davidstutz.de/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" rel="stylesheet"/>
    <script src="https://davidstutz.de/bootstrap-multiselect/docs/js/bootstrap-3.3.2.min.js"></script>
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^-->
    <style>

    </style>

</head>
<body  style="background-color: #fcfcfc">

    <!--Elementi na stranici -->
    <ul class="nav nav-tabs" style="background-color: #0b1b75;">
        <li class="active"><a style="background-color: #06187d; color:white;" data-toggle="tab" href="#patient_info">podaci pacijenta</a></li>
        <li><a style="background-color: #06187d; color:white;" data-toggle="tab" href="#diagnosis">nalaz i dijagnoza</a></li>
    </ul>

    <div class="tab-content"> <!--Tab za unos pacijenta -->
        <div id="patient_info" class="tab-pane fade in active" style="padding-left:25%; width:100%;">
            <div class="div01 mt-5" style="padding-left:2%; width: 70% ">
                <label for="ime" style="font-size: 20px">Ime:</label><br>
                <input type="text" class = "pt_data shadow p-3" id="ime" name="ime" placeholder="Ime" rows="15" cols="60"><br>

                <label for="prez" style="font-size: 20px">Prezime:</label><br>
                <input type="text" class = "pt_data shadow p-3" id="prez" name="prez" placeholder="Prezime"><br><br>

                <label for="brz_knjiz" style="font-size: 20px">Broj zdravstvene knjižice:</label><br>
                <input type="text" class = "pt_data shadow p-3" id="brz_knjiz" name="brz_knjiz" placeholder="Broj zdravstvene Knjizice"><br><br>

                <label for="datum" style="font-size: 20px">Datum rođenja:</label>
                <input type="date" class = "pt_data" id="datum" name="datum"><br><br>

                <label for="telefon" style="font-size: 20px">Kontakt telefon:</label><br>
                <input type="text" class = "pt_data shadow p-3" id="tel" name="tel" placeholder="Kontakt telefon"><br><br>

                <button class = "btn btn-primary" data-toggle="modal" data-target="#exampleModal2" onclick="upisi_u_bazu()">Sačuvaj pacijenta</button>

                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div id="modal_text2" class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>
            
            </div> 
        </div>
        <div id="diagnosis" class="tab-pane fade" style="padding-left:10%; width:100%;"> <!--Tab za dijagnoze pacijenta -->
                <div class="div02 mt-5" style="padding-left:2%; width: 90% ">
                    <label for="br_z_knjiz" style="font-size: 20px">Unesite broj zdravstvene knjižice:</label><br>
                    <input type="text" class = "nalaz_data shadow p-3" id="br_z_knjiz" name="broj_knjizice"  placeholder="Broj zdravstvene Knjizice"></input><br><br>

                    <label for="vrsta_pregleda" style="font-size: 20px">Izaberite vrstu pregleda:</label><br>
                    <input type="text" class = "nalaz_data shadow p-3" id="vrsta_pregleda" name="vrsta_pregleda"  placeholder="Prvi/Kontrolni"></input><br><br>
                    <!--<select id="vrsta_pregleda" class = "nalaz_data" name="vrsta_pregleda">
                        <option id ="prvi_pregled" value="prvi_pregled">Prvi pregled</option>
                        <option id ="kontrolni_pregled" value="kontrolni_pregled">Kontrolni pregled</option>
                    </select><br><br> -->

                    <label for="anamneza" style="font-size: 20px">Anamneza:</label><br>
                    <textarea id="anamneza" class = "nalaz_data shadow p-3" name="anamneza" placeholder="Unesite anamnezu" ></textarea><br><br>

                    <label for="lab_anal" style="font-size: 20px">Izaberite laboratorijsku analizu:</label><br>
                    <select id="cbbox1" name="cb_lab_anal" class="selectpicker" multiple data-live-search="true"></select><br><br>

                    <label for="fiz_nalaz" style="font-size: 20px">Fizikalni nalaz:</label><br>
                    <textarea id="fiz_nalaz" class = "nalaz_data shadow p-3" name="fiz_nalaz" placeholder="Unesite fizikalni nalaz" rows="15" cols="60"></textarea><br><br>

                    <label for="dijagnoza" style="font-size: 20px">Dijagnoza:</label><br>
                    <textarea id="dijagnoza" class = "nalaz_data shadow p-3" name="dijagnoza" placeholder="Unesite dijagnoza" rows="25" cols="60"></textarea><br><br>

                    <label for="terapija" style="font-size: 20px">Terapija:</label><br>
                    <textarea id="terapija" class = "nalaz_data shadow p-3" name="terapija" placeholder="Unesite terapiju" rows="25" cols="60"></textarea><br><br>

                    <label for="imgpcd" style="font-size: 20px">Izaberite imageing proceduru:</label><br>
                    <select id="cbbox2" name="cb_imgpcd" class="selectpicker" multiple data-live-search="true"></select><br><br>

                    <label for="lekovi" style="font-size: 20px">Izaberite lek:</label><br>
                    <select id="cbbox3" name="cb_lekovi" class="selectpicker" multiple data-live-search="true"></select><br><br>

                    <label for="zakazivanje_pregleda" style="font-size: 20px">Zakaži sledeći pregled:</label>
                    <input type="date" class = "nalaz_data " id="datum_sled_pregleda" name="datum_sled_pregleda"><br><br>

                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="upisi_dijagnozu_u_bazu()">Sačuvaj nalaz</button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div id="modal_text" class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--<button id= "d"></button>-->
                </div>
                <br><br>
        </div>
    </div>

 

    <!--Uzimanje vrednosti(id) iz selectpickera -->
    <script>
        /*$('#cbbox1').change(function(){
            $('#hidden_framework').val($('#cbbox1').val());
        });*/
        
        var dugme = document.getElementById("d");
        dugme.addEventListener("click",function(){

            var form_data_imgpcd = $('#cbbox2').serializeArray();
            console.log("Ispis procedura: ")
            console.log(form_data_imgpcd);
            for(i = 0; i <form_data_imgpcd.length; i++)
            {
                console.log(form_data_imgpcd[i].value);
            }

            var form_data_lekovi = $('#cbbox3').serializeArray();
            console.log("Ispis lekova: ")
            for(i = 0; i <form_data_lekovi.length; i++)
            {
                console.log(form_data_lekovi[i].value);
            }

            var form_data_lab = $('#cbbox1').serializeArray();
            console.log("Ispis analiza: ")
            for(i = 0; i <form_data_lab.length; i++)
            {
                console.log(form_data_lab[i].value);
            }
        });    
    </script>

    <script> //rad sa ajax-om

        var br_knjiz_iz_sessiona = sessionStorage.getItem("br_knjiz");
        var zak_datum_iz_sessiona = sessionStorage.getItem("zak_datum");
        var id_pregelda_iz_sessiona = sessionStorage.getItem("id_pregleda");
        console.log("SESSION: "+br_knjiz_iz_sessiona+" "+zak_datum_iz_sessiona);
        if(br_knjiz_iz_sessiona != "")
        {
            var input = document.getElementById("br_z_knjiz");
            input.value = br_knjiz_iz_sessiona;
        }

        var niz_knjizica = [];
        
        //citanje laboratorijskih analiza
        var lab_ajax = new XMLHttpRequest();
        lab_ajax.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        console.log("success! ,analize ucitane");
                        var niz = JSON.parse(lab_ajax.responseText);
                        var lab_cbbox = document.getElementById("cbbox1");
                        for (var i = 0; i < niz.length; i++) 
                        {
                            var option = document.createElement("option");
                            option.value = niz[i].id_lab_analize; // value da bude id
                            option.text = niz[i].naziv_lab_analize;
                            console.log(niz[i].naziv_lab_analize+" "+niz[i].id_lab_analize);
                            lab_cbbox.appendChild(option);
                        }
                    }
                };
                lab_ajax.open("GET", "load_laboratorijske_analize.php", true);
                lab_ajax.send();

        //citanje imageing procedura
        var imgpcd_ajax = new XMLHttpRequest();
        imgpcd_ajax.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        console.log("success! radi ,imgpcd ucitane");
                        var niz = JSON.parse(imgpcd_ajax.responseText);
                        var lek_cbbox = document.getElementById("cbbox3");
                        for (var i = 0; i < niz.length; i++) 
                        {
                            var option = document.createElement("option");
                            option.value = niz[i].id_leka;
                            option.text = niz[i].naziv_leka;
                            console.log(niz[i].naziv_leka+" "+niz[i].id_leka);
                            lek_cbbox.appendChild(option);
                        }
                    }
                };
                imgpcd_ajax.open("GET", "load_lekovi.php", true);
                imgpcd_ajax.send();

        //citanje lekova iz baze
        var lekovi_ajax = new XMLHttpRequest();
        lekovi_ajax.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        console.log("success! radi ,imgpcd ucitane");
                        var niz = JSON.parse(lekovi_ajax.responseText);
                        var imgpcd_cbbox = document.getElementById("cbbox2");
                        for (var i = 0; i < niz.length; i++) 
                        {
                            var option = document.createElement("option");
                            option.value = niz[i].id_imgpcd;
                            option.text = niz[i].naziv_img_pcde;
                            console.log(niz[i].naziv_img_pcde+" "+niz[i].id_imgpcd);
                            imgpcd_cbbox.appendChild(option);
                        }
                    }
                };
                lekovi_ajax.open("GET", "load_imageing_procedure.php", true);
                lekovi_ajax.send();

        //citanje zdravstvenih knjizica
        var knjizice_ajax = new XMLHttpRequest();
        knjizice_ajax.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        console.log("success! radi ,knjizice ucitane");
                        var niz_knjizica = JSON.parse(knjizice_ajax.responseText);
                        for (var i = 0; i < niz_knjizica.length; i++) 
                        {
                            console.log(niz_knjizica[i].broj_knjizice);
                        }
                    }
                };
                knjizice_ajax.open("GET", "load_brojeve_knjizica.php", true);
                knjizice_ajax.send();

        //funkcija za upisivanje nalaza/dijagnoze u bazu
        function upisi_dijagnozu_u_bazu()
        {
            console.log("radi");
            var elements = document.getElementsByClassName("nalaz_data");
            var formData = new FormData();
            for(var i=0; i<elements.length; i++)
            {
                console.log(elements[i].name+" "+ elements[i].value);
                formData.append(elements[i].name, elements[i].value);
            }

            var form_data_imgpcd = $('#cbbox2').serializeArray();
            var pom = [];
            for(var i = 0; i <form_data_imgpcd.length; i++)
            {
                pom[i] = form_data_imgpcd[i].value;
            }

            var form_data_lekovi = $('#cbbox3').serializeArray();
            var pom2 = [];
            for(var i = 0; i <form_data_lekovi.length; i++)
            {
                pom2[i] = form_data_lekovi[i].value;
            }

            var form_data_lab = $('#cbbox1').serializeArray();
            var pom3 = [];
            for(var i = 0; i <form_data_lab.length; i++)
            {
                pom3[i] = form_data_lab[i].value;
            }
    
            console.log("pom: ",pom);
            console.log("pom2: ",pom2);
            console.log("pom3: ",pom3);

            formData.append('procedure',pom);
            formData.append('lekovi',pom2);
            formData.append('analize',pom3);
            formData.append('zak_datum_iz_sessiona',zak_datum_iz_sessiona);
            formData.append('br_knjiz_iz_sessiona',br_knjiz_iz_sessiona);
            formData.append('id_pregleda',id_pregelda_iz_sessiona);
            var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        //console.log("ajax: "+JSON.parse(ajax.responseText)); 
                        if(ajax.responseText == -1)
                        {
                            var modal_title = document.getElementById("exampleModalLabel");
                            var modal_text = document.getElementById("modal_text");
                            var br = document.getElementById("br_z_knjiz");
                            modal_title.innerHTML = "";
                            modal_text.innerHTML = "";
                            modal_title.innerHTML = "Pregled nije upisan u bazu !!!"
                            modal_text.innerHTML = "Broj knjizice "+br.value+" ne postoji";
                        }
                        else
                        {
                            var modal_title = document.getElementById("exampleModalLabel");
                            var modal_text = document.getElementById("modal_text");
                            modal_title.innerHTML = "";
                            modal_text.innerHTML = "";
                            modal_title.innerHTML = "Pregled uspesno upisan!!!"
                            modal_text.innerHTML = "Pregled uspesno upisan.";
                            sessionStorage.setItem("br_knjiz", "");
                            sessionStorage.setItem("zak_datum","");
                            sessionStorage.setItem("id_pregleda","");
                        }
                    }
                };
                ajax.open("post", "insert_diagnosis.php");
                ajax.send(formData);
        }

       /* var dugme = document.getElementById("d");
        dugme.addEventListener("click",function(){

            var form_data_imgpcd = $('#cbbox2').serializeArray();
            console.log("Ispis procedura: ")
            for(i = 0; i <form_data_imgpcd.length; i++)
            {
                console.log(form_data_imgpcd[i].value);
            }

            var form_data_lekovi = $('#cbbox3').serializeArray();
            console.log("Ispis lekova: ")
            for(i = 0; i <form_data_lekovi.length; i++)
            {
                console.log(form_data_lekovi[i].value);
            }

            var form_data_lab = $('#cbbox1').serializeArray();
            console.log("Ispis analiza: ")
            for(i = 0; i <form_data_lab.length; i++)
            {
                console.log(form_data_lab[i].value);
            }
        });*/


        //funkcija za upisivanje pacijenta u bazu
        function upisi_u_bazu()
        {
            console.log("radi");
            var elements = document.getElementsByClassName("pt_data");
            var formData = new FormData();
            for(var i=0; i<elements.length; i++)
            {
                console.log(elements[i].name+" "+ elements[i].value);
                formData.append(elements[i].name, elements[i].value);
            }
            var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        var niz = JSON.parse(ajax.responseText);
                        if(niz[0].ispravan == 1)
                        {
                            var modal_title = document.getElementById("exampleModalLabel2");
                            var modal_text = document.getElementById("modal_text2");
                            modal_title.innerHTML = "";
                            modal_text.innerHTML = "";
                            modal_title.innerHTML = "Upisivanje pacijenta nije uspelo!!!"
                            modal_text.innerHTML = "Uneti broj knjizice vec postoji.";
                        }
                        else if(niz[0].ispravan == 0)
                        {
                            var modal_title = document.getElementById("exampleModalLabel2");
                            var modal_text = document.getElementById("modal_text2");
                            modal_title.innerHTML = "";
                            modal_text.innerHTML = "";
                            modal_title.innerHTML = "Pacijent je uspesno upisan u bazu!!!"
                            modal_text.innerHTML = "Pacijent je uspesno upisan.";
                        }
                    }
                };
                ajax.open("post", "patient_info_insert.php"); 
                ajax.send(formData);
        }

        /*function upisi_u_bazu() 
        {
            console.log("usoooooooo");
            var ime = document.getElementById("ime");
            var prezime = document.getElementById("prez");
            var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        console.log("success! ,upisan u bazu");
                    }
                };
            ajax.open("GET", "patient_info_insert.php?ime="+ime.value+"&prez="+prezime.value, true);
            ajax.send();
        }*/
    </script>

</body>
</html>