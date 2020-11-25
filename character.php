<?php
namespace theBraveHero;
include_once "iCharacter.php";
use \Exception as Exception;

class Character implements iCharacter
{
    protected $health;
    protected $strength;
    protected $defence;
    protected $speed;
    protected $luck;

    function __construct($minHealth, $maxHealth, $minStr, $maxStr, $minDef, $maxDef, $minSpeed, $maxSpeed, $minLuck, $maxLuck)
    {
        $this->setHealth($minHealth, $maxHealth);
        $this->setStrength($minStr, $maxStr);
        $this->setDefence($minDef, $maxDef);
        $this->setSpeed($minSpeed, $maxSpeed);
        $this->setLuck($minLuck, $maxLuck);
    }
    public function setHealth($minHealth, $maxHealth)
    {
        try
        {
            if($minHealth <= 0 || $minHealth > $maxHealth)
            {
                throw new Exception("Valoarea minima pentru viata trebuie sa fie mai mare de 0 si mai mica decat viata maxima");
            }
            else
            {
                $this->health = rand($minHealth, $maxHealth);
            }
        }
        catch(Exception $e)
        {
            echo 'Eroare: ', $e->getMessage(), "\n";
            exit("<br>Programul a fost incheiat fortat!");
        }
        
        
    }

    public function setStrength($minStr, $maxStr)
    {
        try
        {
            if($minStr < 0 || $minStr > $maxStr)
            {
                throw new Exception("Valoarea minima pentru putere trebuie sa fie mai mare de 0 si mai mica decat puterea maxima");
            }
            else
            {
                $this->strength = rand($minStr, $maxStr);
            }
        }
        catch(Exception $e)
        {
            echo 'Eroare: ', $e->getMessage(), "\n";
            exit("<br>Programul a fost incheiat fortat!");
        }
        
    }

    public function setDefence($minDef, $maxDef)
    {
        try
        {
            if($minDef < 0 || $minDef > $maxDef)
            {
                throw new Exception("Valoarea minima pentru aparare trebuie sa fie mai mare de 0 si mai mica decat apararea maxima");
            }
            else
            {
                $this->defence = rand($minDef, $maxDef);
            }
        }
        catch(Exception $e)
        {
            echo 'Eroare: ', $e->getMessage(), "\n";
            exit("<br>Programul a fost incheiat fortat!");
        }
        
    }

    public function setSpeed($minSpeed, $maxSpeed)
    {
        try
        {
            if($minSpeed < 0 || $minSpeed > $maxSpeed)
            {
                throw new Exception("Valoarea minima pentru viteza trebuie sa fie mai mare de 0 si mai mica decat viteza maxima");
            }
            else
            {
                $this->speed = rand($minSpeed, $maxSpeed);
            }
        }
        catch(Exception $e)
        {
            echo 'Eroare: ', $e->getMessage(), "\n";
            exit("<br>Programul a fost incheiat fortat!");
        }
        
    }

    public function setLuck($minLuck, $maxLuck)
    {
        try
        {
            if(($minLuck < 0 || $minLuck > 100) && ($maxLuck < $minLuck || $maxLuck > 100))
            {
                throw new Exception("Valorile pentru noroc trebuie sa fie cuprinse intre 0 si 100!");
            }
            else
            {
                $this->luck = rand($minLuck, $maxLuck);
            }
        }
        catch(Exception $e)
        {
            echo 'Eroare: ', $e->getMessage(), "\n";
            exit("<br>Programul a fost incheiat fortat!");
        }
        
    }
    
    public function getHealth()
    {
        return $this->health;
    }
    public function getStrength()
    {
        return $this->strength;
    }
    public function getDefence()
    {
        return $this->defence;
    }
    public function getSpeed()
    {
        return $this->speed;
    }
    public function getLuck()
    {
        return $this->luck;
    }
    public function printStats()
    {
        echo "Viata: ", $this->health, "<br>Putere: ", $this->strength, "<br>Aparare: ", 
            $this->defence, "<br>Viteza: ", $this->speed, "<br>Noroc: ", $this->luck, "%<br>";
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
            $this->health -= $finalDamage;
            echo "Daune provocate: ", $finalDamage, "<br>";
        } 
    }
}
?>