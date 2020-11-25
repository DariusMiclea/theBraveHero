<?php
namespace theBraveHero;

interface iCharacter
{
    public function setHealth($minHealth, $maxHealth);
    public function setStrength($minStr, $maxStr);
    public function setDefence($minDef, $maxDef);
    public function setSpeed($minSpeed, $maxSpeed);
    public function setLuck($minLuck, $maxLuck);
    public function getHealth();
    public function getStrength();
    public function getDefence();
    public function getSpeed();
    public function getLuck();
    public function printStats();
    public function takeDamage($damage);
}
?>