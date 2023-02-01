<?php
$json = file_get_contents("characters.json");

$datas = json_decode($json);

// class Attack
// {
//     public string $name ;
//     public int $puissance ;
//     public int $attacks ;
    
//     public function __construct(string $name, int $attacks, int $puissance)
//     {
//         $this->name = $name;
//         $this->attacks = $attacks;
//         $this->puissance = $puissance;

//     }

//     public function getAttackDamage():int{
//         return "{$this->puissance}" * "{$this->attacks}" / 100 ;
//     }
// }
// $darkMaul= new Attack("Dark Maul", 25,76);
// echo $darkMaul->getAttackDamage();

require("templates/header.php");

?>


<h3>duel</h3>

<?php
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
    foreach ($datas as $data) {
        if ($data->id == $id) {
            echo $_GET["id"];
?>
            <div class="duel-container">
                <div class="duel-items">
                    <img src="img/characters/<?= $id ?>.jpg" alt="">
                    <div class="duel-power-indicator">
                        <img class="duel-saber-svg" src="<?= $data->type == "sith" ? "img/sithsaber.svg" : "img/jedisaber.svg" ?>" alt="">
                        <p><?= $data->puissance ?></p>
                        <hr class="color-<?= $data->type ?>">
                    </div>
                    
                </div>
                <h3>attaques: <a href="" value="sabre-laser">fhfg</a></h3>

    <?php
        }
    }
}
    ?>

    <div>
        <h4>historique du combat</h4>
        <h5><?php include("test.php")?></h5>
    </div>


    <?php
    $randomNumber = rand(1, 9);
    foreach ($datas as $data) {
        if ($data->id == $randomNumber) {
    ?>

            <div class="duel-items">
                <img src="img/characters/<?= $randomNumber ?>.jpg" alt="">
                <div class="duel-power-indicator">
                    <img class="duel-saber-svg" src="<?= $data[$randomNumber]->type == "sith" ? "img/sithsaber.svg" : "img/jedisaber.svg" ?>" alt="">
                    <a><?= $data[$randomNumber]->puissance ?></a>
                    <hr class="color-<?= $data[$randomNumber]->type ?>">
                </div>
            </div>
            </div>
    <?php
        }
    }
    include("templates/footer.php");
    ?>