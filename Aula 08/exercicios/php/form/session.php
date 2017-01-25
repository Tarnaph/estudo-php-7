<?php 
session_start();
if (!isset($_SESSION["usuario"]) && !isset($_COOKIE["visitante"])) 
{
  echo "Erro de permissão.";
  exit();
}
?>