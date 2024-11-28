<?php 

class Site{

     public static function setUsuarioSite($nome,$cargo)
     {
          $sql = Mysql::conectar()->prepare('INSERT INTO tb_equipe VALUES (NULL,?,?)');
          $sql->execute(array($nome,$cargo));
     }

     public static function setTitle($title,$direitos,$nome)
     {
     
          $sql = Mysql::conectar()->prepare("UPDATE `tb_info.site` SET titulo = ?, direitos = ?, nome = ?");
          $sql->execute(array($title,$direitos,$nome));
     }

     public static function getLeaderboard()
     {
          $sql = Mysql::conectar()->prepare("SELECT * FROM `tb_leaderboard` ORDER BY top DESC LIMIT 20");
          $sql->execute();
          return $sql->fetchAll();
     }

     public static function upContato($nickname,$email,$mensagem)
     {
          $sql = Mysql::conectar()->prepare("INSERT INTO tb_emails VALUES (NULL,?,?,?)");
          $sql->execute(array($nickname,$email,$mensagem));
          
     }

     public static function setNovidades($novidades,$nome)
     {
          $sql = Mysql::conectar()->prepare("INSERT INTO tb_novidades VALUES (NULL,?,?)");
          $sql->execute(array($novidades,$nome));
     }

     public static function getNovidades()
     {
          $sql = Mysql::conectar()->prepare("SELECT * FROM tb_novidades  ORDER BY id DESC LIMIT 3");
          $sql->execute();
          
          if($sql->rowCount() == 0){
               echo '<div class="novidades-ultra">Sem notícias :(</div>';
               return $sql->fetchAll();
          } else 
          {
               return $sql->fetchAll();
          }
     }

     public static function getEquipePlayer_8()
     {
          $sql = Mysql::conectar()->prepare("SELECT * FROM `tb_equipe` WHERE cargo = 8");
          $sql->execute();
          return $sql->fetchAll();
     }

     public static function getEquipePlayer($user_group_id)
     {
          $groups = Painel::$cargos;


          $sql = Mysql::conectar()->prepare("SELECT * FROM `tb_equipe` WHERE cargo = ?");
          $sql->execute([$user_group_id]);
          $user = $sql->fetchAll();

          foreach($user as $key => $info){
               $user[$key]['cargo'] = $groups[$info['cargo']];
          }

          return $user;
     }
}
?>