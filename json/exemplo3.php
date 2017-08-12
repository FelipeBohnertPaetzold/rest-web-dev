<?php

include_once './PessoaX.php';
include_once './Pessoa.php';

$pessoa = new Pessoa(1, "Luiz", "luiz.angeli@unicesumar.edu.br","111.111.111-11");
echo json_encode($pessoa);
