<!DOCTYPE html>

    <?php
 
       $Health_T = rand(50, 100);
       $Strength_T = rand(70, 80);
       $Defense_T = rand(45, 55);
       $Speed_T = rand(40, 50);
       $Luck_T = rand(10, 30);

       $Health_E = rand(60, 90);
       $Strength_E = rand(60, 90);
       $Defense_E = rand(40, 60);
       $Speed_E = rand(40, 60);
       $Luck_E = rand(25, 40);
       ?>

       <?php

$str=file_get_contents('./index.html');

$str=str_replace("%T1" , $Health_T , $str);
$str=str_replace("%T2" , $Strength_T , $str);
$str=str_replace("%T3" , $Defense_T , $str);
$str=str_replace("%T4" , $Speed_T , $str);
$str=str_replace("%T5" , $Luck_T , $str);

$str=str_replace("%E1" , $Health_E , $str);
$str=str_replace("%E2" , $Strength_E , $str);
$str=str_replace("%E3" , $Defense_E , $str);
$str=str_replace("%E4" , $Speed_E , $str);
$str=str_replace("%E5" , $Luck_E , $str);

file_put_contents('./index_results.html', $str);

include('./index_results.html'); 

//function battle() {
     $turn = 0; // odd(1) for Tim, Even(0) for Evil
    $attack = 1; // number of attacks between minions
$chance = 0; //chances of Tim using Skills
$damage = 0; //damage for every attack

// Echo + Memorare Actiune
$battleresults = '';
function battle_log($x) {
    echo $x;                                //  Scrie in pagina actiunea intamplata in lupta
    $GLOBALS['battleresults'] .= $x;        //  De asemenea, memoreaza aceasta actiune pentru a fi notata in History
}

echo "<div style =\"text-align:center\">";

// first attack
/*echo "<b>ROUND $attack</b>";
echo "<br>";
echo "<br>";*/
battle_log("<b>ROUND $attack</b>");
battle_log("<br>");
battle_log("<br>");

if($Speed_T > $Speed_E)
{
   battle_log("Tim attacks first!!");
   battle_log("<br>");
   $turn = 0; 
   $attack = $attack + 1;
   $chance = rand(1,10);
   battle_log("Chance is $chance");
   battle_log("<br>");
   if ($chance == 7)
    {
        battle_log("Tim uses the Banana Strike!!");
        battle_log("<br>");
        $turn = 1; //he will strike again next time
    }
    $damage = $Strength_T - $Defense_E;
    battle_log("The Damage is $damage");
    battle_log("<br>");
    $Health_E = $Health_E - $damage;
    battle_log("The Evil's Health is now $Health_E");

}
else if ($Speed_T < $Speed_E)
{
    battle_log("Evil attacks first!!");
    battle_log("<br>");
    $turn = 1;
    $attack = $attack + 1;
    $chance = rand(1,5);
    battle_log("Chance is $chance");
    battle_log("<br>");
    $damage = $Strength_E - $Defense_T;
    if ($chance == 3)
    {
        battle_log("Tim usses the Umbrella Shield!!");
        battle_log("<br>");
        $damage = $damage / 2;
    }
        battle_log("The damage is $damage");
        battle_log("<br>");
        $Health_T = $Health_T - $damage;
        battle_log("Tim's Health is now $Health_T");
        battle_log("<br>");
}
elseif ($Speed_T == $Speed_E)
{
    if($Luck_T > $Luck_E)
    {
        battle_log("Tim attacks first!!");
        battle_log("<br>");
        $turn = 0; 
        $attack = $attack + 1;
        $chance = rand(1,10);
        battle_log("Chance is $chance");
        battle_log("<br>");
        if ($chance == 7)
            {
                battle_log("Tim uses the Banana Strike!!");
                battle_log("<br>");
                $turn = 1; //he will strike again next time
            }
            $damage = $Strength_T - $Defense_E;
            battle_log("The Damage is $damage");
            battle_log("<br>");
            $Health_E = $Health_E - $damage;
            battle_log("The Evil's Health is now $Health_E");
            battle_log("<br>");
            }
    else if($Luck_T < $Luck_E)
    {
        battle_log("Evil attacks first!!");
        battle_log("<br>");
        $turn = 1;
        $attack = $attack + 1;
        $chance = rand(1,5);
        battle_log("Chance is $chance");
        battle_log("<br>");
        $damage = $Strength_E - $Defense_T;
        if ($chance == 3)
        {
            battle_log("Tim usses the Umbrella Shield!!");
            battle_log("<br>");
            $damage = $damage / 2;
        }
        battle_log("The damage is $damage");
        battle_log("<br>");
        $Health_T = $Health_T - $damage;
        battle_log("Tim's Health is now $Health_T");
        battle_log("<br>");
    }
}

