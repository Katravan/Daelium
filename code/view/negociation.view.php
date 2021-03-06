<?php
if (!isset($data))
header("Location:"."../");
?>
<!DOCTYPE html>
<html>
<head>
  <?php include("../view/include/includes.view.php"); ?>
  <title>Dælium - Negociation</title>
</head>
<body>
  <?php include("../view/include/header.view.php"); ?>
  <section>
    <article class="col-lg-offset-1 col-lg-11">

      <h1><?= $data["titre"] ?></h1>
      <h2>Etat de la negociation : <?= $data["etat"] ?></h2>
    </article>


    <article class="col-lg-offset-1 col-lg-3">
      <div class="info">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Informations</h4>
          </div>
          <div class="panel-body">
            <div class="col-lg-12">Groupe : <?= $data["nomgroupe"] ?><a href="../controler/groupe_fiche.ctrl.php?id=<?= $data["idgroupe"] ?>" type="button" class="btn btn-default pull-right">Voir Fiche</a> </div>
          </br>
        </br>
        <div class="col-lg-12">Manifestation : <?= $data["nommanif"] ?><a href="../controler/evenement_fiche.ctrl.php?id=<?= $data["idmanif"] ?>" type="button" class="btn btn-default pull-right">Voir Fiche</a> </div>
      </br>
    </br>
    <div class="col-lg-12">Booker : <?= $data["nombooker"] ?><a href="../controler/profil.ctrl.php?id=<?= $data["idbooker"] ?>" type="button" class="btn btn-default pull-right">Voir Fiche</a></div>
  </br>
</br>
<div class="col-lg-12">Organisateur : <?= $data["nomorga"] ?><a href="../controler/profil.ctrl.php?id=<?= $data["idorga"] ?>" type="button" class="btn btn-default pull-right">Voir Fiche</a></div>
</br>
</br>
<div class="col-lg-12">Dates : <?= $data["datemanif"] ?> <p>
</div>
</div>
</div>
</article>
<article class=" col-lg-4">
  <div class="info">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Creneau</h4>

      </div>
      <div class="panel-body">

        <?php foreach ($data["creneau"] as $key => $value): ?>
          <div class="well col-lg-12 ">
            <div class="col-lg-4"><b>Date : </b><?= $value["date"] ?></div>
            <div class="col-lg-4"><b>Heure de debut :</b> <?= $value["hd"] ?></div>
            <div class="col-lg-4"><b>Heure de fin : </b><?= $value["hf"] ?></div>
            <div class="col-lg-6"><b>Heure de debut de test :</b> <?= $value["hdt"] ?></div>
            <div class="col-lg-6"><b>Heure de fin de test: </b><?= $value["hft"] ?></div>
            <div class="col-lg-12"><b>Lieu :</b><?= $value["lieu"] ?></div>
            <div class="pull-right">
              <?php if ($data["orga"]): ?>
                <!-- <a href="../controler/creneau.ctrl.php?idmanif=<?= $data['idmanif'] ?>&idgroupe=<?= $data['idgroupe'] ?>&idnego=<?= $data['idnego'] ?>" type="button" class="btn btn-warning">Modifier</a> -->
                <a href="../controler/creneau.ctrl.php?action=delete&idmanif=<?= $data['idmanif'] ?>&idgroupe=<?= $data['idgroupe'] ?>&idnego=<?= $data['idnego'] ?>" type="button" class="btn btn-danger">Supprimer</a>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
        <?php if (empty($data["creneau"]) && $data["orga"]): ?>
          <a href="../controler/creneau_new.ctrl.php?idNego=<?= $data['idnego'] ?>" type="button" class="btn btn-primary">Ajouter le creneau</a>
        <?php endif; ?>

      </div>
    </div>
  </div>
</article>

