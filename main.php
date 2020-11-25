<?php
namespace theBraveHero;
include_once 'hero.php';
include_once 'battle.php';


$carl = new Hero(65, 95, 60, 70, 40, 50, 40, 50, 10, 30);
$beast = new Character(55, 80, 50, 80, 35, 55, 40, 60, 25, 40);
$battle = new Battle($carl, $beast, 20);
$carlTurnTag = 0;

echo "Caracteristicile lui Carl: <br>", $carl->printStats(), "<br>";
echo "Caracteristicile bestiei: <br>", $beast->printStats(), "<br>";

if($battle->getFirstAttacker() == $carl)
{
    $carlTurnTag = 0;
}
else 
{
    $carlTurnTag = 1;
}
$turn = 0;
for($turn = 1; $turn <= $battle->getMaxTurns(); $turn++)
{
    echo "----------------------------------------<br>";
    echo "Tura ", $turn, "<br>";
    if($turn % 2 != $carlTurnTag)
    {
        echo "Carl a atacat bestia!<br>";
        $battle->heroAttack();
        echo "Viata bestiei: ", $beast->getHealth(), "<br>";
    }
    else
    {
        echo "Bestia l-a atacat pe Carl!<br>";
        $battle->beastAttack();
        echo "Viata lui Carl: ", $carl->getHealth(), "<br>";
    }
    if($carl->getHealth() <= 0)
    {
        echo "Bestia a invins!<br>";
        break;
    }
    elseif($beast->getHealth() <= 0)
    {
        echo "Carl a invins!<br>";
        break;
    }   
}
if($turn > $battle->getMaxTurns())
{
    echo "Lupta s-a incheiat fara un castigator.<br>";
}
?>