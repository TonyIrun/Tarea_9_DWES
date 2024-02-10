<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>DWES Tarea 9</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">

<?php
/**
	 * Se saca la lista de todos los libros.
	 * @param $con:mysqli
	 * @return void|null
	 */
function LeerDatos($RutaAPI)
{
    $contenido = file_get_contents($RutaAPI);

    $datos = json_decode($contenido);

    if ($datos !== null)
    {
        echo '<h1 style="text-align: center; font-weight: bold;">Usuarios</h1>';
        echo '<hr>';
        echo '<div style= "justify-content: center; display: flex; flex-flow: row wrap;">';    
        foreach ($datos as $user)
        {
            //echo $cont;
            echo '<div style="background-color: rgb(200,200,200);text-align: center; margin: 20px; border: 2px solid black; width: 300px;">';
            echo '<p style="font-weight: bold;">'. $user->name . ', ' . $user->username .'</p>';
            echo '<p>'. $user->email . ', ' . $user->website .'</p>';
            echo '<p>'. $user->company->name . ', ' . $user->address->city .'</p>';
            echo '<p>'. $user->phone ."</p>";
            echo '</div><br />';
        }
        echo '</div>';
    }
    else
    {
        echo 'Ha habido un problema al leer el fichero.';
    }
}

$api = 'https://jsonplaceholder.typicode.com/users';

LeerDatos($api);
?>
</body>
</html>