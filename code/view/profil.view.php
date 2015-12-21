<?php
   if (!isset($data))
      header("Location:"."../");
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include("../view/include/includes.view.php"); ?>
    <link rel="stylesheet" href="../data/css/profile.css">
    <title>Dælium - Profil</title>
  </head>
  <body>
    <?php include("../view/include/header.view.php"); ?>
    <div class="heading full">
      <img class="wall-pic" src="../data/img/fotolia_musique.jpg"/>
      <div class="userInfo col-xs-10 col-xs-offset-1">
        <div class="col-xs-1 text-right profile-pic"><img src="../data/users/icons/User_64.png" alt="Image de Profil"></div>
        <h3 class="col-xs-8"><?= $data["nomcomplet"] ?>    (<?= $data["typename"]?>)</h3>
        <?php if($data["owner"]){ ?>
        <div class="controls col-xs-2 text-right">
          <a class="btn btn-primary" href="#">Editer</a>
        </div>
        <?php } ?>
      </div>
    </div>
    <section class="col-lg-10 col-lg-offset-1">
      <article class="col-lg-6 infoProfile">
        <div class="well">
          <h4>Contact</h4>
          <?php if($data["user"]) { ?>
          <div class="row">
            <span class="col-sm-4 text-right">Mail du compte</span><b class="col-sm-8 text-left" id="mailAccount"><?= $data["mail"] ?></b>
          </div>
          <?php } ?>
          <div class="row">
            <span class="col-sm-4 text-right">Mail de contact</span><b class="col-sm-8 text-left" id="mailAccount"><?= $data["mailco"] ?></b>
          </div>
          <div class="row">
            <span class="col-sm-4 text-right">Numéro de mobile</span><b class="col-sm-8 text-left" id="mailAccount"><?= $data["tel"] ?></b>
          </div>
        </div>
        <div class="well">
          <h4>Position</h4>
          <div class="row">
            <span class="col-sm-4 text-right">Adresse</span><b class="col-sm-8 text-left" id="adress">2 Place Doyen Gosse<br/>38000 Grenoble</b>
          </div>
          <div class="row">
            <span class="col-sm-4 text-right">Plan</span>
            <a href="https://www.google.fr/maps/place/2+Place+Doyen+Gosse,+38000+Grenoble/@45.1919241,5.717596,18z/data=!4m2!3m1!1s0x478af4872c0a703f:0x6503d8b580fceb38" target="_blank">
              Voir sur gogle maps
            </a>
          </div>
        </div>
      </article>
      <article class="col-lg-6">
        <div class="col-lg-12 well">
          <h4><?= $data["listname"] ?> : </h4>
          <ul class="groups list-group">
            <?php foreach ($data["list"] as $key => $value) { ?>
              <li class="list-group-item">
                <?php if($data["type"] == 1){ ?>
                  <span class="group-name col-sm-6"><?= $value["nom"] ?></span>
                  <div class="col-sm-4">
                    <?= $value["dated"] ?> <? $value["datef"] ?>
                  </div>
                  <div class="col-sm-2">
                    <a class="btn btn-default" href="evenement.ctrl.php?id=<?= $value["id"] ?>">Voir fiche</a>
                  </div>
                <?php  }else{ ?>
                  <span class="group-name col-sm-10"><?= $value["nom"] ?></span>
                  <div class="col-sm-2">
                    <a class="btn btn-default" href="groupe_fiche.ctrl.php?id=<?= $value["id"] ?>">Voir fiche</a>
                  </div>
                <?php } ?>

              </li>
            <?php } ?>
            <!-- <li class="list-group-item">
              <span class="group-name col-sm-10">En marche</span>
              <div class="col-sm-2">
                <a class="btn btn-default" href="groupe_fiche.ctrl.php?id=<?= "a" ?>">Voir fiche</a>
              </div>
            </li>
            <li class="list-group-item">
              <span class="group-name col-sm-10">Batoucada</span>
              <div class="col-sm-2">
                <a class="btn btn-default" href="groupe_fiche.ctrl.php?id=<?= "a" ?>">Voir fiche</a>
              </div>
            </li> -->
          </ul>
        </div>
        <div class="userDesc col-lg-12 well">
          <h4>Description</h4>
          <textarea class="form-control" readonly><?= $data["description"] ?>
          </textarea>
        </div>
      </article>
    </section>
    <?php include("../view/include/footer.view.php"); ?>
  </body>
</html>
