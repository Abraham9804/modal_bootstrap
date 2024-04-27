<?php
    require('../config/conexion.php');
    require('../config/data_sys.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../assets/css/all.min.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container py-3">
        <h2 class="text-center">Peliculas</h2>

        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-solid fa-circle-plus"></i> Nuevo registro</a>
            </div>
        </div>
        

        <table class="table table-sm table-striped table-hover table-bordered mt-4">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Genero</th>
                    <th>Poster</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $regData = sqlPeliculas($con);
                    if($regData instanceof mysqli_result){
                        if($regData->num_rows>0){
                            while($rows = $regData->fetch_assoc()){ ?>
                               <tr>
                                <td><?= $rows['id_pelicula']?></td>
                                <td><?= $rows['nombre']?></td>
                                <td><?= $rows['descripcion']?></td>
                                <td><?= $rows['genero']?></td>
                                <td></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit" data-bs-id="<?= $rows['id_pelicula']?>"><i class="fa-solid fa-pen-to-square"></i>Editar</a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i>Borrar</a>
                                </td>
                               </tr> 
                           <?php }
                        }
                    }else{
                        echo 'no hay datos';
                    }
                ?>

            </tbody>
        </table>
    </div>
    
    <?php include('nuevoModal.php'); ?>
    
    <?php include('modalEdit.php'); ?>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script>
        let editModal = document.querySelector("#modalEdit")
        editModal.addEventListener("shown.bs.modal", event =>{
            let button = event.relatedTarget
            let id = button.getAttribute("data-bs-id")
            
            let inputId = editModal.querySelector(".modal-body #id")
            let inputNombre = editModal.querySelector(".modal-body #nombre")
            let inputDescripcion = editModal.querySelector(".modal-body #descripcion")
            let inputGenero = editModal.querySelector(".modal-body #genero")

            let url = "getPeliculas.php"
            let formData = new FormData()
            formData.append('id', id)
            fetch(url,{
                method: "post",
                body: formData
            }).then(response => response.json())
            .then(data => {
                inputId.value = data.id_pelicula
                inputNombre.value = data.nombre
                inputDescripcion.value = data.descripcion
                inputGenero.value = data.id_genero
            }).catch(error => console.log(error))
        })
    </script>
</body>
</html>