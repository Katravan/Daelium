<?php
  session_start();
  //include_once("../model/Artist.class.php");
  require_once("../model/utils.class.php");
  $data = initPage("Artistes");


  $data["action"] = "";
  if(isset($_GET["artiste"]) && isset($_GET["action"]) ){
    $data["action"] = $_GET["action"];
    $data['artistegroupe']['nomscene'] ="En Marche";


  }else if(isset($_GET["artiste"])){
    $data["action"] = "view";
    $data['artistegroupe']['nomscene'] ="En Marche";
  }else{
    $data['artistegroupe']['nomscene'] ="404";
  }


  include("../view/artiste_fiche.view.php");
?>
