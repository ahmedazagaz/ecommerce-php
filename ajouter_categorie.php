<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ajouter categorie</title>
</head>
<body>
        <?php include 'include/nav.php'; ?>

    <div class="container py-2">
        <h4>Ajouter categorie</h4>
        <?php
            if(isset($_POST['ajouter'])) {
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
         // Vérifier si les champs sont vides
         if(!empty($libelle) && !empty($description)) {
            require_once 'include/database.php';
            $sqlStat = $pdo->prepare('INSERT INTO categorie(libelle,description) VALUES(?,?)');
            $sqlStat->execute([$libelle, $description]);
            ?>
            <div class="alert alert-success" role="alert">
                La categorie <?php echo $libelle?> ajoutée avec succès
            </div>
            <?php
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                Libelle, description sont obligatoires
                </div>
                <?php
            }
        }
        ?>   
    <form method="post">

    <div class="col-form-label mb-3 " >
    <label class="form-label">libelle</label>
    <input type="text" class="form-control" name="libelle">
  </div>

  <div class="col-form-label mb-3 " >
    <label class="form-label">Description</label>
    <textarea class="form-control" name="description"></textarea>

    <button type="submit" class="btn btn-primary" name="ajouter">Ajouter categorie</button>
    </form>
    </div>

</body>
</html>