<?php 
    $groups = array_reverse(Painel::$cargos, true);
?>
<div class="container">
    <div class="welcome">
        <h2>Equipe <?php echo NOME_EMPRESA;?></h2>
        <div class="post-content">
            <?php
            foreach ($groups as $id => $group):
                $staffs = Site::getEquipePlayer($id);
                $color = Painel::colorGroup($id);
                if(empty($staffs) || $id == 0){
                    continue;
                    
                }
            ?>
                <div class="equipe-category">
                    <div class="box-equipe-top color-<?php echo $color?>">
                        <h3><?php echo $group.' ('.count($staffs).')';?></h3>
                    </div> <!-- Barra da categoria-->
                    
                    <?php foreach($staffs as $key => $info): ?>
                    <div class="perfil-equipe">
                        <img src="https://minotar.net/helm/<?php echo $info['nickname'];?>/64.png" alt="">
                        <p><?php echo $info['nickname'];?></p>
                    </div> 
                    <?php endforeach; ?> 
            
                    <div class="clear"></div>
                </div> <!-- equipe-category -->
            
            <?php  endforeach; ?> 
        </div> <!-- post-content -->
    </div>
    <div class="fique-por-dentro">
        <h2>Veja também!</h2>
        <div class="redes-content">
            <iframe src="https://discordapp.com/widget?id=739593623850713100&theme=dark" width="100%" height="300px" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
            <br>
            <br>
            <a class="twitter-timeline" href="https://twitter.com/_HyzeMC?ref_src=twsrc%5Etfw">Tweets by _HyzeMC</a> 
        </div>
    </div>
    <div class="clear"></div>
</div>