if($Health_T <= 0 || $Health_E <= 0)
{
    if($Health_E <= 0)
    {
        battle_log("<br>");
        battle_log("<div style='font-size:40px;color:teal'><b>TIM WON THE BATTLE!!!</b></div>");
        $attack = 21;
    }

    if ($Health_T <= 0)
    {
        battle_log("<br>");
        battle_log("<div style='font-size:40px;color:red'><b>THE EVIL WON THE BATTLE!!!</b></div>");
        $attack = 21;
    }
}

while($attack <= 20)
{
    if($Health_E <= 0)
    {
        battle_log("<br>");
        battle_log("<div style='font-size:40px;color:teal'><b>TIM WON THE BATTLE!!!</b></div>");
        break;
    }

    if ($Health_T <= 0)
    {
        battle_log("<br>");
        battle_log("<div style='font-size:40px;color:red'><b>THE EVIL WON THE BATTLE!!!</b></div>");
        break;
    }

    battle_log("<br>");
    battle_log("<b>ROUND $attack</b>");
    battle_log("<br>");
    battle_log("<br>");

    $damage = 0;

    if($turn == 1)
    {
        battle_log("Tim attacks!!");
        battle_log("<br>");
        $turn = 0; 
        $attack = $attack + 1;
        $chance = rand(1,10);
        battle_log("Chance is $chance");
        battle_log("<br>");
        if ($chance == 7)
            {
                battle_log("Tim uses the Banana Strike!!");
                battle_log("<br>");
                $turn = 1; //he will strike again next time
            }
            $damage = $Strength_T - $Defense_E;
            battle_log("The Damage is $damage");
            battle_log("<br>");
            $Health_E = $Health_E - $damage;
            battle_log("The Evil's Health is now $Health_E");
            battle_log("<br>");
    }
    else
    {
        battle_log("Evil attacks!!");
        battle_log("<br>");
        $turn = 1;
        $attack = $attack + 1;
        $chance = rand(1,5);
        battle_log("Chance is $chance");
        battle_log("<br>");
        $damage = $Strength_E - $Defense_T;
        if ($chance == 3)
        {
            battle_log("Tim usses the Umbrella Shield!!");
            battle_log("<br>");
            $damage = $damage / 2;
        }
        battle_log("The damage is $damage");
        battle_log("<br>");
        $Health_T = $Health_T - $damage;
        battle_log("Tim's Health is now $Health_T");
        battle_log("<br>");
    }
}
//} // Battle Over

//battle(); // do battle

// History

$tpl=file_get_contents('./history.html');     //  Obtin template-ul pentru elementele din history
$str=file_get_contents('./index.html');       //  Obtin fisierul HTML
$date = date('h:i:s a', time());              //  Numar de identificare a luptei
$rand = "collapse-";
$rand .= rand(1,100000);

$tpl=str_replace("br_number" , $date , $tpl);                       //  Folosesc numarul de identificare
$tpl=str_replace("br_text" , $battleresults , $tpl);                //  Folosesc textul luptei
$tpl=str_replace("collapse-1" , $rand , $tpl);
$tpl.="<section></section>";                                        //  Adaug un indicator pentru unde va fi asezat urmatorul rezultat

$str=str_replace("<section></section>" , $tpl , $str);              //  Folosesc indicatorul ^ pentru a adauga in locul lui rezultele

file_put_contents('./index.html', $str);                            //  Salvez modificarile la fisierul HTML

       ?>
<!--<div class="text-center" style="padding-top: 41px;padding-bottom: 41px;"><img src="battle .png" /></div>-->
<div class="text-center" style="padding-top: 0px;padding-bottom: 41px;"><img src="battle .png" /></div>

</html> 