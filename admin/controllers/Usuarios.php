<?php

/*
 * Creado por Ruth Escobar A. @2016
 * Municipalidad de Peñalolén
 */

/**
 * Description of Usuarios
 *
 * @author Ruth Escobar A.
 */
class Usuarios extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->usuariosMenu = "nav-expanded nav-active";
    }

    function error($error) {

        switch (true) {
            case strpos($error, 'UQ_Usuarios_rutUsuario'):
                $msg = "<strong>El rut</strong> ingresado ya existe en nuestros registros.";
                break;
            case strpos($error, 'IDX_Usuarios_email'):
                $msg = "<strong>El email</strong> ingresado ya existe en nuestros registros.";
                break;
            default:
                $msg = $error;
                break;
        }
        return $msg;
    }

    function crear() {

        if ($_POST) {

            $rutUsuario = str_replace('.', '', filter_input(INPUT_POST, 'run'));
            $nombresUsuario = filter_input(INPUT_POST, 'nombre');
            $apellidosUsuario = filter_input(INPUT_POST, 'apellidos');
            $emailUsuario = filter_input(INPUT_POST, 'email');
            $perfil = filter_input(INPUT_POST, 'perfil');
            $comunaUsuario = filter_input(INPUT_POST, 'comuna');
            $generoUsuario = filter_input(INPUT_POST, 'genero');
            $fechaNacimientoUsuario = filter_input(INPUT_POST, 'fch_nac');
            $contrasenaUsuario = filter_input(INPUT_POST, 'pwd');

            $array = array($nombresUsuario, $apellidosUsuario, $emailUsuario,
                $comunaUsuario, $rutUsuario, $contrasenaUsuario, $perfil);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                $usuario['rutUsuario'] = $rutUsuario;
                $usuario['perfilUsuario'] = $perfil;
                $usuario['nombresUsuario'] = $nombresUsuario;
                $usuario['apellidosUsuario'] = $apellidosUsuario;
                $usuario['emailUsuario'] = $emailUsuario;
                $usuario['comunaUsuario'] = $comunaUsuario;
                $usuario['generoUsuario'] = $generoUsuario;
                $usuario['fechaNacimientoUsuario'] = $fechaNacimientoUsuario;
                $usuario['contrasenaUsuario'] = md5($contrasenaUsuario);
                $usuario['fechaCreacionUsuario'] = date("Y-m-d H:i:s");
                $usuario['estadoUsuario'] = '1';

                $response = $this->model->crear($usuario);

                if ($response == 'ok') {
                    $this->view->msg = 'Usuario creado con éxito';
                } else {
                    $this->view->err = $this->error($response);
                }
            }
        }

        $this->view->render($this, 'crear');
    }

    function editar($usuarioID = null) {

        if ($_POST) {

            $estadoAc = "0";

            $usuarioID = filter_input(INPUT_POST, 'id_usuario');
            $rutUsuario = str_replace('.', '', filter_input(INPUT_POST, 'run'));
            $nombresUsuario = filter_input(INPUT_POST, 'nombre');
            $apellidosUsuario = filter_input(INPUT_POST, 'apellidos');
            $emailUsuario = filter_input(INPUT_POST, 'email');
            $perfil = filter_input(INPUT_POST, 'perfil');
            $comunaUsuario = filter_input(INPUT_POST, 'comuna');
            $generoUsuario = filter_input(INPUT_POST, 'genero');
            $fechaNacimientoUsuario = filter_input(INPUT_POST, 'fch_nac');
            $contrasena1 = filter_input(INPUT_POST, 'pwd');
            $contrasena2 = filter_input(INPUT_POST, 'pwd');
            $estado = filter_input(INPUT_POST, 'estado');

            if ($estado) {
                $estadoAc = "1";
            }

            if (filter_input(INPUT_POST, 'pw1') != null) {
                $contrasena1 = filter_input(INPUT_POST, 'pw1');
                $contrasena2 = filter_input(INPUT_POST, 'pw2');
            }

            if ($contrasena1 == $contrasena2) {
                $array = array($nombresUsuario, $apellidosUsuario, $emailUsuario,
                    $comunaUsuario, $rutUsuario);

                if ($this->field_required($array)) {
                    $this->view->warn = "Favor revisar campos requeridos.";
                } else {

                    $usuario['usuarioID'] = $usuarioID;
                    $usuario['rutUsuario'] = $rutUsuario;
                    $usuario['perfilUsuario'] = $perfil;
                    $usuario['nombresUsuario'] = $nombresUsuario;
                    $usuario['apellidosUsuario'] = $apellidosUsuario;
                    $usuario['emailUsuario'] = $emailUsuario;
                    $usuario['comunaUsuario'] = $comunaUsuario;
                    $usuario['generoUsuario'] = $generoUsuario;
                    $usuario['fechaNacimientoUsuario'] = $fechaNacimientoUsuario;
                    $usuario['estadoUsuario'] = $estadoAc;

                    if ($contrasena1 != null) {
                        $usuario['contrasenaUsuario'] = md5($contrasena1);
                    }

                    $response = $this->model->editar($usuario);

                    if ($response == 'ok') {
                        $this->view->msg = 'Datos actualizados con éxito';
                    } else {
                        $this->view->err = $this->error($response);
                    }
                }
            } else {
                $this->view->err = "Las contraseñas ingresadas no coinciden. Deben ser idénticas.";
            }
        }

        if ($usuarioID == null) {
            $this->view->err = "Debe seleccionar un Usuario para realizar la consulta. ";
            $this->view->render($this, 'buscar');
        } else {
            $this->view->usuario = $this->model->traebyID($usuarioID);
            $this->view->render($this, 'editar');
        }
    }

    function buscar() {

        if ($_POST) {

            $rutUsuario = filter_input(INPUT_POST, 'run');
            $perfilUsuario = filter_input(INPUT_POST, 'perfil');
            $emailUsuario = filter_input(INPUT_POST, 'email');

            $array = array($rutUsuario, $perfilUsuario, $emailUsuario);

            if ($this->allFieldNotNull($array)) {
                $this->view->warn = "Debe llenar al menos un campo de búsqueda.";
            } else {

                $usuario['perfilUsuario'] = $perfilUsuario;
                $usuario['rutUsuario'] = $rutUsuario;
                $usuario['emailUsuario'] = $emailUsuario;

                $this->view->usuarios = $this->model->buscar($usuario);
            }
        }

        $this->view->render($this, 'buscar');
    }

    function login() {

        if ($_POST) {

            $username = str_replace('.', '', filter_input(INPUT_POST, 'username'));
            $passwd = filter_input(INPUT_POST, 'passwd');

            if (($username == null) || ($passwd == null)) {
                $this->view->err = "El usuario y contraseña son requeridos.";
                $this->view->load_index();
            } else {

                $password = md5($passwd);
                $response = $this->loginUsuario($username, $password);

                if ($response == 'ok') {
					header('location: ' . URL . 'Escritorio');
                } else {
                    $this->view->err = $response;
                    $this->view->load_index();
                }
            }
        } else {
            $this->view->load_index();
        }
    }

    function loginUsuario($username, $password) {

        $usuario = $this->model->traePorUsername($username);  

        if (!empty($usuario)) {
		
			if($usuario->perfilUsuario == 'ADMINISTRADOR'){
				if ($usuario->contrasenaUsuario == $password) {
					$this->createSession($usuario->usuarioID, $usuario->rutUsuario, $usuario->nombresUsuario, $usuario->apellidosUsuario, $usuario->emailUsuario, $usuario->generoUsuario, $usuario->fechaNacimientoUsuario);
					return 'ok';
				} else {
					return 'Contraseña Incorrecta. Favor verificar';
				}
			}else{
				return 'Usted no es un usuario autorizado para entrar a este sitio.';
			}
            
        } else {
            return 'El usuario ingresado no existe o se encuentra inactivo en la plataforma.';
        }
    }

    function logout() {
        Session::destroy();
        header('location:' . URL);
    }

    function createSession($usuarioID, $username, $nombres, $apellidos, $email, $genero, $fchNac) {
        Session::setValue('U_ID', $usuarioID);
        Session::setValue('U_USERNAME', $username);
        Session::setValue('U_NOMBRES', $nombres);
        Session::setValue('U_APELLIDOS', $apellidos);
        Session::setValue('U_MAIL', $email);
        Session::setValue('U_GENERO', $genero);
        Session::setValue('U_FCH_NAC', $fchNac);
    }

}
