<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <?php include 'include/nav.php'; ?>

    <div class="container py-2">
        <?php
        //Ajouter utilisateur 
        if(isset($_POST['ajouter'])) {
            $login = $_POST['login'];
            $pwd = $_POST['password'];
        //Vérifier si les champs sont vides
            if(!empty($login) && !empty($pwd)) {
                require_once 'include/database.php';
                $date = date('Y-m-d');
                var_dump( $date);
                      
                $sqlStat = $pdo->prepare('INSERT INTO utilisateur VALUES(null,?,?,?)');
                $sqlStat->execute(([$login,$pwd,"$date"]));
                header("Location:connexion.php");

            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                Veuillez remplir tous les champs 
                </div>
                <?php
        } 
    }
        ?>
        
    <form method="post">

    <div class="col-sm-2 col-form-label mb-3 " >
    <label class="form-label">login</label>
    <input type="text" class="form-control" name="login">
  </div>

  <div class="col-sm-2 col-form-label mb-3 " >
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>

  <button type="submit" class="btn btn-primary" name="ajouter">Ajouter utulisateur</button>
    </form>
    </div>

</body>
</html>