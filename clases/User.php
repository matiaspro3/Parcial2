<?php 

class usuarios{




	public $id;
 	public $email;
  	public $pass;
  	public $tipo;


public static function ValidarUser($nombre,$pass)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();  
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,email,pass,tipo from user where email = '$nombre' and pass = '$pass'");
			$consulta->execute();			
			return $consulta->fetchObject('usuarios');	
	}



public static function TraerTodoLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,email, pass,tipo from user");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuarios");		
	}




public function BorrarUser()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from user 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	
	public function ModificarUser()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update user 
				set email='$this->email',
				pass='$this->pass',
				tipo='$this->sexo'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	






}







 ?>