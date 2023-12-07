<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(file_exists("Compteur.txt")){
    if($id_file=fopen("Compteur.txt", "r")){
        flock($id_file,1);
        $nb=fread($id_file,10);
        $nb++;
        fclose($id_file);
        $id_file=fopen('Compteur.txt',"w");
        flock($id_file,2);
        fwrite($id_file,$nb);
        flock($id_file,3);
        fclose($id_file);
    }else{
        echo "Fichier introuvable";
    }
}else {
    $nb = 0;
    $id_file = fopen("Compteur.txt", "w");
    fwrite($id_file,$nb);
    fclose($id_file);
}echo "<table border\"1\" style = \"font-size:2em;\">
<tr>
    <td style = \"background-color:blue; color:white;\"> Voici déjà </td>
    <td style = \"font-size:1.2em; background-color:white; color:black;\"> $nb </td>
    <td style = \"background-color: red; color:white;\">Visites sur le site </td>
    </tr>
    </table>";
?>
</body>
</html>