<?php
require_once 'model/empleado.php';

class empleadoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Empleado();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/empleado.php';
       
    }
    
    public function Act(){
        $empleado = new Empleado();
        
        if(isset($_REQUEST['id'])){
            $empleado = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/empleado-editar.php';
        
    }
    
    public function Guardar(){
        $empleado = new Empleado();
        
        $empleado->id = $_REQUEST['id'];
        $empleado->nombre = $_REQUEST['nombre'];
        $empleado->email = $_REQUEST['email'];
        $empleado->sexo = $_REQUEST['sexo'];
        $empleado->area_id = $_REQUEST['area_id'];  
        if(isset($_REQUEST['boletin'])){
            $empleado->boletin = $_REQUEST['boletin'];
        }else{
            $empleado->boletin = 0;
        }
        if(isset($_REQUEST['sexo'])){
            $empleado->sexo = $_REQUEST['sexo'];
        }else{   $empleado->sexo = 0;
        }
        $empleado->descripcion = $_REQUEST['descripcion'];    

        
        $empleado->id > 0 ? $this->model->Actualizar($empleado) : $this->model->Registrar($empleado);
        
        if(isset($_REQUEST['roles'])){
            $rol = [];
            $num_roles = count($_POST['roles']);
            $current = 0;
            foreach ($_POST['roles'] as $key => $value) {
                if ($current != $num_roles-1)
                $rol[]= $value;
                else
                $rol []= $value;
                $current++;
            }
            

        }    
        
        $this->model->GuardarRoles($empleado->id,$rol);

        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
