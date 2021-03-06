<?php
   if (!isset($data))
      header("Location:"."../");
?>
<!DOCTYPE html>
<html>
<head>
  <?php include("../view/include/includes.view.php"); ?>
  <link rel="stylesheet" href="../data/css/list.css">
  <title>Dælium  - Creneau</title>
</head>
<body>
  <?php include("../view/include/header.view.php"); ?>
  <section class="col-lg-offset-2 col-lg-8">
    <form class="form-horizontal" role="form" method="post" action="../controler/creneau.ctrl.php?action=edit">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Creneau pour <?= $data["nomgroupe"] ?> au <?= $data["nommanif"] ?></div>
          <div class="panel-body">
            <div class="form-group">
              <label class="control-label col-sm-4" for="date">Date :</label>
              <div class="col-sm-8">
                <input type="date" id="date" name="date" class="form-control" required="required" value="<?= $data["date"] ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4" for="hd">Heure Debut :</label>
              <div class="col-sm-8">
                <input type="time" id="hd" name="hd" class="form-control" required="required" value="<?= $data["hd"] ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4" for="hf">Heure Fin :</label>
              <div class="col-sm-8">
                <input type="time" id="hf" name="hf" class="form-control" required="required" value="<?= $data["hf"] ?>" />
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="hdt">Heure Debut Tests :</label>
              <div class="col-sm-8">
                <input type="time" id="hdt" name="hdt" class="form-control" value="<?= $data["hdt"] ?>"/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4" for="hft">Heure Fin Tests:</label>
              <div class="col-sm-8">
                <input type="time" id="hft" name="hft" class="form-control" value="<?= $data["hft"] ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4" for="lieu">Lieu :</label>
              <div class="col-sm-8">
                <input type="text" id="lieu" name="lieu" class="form-control" value="<?= $data["lieu"] ?>"/>
              </div>
            </div>
        </div>
      </div>
      <input type="hidden" name="idnego" value="<?= $data['idnego'] ?>"/>
      <input type="hidden" name="idgroupe" value="<?= $data['idgroupe'] ?>"/>
      <input type="hidden" name="idmanif" value="<?= $data['idmanif'] ?>"/>
      <div class="pull-right">
        <input class="btn btn-default" type="reset" value="Annuler">
        <input class="btn btn-primary" type="submit" value="Créer">
      </div>
    </form>
    </section>
    <?php include("../view/include/footer.view.php"); ?>
  </body>
</html>
