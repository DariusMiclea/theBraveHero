<?php
namespace theBraveHero;

interface iBattle
{
    public function getMaxTurns();
    public function getFirstAttacker();
    public function heroAttack();
    public function beastAttack();
}
?>