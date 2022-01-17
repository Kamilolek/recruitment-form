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
        width: auto;
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
table{
    margin-left: auto;
    margin-right: auto;
}
.ggez{
    border:#f7d2ad 2px solid;
    border-collapse: collapse;
    height:auto;
    width:auto;
    font-size: 2vh;
    margin-left: 2vh;
    margin-right: 2vh;
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
        input[type=submit] {
        font-family: Arial;
        background-color: #2f4858;
        color:#f7d2ad;
        font-size: 3vh;
        border:#f7d2ad 2px solid;
        margin-top:1vh;
        transition: 1s;
        margin-bottom:3vh;
}
        input[type=submit]:hover {
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
        margin-top:2vh;
        margin-bottom: 3vh;
}
    </style>
</head>
<body>
    <div id="main">
       <h1>Wyszukiwarka</h1>

       <form method="post" action="show.php">
       <table>
               <tr>
                <td><label>Imię:</label></td>
                </tr>
                <tr>
                   <td><input type="text" name="name"></td>
               </tr>
               <tr>
                <td><label>Nazwisko:</label></td>
            </tr>
            <tr><td><input type="text" name="lname"></td>
            </tr>
            <tr>
                <td><label>Pesel:</label></td>
            </tr>
            <tr>
                <td><input type="text" name="pesel"></td>
            </tr>
           </table>
           <label>Sortuj </label><select name="sort" id="sql">
               <option value="1">Domyślnie</option>
               <option value="2">Imiona alfabrtycznie</option>
               <option value="3">Nazwiska alfabrtycznie</option>
               <option value="4">Liczba punktów malejąco</option>
               <option value="5">Liczba punktów rosnąco</option>
           </select><br>
           <input type="submit" value="Wyszukaj">
       </form>
    </div>
    <div id="main">
    <table border="1" class="ggez">
            
            <tr>
                <td rowspan="2">ID</td><td rowspan="2">Imię</td><td rowspan="2">Nazwisko</td><td rowspan="2">PESEL</td><td colspan="4">Oceny</td><td colspan="3">Egzamin</td><td rowspan="2">Świadectwo z wyróżnieniem</td><td rowspan="2">Ilość punktów</td><td rowspan="2">Wybrana szkoła</td><td rowspan="2">Wybrany kierunek</td><td rowspan="2">Data dodania</td>
            </tr>
            <tr>
                <td>J. Polski</td><td>Matematyka</td><td>1 przedmiot</td><td>2 przedmiot</td><td>J. Polski</td><td>Matematyka</td><td>J. obcy</td>
            </tr>
            <?php
                require_once "db.php";
                $query = "SELECT rekrutanci.id, imie, nazwisko, pesel, ocena_pol, ocena_p1, ocena_p2, ocena_mat, egz_pol, egz_mat, egz_ang, pasek, ilosc_pkt, kierunek.nazwa AS nazwak, szkola.nazwa AS nazwas, data_dodania FROM rekrutanci, szkola, kierunek WHERE id_szkola=szkola.id AND id_kierunek=kierunek.id ";
                if (isset($_POST)) {
                    if (@$_POST['name'] != "") {
                        $query = $query."AND imie LIKE '".$_POST['name']."' ";
                    }
                    if (@$_POST['lname'] != "") {
                        $query = $query."AND nazwisko LIKE '".$_POST['lname']."' ";
                    }
                    if (@$_POST['pesel'] != "") {
                        $query = $query."AND pesel = '".$_POST['pesel']."' ";
                    }
                    if (@$_POST['sort'] != "") {
                        switch ($_POST['sort']) {
                            case '1':
                                $query = $query."ORDER BY id ";
                                break;
                            case '2':
                                $query = $query."ORDER BY imie ";
                                break;
                            case '3':
                                $query = $query."ORDER BY nazwisko ";
                                break;
                            case '4':
                                $query = $query."ORDER BY ilosc_pkt DESC ";
                                break;
                            case '5':
                                $query = $query."ORDER BY ilosc_pkt ";
                                break;
                            default:
                                
                                break;
                        }
                    }
                }else{
                    $query='SELECT rekrutanci.id, imie, nazwisko, pesel, ocena_pol, ocena_p1, ocena_p2, ocena_mat, egz_pol, egz_mat, egz_ang, pasek, ilosc_pkt, kierunek.nazwa AS nazwak, szkola.nazwa AS nazwas, data_dodania FROM rekrutanci, szkola, kierunek WHERE id_szkola=szkola.id AND id_kierunek=kierunek.id';
                }
                $stmt = $pdo->query($query);
                foreach($stmt as $row)
                {
                    if ($row['pasek']=='1') {
                        $pasek = "Tak";
                    }else{
                        $pasek = "Nie";
                    }
                    echo '<tr>';
                     echo '<td>'.$row['id'].'</td>'.'<td>'.$row['imie'].'</td>'.'<td>'.$row['nazwisko'].'</td>'.'<td>'.$row['pesel'].'</td>'.'<td>'.$row['ocena_pol'].'</td>'.'<td>'.$row['ocena_mat'].'</td>'.'<td>'.$row['ocena_p1'].'</td>'.'<td>'.$row['ocena_p2'].'</td>'.'<td>'.$row['egz_pol'].'</td>'.'<td>'.$row['egz_mat'].'</td>'.'<td>'.$row['egz_ang'].'</td>'.'<td>'.$pasek.'</td>'.'<td>'.$row['ilosc_pkt'].'</td>'.'<td>'.$row['nazwas'].'</td>'.'<td>'.$row['nazwak'].'</td>'.'<td>'.$row['data_dodania'].'</td>';
                     echo '</tr>';
                }
                @$stmt->closeCursor();
            ?>
        </table>
    </div>
</body>
</html>
