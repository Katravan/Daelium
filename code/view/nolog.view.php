<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../data/css/bootstrap.css">
    <link rel="stylesheet" href="../data/css/nolog.css"/>
    <link rel="icon" type="image/png" href="../data/img/D.png" />
    <title>Dælium</title>
  </head>
  <body onscroll="scroll()"><!-- onscroll="attachNavbar()" -->
    <div id="welcome-page">
      <nav id="navbar" class="container-fluid nav navbar-default">
        <div class="navbar-header">
          <img src="../data/img/D.png" alt="LogoSite" style="height:50px;"/>
        </div>
        <!-- Menu des differentes section du site  plus module de recherche-->
        <form class="navbar-form navbar-right" method="GET" action="#">
          <!-- Menu de l'uilisateur-->
            <a href="signin.view.php" type="button" class="btn btn-primary">Se connecter</a>
            <a href="signup.view.php" type="button" class="btn btn-warning">Je m'inscrit maintenant !</a>
        </form>
      </nav>
      <div id="carousel">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="slide-full item active">
              <!--<img src="../data/img/fotolia_musique.jpg" style="position: relative; bottom: 500px;"/>-->
              <div class="carousel-caption">
                <h1>Bienvenue sur <b>Dælium</b></h1>
                <p>Bienvenue sur le site de gestion musical. Oui je vais mettre la barre en haut !</p>
              </div>
            </div>
            <div class="slide-full item">
              <!--<img src="../data/img/fotolia_musique.jpg" style="position: relative; bottom: 500px;"/>-->
              <div class="carousel-caption">
                <h1>Another example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a id="sliderButton" class="btn btn-lg btn-primary" href="#navbar" role="button">Je veux en savoir plus !</a></p>
              </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="btn-down container-fluid">
        <a href="#navbar">Lire ...</a>
      </div>
    </div>

    <div id="contentAnchor">.</div>

    <div class="container marketing">
      <div class="row">
        <blockquote>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus vulputate tellus, eget ornare nibh eleifend sed. Etiam efficitur nisi sit amet laoreet efficitur. Maecenas sit amet scelerisque erat, sit amet facilisis erat. Praesent facilisis, elit sed posuere faucibus, risus eros pulvinar ex, nec ornare sapien enim id nulla. Aliquam at lacinia quam. Fusce laoreet ultricies enim, eu elementum nunc venenatis non. Aenean molestie enim nec dui consequat interdum. Morbi ipsum nisl, bibendum non eros in, gravida hendrerit purus. Donec orci risus, consequat at nisl eu, maximus ullamcorper erat. Nam in libero diam. Quisque et molestie sem, non tempor turpis. Aliquam erat volutpat.
        </blockquote>
      </div>
      <div class="row">
        <div class="col-lg-4 text-center">
          <a href="#">
            <div class="img-circle"><span class="icon-img icon-gift"></span></div>
          </a>
          <h2>Gratuit</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 text-center">
          <a href="#">
            <div class="img-circle"><span class="icon-img icon-tools2"></span></div>
          </a>
          <h2>Innovant</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 text-center">
          <a href="#">
            <div class="img-circle"><span class="icon-img icon-adjustments"></span></div>
          </a>
          <h2>Adaptable</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      <div id="troops" class="row">
        <div id="troop_1" class="col-lg-4 text-center" style="display: none;">
          <h2 class="text-left">En marche</h2>
          <p>Le cébébre groupe En marche fait parti de notre projet, alors vous aussi rejoignez la communauté. Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
        </div><!-- /.col-lg-4 -->
        <div id="troop_2" class="col-lg-4 text-center" style="display: none;">
          <h2 class="text-left">Batoucada</h2>
          <p>La Batoucada soutient notre site. Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
        </div><!-- /.col-lg-4 -->
        <div id="troop_3" class="col-lg-4 text-center" style="display: none;">
          <h2 class="text-left">Berlondon</h2>
          <p>Le groupe Berlino-Londonnien est membre de Dælium depuis déjà 5 ans. Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      <div id="counters" class="row">
        <div id="counter_1" class="col-lg-4 text-center" style="display: none;">
          <div class="media">
            <div class="media-left media-middle">
              <div class="media-object img-circle large"><span class="counter" data-from="0" data-to="124" data-speed="1500">0</span><br/><span class="icon-img small icon-briefcase"></span></div>
            </div>
            <div class="media-body">
              <h2 class="media-heading">Organisateurs</h2>
            </div>
          </div>
        </div><!-- /.col-lg-4 -->
        <div id="counter_2" class="col-lg-4 text-center" style="display: none;">
          <div class="media">
            <div class="media-left media-middle">
              <div class="media-object img-circle large"><span class="counter" data-from="0" data-to="256" data-speed="1500">0</span><br/><span class="icon-img small icon-megaphone"></span></div>
            </div>
            <div class="media-body">
              <h2 class="media-heading">Bookers</h2>
            </div>
          </div>
        </div><!-- /.col-lg-4 -->
        <div id="counter_3" class="col-lg-4 text-center" style="display: none;">
          <div class="media">
            <div class="media-left media-middle">
              <div class="media-object img-circle large"><span class="counter" data-from="0" data-to="380" data-speed="1500">0</span><br/><span class="icon-img small icon-happy"></span></div>
            </div>
            <div class="media-body">
              <h2 class="media-heading">Utilisateurs</h2>
            </div>
          </div>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      <div class="row">
        <div class="col-lg-8">
          <h2>Rejoindre Dælium</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus vulputate tellus, eget ornare nibh eleifend sed. Etiam efficitur nisi sit amet laoreet efficitur. Maecenas sit amet scelerisque erat, sit amet facilisis erat. Praesent facilisis, elit sed posuere faucibus, risus eros pulvinar ex, nec ornare sapien enim id nulla.</p>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p class="text-right"><a class="btn btn-default btn-lg" href="#" role="button">Inscription &raquo;</a><br/><a style="font-size: 10px;" href="#" role="button">Connexion &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <h2>Contact</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus vulputate tellus, eget ornare nibh eleifend sed. Etiam efficitur nisi sit amet laoreet efficitur. Maecenas sit amet scelerisque erat, sit amet facilisis erat. Praesent facilisis, elit sed posuere faucibus, risus eros pulvinar ex, nec ornare sapien enim id nulla.</p>
          <p><a class="btn btn-default" href="#" role="button">Nous contacter &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
    </div>

    <?php include("../view/include/footer.view.php"); ?>
    <script src="../data/js/jQuery.min.js"></script>
    <script src="../data/js/bootstrap.min.js"></script>
    <script src="../data/js/jquery.scrollTo.min.js"></script>
    <script src="../data/js/nolog.js"></script>
  </body>
</html>
