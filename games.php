

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Game Database</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <h1>Add a Game to the Database!</h1>
        <form method="post" action="saveGame.php">
            <fieldset>
                <label for="title" class="col-sm-1">Title:</label>
                <input name="title" id="title" required/>
            </fieldset>
            <fieldset>
                <label for="release_year" class="col-sm-1">Release Year:</label>
                <input name="release_year" id="release_year" required/>
            </fieldset>
            <fieldset>
                <label for="developer" class="col-sm-1">Developer:</label>
                <input name="developer" id="developer" required/>
            </fieldset>
            <fieldset>
                <label for="esrb_rating" class="col-sm-1">ESRB Rating:</label>
                <input name="esrb_rating" id="esrb_rating"/>
            </fieldset>
            <fieldset>
                <label for="genre" class="col-sm-1">Choose a Genre!</label>
                <select name="genre" id="genre">
                    <?php
                    $db = new PDO('mysql:host=172.31.22.43;dbname=Alex_S867295', 'Alex_S867295', 'dDeaw0ANTE');

                    //write and run the query to get the artist names
                    $sql = "SELECT genre FROM genres";
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $genre = $cmd->fetchAll();
                    foreach ($genre as $value){
                        echo'<option>' . $value['genre'] . '</option>';
                    }
                    ?>
                </select>
            </fieldset>
            <button class="btn btn-primary offset-sm-1">Save</button>
        </form>
    </body>
</html>
