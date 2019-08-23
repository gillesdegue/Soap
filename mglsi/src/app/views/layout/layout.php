<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Simple Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="layout" content="main"/>
    
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <script src="/public/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>
    <link href="/public/css/bootstrap.min.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/public/icon/font-awesome/css/font-awesome.min.css">
</head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a  class="navbar-brand" href="/">Actualité MGSLI</a>
        </div>
        <?php
        if (isset($_SESSION['user']['role']) && !empty($_SESSION['user']['role'])) {
            if ($_SESSION['user']['role'] == 'editeur') :
            ?>
         <ul class="nav navbar-nav navbar-left">
              <li><a href="/editeur/article">Gestion article</a></li>
               <li><a href="/editeur/categorie">Gestion categorie</a></li>
        </ul>
        <?php endif; ?>
         <?php
        if ($_SESSION['user']['role'] == 'admin') :
        ?>
         <ul class="nav navbar-nav navbar-left">
              <li><a href="/admin/article">Gestion article</a></li>
               <li><a href="/admin/categorie">Gestion categorie</a></li>
                <li><a href="/admin/user">Gestion user</a></li>
        </ul>
        <?php endif; ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/logout">Deconnexion</a></li>
        </ul>
        <?php 
    } else { ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/login">Connecter</a></li>
        </ul>
    <?php 
} ?>

    </div>

</nav>
<div class="container" style="padding-top: 100px">
    <?= $content; ?>

</div>
       
        <script src="/public/js/bootstrap/bootstrap-transition.js" type="text/javascript" ></script>
        <script src="/public/js/bootstrap/bootstrap-alert.js" type="text/javascript" ></script>
        <script src="/public/js/bootstrap/bootstrap-modal.js" type="text/javascript" ></script>
        <script src="/public/js/bootstrap/bootstrap-dropdown.js" type="text/javascript" ></script>
        <script src="/public/js/bootstrap/bootstrap-scrollspy.js" type="text/javascript" ></script>
        <script src="/public/js/bootstrap/bootstrap-tab.js" type="text/javascript" ></script>
        <script src="/public/js/bootstrap/bootstrap-tooltip.js" type="text/javascript" ></script>
        <script src="/public/js/bootstrap/bootstrap-popover.js" type="text/javascript" ></script>
        <script src="/public/js/bootstrap/bootstrap-button.js" type="text/javascript" ></script>
        <script src="/public/js/bootstrap/bootstrap-collapse.js" type="text/javascript" ></script>
        <script src="/public/js/bootstrap/bootstrap-carousel.js" type="text/javascript" ></script>
        <script src="/public/js/bootstrap/bootstrap-typeahead.js" type="text/javascript" ></script>
        <script src="/public/js/bootstrap/bootstrap-affix.js" type="text/javascript" ></script>
        <script src="/public/js/bootstrap/bootstrap-datepicker.js" type="text/javascript" ></script>
        <script src="/public/js/jquery/jquery-tablesorter.js" type="text/javascript" ></script>
        <script src="/public/js/jquery/jquery-chosen.js" type="text/javascript" ></script>
        <script src="/public/js/jquery/virtual-tour.js" type="text/javascript" ></script>
        <!-- DataTables Plugin JavaScript -->
        <script type="text/javascript" src="/public/js/jquery.dataTables.min.js"></script>
        

	</body>
</html>