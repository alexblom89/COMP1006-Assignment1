

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Game Database</title>
    </head>
    <body>
        <h1>Add a Game to the Database!</h1>
        <form method="post" action="saveGame.php">
            <fieldset>
                <label for="title">Title:</label>
                <input name="title" id="title" required/>
            </fieldset>
            <fieldset>
                <label for="release_year">Release Year:</label>
                <input name="release_year" id="release_year"/>
            </fieldset>
            <fieldset>
                <label for="developer">Developer:</label>
                <input name="developer" id="developer"/>
            </fieldset>
            <fieldset>
                <label for="esrb_rating">ESRB Rating:</label>
                <input name="esrb_rating" id="esrb_rating"/>
            </fieldset>
            <fieldset>
                <label for="genre">Choose a Genre!</label>
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
            <button>Save</button>
        </form>
    </body>
</html>
