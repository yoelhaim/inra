<?php
require_once __DIR__ . '/include/header.php';
$title = 'inra ';
require_once  __DIR__ . '/include/head.php';
require_once  __DIR__ . '/include/navbar.php';
if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == TRUE){
if($_SESSION['id_users'] != $_GET['user'] && $_SESSION['id_users']  != 1 ){
    echo "<script type='text/javascript'>window.location.href = '../index'</script>";
}
}else{
    echo "<script type='text/javascript'>window.location.href = '../index'</script>";  
}
?>

<div class="container">
    <div>
   
        <div class="mt-5">
        <h3>votre Enfent :</h3>
        <?php if($_SESSION['id_users']  != 1) { ?> 
            <a href="../ajoute" class="btn btn-outline-success"><i class="fal fa-plus"></i> ajoute un garson</a>
            <?php }else{ ?> <?php } 
            if(isset($_GET['status'])){
                $users->updateStatus($_GET['enf'],$_GET['status']);
            }
            ?>
            
            <hr>
            <table class="table">
            <thead class="hides bg-success">
                    <tr style="">
                        <th scope="col">prenom</th>
                        <th scope="col">nom</th>
                        <th scope="col">age</th>
                        <th scope="col">date de neecnce</th>
                        <th scope="col">status</th>
                     
                    </tr>
                </thead>
                <?php 
                $showp = $users->enfent("WHERE `userId` = '$_GET[user]' ORDER BY id_enfent DESC");
                if(!empty($showp)): 
                    foreach($showp as $rows):
                ?>
                <tbody style="color:white">
                    <tr>
                        <td><?php echo $rows['prenom'] ?></td>
                        <td><?php echo $rows['nom'] ?></td>
                        <td><?php echo $rows['age'] ?></td>
                        <td><?php echo $rows['date_nes'] ?></td>
                        <td>
                        <?php if($_SESSION['id_users']  != 1) { ?> 
                            <?php echo   $rows['status'] ? "<span class='text-success'><i class='fal fa-check'></i> accepted</span>" : "<span class='text-danger'><i class='fal fa-ban'></i> attent d accepted</span>" ?>
                        <?php }else{  ?>
                            
                            <?php echo   !$rows['status'] ? "<a href='?user=$_GET[user]&status=1&enf=$rows[id_enfent]' class='btn btn-success'><i class='fal fa-check'></i> accepte</a>" : "<a href='?user=$_GET[user]&status=0&enf=$rows[id_enfent]'class='btn btn-danger'><i class='fal fa-ban'></i> deleted</a>" ?>
                            
                            <?php } ?>
                        </td>
                    </tr>

                </tbody>
                <?php
        endforeach;
    else : ?>
        <p style="text-align: center" class="">no pas encore ajoute votre enfent </p>
        <style>
            .hides {
                display: none
            }
        </style>
    <?php endif; ?>
            </table>
        </div>
        <hr>
        <div>
        <h3>votre Payment :</h3>
        <table class="table">
                <thead class="hides bg-success">
                    <tr style="">
                        <th scope="col">month payee</th>
                        <th scope="col">anne payee</th>
                        <th scope="col">date payee</th>
                        <th scope="col">argent payee</th>
                        <th scope="col">info</th>
                     
                    </tr>
                </thead>
                <?php 
                $showp = $users->showpayee("WHERE `userId` = '$_GET[user]' ORDER BY id_mounth DESC");
                if(!empty($showp)): 
                    foreach($showp as $rows):
                ?>
                <tbody style="color:white">
                    <tr>
                        <td><?php echo $rows['mounth'] ?></td>
                        <td><?php echo $rows['annee'] ?></td>
                        <td><?php echo $rows['jour']  ?> / <?php echo $rows['mounth']  ?>/<?php echo $rows['annee']  ?> </td>
                        <td><?php echo $rows['payemounth'] ?></td>
                        <td><a href="../infopaye/?user=<?php echo $_GET['user'] ?>&pay=<?php echo $rows['id_mounth'] ?>" class="btn btn-info"> info payee</a></td>
                       
                    </tr>

                </tbody>
                <?php
        endforeach;
    else : ?>
        <p style="text-align: center" class="">no pas encore payment mantenent </p>
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