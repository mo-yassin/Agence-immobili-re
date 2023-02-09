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
    <section class="u-align-center u-clearfix u-gradient u-section-3" id="carousel_babd">
        <div class="u-clearfix u-sheet u-sheet-1">
        <section id="bg" class="h-100 h-custom fw-bold">
                <div class="container py-5 h-100" id="agency">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Editer votre annonce :</h2>
                            <hr>
                            <form class="px-md-2" method="POST">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Titre</label>
                                    <input type="text" id="form3Example1q" class="form-control" name="Titre" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Image</label>
                                    <input type="file" id="form3Example1q" class="form-control" name="Image" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Description</label>
                                    <input type="text" id="form3Example1q" class="form-control" style="height: 15vh;" name="Description" placeholder="Minimum 10 characters.."/>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Superficie</label>
                                    <input type="text" id="form3Example1q" class="form-control" name="Superficie" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Adresse</label>
                                    <input type="text" id="form3Example1q" class="form-control" name="Adresse" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Montant</label>
                                    <input type="text" id="form3Example1q" class="form-control" name="Montant" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Type annonce</label>
                                    <input type="text" id="form3Example1q" class="form-control" name="Type_an" />
                                </div>
                                <button type="submit" name="edit" class="btn btn-outline-success bg-light fw-bold">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <?php
    require_once 'connexion.php';

    if(isset($_POST['edit'])) {

        $Titre = $_POST['Titre'];
        $Image = $_POST['Image'];
        $Description = $_POST['Description'];
        $Superficie = $_POST['Superficie'];
        $Adresse = $_POST['Adresse'];
        $Montant = $_POST['Montant'];
        $Type_an = $_POST['Type_an'];
        
        $sql = "UPDATE annonce SET Titre='$Titre',Image='$Image',Description='$Description',Superficie='$Superficie',Adresse='$Adresse',Montant='$Montant',Type_an='$Type_an'";
        $result = mysqli_query($connexion, $sql);

        if($result){
            header("location:index.php");
        }else {
            echo "insertion echeo";
        }
    }
    ?>
</body>
</html>