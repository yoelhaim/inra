<?php
require_once __DIR__ . '/../include/header.php';
$title = 'ajoute nouveau';
require_once  __DIR__ . '/../include/head.php';
require_once  __DIR__ . '/../include/navbar.php';
if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == TRUE){
    if($_SESSION['isAdmin'] != 1){
        echo "<script type='text/javascript'>window.location.href = 'ajoute'</script>";
    }
  
   
}else{
    echo "<script type='text/javascript'>window.location.href = '../index'</script>";
    die();
}

?>

<div class="container">
    <div class="logincol">
        <h3>Ajouter un employé</h3>
        <form class="form p-4" method="post">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['addemp'])) {

                $users->addNewUser($_POST['email'], $_POST['password'], $_POST['sexe'], $_POST['nom'], $_POST['prenom']);
            }


            ?>
            <div class="mb-3  row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><i class="fal fa-user"></i></label>
                <div class="col-sm-10">
                    <input type="text" name="prenom" class="form-control" id="staticEmail"
                        placeholder="prenom employé ">
                </div>
            </div>
            <div class="mb-3  row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><i class="fal fa-user"></i></label>
                <div class="col-sm-10">
                    <input type="text" name="nom" class="form-control" id="staticEmail" placeholder="nom employé">
                </div>
            </div>
            <div class="mb-3  row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><i class="fal fa-envelope"></i></label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="staticEmail"
                        placeholder="email@example.com">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label"><i class="fal fa-venus-mars"></i></label>
                <div class="col-sm-10">
                    <select name="sexe" class="form-control" aria-label="Default select example">

                        <option value="Masculin">Masculin</option>
                        <option value="femalle">femalle</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label"><i class="fal fa-key"></i></label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="mot de passe employé"
                        id="inputPassword">
                </div>
            </div>
            <div class="text-center">
                <button type="submet" name="addemp" class="btn btn-success"><i class="fad fa-plus"></i> Ajouter un
                    employé</button>
            </div>

        </form>
    </div>
</div>

<?php
require_once __DIR__ . '/../include/footer.php';

?>