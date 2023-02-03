<?php
// https://www.edureka.co/blog/header-location-in-php/
// https://codes-sources.commentcamarche.net/forum/affich-468530-comment-executer-une-fonction-php-en-appuyant-sur-un-bouton-formulaire
// https://forum.hardware.fr/hfr/Programmation/PHP/executer-fonction-bouton-sujet_147048_1.htm
// http://sdz.tdct.org/sdz/rogrammez-en-oriente-objet-en-php.html#Creretmanipulerunobjet
$file = file_get_contents('characters.json');

$datas = json_decode($file);
require("templates/header.php");
// var_dump($datas[1]->attacks[1]->name);

// if(isset($_GET["id"])){
//     echo "okokokoko";
// }elseif(!isset($_GET["id"]) &&  isset($_SESSION["randomId"])){
//     echo "noonononon";
//     $_SESSION["randomId"] = rand(2,9);
// }

?>
<h3>selection du personnage</h3>
<div class="container">
    <?php
    foreach ($datas as $data) {
    ?>

        <div class="items">
            <a href="duel.php?id=<?= $data->id?>">
                <img src="img/characters/<?= $data->id ?>.jpg" alt="">
                <div class="power-indicator">
                    <img class="saber-svg" src="<?= $data->type == "sith" ? "img/sithsaber.svg" : "img/jedisaber.svg" ?>" alt="">
                    <a><?= $data->puissance ?></a>
                    <hr class="color-<?= $data->type ?>">
                </div>
            </a>
        </div>

    <?php
    }
    ?>
</div>





<?php
require("templates/footer.php");
?>