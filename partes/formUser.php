<?php 
session_start(); //siosi siempre va primero.

if (isset($_SESSION['usuariolala']))   //pregunto si esta logueado(no importa quien)
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/User.php");

	$arrayDeUser=usuarios::TraerTodoLosUsuarios();
 //}  // la saco de aca sino da error cuando no logueo
 ?>	
<table class="table"  style=" background-color: transparent;">
								
 	<?php 

				if ($_SESSION['usuariolala']=="admin"){
					    ?>

							<a onclick="Alta()" class="btn btn-info">Alta </a>   <?php  //class="btn btn-success    verde ?>
									   
<thead>
									<tr>
										<th>Accion</th><th>Nombre de Usuario</th><th>Contraseña</th><th>tipo</th>
									</tr>
								</thead>
								<tbody>	
							


									<?php 

							foreach ($arrayDeUser as $user) {

								if ($user->tipo == "admin")
									{	echo"<tr>
										
										<td><a onclick='ModificarUser($user->id)' class='btn btn-warning'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>  Editar</a></td>
										<td>$user->email</td>
										<td>$user->pass</td>
										<td>$user->tipo</td>
									</tr>   ";
								
								}
										else {
								echo"<tr>
										
										<td><a onclick='BorrarUser($user->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>  Borrar</a></td>
										<td>$user->email</td>
										<td>$user->pass</td>
										<td>$user->tipo</td>
									</tr>   ";
								   }			
															}
				}
				elseif ($_SESSION['usuariolala']=="otro") { 
				?>	
									<tr>
											<th>Accion</th><th>Nombre de Usuario</th><th>Contraseña</th>
									</tr>
								</thead>
								<tbody>	

								<?php 

							//if ($_SESSION['usuariolala']=="otro"){
								foreach ($arrayDeUser as $user) {

										if ($user->tipo == "otro")
							echo"<tr>
										
										<td><a onclick='ModificarUser($user->id)' class='btn btn-warning'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>  Editar</a></td>
										<td>$user->email</td>
										<td>$user->pass</td>
											
									</tr>   ";
								/*	echo"<tr>
								<td><a onclick='ModificarUser($user->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Editar</a></td>
											<td>$user->email</td>
											<td>$user->pass</td>
											<td>$user->tipo</td>
										</tr>   ";*/
								}
					}
							//		}

						   ?>
					</tbody>
				</table>






						 
					</tbody>
				</table>

				 





				<?php 
				// sin login 
} 

					 ?>