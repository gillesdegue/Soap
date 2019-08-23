<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Simple Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="layout" content="main"/>
    
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <script src="public/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>
    <link href="public/css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />

    <style>
    </style>
</head>
    <body>
 
        <div id="body-container">
                    <div id="body-content">
                         
                    <?= $content ?>
            </div>
        </div>

        <div id="spinner" class="spinner" style="display:none;">
            Loading&hellip;
        </div>

        <footer class="application-footer">
            <div class="container">
                <p>Application Footer</p>
                <div class="disclaimer">
                    <p>Simple CRUD PHP Oracle. All right reserved.</p>
                    <p>Copyright © Groupe_PHP 2017-2018</p>
                </div>
            </div>
        </footer>
        <script type="text/javascript">
            $(function(){
              /*  document.forms['loginForm'].elements['j_username'].focus();
                $('body').addClass('pattern pattern-sandstone');
                $("[rel=tooltip]").tooltip();*/
                $(".alert-success").fadeIn(800);
            });
        </script>
        <script src="public/js/bootstrap/bootstrap-transition.js" type="text/javascript" ></script>
        <script src="public/js/bootstrap/bootstrap-alert.js" type="text/javascript" ></script>
        <script src="public/js/bootstrap/bootstrap-modal.js" type="text/javascript" ></script>
        <script src="public/js/bootstrap/bootstrap-dropdown.js" type="text/javascript" ></script>
        <script src="public/js/bootstrap/bootstrap-scrollspy.js" type="text/javascript" ></script>
        <script src="public/js/bootstrap/bootstrap-tab.js" type="text/javascript" ></script>
        <script src="public/js/bootstrap/bootstrap-tooltip.js" type="text/javascript" ></script>
        <script src="public/js/bootstrap/bootstrap-popover.js" type="text/javascript" ></script>
        <script src="public/js/bootstrap/bootstrap-button.js" type="text/javascript" ></script>
        <script src="public/js/bootstrap/bootstrap-collapse.js" type="text/javascript" ></script>
        <script src="public/js/bootstrap/bootstrap-carousel.js" type="text/javascript" ></script>
        <script src="public/js/bootstrap/bootstrap-typeahead.js" type="text/javascript" ></script>
        <script src="public/js/bootstrap/bootstrap-affix.js" type="text/javascript" ></script>
        <script src="public/js/bootstrap/bootstrap-datepicker.js" type="text/javascript" ></script>
        <script src="public/js/jquery/jquery-tablesorter.js" type="text/javascript" ></script>
        <script src="public/js/jquery/jquery-chosen.js" type="text/javascript" ></script>
        <script src="public/js/jquery/virtual-tour.js" type="text/javascript" ></script>
        

	</body>
</html>