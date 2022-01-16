<?php
echo "Łączenie z bazą...<br><br>";

require_once 'db.php';
echo "Dodawanie tabel...<br>";
$sql = "CREATE TABLE `szkola` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nazwa` varchar(255) NOT NULL,
    `adres` text NOT NULL
  )";
$pdo->exec($sql);
echo "Stworzono tabelę szkola<br>";
$sql = "CREATE TABLE `kierunek` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nazwa` varchar(255) NOT NULL,
    `id_szkoly` int(11) NOT NULL,
    `przedmiot_1` varchar(50) NOT NULL,
    `przedmiot_2` varchar(50) NOT NULL
  )";
$pdo->exec($sql);
echo "Stworzono tabelę kierunek<br>";
$sql = "CREATE TABLE `rekrutanci` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `imie` varchar(30) NOT NULL,
    `nazwisko` varchar(30) NOT NULL,
    `pesel` varchar(11) NOT NULL,
    `ocena_pol` int(11) NOT NULL,
    `ocena_p1` int(1) NOT NULL,
    `ocena_mat` int(11) NOT NULL,
    `ocena_p2` int(1) NOT NULL,
    `egz_pol` int(11) NOT NULL,
    `egz_ang` int(11) NOT NULL,
    `egz_mat` int(11) NOT NULL,
    `pasek` tinyint(1) NOT NULL,
    `ilosc_pkt` int(11) NOT NULL,
    `id_szkola` int(11) NOT NULL,
    `id_kierunek` int(11) NOT NULL,
    `data_dodania` datetime NOT NULL
  )";
$pdo->exec($sql);
echo "Stworzono tabelę rekrutanci<br><br>";

echo "Dodawanie przykładowych danych...<br>";
$sql = "INSERT INTO szkola (nazwa, adres) VALUES ('Zespół Szkół Elektronicznych i Informatycznych w Sosnowcu','Sosnowiec')";
$pdo->exec($sql);
$sql = "INSERT INTO szkola (nazwa, adres) VALUES ('IV Liceum Ogólnokształcące z Oddziałami Dwujęzycznymi im. S. Staszica','Sosnowiec')";
$pdo->exec($sql);
$sql = "INSERT INTO szkola (nazwa, adres) VALUES ('Liceum Ogólnokształcące nr 6 im. J. Korczaka','Sosnowiec')";
$pdo->exec($sql);
$sql = "INSERT INTO szkola (nazwa, adres) VALUES ('II Liceum Ogólnokształcące im. E. Plater','Sosnowiec')";
$pdo->exec($sql);
$sql = "INSERT INTO kierunek (nazwa, id_szkoly, przedmiot_1, przedmiot_2) VALUES ('Programista', 1, 'Angielski', 'Fizyka/Matematyka')";
$pdo->exec($sql);
$sql = "INSERT INTO kierunek (nazwa, id_szkoly, przedmiot_1, przedmiot_2) VALUES ('Informatyk', 1, 'Angielski', 'Fizyka/Matematyka')";
$pdo->exec($sql);
$sql = "INSERT INTO kierunek (nazwa, id_szkoly, przedmiot_1, przedmiot_2) VALUES ('Elektronik', 1, 'Angielski', 'Fizyka/Matematyka')";
$pdo->exec($sql);
$sql = "INSERT INTO kierunek (nazwa, id_szkoly, przedmiot_1, przedmiot_2) VALUES ('Technik realizacji nagrań', 1, 'Angielski', 'Fizyka/Matematyka')";
$pdo->exec($sql);
$sql = "INSERT INTO kierunek (nazwa, id_szkoly, przedmiot_1, przedmiot_2) VALUES ('matematyczno-fizyczny', 2, 'Matematyka', 'Fizyka')";
$pdo->exec($sql);
$sql = "INSERT INTO kierunek (nazwa, id_szkoly, przedmiot_1, przedmiot_2) VALUES ('biologiczno-chmiczny', 2, 'Biologia', 'Chemia')";
$pdo->exec($sql);
$sql = "INSERT INTO kierunek (nazwa, id_szkoly, przedmiot_1, przedmiot_2) VALUES ('prawno-historyczny', 2, 'Angielski', 'Historia')";
$pdo->exec($sql);
$sql = "INSERT INTO kierunek (nazwa, id_szkoly, przedmiot_1, przedmiot_2) VALUES ('matematyczno-fizyczny', 3, 'Matematyka', 'Fizyka')";
$pdo->exec($sql);
$sql = "INSERT INTO kierunek (nazwa, id_szkoly, przedmiot_1, przedmiot_2) VALUES ('biologiczno-chmiczny', 3, 'Biologia', 'Chemia')";
$pdo->exec($sql);
$sql = "INSERT INTO kierunek (nazwa, id_szkoly, przedmiot_1, przedmiot_2) VALUES ('prawno-historyczny', 3, 'Angielski', 'Historia')";
$pdo->exec($sql);
$sql = "INSERT INTO kierunek (nazwa, id_szkoly, przedmiot_1, przedmiot_2) VALUES ('matematyczno-fizyczny', 4, 'Matematyka', 'Fizyka')";
$pdo->exec($sql);
$sql = "INSERT INTO kierunek (nazwa, id_szkoly, przedmiot_1, przedmiot_2) VALUES ('biologiczno-chmiczny', 4, 'Biologia', 'Chemia')";
$pdo->exec($sql);
$sql = "INSERT INTO kierunek (nazwa, id_szkoly, przedmiot_1, przedmiot_2) VALUES ('prawno-historyczny', 4, 'Angielski', 'Historia')";
$pdo->exec($sql);

echo"Dodawanie zakończone sukcesem!<br>";
echo "<a href=\"form.php\">Przejdź do strony formularza</a>";

