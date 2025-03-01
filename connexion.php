<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Connexion</title>
</head>
<body>
    
    <?php include 'include/nav.php'; ?>
    <div class="container py-2">
        <?php
        //Connexion utilisateur
            if(isset($_POST['connexion'])) {
            $login = $_POST['login'];
            $pwd = $_POST['password'];

            //Vérifier si les champs sont vides
            if(!empty($login) && !empty($pwd)) {
                require_once 'include/database.php';
                $sqlStat = $pdo->prepare('select * from utilisateur where login=? and password=?');
                $sqlStat->execute(([$login,$pwd]));
                if($sqlStat->rowCount() >=1) {
                    session_start();
                    $_SESSION['utilisateur'] = $sqlStat->fetch();
                    header("Location:admin.php");
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                    Login ou mot de passe incorrect
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                      Login,password sont obligatoires
                </div> 
                <?php
        }
    }

  ?>
  <h4>Connexion</h4>
  <form method="post">

  <div class="col-sm-2 col-form-label mb-3 " >
    <label class="form-label">login</label>
    <input type="text" class="form-control" name="login">
  </div>

  <div class="col-sm-2 col-form-label mb-3 " >
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>

  <button type="submit" class="btn btn-primary" name="connexion">connexion</button>
    </form>
    </div>

</body>
</html>