<?php

    $leaderboard = false;
    $mysqli = new mysqli("localhost","root","root","cen_game");

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    // Perform query
    if ($result = $mysqli->query("SELECT * FROM leaderboard ORDER BY score DESC")) {            
        $leaderboard = $result->fetch_all();
    }

    $mysqli -> close();

    
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- Set the title bar of the page -->
        <title>Classificação | Uma Aventura Cibersegura!</title>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </head>

    <style>
        body{
            overflow: auto !important;
        }
        .leaderboard{
            width: 100vw;
            height: 97vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }        
        table{            
            margin: 0 auto;
            margin-top: 40px;            
            width: 500px !important;
            border: 2px solid #353556 !important;
        }
    </style>

    <body>
        
        <a href="#" id="menu-btn">
            <img src="./assets/menu.png" alt="Menu" class="menu">
        </a>
        <div id="menu">
            <div class="wrapper">
                <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
                <img src="./assets/logo.png" alt="Uma Aventura Cibersegura" class="logo">
                <ul class="menu-list">                    
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#howtoModal">Como Jogar</a></li>
                    <li><a href="./">Jogar</a></li>
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#creditModal">Créditos</a></li>                    
                </ul>
            </div>
        </div>

        <div class="leaderboard">
            <h3 style="text-trasnform: uppercase; margin-bottom: 30px">Classificação</h3>
            <div style="max-height: 450px; overflow-y: auto; padding: 0 80px">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Score</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($leaderboard as $key => $item): ?>
                            <tr>
                                <td><?php echo $item[1];?></td>
                                <td><?php echo $item[2];?></td>
                                <td><?php echo $item[3];?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Como Jogar -->
        <div class="modal fade" id="howtoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Como Jogar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">                    
                        <p>Controle seu personagem com WASD ou as setas direcionais do seu teclado</p>
                        <p>Responda a perguntas precionando o numero correspondente no seu teclado ( 1 2 3 ou 4 )</p>
                        <p>A cada resposta correcta acumula-se pontos.</p>
                        <p>O objetivo e Chegar ao fim do jogo respondendo a maior quantidade de perguntas correctamente.</p>
                        <p>Finalize o Jogo e compare seus resultados com seus amigos na pagina de <a href="./leaderboard.php" target="_blank">Classificação</a></p>
                    </div>                
                </div>
            </div>
        </div>

        <!-- Modal Creditos -->
        <div class="modal fade" id="creditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Créditos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>Bruno Neves nº 201910108</li>
                            <li>Daniel Gonçalves nº 4332</li>
                            <li>Euler Ribeiro nº 201910328</li>
                            <li>Jesus Faria nº 2019101052</li>
                            <li>Sandro Alves nº 201910330</li>
                            <li>Vítor Costa nº 2019103248</li>
                        </ul>
                    </div>                
                </div>
            </div>
        </div>
        

        <script>
            $(document).ready(function(){

                $("#menu-btn").click(function(e){
                    $("#menu").css("display", 'flex');
                });

                $(".close-menu").click(function(e){
                    $("#menu").css("display", 'none');
                });

            });
        </script>
        
    </body>
</html>
