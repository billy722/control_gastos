<?php
require_once 'Conexion.php';

class Colegio{

 private $rbd_colegio;
 private $nombre_colegio;
 private $estado;

 public function setColegio($rbd_colegio){
   $this->rbd_colegio = $rbd_colegio;
 }
 public function setNombre($nombre_colegio){
   $this->nombre_colegio = $nombre_colegio;
 }
 public function setEstado($estado){
   $this->estado = $estado;
 }

 public function obtenerColegios(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $resultado_consulta = $Conexion->query("select * from tb_colegios");
    return $resultado_consulta;
 }

 public function crearColegio(){
   $conexion = new Conexion();
   $conexion = $conexion->conectar();

   $consulta = "insert INTO tb_colegios (`rbd_colegio`, `nombre_colegio`, `estado`) VALUES ('".$this->rbd_colegio."', '".$this->nombre_colegio."', '".$this->estado."')";
   $resultado= $conexion->query($consulta);
   return $resultado;

 }

   public function modificarColegio(){
       $conexion = new Conexion();
       $conexion = $conexion->conectar();

       $consulta="update tb_colegios set
                 nombre_colegio = '".$this->nombre_colegio."',
                 estado = ".$this->estado."
                 where rbd_colegio=".$this->rbd_colegio;

       $resultado= $conexion->query($consulta);
       return $resultado;
   }

   public function eliminarColegio(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     // $consulta;
     //
     // $resultado= $conexion->query("select colegio from tb_movimientos where colegio=".$this->colegio);
     // //consulta si el usuario tiene actividades registradas
     //   if($resultado->num_rows>0){
     //       //si entra aqui, se cambia el estado a eliminado
     //       $consulta = "update tb_usuarios set estado=3 where rut=".$this->run;
     //   }else{
     //       //si entra aqui se puede eliminar
     //       $consulta = "delete FROM tb_colegios WHERE (rbd_colegio = '".$this->rbd_colegio."' ) ";
     //   }

       $consulta = "update tb_colegios set estado=3 where rbd_colegio=".$this->rbd_colegio;

     if($Conexion->query($consulta)){
         return true;
     }else{
         // echo $consulta;
         return false;
     }

   }

}
 ?>
