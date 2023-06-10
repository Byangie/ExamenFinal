<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
    <h1>Formulario Para ingresar un Alumno</h1>
    <?php
    $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
    $conexion = new PDO('mysql:host=localhost;dbname=final_0907_23_8872', 'root', '', $pdo_options);

    if (isset($_POST["accion"])){
        if  ($_POST["accion"] == "Crear"){
            $insert = $conexion->prepare("INSERT INTO alumno (Carnet,Nombre,Grado,Telefono) VALUES
            (:Carnet,:Nombre,:Grado,:Telefono)");
            $insert->bindValue('Carnet', $_POST['Carnet']);
            $insert->bindValue('Nombre', $_POST['Nombre']);
            $insert->bindValue('Grado', $_POST['Grado']);
            $insert->bindValue('Telefono', $_POST['Telefono']);
            $insert->execute();

         }
        }

        $select = $conexion->query("SELECT Carnet, Nombre, Grado, Telefono FROM alumno");
    ?>

     <form method="POST" class="form">
            <input class="uno" type="text" name="Carnet" placeholder="Ingresa el Carnet"/>
            <input class="dos" type="text" name="Nombre" placeholder="Ingresa el Nombre"/>
            <input class="tres" type="text" name="Grado" placeholder="Ingresa el Grado"/>
            <input class="cuatro" type="text" name="Telefono" placeholder="Ingresa su Telefono"/>
            <input type="hidden" name="accion" value="Crear"/>
            <button type="submit">Crear</button>
        </form>

        
        <table border="1" class="tabla">
        <thead>
            <tr>
                <th>Carnet</th>
                <th>Nompre</th>
                <th>Grado</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
           <?php foreach($select->fetchAll() as $alumno) { ?>
                <tr>
                    <td> <?php echo $alumno["Carnet"] ?> </td>
                    <td> <?php echo $alumno["Nombre"] ?> </td>
                    <td> <?php echo $alumno["Grado"] ?> </td>
                    <td> <?php echo $alumno["Telefono"] ?> </td>
                
                </tr>
            <?php } ?>
        </tbody>
    </table>
           </div>
</body>
</html>