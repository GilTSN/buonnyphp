<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Teste Buonny</title>

    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once 'services/AvosService.php';
    require_once 'services/PaisService.php';
    require_once 'services/FilhosService.php';

    $action = (isset($_GET['action'])) ? $_GET['action'] : null;
    $avoId = (isset($_GET['avoId'])) ? $_GET['avoId'] : null;
    $paisIds = (isset($_GET['paisIds'])) ? $_GET['paisIds'] : [];
    $avosService = new AvosService();
    $paisService = new PaisService();
    $filhosService = new FilhosService();
    $pais = [];
    $filhos = [];

    switch ($action) {
        case 'selecionarAvo':
            $pais = $paisService->getByAvo($avoId);
            break;

        case 'selecionarPais':
            $filhos = $filhosService->getByPais($paisIds);
            break;
    }
    ?>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Avós</th>
                <th>Pais</th>
                <th>Filhos</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <form action="index.php" method="get">
                        <select name="avoId">
                            <option value="">Selecione</option>
                            <?php
                            foreach ($avosService->get() as $avo) {
                            ?>
                                <option value="<?php echo $avo['id'] ?>"><?php echo $avo['nome'] ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <button type="submit" name="action" value="selecionarAvo">Selecionar Avô</button>
                    </form>
                </td>

                <td>
                    <form action="index.php" method="get">
                        <?php
                        foreach ($pais as $pai) {
                        ?>
                            <label>
                                <input type="checkbox"
                                       name="paisIds[]"
                                       value="<?php echo $pai['id']; ?>"> <?php echo $pai['nome']; ?>
                            </label>
                        <?php
                        }
                        ?>

                        <button type="submit" name="action" value="selecionarPais">Selecionar País</button>
                    </form>
                </td>

                <td>
                    <?php
                    foreach ($filhos as $filho) {
                    ?>
                        <p><?php echo $filho['nome']; ?></p>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>