<article class=" col-lg-3">
  <div class="info">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Actions</h4>
      </div>
      <div class="panel-body">
        <?php if ($data['ascreate']): ?>
          <?php if ($data["canAction"]): ?>
            <?php if ($data["enCour"]): ?>
              <div>
                <form action="../controler/negociation.ctrl.php" method="post">
                  <input type="hidden" name="relancer" value="<?= $data['idnego'] ?>">
                  <input class="btn btn-warning" type="submit" value="Relancer la proposition">
                </form>
              </div>
            <?php endif; ?>
          </br>
          <div>
            <form action="../controler/negociation.ctrl.php" method="post">
              <input type="hidden" name="annuler" value="<?= $data['idnego'] ?>">
              <input class="btn btn-danger" type="submit" value="Annuler la proposition">
            </form>
          </div>
        <?php else: ?>
          <div>
            <form action="../controler/negociation.ctrl.php" method="post">
              <input type="hidden" name="annulerannuler" value="<?= $data['idnego'] ?>">
              <input class="btn btn-primary" type="submit" value="Annuler l'Annulation">
            </form>
          </div>
        <?php endif; ?>
      <?php elseif (!$data['ascreate']): ?>
        <?php if ($data["canAction"]): ?>
          <?php if (  !$data["Accept"]): ?>
            <div>
              <form action="../controler/negociation.ctrl.php" method="post">
                <input type="hidden" name="accepter" value="<?= $data['idnego'] ?>">
                <input class="btn btn-primary" type="submit" value="Accepter la proposition">
              </form>
            </div>
          <?php endif; ?>

          <?php if ($data["enCour"]): ?>
          </br>
          <div>
            <form action="../controler/negociation.ctrl.php" method="post">
              <input type="hidden" name="relancer" value="<?= $data['idnego'] ?>">
              <input class="btn btn-warning" type="submit" value="Relancer la proposition">
            </form>
          </div>
        <?php endif; ?>
        <?php if (!$data["refuse"]): ?>
          </br>
          <div>
            <form action="../controler/negociation.ctrl.php" method="post">
              <input type="hidden" name="refuser" value="<?= $data['idnego'] ?>">
              <input class="btn btn-danger" type="submit" value="Refuser la proposition">
            </form>
          </div>
        <?php endif; ?>
      </br>

    <?php else: ?>
      <p>Vous ne pouvez rien faire car le demandeur de cette negociation l'a annulé. </p>
    <?php endif; ?>

  <?php endif; ?>



  <!-- <form action="../controler/negociation.ctrl.php">
  <input type="hidden" name="facture" value="<?= $data['idnego'] ?>">
  <input class="btn btn-danger" type="submit" value="Créer la facture">
</form> -->




</div>
</div>
</div>
</article>

<!-- <article class="col-lg-offset-1 col-lg-10">
<div class="info">

<div class="panel panel-default">
<div class="panel-heading">
<h4>Historique</h4>
</div>
<div class="panel-body">
...


</div>
</div>
</div>
</article> -->

<!-- <article class="message col-lg-offset-1 col-lg-10">
<div class="panel panel-default">
<div class="panel-heading">
<h4>Messagerie Directe</h4>
</div>
<div class="panel-body">

<div class="col-lg-12">
<div class="col-lg-offset-2 col-lg-9" >
<div class="well">
<p>Bonjour,<br/>
Je vous contacte car j'ai reçu de nouvelles informations et je ne pourrais pas venir ce Week-End. Je vous préviens donc que j'annule le rendez-vous.<br/>
Cordialement,
Laurianne</p>
</div>
</div>
<div class=" col-lg-1" >
<div class="well">
<p>Moi</p>
</div>
</div>
</div>

<div class="col-lg-12">
<div class="col-lg-1" >
<div class="well">
<p>Lui</p>
</div>
</div>
<div class="col-lg-9" >
<div class="well">
<p>Bonjour,<br/>
Je vous contacte car j'ai reçu de nouvelles informations et je ne pourrais pas venir ce Week-End. Je vous préviens donc que j'annule le rendez-vous.<br/>
Cordialement,
Laurianne</p>
</div>
</div>
</div>


<div class="class="col-lg-12"">
<div class="col-lg-offset-2 col-lg-9" >
<div class="well">
<p>Bonjour,<br/>
Je vous contacte car j'ai reçu de nouvelles informations et je ne pourrais pas venir ce Week-End. Je vous préviens donc que j'annule le rendez-vous.<br/>
Cordialement,
Laurianne</p>
</div>
</div>
<div class=" col-lg-1" >
<div class="well">
<p>Moi</p>
</div>
</div>
</div>



<div class="col-lg-12">
<hr/>
<div class="col-lg-10">
<textarea class="form-control">Rédigez votre réponse ici ...</textarea>
</div>
<div class="col-lg-2 btn-group-vertical">
<button class="btn btn-primary btn-lg ">Envoyer</button>
</div>
</div>


</div>
</div>
</div>
</article> -->
</section>
<?php include("../view/include/footer.view.php"); ?>
</body>
</html>
