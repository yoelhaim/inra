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

// $users->getPay("W")
$us = $users->showpayee("WHERE id_mounth = $_GET[pay]");

foreach ($us as $postid){
    $postid;
}
$userg = $users->showpost("WHERE id_users = $_GET[user]");

foreach ($userg as $user){
    $user;
}
?>

<div class="container"  >
    <div>
   
        <div class="mt-5" >
        <h3>votre Enfent :</h3>
       
            <hr>
            <button class="btn btn-primary" id="print" onclick="prints()">print</button>
            <hr/>
            <div class="p-4 postprint mb-3" style=" border:1px solid grey;clear:both;background:black" id="capture" >
            <h1 class="float-right">payee : <?php echo $postid['payemounth'] ?> DH</h1>
           <h4> pour ce mounth : <strong class="text-success"> <?php echo  $postid['mounth'] ?></strong></h4>
           <h4> pour ce annee : <strong class="text-success"> <?php echo  $postid['annee'] ?></strong></h4>
           <h4> date anvoyee l argent  : <strong class="text-danger"> <?php echo  $postid['jour'] ?>/<?php echo  $postid['mounth'] ?>/<?php echo  $postid['annee'] ?></strong></h4>
           <h4> votre email:<strong class="text-success"> <?php echo  $user['email'] ?></strong></h4>
           <h4> votre prenom: <strong class="text-success"> <?php echo  $user['prenom'] ?></strong></h4>
           <h4> votre nom: <strong class="text-success"> <?php echo  $user['nom'] ?></strong></h4>
           <h3 class="float-right">tous payee : <?php echo $user['allpay'] ?> DH</h3>
           <div style="clear:both"></div>
            </div>
           
            <hr>
            <table class="table">
                <thead class="hides">
                    <tr style="color:white">
                        <th scope="col">prenom</th>
                        <th scope="col">nom</th>
                        <th scope="col">age</th>
                        <th scope="col">date de neecnce</th>
                       
                     
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
     <p id="dis">
         
     </p>
    </div>
</div>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
   function prints(){
    html2canvas(document.querySelector("#capture")).then(canvas => {
    // document.body.appendChild(canvas)
    document.getElementById('dis').append(canvas)
   
});
    }
    // document.getElementById('dis').innerHTML = "sksk";
    
   
</script>
<?php
require_once __DIR__ . '/include/footer.php';

?>