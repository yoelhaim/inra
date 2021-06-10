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

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/index.jpg" class="d-block w-100" style="height:520px" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Presentation</h5>
        <p class="text-dark">  L’Institut National de la Recherche Agronomique "INRA" a pour mission d’entreprendre les recherches pour le développement agricole. C'est un établissement public dont les origines remontent à 1914 avec la création des premiers services de recherche agricole officiel. Il a connu dernièrement une réorganisation structurelle visant la modernisation de son processus de gestion.

La finalité de la nouvelle organisation est de doter l’institution d’une :
• planification stratégique adéquate pour renforcer les capacités prospectives d'adaptation, de réaction et d'anticipation de la demande sociale de recherche agronomique;
• politique de proximité en se basant sur la régionalisation et la déconcentration de la recherche;
• système intégré de suivi, d'évaluation et de contrôle;
• gestion intégrée et rationnelle des ressources;
• politique de valorisation de ses produits;
• politique cohérente d'information et de coopération.

L'INRA opère à travers dix centres régionaux de la recherche agronomique et 23 domaines expérimentaux répartis sur le territoire national et couvrant les divers agrosystèmes du pays.
Les projets de recherche de l'INRA sont définis avec la participation des partenaires, des clients et des prescripteurs régionaux. Ils sont menés au sein de trente unités de recherche hébergés par les Centres Régionaux. Ils sont encadrés à l'échelle centrale par dix départements scientifiques à vocation disciplinaire.

Pour accomplir sa mission et être au diapason de l’actualité scientifique, l’INRA entretient des relations de partenariats avec des organisations nationales et internationales, les structures de développement, le secteur privé et les Organisations Non Gouvernementales.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/image3.jpg" class="d-block w-100" style="height:520px" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Mission</h5>
        <p>Le Centre Régional de la Recherche Agronomique du Tadla couvre la zone d'action de l’Office Régional de Mise en Valeur Agricole (ORMVA) du Tadla et les Directions Provinciales d'Agriculture (DPA) d'Azilal et de Beni-Mellal.

A moyen terme, les projets de recherche conduits au niveau du centre s’articulent autour de la:
Amélioration de l’efficience d’utilisation de l’eau d’irrigation ;

Intensification raisonnée et diversification de la production agricole;

Amélioration durable et diversification de l’agriculture en zones de montagne.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/filaha2.jpg" class="d-block w-100" style="height:520px" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Orientation :</h5>
        <p>Les axes stratégiques de la recherche à l'INRA couvrent:

La caractérisation, la préservation et la valorisation des ressources naturelles;

L’amélioration de la productivité, la compétitivité et la durabilité de la production agricole;

L’amélioration de la qualité, la valorisation et la diversification des productions végétale et animale;

L’analyse de la demande sociale des systèmes de production et des politiques agricoles liées au développement régional et local.

Sur le plan opérationnel, ces axes sont déclinés en un ensemble de programmes de recherche complémentaires classés en deux principaux groupes, à savoir :

Les programmes régionaux de recherche conçus pour mieux répondre aux besoins des différentes filières de production et pour couvrir l’ensemble du territoire national avec ses divers agrosystèmes; 

 Les programmes thématiques à portée nationale qui ont plutôt une connotation horizontale servant à l’ensemble des agrosystèmes et des filières de production.</p>
      </div>
    </div>
 

  <!-- <div class="carousel-item">
      <img src="img/filaha.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Edito :</h5>
        <p>
De plus en plus, la recherche agronomique est interpellée à répondre à la demande sociale croissante en résultats de recherche pour contribuer au développement durable de notre agriculture, pour s’acquitter de sa mission de recherche et de confirmer son rôle précurseur en tant qu’institut pourvoyeur de connaissances et d’innovations. Pour y parvenir, nous nous sommes alignés aux objectifs de la nouvelle stratégie Génération Green 2020 -2030 (GG), par la mise en oeuvre d’approches participatives associant toutes les parties prenantes et les acteurs interagissant dans la sphère de la recherche et du développement</p>
      </div>
  -->
 
  </div>
  <div class="alert-succeess">
  <button class="carousel-control-prev btn btn-success" style=" height: 50px;margin-top:300px"  type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon text-danger" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next btn btn-success" style=" height: 50px;;margin-top:300px" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon"  aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  </div>
</div>
    </div>
</div>

<?php
require_once __DIR__ . '/include/footer.php';

?>