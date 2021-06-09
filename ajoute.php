<?php
require_once __DIR__ . '/include/header.php';
$title = 'ajoute enfent';
require_once  __DIR__ . '/include/head.php';
require_once  __DIR__ . '/include/navbar.php';
if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == TRUE){
    if($_SESSION['isAdmin'] == 1){
        echo "<script type='text/javascript'>window.location.href = 'home'</script>";
    }
  
   
}else{
    echo "<script type='text/javascript'>window.location.href = '../index'</script>";
    die();
}
?>
?>

<div class="container">
    <div class="logincol">
        <h3>Ajouter un enfent</h3>
        <form class="form p-4" method="post">
        <?php
      
            if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['addEnf'])) {

                $users->addEnf($_POST['prenom'], $_POST['nom'], $_POST['age'], $_POST['necnce'],$_SESSION['id_users'] );
            }


            ?>
            <div class="mb-3  row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><i class="fal fa-user"></i></label>
                <div class="col-sm-10">
                    <input type="text" name="prenom" class="form-control" id="staticEmail" placeholder="prenom enfent ">
                </div>
            </div>
            <div class="mb-3  row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><i class="fal fa-user"></i></label>
                <div class="col-sm-10">
                    <input type="text" name="nom" class="form-control" id="staticEmail" placeholder="nom enfent">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label"><i
                        class="fal fa-sort-numeric-up"></i></label>
                <div class="col-sm-10">
                    <input type="number" name="age" class="form-control" placeholder="age enfent" id="inputPassword">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label"><i class="fal fa-calendar-day"></i></label>
                <div class="col-sm-10">
                    <input type="date" name="necnce" class="form-control" placeholder="necence enfent"
                        id="inputPassword">
                </div>
            </div>
            <div class="text-center">
                <button type="submet" name="addEnf" class="btn btn-success"><i class="fad fa-plus"></i> Ajouter
                </button>
            </div>

        </form>
    </div>
</div>

<?php
require_once __DIR__ . '/include/footer.php';

?>