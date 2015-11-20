  <header class="page-header" style="margin: 0px; border: none;">
    <div id="top">
      <!--<h1>Dælium <small>Le site des échanges musicaux</small></h1>
      <!-- Logo du site , tritre description -->
    </div>
      <nav class="nav navbar-default container-fluid" style="height: 50px; position: fixed; width: 100%; z-index: 20;">
        <div class="navbar-header">
          <img src="../data/img/D.png" alt="LogoSite" style="height:50px;">
        </div>
        <!-- Menu des differentes section du site  plus module de recherche-->
        <ul class="nav navbar-nav">
          <li<?php echo($data['page']=="Main"?" class='active'":"") ?>><a href="../controler/main.ctrl.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
          <li<?php echo($data['page']=="Profile"?" class='active'":"") ?>><a href="../controler/profile.ctrl.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
          <li<?php echo($data['page']=="Documents"?" class='active'":"") ?>><a href="../controler/documents.ctrl.php"><span class="glyphicon glyphicon-file"></span> Documents</a></li>
          <li<?php echo($data['page']=="Agenda"?" class='active'":"") ?>><a href="../controler/agenda.ctrl.php"><span class="glyphicon glyphicon-calendar"></span> Agenda</a></li>
          <li<?php echo($data['page']=="Messages"?" class='active'":"") ?>><a href="../controler/messages.ctrl.php"><span class="glyphicon glyphicon-envelope"></span> Messagerie</a></li>
          <li<?php echo($data['page']=="List"?" class='active'":"") ?>><a href="../controler/list.ctrl.php"><span class="glyphicon glyphicon-list-alt"></span> Annuaire</a></li>
          <?php if($data["type"] == "booker") { ?>
            <li<?php echo($data['page']=="Artistes"?" class='active'":"") ?>><a href="../controler/artistes.ctrl.php"><span class="glyphicon glyphicon-music"></span> Mes artistes</a></li>
          <?php } else { ?>
            <li<?php echo($data['page']=="Evenements"?" class='active'":"") ?>><a href="../controler/evenements.ctrl.php"><span class="glyphicon glyphicon-folder-open"></span> Mes evenements</a></li>
          <?php }?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <!-- Menu de l'uilisateur-->
          <li id="settings" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Paramétres <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>
                <?php if($data["type"]=="booker") { ?>
                  <p class="colsm-12"><span class="glyphicon glyphicon-ok"></span> Booker</p>
                <?php } else { ?>
                  <a href="../controler/main.ctrl.php?type=booker">Booker</a>
                <?php } ?>
              </li>
              <li>
                <?php if($data["type"]=="organisateur") { ?>
                  <p class="colsm-12"><span class="glyphicon glyphicon-ok"></span> Organisateur</p>
                <?php } else { ?>
                  <a href="../controler/main.ctrl.php?type=organisateur">Organisateur</a>
                <?php } ?>
              </li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
          <li id="profile" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Compte <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../controler/profile.ctrl.php">Voir le profil</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="../view/nolog.view.php"><span class="glyphicon glyphicon-off"></span> Déconnexion</a></li>
            </ul>
          </li>
        </ul>

        <form class="navbar-form navbar-right" method="GET" action="#">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Je cherche ...">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button">Rechercher</button>
            </span>
          </div>
        </form>
      </nav>
  </header>
  <div style="height:50px;"></div>
  <?php foreach ($data['alert'] as $alert) { ?>
    <p class="alert alert-<?= $alert['type'] ?> alert-dismissible"><span class="glyphicon glyphicon-<?= $alert['icon'] ?>"></span> <?= $alert['message'] ?> <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>
  <?php } ?>
