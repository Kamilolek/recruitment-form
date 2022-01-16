<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <title>Main</title>
    <style>
        #main{
        margin: 0 auto;
        color:#f7d2ad;
        width: 60%;
        background-color: #2f4858;
        text-align: center;
        height: 100%;     
        padding-top:1vh;       
        padding-bottom:3vh;
        border-radius: 1vh;
        margin-top:3vh;       
        margin-bottom:3vh;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
        body{
        font-family: Arial;
        background-color: #21333d;
        color:#f7d2ad;
        font-size: 3vh;
        text-align: center;
}
        input[type=text],input[type=number]{
         background-color: #2f4858;
         border:none;
         border-bottom: #f7d2ad 2px solid;
         color:#f7d2ad;
         text-align: center;
         font-size: 3vh;
         margin-bottom: 1vh;
}
        input:focus {
         outline: none;
}
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
         margin: 0;
}
        select:focus {
         outline: none;
}
        select::-webkit-outer-spin-button,
        select::-webkit-inner-spin-button {
        -webkit-appearance: none;
         margin: 0;
         background-color:none;
}
        input[type=button], input[type=submit], input[type=reset]{
        font-family: Arial;
        background-color: #2f4858;
        color:#f7d2ad;
        font-size: 3vh;
        border:#f7d2ad 2px solid;
        margin-top:1vh;
        transition: 1s;
}
        input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover {
        background-color:#f7d2ad ;
        color:#2f4858;
        cursor: pointer;
}
        #sql{
        background-color: #2f4858;
        color:#f7d2ad;
        border:none;
        border:#f7d2ad 2px solid;
        font-size: 3vh;
        text-align: center;
}       
        #kier{
        background-color: #2f4858;
        color:#f7d2ad;
        border:none;
        border:#f7d2ad 2px solid;
        font-size: 3vh;
        text-align: center;
}
        #control{
                text-align:start;
                width: 60%;
                margin-left: 20%;
        }
        .container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  border: #f7d2ad 2px solid;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #f7d2ad;
  transition: 1s;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #f7d2ad;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid #2f4858;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

    </style>
    
    <script>
    
        id = new Array();
        nazwa = new Array();
        ids = new Array();
        p1 = new Array();
        p2 = new Array();
        
        <?php
             require_once "db.php";
             $stmt = $pdo->query('SELECT * FROM kierunek');
             $i = 0;
             foreach($stmt as $row)
                {
                    echo "id[".$i."] = ".$row['id'].";\n";
                    echo "nazwa[".$i."] = '".$row['nazwa']."';\n";
                    echo "ids[".$i."] = ".$row['id_szkoly'].";\n";
                    echo "p1[".$i."] = '".$row['przedmiot_1']."';\n";
                    echo "p2[".$i."] = '".$row['przedmiot_2']."';\n";
                    $i++;
                }
        ?>
        function update(){
        var text="";
        for (let i = 0; i < nazwa.length; i++) {
            if(ids[i] == document.getElementById('sql').value){
                var text1 = text;
                text = text1 + "<option value=\"" + id[i] + "\">" + nazwa[i] + "</option>\n";
            }
            document.getElementById("kier").innerHTML="<option>Wybierz kierunek</option> "+text;
        }
    }
        function update1(){
        for (let i = 0; i < nazwa.length; i++) {
            if(id[i] == document.getElementById('kier').value){
                document.getElementById('pl_1').innerHTML=p1[i];
                document.getElementById('pl_2').innerHTML=p2[i];
            }
        }
    }
    function pkt(){
        var points = 0;
        var op = document.getElementById('polo').value*1;
        var om = document.getElementById('mato').value*1;
        var o1 = document.getElementById('p1').value*1;
        var o2 = document.getElementById('p2').value*1;
        switch (op) {
            case 2:
                points+=2;
                break;
            case 3:
                points+=8;
                break;
            case 4:
                points+=14;
                break;
            case 5:
                points+=17;
                break;
            case 6:
                points+=18;
                break;
            default:
                break;
        }
        switch (om) {
            case 2:
                points+=2;
                break;
            case 3:
                points+=8;
                break;
            case 4:
                points+=14;
                break;
            case 5:
                points+=17;
                break;
            case 6:
                points+=18;
                break;
            default:
                break;
        }
        switch (o1) {
            case 2:
                points+=2;
                break;
            case 3:
                points+=8;
                break;
            case 4:
                points+=14;
                break;
            case 5:
                points+=17;
                break;
            case 6:
                points+=18;
                break;
            default:
                break;
        }
        switch (o2) {
            case 2:
                points+=2;
                break;
            case 3:
                points+=8;
                break;
            case 4:
                points+=14;
                break;
            case 5:
                points+=17;
                break;
            case 6:
                points+=18;
                break;
            default:
                break;
        }
        var egp = document.getElementById('pol').value*0.35;
        var egm = document.getElementById('mat').value*0.35;
        var ega = document.getElementById('ang').value*0.3;
        points+=egp;
        points+=egm;
        points+=ega;
        if (document.getElementById('pasek').checked==true) {
            points+=7;
            document.getElementById('pasekf').value=1;
        }else{
            document.getElementById('pasekf').value=0;
        }
        if (document.getElementById('kraj').checked==true) {
            points+=9;
        }
        if (document.getElementById('woj').checked==true) {
            points+=6;
        }
        if (document.getElementById('szk').checked==true) {
            points+=3;
        }
        document.getElementById('pkts').innerHTML="Twoja liczba punktów: "+points;
        document.getElementById('lpkt').value=points;
        console.log(points);
    }
    </script>
