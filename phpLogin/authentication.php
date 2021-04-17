<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'bolnica_baza';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ( mysqli_connect_errno() ) {
	exit('Greska pri povezivanju na server: ' . mysqli_connect_error());
}

if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Korisnicko ime i lozinka nisu uneti');
}

if ($stmt = $con->prepare('SELECT id_doktora, lozinka FROM doktori WHERE korisnicko_ime = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $lozinka);
        $stmt->fetch();
        if (password_verify($_POST['password'], $lozinka)) {
            // Verification success! User has loggedin!
            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id(); // ovo je preventivna mera protiv presretanja komunikacije baze i nas
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['korisnicko_ime'] = $_POST['username'];
            $_SESSION['id_doktora'] = $id; // ovo si sa id stavio na id_doktora 29.04.2020
            echo header("Location: ../medical_system/main_page.php"); //'Welcome ' . $_SESSION['korisnicko_ime'] . '!';
        } else {
            echo 'Incorrect password!';
        }
    } else {
        echo 'Incorrect username!';
    }


	$stmt->close();
}

?>