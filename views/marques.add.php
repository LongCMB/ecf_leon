<?php

$title = 'Ajouter des marques';

ob_start();

?>

<a href="" class="btn m-3">Ajouter un marque</a>

<div class="form m-5">

    <form action="" method="post">

        <div class="field m-3">
            <label for="marque">Marque</label>
            <input type="text" name="marque" id="marque">
        </div>

        <div class="field m-3">
            <label for="explication">Explication</label>
            <textarea name="explication" id="explication"></textarea>
        </div>

        <div class="submit m-3">
            <input type="submit" value="Ajouter">
        </div>
    </form>

</div>

<?php

$content = ob_get_clean();

require_once 'templates/template.php';