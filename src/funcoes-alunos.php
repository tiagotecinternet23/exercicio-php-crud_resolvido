<?php
require "conecta.php";

function inserir(PDO $conexao, string $nome, float $primeira, float $segunda){
   $sql = "INSERT INTO alunos (nome, primeira, segunda) 
   VALUES(:nome, :primeira, :segunda)";

   try {
      $consulta = $conexao->prepare($sql);
      $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
      $consulta->bindParam(':primeira', $primeira, PDO::PARAM_STR);
      $consulta->bindParam(':segunda', $segunda, PDO::PARAM_STR);
      $consulta->execute();
   } catch(Exception $erro){ 
      die( "Erro: " .$erro->getMessage());
   }
}

function ler(PDO $conexao){
   // $sql = "SELECT * FROM alunos ORDER BY nome";
   $sql = "SELECT *, ROUND(((primeira + segunda) / 2),1) AS media FROM alunos ORDER BY nome";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $erro){ 
        die( "Erro: " .$erro->getMessage());
    }
    return $resultado;
} 



function lerUm(PDO $conexao, int $id):array {
   $sql = "SELECT * FROM alunos WHERE id = :id";

   try {
     $consulta = $conexao->prepare($sql);
     $consulta->bindParam(':id', $id, PDO::PARAM_INT);
     $consulta->execute();
     $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
     
   } catch (Exception $erro) {
     die( "Erro: " .$erro->getMessage());
   }
   return $resultado;
}


function atualizar(PDO $conexao, int $id, string $nome, float $primeira, float $segunda):void {

   $sql = "UPDATE alunos SET nome = :nome, primeira = :primeira, segunda = :segunda 
   WHERE id = :id";

   try {
      $consulta = $conexao->prepare($sql);
      $consulta->bindParam(':id', $id, PDO::PARAM_INT);
      $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
      $consulta->bindParam(':primeira', $primeira, PDO::PARAM_STR);
      $consulta->bindParam(':segunda', $segunda, PDO::PARAM_STR);
     $consulta->execute();
   } catch (Exception $erro) {
     die( "Erro: " .$erro->getMessage());
   }
}

function excluir(PDO $conexao, int $id):void {
   $sql = "DELETE FROM alunos WHERE id = :id";
   try {
     $consulta = $conexao->prepare($sql);
     $consulta->bindParam(':id', $id, PDO::PARAM_INT);
     $consulta->execute();
   } catch (Exception $erro) {
     die( "Erro: " .$erro->getMessage());
   }
}

