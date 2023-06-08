<?php

$title = 'Ajouter des marques';

ob_start();

?>

<a href="" class="btn m-3">Ajouter un marque</a>

<div class="form m-5">

    <form action="marques.add.confirm.php" method="post">

        <div class="field">
            <label for="marque">Marque</label><br>
            <input type="text" name="marque" id="marque">
        </div>

        <div class="field">
            <label for="explication">Explication</label>
            <textarea name="explication" id="explication" cols="30" rows="10"></textarea>
        </div>

        <div class="submit">
            <input type="submit" value="Ajouter">
        </div>
    </form>

</div>

<?php

$content = ob_get_clean();

require_once 'templates/template.php';
