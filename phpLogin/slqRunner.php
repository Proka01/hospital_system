<?php
    $db = mysqli_connect('localhost','root','','bolnica_baza');

    $query = "INSERT INTO korisnici (ime,prezime,sifra,datum_rodjenja,datum_zaposlenja,telefon) 
    VALUES ('Aleksa','Prokic','$2y$10$5DqJ/lGT9dUs/yJvWRcjm.pKOkjB2BLuBtebJy3eTvAuoB3lFXCLG','$2001-04-09','$1995-08-06','0669563107')";
    mysqli_query($db,$query);
?>