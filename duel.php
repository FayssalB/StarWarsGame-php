<?php
$json = file_get_contents("characters.json");

$datas = json_decode($json);
session_start();

class Character 
{
    public int $id;
    public int $pv;
    public string $name;
    public string $type;

    public function __construct(int $id,int $pv,string $name,string $type)
    {
        $this->id = $id;
        $this->pv = $pv;
        $this->name = $name;
        $this->type = $type;

    }

    public function getCharacterInfos():string{

        return "{$this->id} {$this->name} {$this->type} ";
    }

    
}


class Attack
{
    public string $name;
    public int $puissance ;
    public int $attacks ;
    
    public function __construct(string $name,int $attacks, int $puissance)
    {   
        $this->name = $name;
        $this->attacks = $attacks;
        $this->puissance = $puissance;

    }

    public function getAttackDamage():int{
        return "{$this->puissance}" * "{$this->attacks}" / 100 ;
    }
}


require("templates/header.php");

?>


<h3>duel</h3>

<?php
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
    foreach ($datas as $data) {
        if ($data->id == $id) {
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


                <h3>attaques: 
                    <?php
                        foreach($data->attacks as $attack){
                            ?>
                                <a href="duel.php?id=<?=$data->id?>&attaque=<?= $attack->name ?>"><?= $attack->name ?></a>

                                
                            <?php
                        }
                    ?>
                   
                </h3>

         


    <?php
        }
    }
}
    ?>

    <div> 
        <h4>historique du combat</h4>
        <?php 
        

        if(isset($_GET["attaque"] ) && !empty($_GET["attaque"])){
        
        $darkMaul= new Attack("Dark Maul", 25,76);

        $_SESSION["attaque"]= [];

        array_push($_SESSION["attaque"],$darkMaul->getAttackDamage(),20);

        echo "<p class=\"php-text-container\">{$_SESSION["attaque"][0]}</p>";

       
        // echo "<p class=\"php-text-container\">l'attaque à infligé {$_SESSION["attaque"]}</p>";

        // echo "<p class=\"php-text-container\">{$darkMaul->getAttackDamage()}</p>";
        $_SESSION["attaque"]="";
        
    }   
              
?>
    </div>


    <?php
    $randomNumber = rand(1, 9);
    $_SESSION["randomNumber"] = $randomNumber;
    foreach ($datas as $data) {
        if ($data->id == $_SESSION["randomNumber"]) {
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