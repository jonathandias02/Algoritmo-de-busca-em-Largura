<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Algoritimo de Busca</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script src="js/jquery.js"></script>
    </head>
    <body>
        <?php
        $filtro = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $inicio = isset($filtro['partida']) ? $filtro['partida'] : null;
        $meta = isset($filtro['meta']) ? $filtro['meta'] : null;
        ?>
        <div class="container-fluid mx-auto d-block">
            <div class="row">
                <div class="col-3">
                    <h1 align="center" style="margin-top: 20px;">Grafo</h1><br/>
                    <img src="imagens/Grafo.png" class="rounded mx-auto d-block" style="width: 300px; height: 300px;"/>
                </div>
                <div class="col">
                    <h1 align="center" style="margin-top: 20px;">Busca em Largura</h1>
                    <form style="margin: 50px 50px 0 50px;" method="post" action="Buscas.php">                        
                        <div class="row">
                            <div class="col">
                                <label style="margin-top: 20px;">Selecione o Ponto de Partida:</label>
                                <select name="partida" class="form-control">
                                    <option value="a">a</option>
                                    <option value="b">b</option>
                                    <option value="c">c</option>
                                    <option value="d">d</option>
                                    <option value="e">e</option>
                                    <option value="f">f</option>
                                    <option value="g">g</option>
                                    <option value="h">h</option>
                                </select>
                            </div>
                            <div class="col">
                                <label style="margin-top: 20px;">Selecione a Meta:</label>
                                <select name="meta" class="form-control">
                                    <option value="a">a</option>
                                    <option value="b">b</option>
                                    <option value="c">c</option>
                                    <option value="d">d</option>
                                    <option value="e">e</option>
                                    <option value="f">f</option>
                                    <option value="g">g</option>
                                    <option value="h">h</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn btn-success mx-auto" type="submit" style="width: 200px; margin-top: 20px;">Buscar</button>
                        </div>
                    </form><br/>
                    <label style="margin: 0 50px 0 50px;"><b><?php echo "Caminho encontrado de <b style='font-size: 18pt; color: green;'>" . $inicio . "</b> a <b style='font-size: 18pt; color: green;'>" . $meta . "</b>: "; ?></b><span id="resultado" style="font-size: 16pt; font-weight: bold; color: red; "></span></label>       
                </div>
            </div><br/>
            <h5>Historico da busca:</h5>

            <?php
            //grafo
            $matriz = array(
                "a" => array("b", "c"),
                "b" => array("a", "c", "d", "e"),
                "c" => array("a", "h", "b", "e", "f"),
                "d" => array("b", "e"),
                "e" => array("b", "c", "d", "f", "g"),
                "f" => array("c", "e"),
                "g" => array("e"),
                "h" => array("c")
            );
            //fronteira
            $fronteira = array($inicio);
            //explorados
            $explorados = array();
            //verificadores
            $verificaFronteira = true;
            $verificaExplorados = true;
            //inicio dos caminhos
            $caminhos = array(
                "a" => array("a"),
                "b" => array("b"),
                "c" => array("c"),
                "d" => array("d"),
                "e" => array("e"),
                "f" => array("f"),
                "g" => array("g"),
                "h" => array("h"),
            );
            //iniciando historico de busca
            echo "<span style='color: green;'>F:</span> { [" . implode("", $fronteira) . "] }" . "<br/>";
            echo "<span style='color: red;'>E:</span> { " . implode(", ", $explorados) . " }" . "<br/><br/>";
            //busca
            while ($fronteira[0] != $meta) {
                //explorando caminhos
                for ($i = 0; $i < count($matriz[$fronteira[0]]); $i++) {
                    //verificando se visinhos ja estão na fronteira
                    for ($j = 0; $j < count($fronteira); $j++) {
                        if ($matriz[$fronteira[0]][$i] == $fronteira[$j]) {
                            $verificaFronteira = false;
                            break;
                        } else {
                            $verificaFronteira = true;
                        }
                    }
                    //verificando se visinhos ja estão nos explorados
                    for ($h = 0; $h < count($explorados); $h++) {
                        if ($matriz[$fronteira[0]][$i] == $explorados[$h]) {
                            $verificaExplorados = false;
                            break;
                        } else {
                            $verificaExplorados = true;
                        }
                    }
                    //se nao tiver na fronteira nem nos explorados add no fim da fronteira
                    if ($verificaFronteira == true && $verificaExplorados == true) {
                        array_push($fronteira, $matriz[$fronteira[0]][$i]);
                        array_push($caminhos[$matriz[$fronteira[0]][$i]], ", " . implode("", $caminhos[$fronteira[0]]));
                    }
                }
                //adicionado item explorado nos explorados
                array_push($explorados, $fronteira[0]);
                //retirando item explorado da fronteira
                array_shift($fronteira);
                //imprimindo historico de busca
                echo "<span style='color: green;' id='ultimo'>F:</span> { ";
                for ($o = 0; $o < count($fronteira); $o++) {
                    //contador para adicionar ponto e virgura somente ate o penultimo item do array
                    $contador = count($fronteira) - 1;
                    if ($o < $contador) {
                        echo "[" . implode("", $caminhos[$fronteira[$o]]) . "] ; ";
                    } else {
                        echo "[" . implode("", $caminhos[$fronteira[$o]]) . "]";
                    }
                }
                echo " }" . "<br/>";
                echo "<span style='color: red;'>E:</span> { " . implode(", ", $explorados) . " }" . "<br/><br/>";
            }
            //div para apresentar o resultado
            echo "<div id='result' style='display: none;'>[ " . implode("", $caminhos[$meta]) . " ]</div>";
            ?>

        </div>
        <!--apresenta o resultado-->
        <script>
            var caminho = $("#result").text();
            $("#resultado").html(caminho);
        </script>
    </body>
</html>
