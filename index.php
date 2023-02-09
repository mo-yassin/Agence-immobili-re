<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/972f63b1c4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Agence immobilière</title>
</head>
<body>
<section class="p-2">
        <header class="d-flex justify-content-between p-4">
            <div>
                <ul class="d-flex flex-row justify-content-between text-light">
                    <li class="fw-bold">HOME</li>
                    <li>BUY</li>
                    <li>RENT</li>
                    <li>SELL</li>
                    <li>HELP</li>
                </ul>
            </div>
            <form>
                <button id="deposeButton" class="p-2 rounded-4 fw-bold" formaction="ajoute.php">Deposer votre annonce</button>
            </form>
        </header>
        <div class="text text-center text-light p-5">
            <h1>THE PERFECT BASE FOR YOU</h1>
            <p>Find your dream home with us</p>
        </div>
        <form action="" method="POST">
            <div class="d-flex justify-content-around text-light">
                <div>
                    <select class="form-select" name="Type">
                        <option selected>Type d'annonce</option>
                        <option value="Location">Location</option>
                        <option value="Vente">Vente</option>
                    </select>
                </div>
                <div class="d-flex">
                    <h3 class="m-2">Prix :</h3>
                    <p class="m-2">Min</p>
                    <input class="m-2" type="number" name="min">
                    <p class="m-2">Max</p>
                    <input class="m-2" type="number" name="max">
                    <input type="submit" name="Search" value="search">
                </div>
            </div>
        </form>
    </section>
    <main class="rounded p-4">
                <div class="row">
                <?php
                    require_once 'connexion.php';
                    if($connexion->connect_error) {
                        die('Connection failed: '. $connexion->connect_error);
                        }
                                if(isset($_POST["Search"]))
                                {
                                    $Min = $_POST["min"];
                                    $Max = $_POST["max"];
                                    $Type = $_POST["Type"];

                                    $Search = "SELECT * FROM annonce WHERE Montant BETWEEN '$Min' AND '$Max' AND Type_an = '$Type'";
                                    $response = $connexion->query($Search);

                                    while ($champ = $response->fetch_assoc()) {
                                    echo "<div class='card col-md-3'>
                                            <img class='card-img-top' src='images/" .$champ['Image']. "' alt='Card image cap'>
                                            <div class='card-body'>
                                                <h5 class='card-title'>" . $champ["Titre"] . "</h5>
                                                <p class='card-text'>" . $champ["Description"] . "</p>
                                            </div>
                                            <ul class='list-group list-group-flush'>
                                                <li class='list-group-item'>" . $champ["Superficie"] . "</li>
                                                <li class='list-group-item'>" . $champ["Adresse"] . "</li>
                                                <li class='list-group-item'>" . $champ["Montant"] . "</li>
                                                <li class='list-group-item'>" . $champ["Date"] . "</li>
                                                <li class='list-group-item'>" . $champ["Type_an"] . "</li>
                                            </ul>
                                            <div class='card-body'>
                                                <form action='index.php' method='POST'>
                                                    <input type='hidden' name='Id' value=".$champ['Id'].">
                                                    <button class='card-link btn btn-outline-success fw-bold' onclick='update.php' name='edit' value=".$champ['Id'].">Update</button>
                                                    <button class='card-link btn btn-outline-danger fw-bold' type='submit' name='delete'>Delete</button>
                                                </form>
                                            </div>
                                        </div>";
                                        }
                                } else {
                                    $sql = "SELECT * FROM annonce";
                                    $result = $connexion->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    echo " <div class='card col-md-3'>
                                            <img class='card-img-top' src='images/" .$row['Image']. "' alt='Card image cap'>
                                            <div class='card-body'>
                                                <h5 class='card-title'>" . $row["Titre"] . "</h5>
                                                <p class='card-text'>" . $row["Description"] . "</p>
                                            </div>
                                            <ul class='list-group list-group-flush'>
                                                <li class='list-group-item'>" . $row["Superficie"] . "</li>
                                                <li class='list-group-item'>" . $row["Adresse"] . "</li>
                                                <li class='list-group-item'>" . $row["Montant"] . "</li>
                                                <li class='list-group-item'>" . $row["Date"] . "</li>
                                                <li class='list-group-item'>" . $row["Type_an"] . "</li>
                                            </ul>
                                            <div class='card-body'>
                                                <form action='index.php' method='post'>
                                                    <input type='hidden' name='Id' value=".$row['Id'].">
                                                    <button class='card-link btn btn-outline-success fw-bold' formaction='update.php' name='edit'>Update</button>
                                                    <button class='card-link btn btn-outline-danger fw-bold' type='submit' name='delete'>Delete</button>
                                                </form>
                                            </div>
                                        </div>";
                                    }
                                }
                                if (isset($_POST['delete'])) {
                                    $id = $_POST['Id'];
                                    $sql = "DELETE FROM annonce WHERE Id=$id";
                                    $result = $connexion->query($sql);
                                }
                ?>
            </div>
    </main>
    <!-- SCRIPTS -->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>