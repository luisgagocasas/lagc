<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="iso-8859-1">
        <title><?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="generator" content="Lagc Peru v.<?=base64_decode($config->lagcversion); ?>" />
        <base href="<?=$config->lagcurl; ?>" target="_parent" />
        <?=Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
        <meta name="description" content="<?php Componente::CompoDescription($_GET['lagc'], $_GET['id']); ?>">
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="alternate" type="application/atom+xml" href="<?=$config->lagcurl; ?>componentes/com_blog/rss.php" title="<?=$config->lagcnombre; ?> feed" />
        <link rel="stylesheet" href="plantillas/creatividad-digital/css/normalize.min.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="plantillas/creatividad-digital/css/estilos.css">
        <link rel="stylesheet" href="plantillas/creatividad-digital/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="plantillas/creatividad-digital/css/bootstrap-responsive.min.css" type="text/css" />
        <script src="plantillas/creatividad-digital/js/vendor/jquery-1.9.1.min.js"></script>
        <script src="plantillas/creatividad-digital/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="plantillas/creatividad-digital/js/main.js"></script>
        <!-- Desarrollado por Luis Gago Casas - luisgago@lagc-peru.com / www.lagc-peru.com -->
    </head>
    <body>
        <!--[if lt IE 9]>
            <p class="chromeframe">Usted está usando un <strong>navegador que genera cancer</strong>. Por favor <a href="http://browsehappy.com/">sea decente</a> o <a href="http://www.google.com/chromeframe/?redirect=true">instale Chrome</a> para tener una mejor vida sentimental.</p>
        <![endif]-->
        <header>
            <div class="logo1">
                <figure>
                    <img src="plantillas/creatividad-digital/img/logo0.png" alt="Logo">
                </figure>
            </div>
            <div class="logo2">
                <figure>
                    <img src="plantillas/creatividad-digital/img/logo1.png" alt="Logo">
                </figure>
            </div>
            <div class="navbar">
                <div class="navbar-inner">
                    <a class="brand pull-left" href="#">Inscribirse</a>
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse collapse">
                        <ul id="nav-list" class="nav pull-right">
                            <?php $LagcPeru->Modulos("menuprincipal"); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="login">
                <form action="" method="post">
                    <ul>
                        <li>
                            <label for="codigo">Codigo:</label>
                            <input type="text"  placeholder="1130493isi" required />
                        </li>
                        <li>
                            <label for="password">Contrase&#241;a:</label>
                            <input type="password" name="password" placeholder="******" required />
                        </li>
                        <li>
                            <center><button class="submit" type="submit">Entrar</button></center>
                        </li>
                    </ul>
                </form>
            </div>
        </header>
        <section class="proyectos">
            <?php Componente::Mostrar(); ?>
        </section>
        <footer class="pie efecto">
            <ul>
                <?php $LagcPeru->Modulos("menuprincipal"); ?>
            </ul>
            <div class="tiempo">
                <span>Faltan</span>
                <h2>18</h2>
                <h3>D&iacute;as</h3>
            </div>
            <figure class="siguenos">
                <img src="plantillas/creatividad-digital/img/social_siguenos.png">
            </figure>
            <figure class="redessoci">
                <a href="#" title="Facebook"><img src="plantillas/creatividad-digital/img/ico_facebook.png"></a>
                <a href="#" title="Twitter"><img src="plantillas/creatividad-digital/img/ico_twitter.png"></a>
                <a href="#" title="Evento"><img src="plantillas/creatividad-digital/img/ico_linkedin.png"></a>
            </figure>
            <p>Copyright &copy; 2013 - Todos los derechos Reservados.<br><a href="http://plataforma.edu.pe/">Plataforma.edu.pe</a></p>
        </footer>
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <!--[if lt IE 9 ]>
            <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
            <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
        <![endif]-->
    </body>
</html>