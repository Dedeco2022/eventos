<!DOCTYPE html>
<html lang="pt_BR">

<head>

    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="css/materialize.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Página inicial</title>
</head>

<body>

    <nav>
        <div class="nav-wrapper purple">
            <a href="index.php" class="brand-logo"><img src="foto/evento.png" alt="Logo"></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li> <a href="cadastrar.html"> Cadastrar Evento</a></li>
                <li><a href="crud.html">Eventos Cadastrados</a></li>

            </ul>
        </div>
    </nav>

    <main class="container">
        <form onsubmit="return salvarUsuario(event);">
            <label>ID: <input type="number" name="id_evento"></label><br>
            <label>Nome: <input type="text" name="nome"></label><br>
            <label>Dia: <input type="date" name="dia"></label><br>
            <label>Lugar: <input type="text" name="lugar"></label><br>
            <label>Categoria: <input type="text" name="categoria"></label><br>
            <input type="submit" value="Salvar Usuário">
        </form>
        <br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Dia</th>
                    <th>Lugar</th>
                    <th>Categoria</th>
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody id="eventos"></tbody>
        </table>
    </main>
    <script src="script.js"></script>




    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>