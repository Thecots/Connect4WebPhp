<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNTECT 4</title>
    <link rel="icon" href="https://img.icons8.com/color/48/000000/4.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>DCOTS · CONNECT 4</h1>
    </header>
    <main>
       <section class="game">
            <?php
               
                session_start();

                if(isset($_GET['restart']) || !isset($_SESSION['taulell']) || !isset($_SESSION['player'])){
                    $_SESSION['player'] = 1;
                    $_SESSION["taulell"] = [
                        [0,0,0,0,0,0,0],
                        [0,0,0,0,0,0,0],
                        [0,0,0,0,0,0,0],
                        [0,0,0,0,0,0,0],
                        [0,0,0,0,0,0,0],
                        [0,0,0,0,0,0,0]
                    ];
                }
                if(isset($_GET['pos'])){
                    
                    if(checkMoviment($_SESSION['taulell'],($_GET['pos']))){
                        saveMoviment($_GET['pos'], $_SESSION['player']);
                        if($_SESSION['player'] == 1){
                            $_SESSION['player'] = 2;
                        }else{
                            $_SESSION['player'] = 1;
                        };
                    }
                    
                    printBoard($_SESSION["taulell"]);
                }else{
                    printBoard($_SESSION["taulell"]);
                }
                /* Guarda el movimento */
                function saveMoviment($column, $player){
                    $column--;
                    $c = 5;
                    while($_SESSION["taulell"][$c][$column] != 0){
                        $c--;
                    }
                    $_SESSION["taulell"][$c][$column] = $player;
                }

                /* Mira si el movimento es correcto */
                function checkMoviment($board, $column){
                    if($column == "1" || $column == "2" ||$column == "3" ||$column == "4" ||$column == "5" ||$column == "6" ||$column == "7"){
                        $column = intval($column)-1;
                        if($board[0][$column] == 0){
                            return true;
                        }else{
                            echo "Columna $column plena";
                        }
                        return false;
                    }else{
                        echo "no entenc la columna $column";
                    }
                    return false;
                }

                /* Pintar Tablero */
                function printBoard($board){
                    for($t = 0; $t < 6; $t++){
                        for($tt = 0; $tt < 7; $tt++){
                            if($board[$t][$tt] == 0){
                                echo "<div class='pice'>".$board[$t][$tt]."</div>";
                            }else if($board[$t][$tt] == 1){
                                echo "<div class='pice green'>".$board[$t][$tt]."</div>";
                            }else{
                                echo "<div class='pice red'>".$board[$t][$tt]."</div>";
                            }
                           
                        }
                        
                    }
                }

                /* Validar */
                function checkWinner($board){
                    return true;
                }
            ?>
       </section>
       <div class="buttons">
       <section class="btn">
            <a href="index.php?pos=1">1</a>
            <a href="index.php?pos=2">2</a>
            <a href="index.php?pos=3">3</a>
            <a href="index.php?pos=4">4</a>
            <a href="index.php?pos=5">5</a>
            <a href="index.php?pos=6">6</a>
            <a href="index.php?pos=7">7</a>
       </section>
       </div>
       <a href="index.php?restart=true" class="restart">RESTART</a>
    </main>
</body>
</html>            