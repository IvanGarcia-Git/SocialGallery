<?php

$titulo = $_REQUEST['titulo'];
$destination = "./img/juegos/".basename($_FILES['imagen']['name']);


include "./servicios/conexion.php";
// Validaciones:

    // Comprobar si existe la imagen:

    $existe=is_file($destination);

    // Comprobar el tamaño del archivo:
    if($_FILES['imagen']['size']>100000){
        echo "La imagen pesa demasiado! El máximo de peso es 10MB!";
        echo "<a href='./index.php'>HOME</a>";
    }else {
        // if(!file_exists($destination) : bool){ // Si la imagen no existe
            if(move_uploaded_file($_FILES['imagen']['tmp_name'],$destination)){ // Si movemos el archivo
                // Lo introducimos en la base de datos
                mysqli_query($conn,"INSERT INTO imagen(nombre_img,link_img) VALUES ('$titulo','$destination')");
                header("Location: ./index.php");
            }else{
                echo "Ha habido un error!!!";
                echo "<a href='./index.php'>HOME</a>";
            }        
        // }else{
            echo "Ya hay una imagen con el mismo nombre de fichero. Por favor, cambialo.";
            echo "<a href='./index.php'>HOME</a>";
        // }
    }

 ?>