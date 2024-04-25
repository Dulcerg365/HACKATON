<?php
require_once 'conexion.php'; 
require_once '../Modelos/clinica.php';
class DAOClinica
{
private $conexion; 
    
/**
 * Permite obtener la conexión a la BD
 */
private function conectar(){
    try{
        $this->conexion = Conexion::conectar(); 
    }
    catch(Exception $e)
    {
        
        die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
    }
}
public function obtenerClinicas(){
    try {
        $this->conectar();

        $sentenciaSQL = $this->conexion->query("SELECT idclinica, nombre,cedula  FROM clinicas");
        return $sentenciaSQL->fetchAll(PDO::FETCH_CLASS, 'Clinica');
    } catch (PDOException $e) {
        // Manejo de errores
        return [];
    }
}
}
?>
