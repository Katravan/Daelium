<?php
   session_start();
   include("include/auth.ctrl.php");
   require_once("../model/utils.class.php");
   $data = initPage("Messages");

   require_once("../model/Message.class.php");
   require_once("../model/Notification.class.php");
   require_once("../model/DAO.class.php");

   $userid = $_SESSION["user"]["ID"];
   $dao = new DAO();

   if (!isset($_GET['ajax'])) {
      $userObj = $dao->readPersonneById($userid);

      $messagesrecus = $dao->readMessagesRecusByUtilisateur($userid);
      $messagesenvoyes =  $dao->readMessagesEnvoyesByUtilisateur($userid);
      $messagesbrouillons =  $dao->readMessagesBrouillonsByUtilisateur($userid);

      $DEBUG[]="Moi";
      $DEBUG[]=$userObj;

      $DEBUG[]="Recu";
      $data['count']["messageR"] = 0; // Nombre de message non lus
      $data["messageR"] = Array();
      if ($messagesrecus!=null)
      foreach ($messagesrecus as $key => $message) {
         $userExp = $dao->readPersonneById($message->getExpediteur());
         $convID = $dao->readConversationByMessage($message->getID());
         $conv = $dao->readConversationById($convID);

         $data["messageR"][$key]["id"] = $message->getID();
         $data["messageR"][$key]["expediteur"] = $userExp->getNomComplet(); // Mettre le nom
         $data["messageR"][$key]["date"] = $message->getDateenvoi();
         $data["messageR"][$key]["conversation"] = $conv->getID();
         $data["messageR"][$key]["objet"] = $conv->getNom();
         $data["messageR"][$key]["origine"] = $conv->getIDMessageOrigine()==$message->getID(); // Si c'est le message d'origine de la conversation
         $data["messageR"][$key]["lu"] = $message->getEtat()>=10;

         if ($message->getEtat()<10)
            $data['count']["messageR"]++;

         $DEBUG[]=$message;
      }

      $DEBUG[]="Envoyé";
      $data["messageE"] = Array();
      if ($messagesenvoyes!=null)
      foreach ($messagesenvoyes as $key => $message) {
         $userRec = $dao->readPersonneById($message->getDestinataire());
         $convID = $dao->readConversationByMessage($message->getID());
         $conv = $dao->readConversationById($convID);

         $data["messageE"][$key]["id"] = $message->getID();
         $data["messageE"][$key]["destinataire"] = $userRec->getNomComplet(); // Mettre le nom
         $data["messageE"][$key]["conversation"] = $conv->getID();
         $data["messageE"][$key]["objet"] = $conv->getNom();
         $data["messageE"][$key]["origine"] = $conv->getIDMessageOrigine()==$message->getID(); // Si c'est le message d'origine de la conversation
         $data["messageE"][$key]["date"] = $message->getDateenvoi();

         $DEBUG[]=$message;
      }

      $DEBUG[]="Brouillons";
      $data['count']["messageB"] = 0; // Nombre de brouillons
      $data["messageB"] = Array();
      if ($messagesbrouillons!=null)
      foreach ($messagesbrouillons as $key => $message) {
         $userRec = $dao->readPersonneById($message->getDestinataire());
         $convID = $dao->readConversationByMessage($message->getID());
         $conv = $dao->readConversationById($convID);

         $data["messageB"][$key]["id"] = $message->getID();
         $data["messageB"][$key]["destinataire"] = $userRec->getNomComplet(); // Mettre le nom
         $data["messageB"][$key]["conversation"] = $conv->getID();
         $data["messageB"][$key]["objet"] = $conv->getNom();
         $data["messageB"][$key]["origine"] = $conv->getIDMessageOrigine()==$message->getID(); // Si c'est le message d'origine de la conversation
         $data["messageB"][$key]["date"] = $message->getDateenvoi();

         $data['count']["messageB"]++;

         $DEBUG[]=$message;
      }
   }

   if (isset($_GET['message'])) {
      $message = $dao->readMessageById($_GET['message']);
      if ($message != null) {
         if ($message->getExpediteur()==$userid || $message->getDestinataire()==$userid) {
            $userExp = $dao->readPersonneById($message->getExpediteur());
            $userDes = $dao->readPersonneById($message->getDestinataire());
            $convID = $dao->readConversationByMessage($message->getID());
            $conv = $dao->readConversationById($convID);
            if (isset($_GET['setState'])) {
               $message->setEtat($_GET['setState']);
               $dao->updateMessage($message);
               $data['info'] = "Set state to ".$_GET['setState'];
            }
            $data['message']['id'] = $message->getID();
            $data['message']["me"] = ($message->getExpediteur()==$userid?'E':'D'); // Je suis Expediteur ou Destinataire ?
            $data['message']["destinataire"] = $userDes->getNomComplet();
            $data['message']["destinataire-id"] = $message->getDestinataire();
            $data['message']["expediteur"] = $userExp->getNomComplet();
            $data['message']["date"] = $message->getDateenvoi();
            $data["message"]["conversation"] = $conv->getID();
            $data["message"]["objet"] = $conv->getNom();
            $data["message"]["origine"] = $conv->getIDMessageOrigine()==$message->getID(); // Si c'est le message d'origine de la conversation
            $data['message']["contenu"] = $message->getContenu();
            $data['message']["etat"] = $message->getEtat();
            $data['message']['tags'] = $dao->readMessageTagsByMessage($message->getID());
         } else {
            $data['error']['title'] = "Interdit";
            $data['error']['back'] = "../controler/messages.ctrl.php";
            $data['error']['message'] = "Vous n'avez pas le droit d'accéder a ce message.";
            $data['error']['code'] = 5103; // Message - Message - Interdit
         }
      } else {
         $data['error']['title'] = "Inconnu";
         $data['error']['back'] = "../controler/messages.ctrl.php";
         $data['error']['message'] = "Ce message n'existe pas.";
         $data['error']['code'] = 5104; // Message - Message - Inconnu
      }
   }

   if (isset($_GET['conversation'])) {
      $conv = $dao->readConversationById($_GET['conversation']);
      if ($conv != null) {
         $pMessage = $dao->readMessageById($conv->getIDMessageOrigine());
         if ($pMessage->getExpediteur()==$userid || $pMessage->getDestinataire()==$userid) {
            $data['conversation']['id'] = $conv->getID();
            $data['conversation']["me"] = ($pMessage->getExpediteur()==$userid?'E':'D'); // Je suis Expediteur ou Destinataire ?
            $data["conversation"]["objet"] = $conv->getNom();
            $data["conversation"]["origine"] = $conv->getIDMessageOrigine();
            $data["conversation"]['list'] = $dao->readMessagesByConversation($conv->getID());
         } else {
            $data['error']['title'] = "Interdit";
            $data['error']['back'] = "../controler/messages.ctrl.php";
            $data['error']['message'] = "Vous n'avez pas le droit d'accéder a cette conversation.";
            $data['error']['code'] = 5203; // Message - Conversation - Interdit
         }
      } else {
         $data['error']['title'] = "Inconnu";
         $data['error']['back'] = "../controler/messages.ctrl.php";
         $data['error']['message'] = "Cette conversation n'existe pas.";
         $data['error']['code'] = 5204; // Message - Conversation - Inconnu
      }
   }

   if (isset($_GET['edit']) && isset($_GET['recipient'])) {
     $data['open']['type'] = "edit";
     $data['recipient']['id'] = $_GET['recipient'];
     $user = $dao->readPersonneById($_GET['recipient']);
     if ($user != null) {
       $data['recipient']['name'] = $user->getNomComplet();
     }
   }

   if (isset($_GET['send']) && isset($_GET['create'])) {
     $userObj = $dao->readPersonneById($userid);

     $mess = new Message(NULL,$_SESSION['user']['ID'],$_POST['recipient'],$_POST['etat'],$_POST['contenu'],date("Y-m-d H:i:s"));
     $idM = $dao->createMessageNewConv($mess,$_POST['titre']);
     if ($_POST['etat']>=5) {
       $dao->createNotification(new Notification(NULL,0,$_POST['recipient'],0,"Vous avez reçu un message de ".$userObj->getNomComplet()." : <a href=\"../controler/messages.ctrl.php?id=".$idM."\">Voir</a>"));
     }
     $data['request']['code'] = 200;
     $data['request']['message'] = "Create";
   }

   if (isset($_GET['send']) && isset($_GET['update'])) {
     $userObj = $dao->readPersonneById($userid);

     $mess = $dao->readMessageById($_POST['idMessage']);
     $mess->setEtat($_POST['etat']);
     $mess->setContenu($_POST['contenu']);
     $mess->setDate(date("Y-m-d H:i:s"));
     $dao->updateMessage($mess);
     if ($_POST['etat']>=5) {
       $dao->createNotification(new Notification(NULL,0,$_POST['recipient'],0,"Vous avez reçu un message de ".$userObj->getNomComplet()." : <a href=\"../controler/messages.ctrl.php?id=".$mess->getID()."\">Voir</a>"));
     }
     $data['request']['code'] = 200;
     $data['request']['message'] = "Update";
   }

   // ------------- DISPLAY -------------
   if (isset($_GET['ajax'])) {
      header("Content-Type:"."application/json");
      echo(json_encode($data,JSON_PRETTY_PRINT));
   } else {
      if (!isset($data['error']))
         include("../view/messages.view.php");
      else
         include("../view/error.view.php");
   }
?>
