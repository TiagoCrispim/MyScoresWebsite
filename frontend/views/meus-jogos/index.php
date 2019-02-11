<?php
$this->title = 'Meus Jogos';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php for ($i=0;$i < count($golos_equipa1);$i++) {?>
    <div class="card">
        <div class="body-content" style="margin-bottom: 20px; text-align: center; border-style: solid;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4">
                    <h3 id="resultado1"> <?=$nome_equipa1[$i][0]['nome']?> </h3>
                    </div>
                    <div class="col-lg-4">
                        <h3>VS</h3>
                    </div>
                    <div class="col-lg-4">
                        <h3 id="resultado2"> <?=$nome_equipa2[$i][0]['nome']?></h3>
                    </div>


                    <?php for($j=0;$j<count($usernames1)+2;$j++){?>
                        <div class="col-lg-3">
                            <p><?=$usernames1[$i][$j]?></p>

                        </div>
                        <div class="col-lg-1"><?=$golos_equipa1[$i][$j]['golosMarcados']?></div>
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-3">
                            <p><?=$usernames2[$i][$j]?></p>
                        </div>
                        <div class="col-lg-1"><?=$golos_equipa2[$i][$j]['golosMarcados']?></div>


                    <?php }?>
                 </div>
            </div>
        </div>
    </div>
<?php } ?>
