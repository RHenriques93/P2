

<?php require("db_projetofinal.php");

require("inc/subservicos.inc.php");

$id = $_REQUEST["id"];

$dados = $db->query("SELECT area.nome, area.descricao, area.id_area FROM area WHERE area.id_area = $id");



