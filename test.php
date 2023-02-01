<?php 

$file = file_get_contents('characters.json');

$datas = json_decode($file);

class Attack
{
    public string $name ;
    public int $puissance ;
    public int $attacks ;
    
    public function __construct(string $name, int $attacks, int $puissance)
    {
        $this->name = $name;
        $this->attacks = $attacks;
        $this->puissance = $puissance;

    }

    public function getAttackDamage():int{
        return "{$this->puissance}" * "{$this->attacks}" / 100 ;
    }
}




        
    $darkMaul= new Attack("Dark Maul", 25,76);
    echo $darkMaul->getAttackDamage();




?>