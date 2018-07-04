<?php
    require_once("../_dao/crudDAO.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRUD - PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>

    <br /><br /><br />
        <!-- Cadastrar -->
        <button style="float: left; margin-right: 10px;" type="button" 
            class="btn btn-success" data-toggle="modal" data-target="#myModalCad" 
            onclick="load_modal_cad('','','');">
            Adicionar
        </button>
    <br /><br /><br />

    <table id="myTable" class="cell-border hover stripe">
        <thead>
            <tr>
                <th>#</th>
                <th>NOME</th>
                <th>SOBRENOME</th>
                <th>IDADE</th>
                <th>ACOES</th>
            </tr>
        </thead>
        <tbody>

            <?php

                $crudDAO = new CrudDAO();
                $result = $crudDAO->readAll();
                //print_r($result);

                foreach($result as $key => $value) {

            ?>

            <tr>
                <td><?php echo $value["id"]; ?></td>
                <td><?php echo $value["nome"]; ?></td>
                <td><?php echo $value["sobrenome"]; ?></td>
                <td><?php echo $value["idade"]; ?></td>
                <td>
                    <!-- Alterar -->
                    <button style="float: left; margin-right: 10px;" type="button" 
                    class="btn btn-primary" data-toggle="modal" data-target="#myModalAlt" 
                    onclick="load_modal_alt('<?php echo $value['nome']; ?>','<?php echo $value['sobrenome']; ?>','<?php echo $value['idade']; ?>','<?php echo $value['id']; ?>');">
                        Alterar
                    </button>
                    <!-- Excluir -->
                    <form action="../_controller/delete.php" method="post" style="float: left;">
                        <input type="hidden" name="id" value="<?php echo $value["id"]; ?>" />
                        <input type="submit" class="btn btn-danger" value="Excluir" />
                    </form>
                </td>
            </tr>

            <?php } ?>

        </tbody>
    </table>

    <!-- Modal Cadastrar -->
    <div class="modal fade" id="myModalCad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Cadastrar Registro</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../_controller/insert.php" method="post">
                        <div class="input-group">
                            <!--<span class="input-group-addon glyphicon glyphicon-user"></span>-->
                            <input type="text" id="nome" name="nome" class="form-control" value="" />
                        </div>
                        <div class="input-group">
                            <!--<span class="input-group-addon glyphicon glyphicon-user"></span>-->
                            <input type="text" id="sobrenome" name="sobrenome" class="form-control" value="" />
                        </div>
                        <div class="input-group">
                            <!--<span class="input-group-addon glyphicon glyphicon-user"></span>-->
                            <input type="text" id="idade" name="idade" class="form-control" value="" />
                        </div>
                        <input type="submit" class="btn btn-warning" value="Cadastrar" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Alterar -->
    <div class="modal fade" id="myModalAlt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Alterar Registro</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../_controller/update.php" method="post">
                        <div class="input-group">
                            <!--<span class="input-group-addon glyphicon glyphicon-user"></span>-->
                            <input type="text" id="alt_nome" name="nome" class="form-control" value="" />
                        </div>
                        <div class="input-group">
                            <!--<span class="input-group-addon glyphicon glyphicon-user"></span>-->
                            <input type="text" id="alt_sobrenome" name="sobrenome" class="form-control" value="" />
                        </div>
                        <div class="input-group">
                            <!--<span class="input-group-addon glyphicon glyphicon-user"></span>-->
                            <input type="text" id="alt_idade" name="idade" class="form-control" value="" />
                        </div>
                        <input type="hidden" id="alt_id" name="id" value="" />
                        <input type="submit" class="btn btn-warning" value="Alterar" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="jquery-3.1.1.min.js"></script>
    <script src="../_js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../_css/bootstrap.min.css" />
    <script src="../_js/script.js"></script>
    <link rel="stylesheet" href="DataTables-1.10.18/css/jquery.dataTables.min.css" />
    <script src="DataTables-1.10.18/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "language": {
                    "lengthMenu": "Exibindo _MENU_ registro por página.",
                    "zeroRecords": "Nenhum registro encontrado.",
                    "info": "Exibindo página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponivel",
                    "infoFiltered": "Filtrado _MAX_ do total",
                    "search": "Pesquisar",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Proximo"
                    }
                }
            });
        });
    </script>

</body>
</html>