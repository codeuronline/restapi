<?php 
ob_start(); 
define("URL", str_replace("products.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
$directory=scandir('../put/');
var_dump($directory);
var_dump(pathinfo($directory[2],PATHINFO_EXTENSION));
var_dump(count($directory));
$valid_extension=['xls','xlsx'];
?>

<form action="../xlsManager.php" method="POST">
    <label for="filename">Choisir un fichier du répertoire PUT dans la liste : </label>
    <select name="filename" id="filename">
        <?php for ($i=2; $i <count($directory) ; $i++) :?>
        <?php if (isset($directory[2])) :?>
        <?php if (in_array(pathinfo($directory[$i],PATHINFO_EXTENSION),$valid_extension)) : ?>{
        <option value="<?=$directory[$i]?>">
            <?=$directory[$i]?> </option>
        <?php endif ?>
        <?php else :?>
        <div class="alert alert-danger">
            <h1>le Répertoire Put ne contient pas de fichier à traiter</h1>
        </div>
        <?php endif?> <?php endfor ?>
    </select>

    <button type=" submit" class="btn btn-primary"><i class="bi bi-check-square"></i></i></button>
    <button type="reset" class="btn btn-danger"><i class="bi bi-x-circle"></i></button></a>
</form>
<?php

$content = ob_get_clean();
$titre = "Gestion des fichier XLS !";
require "template.php";

?>