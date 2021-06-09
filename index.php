<?php
require_once __DIR__ . '/include/header.php';
$title = 'tactok';
require_once  __DIR__ . '/include/head.php';
require_once  __DIR__ . '/include/navbar.php';
 if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == TRUE){
    if($_SESSION['isAdmin'] != 1){
        echo "<script type='text/javascript'>window.location.href = 'ajoute'</script>";
    }else{
        echo "<script type='text/javascript'>window.location.href = 'home'</script>";
    }
    die();
   
}
?>

<div class="container">
    <div class="logincol">
        <h3>ce connecte</h3>
        <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['login'])) {

      $login->setInput($_POST['email'], $_POST['password']);
    }


    ?>
        <form class="form p-4" method="post">
            <div class="mb-3  row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><i class="fal fa-envelope"></i></label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="staticEmail"
                        placeholder="email@example.com">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label"><i class="fal fa-key"></i></label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="mot de passe"
                        id="inputPassword">
                </div>
            </div>
            <div class="text-center">
                <button type="submet" name="login" class="btn btn-success"><i class="fad fa-sign-in-alt"></i> ce
                    connecte</button>
            </div>
            Mot de passe oublié <a href="">cliquez ici</a>
            <p></p>
        </form>
    </div>
</div>

<?php
require_once __DIR__ . '/include/footer.php';

?>