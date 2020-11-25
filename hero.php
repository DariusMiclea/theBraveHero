<?php
namespace theBraveHero;
include_once "character.php";

class Hero extends Character
{
    function __construct($minHealth, $maxHealth, $minStr, $maxStr, $minDef, $maxDef, $minSpeed, $maxSpeed, $minLuck, $maxLuck)
    {
        parent:: __construct($minHealth, $maxHealth, $minStr, $maxStr, $minDef, $maxDef, $minSpeed, $maxSpeed, $minLuck, $maxLuck);
    }

    public function takeDamage($damage)
    {
        $chanceToDodge = rand(1, 100);
        if($chanceToDodge <= $this->getLuck()) // aparatorul are sansa de a evita atacul in functie de noroc
        {
            echo "Atacul a esuat!<br>";
        }
        else
        {
            $finalDamage = $damage - $this->defence;
            if($finalDamage < 0 )
            {
                $finalDamage = 0;
            }
            elseif($finalDamage > 100)
            {
                $finalDamage = 100;
            }
            $randChance = rand(1, 100);
            if($randChance <= 20) //sansa de 20% de a injumatati damage-ul atacatorului
            {
                $finalDamage = $this->magicShield($finalDamage);
            }
            $this->health -= $finalDamage;
            echo "Daune provocate: ", $finalDamage, "<br>";
        }   
    }
    public function dragonForce($damage)
    {
        echo "Carl a folosit Forta Dragonului! <br>";
        return $damage * 2;
    }
    public function magicShield($damage)
    {
        echo "Carl a folosit Scutul Fermecat!<br>";
        return floor($damage / 2);
    }
}
?>