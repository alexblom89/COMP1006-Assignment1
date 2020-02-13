<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Game Database</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
//Connect to db.
$db = new PDO('mysql:host=172.31.22.43;dbname=Alex_S867295', 'Alex_S867295', 'dDeaw0ANTE');

$query = "SELECT * FROM games;";

$cmd = $db->prepare($query);
$cmd->execute();

$games = $cmd->fetchAll();

echo'<table border = 1 class="table table-striped table-hover"><thead><th>Title</th><th>Release Year</th><th>Developer</th><th>ESRB Rating</th></thead>';

foreach($games as $value){
    echo '<tr>
        <td>' . $value['title'] . '</td>
        <td>' . $value['release_year'] . '</td>
        <td>' . $value['developer'] . '</td>
        <td>' . $value['esrb_rating'] . '</td>
        </tr>';
}
echo '</table>';

$db = null;
?>
</body>
</html>
