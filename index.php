<?php
session_start();

require "helper.class.php";
require "carteira.class.php";


$carteira = new Carteira();
$helper = new Helper();

$header = "";
$title = "";
$nav1 = "Principal";
$nav2 = "Marketplace";
$nav3 = "Exchange";
$footer = /*"Iniciado por John em 02/11/2021 <BR>". $helper->getProvider()*/"";



?>
<html>
    <head>
        <title>
            <?php echo $title; ?>
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div id="header">
            <h1>
                <?php echo $header; ?>
            </h1>
        </div>
        <div id="nav">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a href="?page=<?php echo $nav1; ?>" class="nav-link">
                        <?php echo $nav1; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=<?php echo $nav2; ?>" class="nav-link">
                        <?php echo $nav2; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=<?php echo $nav3; ?>" class="nav-link">
                        <?php echo $nav3; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary">
                        Saldo <span class="badge bg-secondary"><?php echo $carteira->getSaldo( 1 ); ?></span>
                    </button>
            </ul>
        </div>
        <div id="content">
            <?php include_once 'conteudo.php'; ?>
        </div>
        <div id="footer">
            <p>
                <?php echo $footer; ?>
            </p>
        </div>

        <!-- adiciona os scripts bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
    </body>
</html>