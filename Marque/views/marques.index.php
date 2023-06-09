<?php

use Classes\Models\BrandManager;

$title = 'Liste des marques';

$manager = new BrandManager();
$marques = $manager->findAll();

// var_dump($marques);

$before = '<div class="col-12 col-md-6 col-lg-4"><div class="marque m-3"><p class="p-5 m-5">';

$after = '</p><div class="action d-flex justify-content-between"><a href="" class="btn p-5">modifier</a><a href="" class="btn p-5">supprimer</a></div></div></div>';

ob_start();

?>

<a href="/marques/add" class="btn m-3">Ajouter un marque</a>

<div class="table m-5">

  <table>
    <tr>
      <th>ID</th>
      <th>Marque</th>
      <th>Date_modif</th>
      <th colspan="2">Action</th>
    </tr>
    <?php foreach ($marques as $marque) : ?>
      <tr>
        <td>
          <?= $marque->getId() ?>
        </td>
        <td>
          <?= $marque->getName() ?>
        </td>
        <td>
          <?= $marque->getUpdate() ?>
        </td>
        <td><a href="">修改(Modifier)</a></td>
        <td><a href="">删除(Supprimer)</a></td>
      </tr>
    <?php endforeach ?>
  </table>

</div>

<div class="container m-5">

  <h5 class="m-5">Cette partie enbas on peut l'utiliser pour les instruments</h3>

  <div class="row">

    <?php
    foreach ($marques as $marque) {
      $brand = $marque->getName();
      echo $before . $brand . $after;
    }
    ?>

  </div>
</div>

<?php

$content = ob_get_clean();

require_once 'templates/template.php';
