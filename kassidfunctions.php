<?php
$kassid=simplexml_load_file("kassid.xml");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kassid</title>
</head>
<h1>Kirjuta PHP abil andmed välja, määrates nimed pealkirjadeks h1 ning iga pealkirja alla kirjutada teksti sisse, millisel aastal vastav kass sündis. </h1>
<body>
<ul>
    <?php
    foreach ($kassid->xpath("//kass") as $kass){
        echo "<tr>";
        echo "<td><h1>". ($kass->nimi) . "</h1></td>";
        echo "<td>". ($kass->synnaaasta) . "</td>";
        echo "</tr>";
    }
    ?>
</ul>

<h1>Väljastatakse kassinimed, kel on sünniaasta lõpeb 10- ga.</h1>
<ul>
    <?php
    foreach ($kassid->xpath("//kass") as $kass){
        if ($kass->synnaaasta < 2011){
            echo "<li>". ($kass->nimi) . ", ";
            echo ($kass->synnaaasta) . "</li>";
        }
    }
    ?>
</ul>
<h1>Kõik nimed, mis algavad tähega O.</h1>
<ul>
    <?php
    foreach ($kassid->xpath("//kass") as $kass){
        if (substr(strtolower($kass->nimi),0,1)=="o"){
            echo "<li>". ($kass->nimi) . ", ";
            echo ($kass->synnaaasta) . "</li>";
        }
    }
    ?>
</ul>
<br>
<a href="">GitHub</a>
</body>
</html>