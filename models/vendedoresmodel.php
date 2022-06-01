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
                $item->id = $row['id'];
                $item->nombre = $row['nombre'];
                $item->apellido_paterno = $row['apellido_paterno'];
                $item->apellido_materno = $row['apellido_materno'];
                $item->fotografia    = $row['fotografia'];
                $item->direccion  = $row['direccion'];
                $item->telefono  = $row['telefono'];
                $item->email  = $row['email'];
                $item->fecha_ingreso  = $row['fecha_ingreso'];
                $item->fecha_administrador  = $row['fecha_administrador'];
                $item->fecha_validacion  = $row['fecha_validacion'];
                $item->contrasenia  = $row['contrasenia'];
                $item->curp  = $row['curp'];
                $item->estatus  = $row['estatus'];

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
                $item->id = $row['id'];
                $item->nombre = $row['nombre'];
                $item->apellido_paterno = $row['apellido_paterno'];
                $item->apellido_materno = $row['apellido_materno'];
                $item->fotografia    = $row['fotografia'];
                $item->direccion  = $row['direccion'];
                $item->telefono  = $row['telefono'];
                $item->email  = $row['email'];
                $item->fecha_ingreso  = $row['fecha_ingreso'];
                $item->fecha_administrador  = $row['fecha_administrador'];
                $item->fecha_validacion  = $row['fecha_validacion'];
                $item->contrasenia  = $row['contrasenia'];
                $item->curp  = $row['curp'];
                $item->tipo  = $row['tipo'];
                $item->estatus  = $row['estatus'];
            }

            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    // Trae los datos de un solo vendedor según su email
    public function getByEmail($email){
        $item = new Vendedor();

        $query = $this->db->connect()->prepare("SELECT * FROM vendedores WHERE email = :email");
        try{
            $query->execute(['email' => $email]);

            while($row = $query->fetch()){
                $item->id = $row['id'];
                $item->nombre = $row['nombre'];
                $item->apellido_paterno = $row['apellido_paterno'];
                $item->apellido_materno = $row['apellido_materno'];
                $item->fotografia    = $row['fotografia'];
                $item->direccion  = $row['direccion'];
                $item->telefono  = $row['telefono'];
                $item->email  = $row['email'];
                $item->fecha_ingreso  = $row['fecha_ingreso'];
                $item->fecha_administrador  = $row['fecha_administrador'];
                $item->fecha_validacion  = $row['fecha_validacion'];
                $item->contrasenia  = $row['contrasenia'];
                $item->curp  = $row['curp'];
                $item->tipo  = $row['tipo'];
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
            $query = $this->db->connect()->prepare('INSERT INTO VENDEDORES (NOMBRE, APELLIDO_PATERNO, APELLIDO_MATERNO, DIRECCION, TELEFONO, EMAIL, CONTRASENIA, CURP) VALUES(:nombre, :apellido_paterno, :apellido_materno, :direccion, :telefono, :email, :contrasenia, :curp)');

            $query->execute([
                'nombre' => $datos['nombre'], 
                'apellido_paterno' => $datos['apellido_paterno'], 
                'apellido_materno' => $datos['apellido_materno'], 
                'direccion' => $datos['direccion'],
                'telefono' => $datos['telefono'],
                'email' => $datos['email'],
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
        $query = $this->db->connect()->prepare("UPDATE VENDEDORES SET nombre = :nombre, apellido_paterno = :apellido_paterno, apellido_materno = :apellido_materno, fotografia = :fotografia, direccion = :direccion, telefono = :telefono, email = :email, fecha_ingreso = :fecha_ingreso, fecha_administrador = :fecha_administrador, fecha_validacion = :fecha_validacion, contrasenia = :contrasenia, curp = :curp WHERE id = :id");

        try{
            $query->execute([
                'nombre' => $item['nombre'], 
                'apellido_paterno' => $item['apellido_paterno'], 
                'apellido_materno' => $item['apellido_materno'], 
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

    // Suspender usuario
    public function suspender($id, $valor) {
        $query = $this->db->connect()->prepare("UPDATE VENDEDORES SET estatus = :estatus WHERE id = :id");

        try{
            $query->execute([
                'id' => $id,
                'estatus' => $valor,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    // Cambiar fotografía
    public function cambiarFoto($id, $foto) {
        $query = $this->db->connect()->prepare("UPDATE VENDEDORES SET fotografia = :foto WHERE id = :id");

        try{
            $query->execute([
                'id' => $id,
                'foto' => $foto,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    // Cambiar contraseña
    public function cambiarContrasenia($id, $contrasenia) {
        $query = $this->db->connect()->prepare("UPDATE VENDEDORES SET contrasenia = :contrasenia WHERE id = :id");

        try{
            $query->execute([
                'id' => $id,
                'contrasenia' => $contrasenia,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    // Convertir admin
    public function convertirAdmin($id, $valor) {
        $query = $this->db->connect()->prepare("UPDATE VENDEDORES SET tipo = :tipo WHERE id = :id");

        try{
            $query->execute([
                'id' => $id,
                'tipo' => $valor,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    // Iniciar sesión
    public function iniciarSesion($email, $contrasenia) {
        $query = $this->db->connect()->prepare("SELECT COUNT(*) AS total FROM vendedores WHERE email = :email AND contrasenia = :contrasenia");

        $query->execute([
            'email' => $email,
            'contrasenia' => $contrasenia
        ]);

        return $query->fetchColumn(); 
    }
}
?>