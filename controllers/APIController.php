<?php 

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\servicio;

class APIController{
    public static function index(){
        $servicios = servicio::all();

       echo json_encode($servicios);
    }

    public static function guardar(){
       //alamacena la cita y devuelve el id
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        $id = $resultado['id'];

        //almacena la cita y el servicio

        // Almacena los Servicios con el ID de la Cita
        $idServicios = explode(",", $_POST['servicios']);
        foreach($idServicios as $idServicio){
            $args = [
                'citaId'=> $id,
                'servicioId'=> $idServicio
            ];
            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }
        
        
        echo json_encode(['resultado' => $resultado]);

    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            $id = $_POST['id'];
            $cita = Cita::find($id);
            $cita->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);
           

        }
    }
    
}