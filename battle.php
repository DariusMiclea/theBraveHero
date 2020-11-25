<?php
namespace theBraveHero;
include_once 'hero.php';
include_once 'iBattle.php';

class Battle implements iBattle
{
    private $hero;
    private $beast;
    private $maxTurns;

    function __construct($hero, $beast, $maxTurns)
    {
        $this->hero = $hero;
        $this->beast = $beast;
        $this->maxTurns = $maxTurns;
    }

    public function getHero()
    {
        return $this->hero;
    }
    public function getBeast()
    {
        return $this->beast;
    }
    public function getMaxTurns()
    {
        return $this->maxTurns;
    }
 
    public function getFirstAttacker()//returneaza caracterul cu cea mai mare viteza sau, in caz ca vitezele sunt egale, returneaza caracterul cu cel mai mare noroc
    {
        if($this->hero->getSpeed() > $this->beast->getSpeed())
        {
            return $this->hero;
        }
        elseif($this->hero->getSpeed() < $this->beast->getSpeed())
        {
            return $this->beast;
        }
        else 
        {
            if($this->hero->getLuck() > $this->beast->getLuck())
            {
                return $this->hero;
            }
            else
            {
                return $this->beast;
            }    
        }
    }
    public function heroAttack()
    {
        $dragonForceChance = rand(1, 100);
        if($dragonForceChance <= 10)//sansa de 10% ca damage-ul lui Carl sa fie dublat folosind 'Forta Dragonului'
        {
            $this->beast->takeDamage($this->hero->dragonForce($this->hero->getStrength()));
        }
        else
        {
            $this->beast->takeDamage($this->hero->getStrength());
        }
    }
    public function beastAttack()
    {
        $this->hero->takeDamage($this->beast->getStrength());
    }
}
?>