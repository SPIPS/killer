<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Killer - connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="SPIPS Polytech Paris-Sud">

    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #222;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">
  </head>

  <body>

    <div class="container">
      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="<?php echo base_url(); ?>welcome/rules">Règles</a></li>
          <li><a href="<?php echo base_url(); ?>welcome/staff">L'équipe</a></li>
          <li><a href="<?php echo base_url(); ?>login/inscription">Inscription</a></li>
          <li class="active"><a href="<?php echo base_url(); ?>login/index">Connexion</a></li>
        </ul>
        <h3 class="muted">KILL€R  -by SPIPS</h3>
      </div>

      <form class="form-signin" method="post" action="<?php echo base_url(); ?>login/send_login">
        <h2 class="form-signin-heading">Connectez-vous, jeune meurtrier...</h2>
        <input type="text" class="input-block-level" name="login" placeholder="adresse e-mail">
        <input type="password" class="input-block-level" name="password" placeholder="mot de passe">
        <!--<label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>-->
        <button class="btn btn-large btn-primary" type="submit">Let's go (to the mall)</button>
        <a class="btn btn-small btn-info" href="<?php echo base_url(); ?>login/inscription">Pas encore inscris ?</a>
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-button.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-typeahead.js"></script>

  </body>
</html>
