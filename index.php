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
        <?php

           

            session_start();
            
            $_SESSION["taulell"] = [
                [0,0,0,0,0,0,0],
                [0,0,0,0,0,0,0],
                [0,0,0,0,0,0,0],
                [0,0,0,0,0,0,0],
                [0,0,0,0,0,0,0],
                [0,0,0,0,0,0,0]
            ];

            printBoard($_SESSION["taulell"]);
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
                        echo "|".$board[$t][$tt];
                    }
                    echo "|<br>";
                }
            }

            /* Validar */
            function checkWinner($board){
                return true;
            }
            sleep(1);

        ?>
    </main>
</body>
</html>