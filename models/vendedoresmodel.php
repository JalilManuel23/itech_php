<?php

include_once 'models/vendedor.php';

class VendedoresModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    // Traer la información de todos los vendedores
    public function get(){
        $items = [];

        try{

            $query = $this->db->connect()->query("SELECT * FROM vendedores");

            while($row = $query->fetch()){
                $item = new Vendedor();
                $item->nombre = $row['nombre'];
                $item->fotografia    = $row['fotografia'];
                $item->direccion  = $row['direccion'];
                $item->telefono  = $row['telefono'];
                $item->email  = $row['email'];
                $item->fecha_ingreso  = $row['fecha_ingreso'];
                $item->fecha_administrador  = $row['fecha_administrador'];
                $item->fecha_validacion  = $row['fecha_validacion'];
                $item->contrasenia  = $row['contrasenia'];
                $item->curp  = $row['curp'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    // Trae los datos de un solo vendedor según su ID
    public function getById($id){
        $item = new Vendedor();

        $query = $this->db->connect()->prepare("SELECT * FROM vendedores WHERE id = :id");
        try{
            $query->execute(['id' => $id]);

            while($row = $query->fetch()){
                $item->nombre = $row['nombre'];
                $item->fotografia    = $row['fotografia'];
                $item->direccion  = $row['direccion'];
                $item->telefono  = $row['telefono'];
                $item->email  = $row['email'];
                $item->fecha_ingreso  = $row['fecha_ingreso'];
                $item->fecha_administrador  = $row['fecha_administrador'];
                $item->fecha_validacion  = $row['fecha_validacion'];
                $item->contrasenia  = $row['contrasenia'];
                $item->curp  = $row['curp'];
            }

            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    // Agregar nuevo vendedor
    public function insert($datos) {
        // insertar datos en la BD

        try {
            $query = $this->db->connect()->prepare('INSERT INTO VENDEDORES (NOMBRE, FOTOGRAFIA, DIRECCION, TELEFONO, EMAIL, FECHA_INGRESO, FECHA_ADMINISTRADOR, FECHA_VALIDACION, CONTRASENIA, CURP) VALUES(:nombre, :fotografia, :direccion, :telefono, :email, :fecha_ingreso, :fecha_administrador, :fecha_validacion, :contrasenia, :curp)');

            $query->execute([
                'nombre' => $datos['nombre'], 
                'fotografia' => $datos['fotografia'],
                'direccion' => $datos['direccion'],
                'telefono' => $datos['telefono'],
                'email' => $datos['email'],
                'fecha_ingreso' => $datos['fecha_ingreso'],
                'fecha_administrador' => $datos['fecha_administrador'],
                'fecha_validacion' => $datos['fecha_validacion'],
                'contrasenia' => $datos['contrasenia'],
                'curp' => $datos['curp']
            ]);
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }

    // Actualizar vendedor
    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE VENDEDORES SET nombre = :nombre, fotografia = :fotografia, direccion = :direccion, telefono = :telefono, email = :email, fecha_ingreso = :fecha_ingreso, fecha_administrador = :fecha_administrador, fecha_validacion = :fecha_validacion, contrasenia = :contrasenia, curp = :curp WHERE id = :id");

        try{
            $query->execute([
                'id' => $item['id'], 
                'nombre' => $item['nombre'], 
                'fotografia' => $item['fotografia'],
                'direccion' => $item['direccion'],
                'telefono' => $item['telefono'],
                'email' => $item['email'],
                'fecha_ingreso' => $item['fecha_ingreso'],
                'fecha_administrador' => $item['fecha_administrador'],
                'fecha_validacion' => $item['fecha_validacion'],
                'contrasenia' => $item['contrasenia'],
                'curp' => $item['curp']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    // Eliminar vendedor
    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM VENDEDORES WHERE id = :id");
        try{
            $query->execute([
                'id'=> $id,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
?>