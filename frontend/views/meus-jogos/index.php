<?php
/**
 * Created by PhpStorm.
 * User: rodas
 * Date: 25/01/2019
 * Time: 03:29
 */
?>
<?php for ($i=0;$i < count($golos_equipa1);$i++) {?>
    <div class="card">

        <span id="resultado1"> <?=$nome_equipa1[$i][0]['nome']?> </span> <span>VS</span> <span id="resultado2"> <?=$nome_equipa2[$i][0]['nome']?></span>


        <?php for($j=0;$j<=count($usernames1)+2;$j++){?>
            <div>
                <span><?=$usernames1[$i][$j]?></span>
                <span><?=$usernames2[$i][$j]?></span>
            </div>


        <?php }?>


    </div>

<?php } ?>
