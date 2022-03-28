<?php
class empleado
{
	private $pdo;
    
    public $id;
    public $nombre;
    public $email;
    public $sexo;  
    public $area_id;
    public $boletin;
    public $descripcion;
	public $roles = array();


	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM empleado");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM empleado WHERE id = ?");

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ListarRoles($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT rol_id FROM empleado_rol WHERE empleado_id = ?");

			$stm->execute(array($id));
			return $stm->fetchAll(PDO::FETCH_COLUMN);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM empleado WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE empleado SET 
						nombre   = ?,
						email        = ?,
                        sexo        = ?,
                        area_id        = ?,
                        boletin        = ?,
                        descripcion        = ?


						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->nombre, 
                        $data->email,                        
                        $data->sexo,
                        $data->area_id,
                        $data->boletin, 
                        $data->descripcion, 
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(empleado $data)
	{
		try 
		{
		$sql = "INSERT INTO empleado (nombre,email,sexo,area_id,boletin,descripcion) 
		        VALUES (?, ?, ?, ?, ?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombre,
                    $data->email, 
                    $data->sexo, 
                    $data->area_id, 
                    $data->boletin, 
                     $data->descripcion 
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function GuardarRoles( $id, $roles)
	{
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM empleado_rol WHERE empleado_id = ?");			          

			$stm->execute(array($id));

			$sql = "INSERT INTO empleado_rol (empleado_id, rol_id) 
			        VALUES (?, ?)";

			foreach ($roles as $key => $value){
						$this->pdo->prepare($sql)
							->execute(
								array(
									$id, 
									$value
								)
							);
						}
					} catch (Exception $e) 
					{
						die($e->getMessage());
					}
				}
			}

?>