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
            <div class="col-md-2 alert-success">
                <h3>tout enfent
                </h3>
                <strong>123</strong>
            </div>
            <div class="col-md-2 alert-danger">
                <h3>argent payes
                </h3>
                <strong>123</strong>
            </div>
            <div class="col-md-2 alert-primary">
                <h3> mounth</h3>
                <strong>123</strong>
            </div>
            <div class="col-md-2 alert-warning"> <h3> employé</h3>
                <strong>123</strong></div>
        </div>
        <div class="mt-5">
            <a href="admin" class="btn btn-info"><i class="fal fa-plus"></i> ajoute un employé</a>
            <hr>
            <table class="table">
                <thead class="hides">
                    <tr style="color:white">
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
                $showp = $users->showpost("ORDER BY id_users DESC");
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
                        <td>@mdo</td>
                        <td><a href="user/?user=<?php echo $rows['id_users'] ?>" class=" btn btn-info btn-sm"><i class="fal fa-info"></i> info</a></td>
                    </tr>

                </tbody>
                <?php $ten++;
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