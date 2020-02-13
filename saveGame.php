<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php

$title = $_POST['title'];
$release_year = $_POST['release_year'];
$developer = $_POST['developer'];
$esrb_rating = $_POST['esrb_rating'];

//validation.
$valid = true;

//Validate to prevent empty field entry for title.
if(empty($title)) {
    echo "Title is required.<br/>";
    $valid = false;
}

//Validate to ensure release year is between the first videogame ever released and current date.
if(!empty($release_year)) {
    if($release_year < 1972 || $release_year > date("Y")) {
        echo "Release year must be between 1972 (the release of Pong) and" .date("Y") . "<br/>";
        $valid = false;
    }
}

//Validate to prevent empty field entry for developer name.
if (empty($developer)) {
    echo "Developer name is required.<br/>";
    $valid = false;
}

//Validate such that only proper ESRB ratings can be entered.
if (!($esrb_rating == 'EC' || $esrb_rating == 'E' || $esrb_rating == 'T' || $esrb_rating == 'M' || $esrb_rating == 'AO')) {
    echo "ESRB rating must be one of: EC (Early Childhood), E (Everyone), T (Teen), M (Mature), or AO (Adults Only)";
    $valid = false;
}

//If validation checks are passed: connect to database and insert field values into appropriate table columns.
if($valid == true) {
    $db = new PDO('mysql:host=172.31.22.43;dbname=Alex_S867295', 'Alex_S867295', 'dDeaw0ANTE');

    $query = "INSERT INTO games (title, release_year, developer, esrb_rating) VALUES (:title, :release_year, :developer, :esrb_rating)";

    $cmd = $db->prepare($query);
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 100);
    $cmd->bindParam(':release_year', $release_year, PDO::PARAM_INT);
    $cmd->bindParam(':developer', $developer, PDO::PARAM_STR, 100);
    $cmd->bindParam(':esrb_rating', $esrb_rating, PDO::PARAM_STR, 100);

    $cmd-> execute();

    $db = null;

    echo '<h2>Game has been saved!</h2>';

}
?>
</body>
</html>
