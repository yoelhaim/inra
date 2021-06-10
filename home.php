<?php
require_once __DIR__ . '/include/header.php';
$title = 'inra ';
require_once  __DIR__ . '/include/head.php';
require_once  __DIR__ . '/include/navbar.php';
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
    <div>
        <div class="row">
            <div class="col-md-2 bg-success">
                <h3>tout enfent
                </h3>
                <strong><?php echo  $users->countEnfent() ?></strong>
            </div>
            <div class="col-md-2 bg-danger">
                <h3>argent payes
                </h3>
                <strong>123</strong>
            </div>
            <div class="col-md-2 bg-primary">
                <h3> mounth</h3>
                <strong>123</strong>
            </div>
            <div class="col-md-2 bg-warning"> <h3> employé</h3>
                <strong><?php echo  $users->countUsers() ?></strong></div>
        </div>
        <div class="mt-5">
            <a href="admin" class="btn btn-outline-info"><i class="fal fa-plus"></i> ajoute un employé</a>
            <?php
      
            if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['pay'])) {

                $users->payUser($_GET['pay']);
            }


            ?>
            <hr>
            <table class="table">
                <thead class="hides bg-success text-dark">
                    <tr style="color:">
                        <th scope="col">prenom</th>
                        <th scope="col">nom</th>
                        <th scope="col">enfent</th>
                        <th scope="col">payee last month</th>
                        <th scope="col">tous payes</th>
                        <th scope="col">status pay</th>
                        <th scope="col">information</th>
                    </tr>
                </thead>
                <?php 
                $showp = $users->showpost("WHERE isAdmin != 1 ORDER BY id_users DESC");
                if(!empty($showp)): 
                    foreach($showp as $rows):
                ?>
                <tbody style="color:white">
                    <tr>
                        <td><?php echo $rows['prenom'] ?></td>
                        <td><?php echo $rows['nom'] ?></td>
                        <td><?php echo $rows['enfent'] ?></td>
                        <td><?php echo $rows['lastpay'] ?></td>
                        <td><?php echo $rows['allpay'] ?></td>
                        <td>

                        <?php
                          $mounth = date('m');
                          $years = date('Y');
                        $checkenf=   $users->countPayee("WHERE userId = $rows[id_users] and `mounth`= $mounth and `annee` = '$years'"); echo  !$checkenf ?'<a href="?pay='.$rows['id_users'].' "> envoyee</a>': "payee reglee" ?>
                        </td>

                        <td><a href="user/?user=<?php echo $rows['id_users'] ?>" class=" btn btn-outline-info btn-sm"><i class="fal fa-info"></i> info <?php $checkenf=   $users->countEnfent("WHERE userId = $rows[id_users] && status = 0 "); echo  $checkenf ?'<span class="badge bg-danger">'.$checkenf.'</span>': "" ?></a></td>
                    </tr>

                </tbody>
                <?php 
        endforeach;
    else : ?>
        <p style="text-align: center" class="">no employe mantenent </p>
        <style>
            .hides {
                display: none
            }
        </style>
    <?php endif; ?>
            </table>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/include/footer.php';

?>