<?php
$host = $_POST['host'];
$port = $_POST['port'];
$username = $_POST['login'];
$password = $_POST['pswd'];
$database = $_POST['db'];
$txt = "<?php\n\$host = '".$host."';\n"."\$port = '".$port."';\n"."\$username = '".$username."';\n"."\$password = '".$password."';\n"."\$database = '".$database."';\n"."try{\n
	\$pdo = new PDO('mysql:host='.\$host.';dbname='.\$database.';port='.\$port, \$username, \$password );\n
}catch(PDOException \$e){\n
	echo 'Połączenie nie mogło zostać utworzone.<br />';\n
}\n
?>";
$header = fopen("db.php", "w");
fwrite($header, $txt);
fclose($header);
header("Location: add.php")
?>