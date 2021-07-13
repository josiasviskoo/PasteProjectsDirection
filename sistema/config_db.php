<?
  $conexao = new mysqli("localhost", "viskooco_vk8", "xxxxxxxx", "viskooco_vk8");
  if ($conexao->connect_error) { die('FALHOU : ('. $conexao->connect_errno .') '. $conexao->connect_error); };
?>
