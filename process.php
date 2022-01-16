<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Main</title>
    <style>
        #main{
        margin: 0 auto;
        color:#f7d2ad;
        width: 60%;
        background-color: #2f4858;
        text-align: center;
        height: 30vh;
        border-radius: 1vh;
        margin-top:30vh;
        margin-bottom:30vh;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-top:10vh;
}
        body{
        font-family: Arial;
        background-color: #21333d;
        color:#f7d2ad;
        font-size: 3vh;
        text-align: center;
}


    </style>
</head>
<body>
    <div id="main">
       <h1>Dziękujemy za <br>przesłanie formularza</h1>
    </div>
</body>
</html>
<?php
require_once "db.php";
$ilosc = $pdo -> exec('INSERT INTO `rekrutanci` (`imie`, `nazwisko`, `pesel`, `ocena_pol`, `ocena_mat`, ocena_p1, ocena_p2, egz_pol, egz_ang, egz_mat, pasek, ilosc_pkt, id_szkola, id_kierunek, data_dodania)	VALUES(
    \''.$_POST['name'].'\',
    \''.$_POST['lname'].'\',
    \''.$_POST['pesel'].'\',
    '.$_POST['polo'].',
    '.$_POST['mato'].',
    '.$_POST['p1'].',
    '.$_POST['p2'].',
    '.$_POST['pol'].',
    '.$_POST['ang'].',
    '.$_POST['mat'].',
    '.$_POST['pasekf'].',
    '.$_POST['lpkt'].',
    '.$_POST['szkola'].',
    '.$_POST['kier'].',
    \''.date("Y-m-d H:i:s").'\')');