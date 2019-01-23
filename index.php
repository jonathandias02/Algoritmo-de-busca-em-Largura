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
        <div class="container-fluid mx-auto d-block">
            <div class="row">
                <div class="col-3">
                    <h1 align="center" style="margin-top: 20px;">Grafo</h1><br/>
                    <img src="imagens/Grafo.png" class="rounded mx-auto d-block" style="width: 300px; height: 300px;"/>
                </div>
                <div class="col">
                    <h1 align="center" style="margin-top: 20px;">Busca em Largura</h1>
                    <form style="margin: 50px 50px 0 50px;"method="post" action="Buscas.php">                        
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
                    <label style="margin: 0 50px 0 50px;"><b>Caminho encontrado:</b></label>                    
                </div>
            </div>
        </div>
    </body>
</html>