</head>

<body>
    <div id="main">
        <form method="post" action="process.php">
        <h1>Dane Osobowe:</h1>
        <label>Imie:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label>Nazwisko:</label><br>
        <input type="text" id="lname" name="lname" required><br>
        <label>Pesel:</label><br>
        <input type="text" id="pesel" name="pesel" required>
        <h1>Szkoła i Kierunek kształcenia</h1>
        <div id="box">
                        <select id="sql" name="szkola" onchange="update()">
                            <option>Wybierz szkołę</option>
                            <?php
                                require_once "db.php";
                                $stmt = $pdo->query('SELECT id, nazwa FROM szkola');
                                foreach($stmt as $row)
                                {
                                    echo "<option value=\"".$row['id']."\">".$row['nazwa']."</option>";
                                }
                            ?>
                        </select>
            <br><br>
            <select id="kier" name="kier" onchange="update1()">
            <option>Wybierz kierunek</option>
            </select>
            </div><br>
        <h1>Wyniki procentowe z <br>egzaminów ósmoklasisty</h1>
        <label>Język Polski:</label><br>
        <input type="number" id="pol" name="pol" onchange="pkt(); return false;" min="0" max="100" required><br>
        <label>Język Angielski:</label><br>
        <input type="number" id="ang" name="ang" onchange="pkt(); return false;" min="0" max="100" required><br>
        <label>Matematyka:</label><br>
        <input type="number" id="mat" name="mat" onchange="pkt(); return false;" min="0" max="100" required><br>
        <h1>Oceny</h1>
        <label>Język Polski:</label><br>
        <input type="number" id="polo" name="polo" onchange="pkt(); return false;" min="2" max="6" required><br>
        <label>Matematyka:</label><br>
        <input type="number" id="mato" name="mato" onchange="pkt(); return false;" min="2" max="6" required><br>
        <label id="pl_1">Przedmiot 1</label><br>
        <input type="number" id="p1" name="p1" onchange="pkt(); return false;" min="2" max="6" required><br>
        <label id="pl_2">Przedmiot 2</label><br>
        <input type="number" id="p2" name="p2" onchange="pkt(); return false;" min="2" max="6" required><br>
        <h1>Szczególne osiągnięcia:</h1>
        <div id="control">
                <label class="container">Świadectwo z paskiem
                        <input type="checkbox" id="pasek" onchange="pkt(); return false;">
                        <span class="checkmark"></span>
                      </label>
                <label class="container">Szczególne osiągnięcia w konkursach na poziomie krajowym
                        <input type="checkbox" id="kraj" onchange="pkt(); return false;">
                        <span class="checkmark"></span>
                      </label>
                      <label class="container">Szczególne osiągnięcia w konkursach na poziomie wojewódzkim
                        <input type="checkbox" id="woj" onchange="pkt(); return false;">
                        <span class="checkmark"></span>
                      </label>
                      <label class="container">Szczególne osiągnięcia w konkursach na poziomie szkolnym
                        <input type="checkbox" id="szk" onchange="pkt(); return false;">
                        <span class="checkmark"></span>
                      </label>              
        </div>
        <div id="pkts">Twoja liczba punktów: 0</div>
        <input id="lpkt" name="lpkt" type="number" style="display: none;">
        <input id="pasekf" name="pasekf" type="number" style="display: none;">
        <input type="submit" id="button" value="Prześlij">
        <input type="reset" id="clear" value="Wyczyść">
    </form>
    </div>
</body>
</html>