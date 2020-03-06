<?php
session_start();
$servername = "mysql:host=localhost;dbname=netland";
$username = "root";
$password = "";
$pdo = new PDO($servername, $username, $password);

?>


<style>
table, tr, td, th {
    padding: 20px;
    border-collapse: collapse;
}

table {
    margin-bottom: 50px;
}

tr {
    border-bottom:black solid 2px;
}

h2 {
    margin-bottom: -15px;
}

html{
    font-size: 25px;
    background-Color: #222222;
}

body {
    color: #888888;
}

a { 
    color: #4a94bd;
    text-decoration: none;
    font-size: 20px;
}


</style>

<HTML>
<head>
</head>

<body>

<a href="http://localhost/index.php">Vorige pagina</a>

<?php  
$stmt = $pdo->prepare("SELECT title, rating, description, seasons, country, language, has_won_awards, id FROM netland.series WHERE id=?");
$stmt->execute([$_GET['id']]);
while($info = $stmt->fetch()) {
    echo("<h1>".$info['title']."</h1><br><b>rating </b>".$info["rating"]."</b><br><b>Land van afkomst </b>".$info["country"]."<br><b>Taal </b>".$info["language"].
    "<br><b>Seizoenen </b>".$info["seasons"]."<br><br><b>Beschrijving </b><br>".$info["description"]."<br><br><b>Aantal prijzen gewonnen </b>".$info["has_won_awards"]."<br><br
    ><a href=http://localhost/seriesOverlord.php?id=$info[id]>Edit</a>");
}


?>


