<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Game Database</title>
</head>
<body>
<?php
//Connect to db.
$db = new PDO('mysql:host=172.31.22.43;dbname=Alex_S867295', 'Alex_S867295', 'dDeaw0ANTE');

$query = "SELECT * FROM games;";

$cmd = $db->prepare($query);
$cmd->execute();

$games = $cmd->fetchAll();

echo'<table><thead><th>Title</th><th>Release Year</th><th>Developer</th><th>ESRB Rating</th></thead>';

foreach($games as $value){
    echo '<tr><td><a href="games.php?game_id=' . $value['game_id'] . '">' . $value['title'] . '</a></td>
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
