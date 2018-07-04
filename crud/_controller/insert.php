<?php

    require_once("../_dao/crudDAO.php");
    require_once("../_dto/crudDTO.php");

    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $idade = $_POST["idade"];

    $crudDTO = new CrudDTO();
    $crudDTO->setNome($nome);
    $crudDTO->setSobrenome($sobrenome);
    $crudDTO->setIdade($idade);

    $crudDAO = new CrudDAO();
    $result = $crudDAO->insert($crudDTO);

    if($result) {
        echo "<script>window.location.href='../_view/main.php';</script>";
    } else {
        echo "<script>window.location.href='../_view/main.php';</script>";
    }

?>