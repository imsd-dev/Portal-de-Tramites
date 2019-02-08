<?php

require './models/TramitesModel.php';
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
    }

    function index() {
        $this->view->render_404();
    }

    function error($error, $recuperar = true) {
        $msg = null;
        $msg_rec = ($recuperar == true) ? "- <strong><a href='" . URL . "Usuarios/recuperar'>Recuperar Contraseña</a></strong>" : null;

        switch (true) {
            case strpos($error, 'UQ_Usuarios_rutUsuario'):
                $msg = "<strong>El rut</strong> ingresado ya existe en nuestros registros. " . $msg_rec;
                break;
            case strpos($error, 'IDX_Usuarios_email'):
                $msg = "<strong>El email</strong> ingresado ya existe en nuestros registros. " . $msg_rec;
                break;
            default:
                $msg = $error;
                break;
        }
        return $msg;
    }

    function registrar() {

        if ($_POST) {

            $rutUsuario = str_replace('.', '', filter_input(INPUT_POST, 'rut'));
            $nombresUsuario = ucwords(strtolower(filter_input(INPUT_POST, 'nombres')));
            $apellidosUsuario = ucwords(strtolower(filter_input(INPUT_POST, 'apellidos')));
            $emailUsuario = strtolower(filter_input(INPUT_POST, 'mail'));
            $comunaUsuario = filter_input(INPUT_POST, 'comuna');
            $generoUsuario = filter_input(INPUT_POST, 'genero');
            $fechaNacimientoUsuario = filter_input(INPUT_POST, 'fch_nac');
            $contrasenaUsuario = filter_input(INPUT_POST, 'pw');
            $tituloTramite = filter_input(INPUT_POST, 'titulo');
            $catpcha = filter_input(INPUT_POST, 'catpcha');

            $array = array($nombresUsuario, $apellidosUsuario, $emailUsuario,
                $comunaUsuario, $rutUsuario, $contrasenaUsuario, $catpcha);

            if ($this->field_required($array)) {
                $this->view->warn = "Favor revisar campos requeridos.";
            } else {

                if ($catpcha === $_SESSION['captcha']['code']) {

                    $usuario['rutUsuario'] = $rutUsuario;
                    $usuario['perfilUsuario'] = 'NORMAL';
                    $usuario['nombresUsuario'] = $nombresUsuario;
                    $usuario['apellidosUsuario'] = $apellidosUsuario;
                    $usuario['emailUsuario'] = $emailUsuario;
                    $usuario['comunaUsuario'] = $comunaUsuario;
                    $usuario['generoUsuario'] = $generoUsuario;
                    $usuario['fechaNacimientoUsuario'] = $fechaNacimientoUsuario;
                    $usuario['contrasenaUsuario'] = md5($contrasenaUsuario);
                    $usuario['fechaCreacionUsuario'] = date("Y-m-d H:i:s");
                    $usuario['estadoUsuario'] = '1';

                    $response = $this->model->registrar($usuario);

                    if ($response == 'ok') {

                        $this->enviaCorreo($emailUsuario, 'registro');
                        $this->loginUsuario($rutUsuario, md5($contrasenaUsuario));
                        $this->view->msg = 'Usuario registrado con éxito';
                        $this->view->tituloTramite = $tituloTramite;
                    } else {
                        $this->view->err = $this->error($response);
                    }
                } else {
                    $this->view->warn = 'Problemas con el código ingresado. Inténtelo de nuevo.';
                }
            }
        }

        if (isset($_SESSION['U_NOMBRES'])) {
//            $this->view->usuario = $this->model->traebyID(Session::getValue('U_ID'));
//            $this->view->render($this, 'perfil');
            header('location: ' . URL);
        } else {
            $this->view->render($this, 'registrar');
        }
    }

    function perfil() {

        $usuarioID = Session::getValue('U_ID');

        if ($usuarioID == null) {
            header('location: ' . URL . 'Paginas/ver/404');
        } else {

            if ($_POST) {

                $contrasena1 = null;
                $contrasena2 = null;

                $rutUsuario = str_replace('.', '', filter_input(INPUT_POST, 'rut'));
                $nombresUsuario = ucwords(strtolower(filter_input(INPUT_POST, 'nombres')));
                $apellidosUsuario = ucwords(strtolower(filter_input(INPUT_POST, 'apellidos')));
                $emailUsuario = strtolower(filter_input(INPUT_POST, 'mail'));
                $comunaUsuario = filter_input(INPUT_POST, 'comuna');
                $generoUsuario = filter_input(INPUT_POST, 'genero');
                $fechaNacimientoUsuario = filter_input(INPUT_POST, 'fch_nac');

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

                        $usuario['usuarioID'] = Session::getValue('U_ID');
                        $usuario['rutUsuario'] = $rutUsuario;
                        $usuario['nombresUsuario'] = $nombresUsuario;
                        $usuario['apellidosUsuario'] = $apellidosUsuario;
                        $usuario['emailUsuario'] = $emailUsuario;
                        $usuario['comunaUsuario'] = $comunaUsuario;
                        $usuario['generoUsuario'] = $generoUsuario;
                        $usuario['fechaNacimientoUsuario'] = $fechaNacimientoUsuario;

                        if ($contrasena1 != null) {
                            $usuario['contrasenaUsuario'] = md5($contrasena1);
                        }

                        $response = $this->model->editar($usuario);

                        if ($response == 'ok') {
                            $this->view->msg = 'Datos actualizados con éxito';
                            Session::setValue('U_GENERO', $generoUsuario);
                            Session::setValue('U_NOMBRES', $nombresUsuario);
                            Session::setValue('U_APELLIDOS', $apellidosUsuario);
                        } else {
                            $this->view->err = $this->error($response, false);
                        }
                    }
                } else {
                    $this->view->err = "Las contraseñas ingresadas no coinciden. Deben ser idénticas.";
                }
            }

            $tm = new TramitesModel();

            $this->view->tramite_part = $tm->listarPorParticipacion(Session::getValue('U_ID'));
            $this->view->tramite_sug = $tm->listarPorPerfil($this->calcularEdad(Session::getValue('U_FCH_NAC')), Session::getValue('U_GENERO'));

            $this->view->usuario = $this->model->traebyID(Session::getValue('U_ID'));
            $this->view->render($this, 'perfil');
        }
    }

    function recuperar() {

        if ($_POST) {
            $rutUsuario = str_replace('.', '', filter_input(INPUT_POST, 'rut'));

            if ($rutUsuario == null) {
                $this->view->err = "El rut no puede ser nulo.";
            } else {

                $usuario = $this->model->traebyUser($rutUsuario);

                if (empty($usuario)) {
                    $this->view->err = "Rut no existe en nuestros registros.";
                } else {

                    $pw = $this->generateRandomString();

                    $usuario_rec['usuarioID'] = $usuario->usuarioID;
                    ;
                    $usuario_rec['contrasenaUsuario'] = md5($pw);

                    $response = $this->model->editar($usuario_rec);

                    if ($response == "ok") {
                        if ($this->enviaCorreo($usuario->emailUsuario, 'recuperar', $pw)) {
                            $this->view->msg = "Se ha enviado un correo a su dirección de e-mail registrada, con su nueva contraseña.";
                        } else {
                            $this->view->err = "Error en el envío del e-mail.";
                        }
                    } else {
                        $this->view->err = $response . ': Ha ocurrido un problema con la actualización de contraseña.';
                    }
                }
            }
        }

        $this->view->render($this, 'recuperar');
    }

    function enviaCorreo($mail, $tipo, $nueva_pw = null) {

        if ($tipo == 'registro') {
            $subject = 'Registro Exitoso';
            $emailMensaje = '<center><h2>Registro Exitoso</h2>'
                    . '<p>Te invitamos a participar del nuevo Portal de Trámites.  A través de tus opiniones podremos mejorar nuestros servicios.</p>'
                    . '<p>Participa en: <a href="http://tramites.penalolen.cl" target="_blank">Portal de Trámites - Municipalidad de Pe&ntilde;alolén</a></p></center>';
        } else if ($tipo == 'recuperar') {
            $subject = 'Recuperación de Contraseña';
            $emailMensaje = '<center><h2>Contraseña actualizada</h2>'
                    . '<p>Su nueva contraseña es: ' . $nueva_pw . '</p>'
                    . '<p>Recuerde que puede actualizar su contraseña desde su panel de control.</p></center>';
        }

        /** ENVIA EMAIL * */
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: Municipalidad de Peñalolén <no-reply@penalolen.cl>' . "\r\n";

        if (mail($mail, $subject, $emailMensaje, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    function login() {

        if ($_POST) {

            $username = str_replace('.', '', filter_input(INPUT_POST, 'username'));
            $passwd = filter_input(INPUT_POST, 'passwd');
            $titulo = filter_input(INPUT_POST, 'titulo_tramites');

            $array = array($username, $passwd);

            if ($this->field_required($array)) {
                $this->view->err = "El usuario y contraseña son requeridos.";
            } else {

                $password = md5($passwd);
                $response = $this->loginUsuario($username, $password);

                switch ($response) {
                    case 'no-existe':
                        $this->view->info = 'Tú aún no estás registrado. ¿Desea registrarte?   <a href="' . URL . 'Usuarios/registrar" class="btn btn-info btn-xs ml10">Registrarse</a>';
                        $this->view->render_global('Index', 'index');
                        break;
                    case 'error':
                        $this->view->err = 'El usuario o contraseña ingresados son incorrectos. <a class="mt-none p-none ml10" href="' . URL . 'Usuarios/recuperar">(¿Olvidaste tu contraseña?)</a>';
                        $this->view->render_global('Index', 'index');
                        break;
                    case 'ok':
                        if ($titulo == null) {
                            header('location: ' . URL);
                        } else {
                            header('location: ' . URL . 'Tramites/ver/' . $titulo);
                        }
                        break;
                }
            }
        }
    }

    /**
     * 
     * @param date $fecha - Fecha con formato dd/mm/aaaa
     * @return int - Edad al día de hoy
     */
    function calcularEdad($fecha) {
        $dias = explode("/", $fecha, 3);
        $dias = mktime(0, 0, 0, $dias[1], $dias[0], $dias[2]);
        $edad = (int) ((time() - $dias) / 31556926 );
        return $edad;
    }

    function loginUsuario($username, $password) {

        $usuario = $this->model->trae($username);

        if (empty($usuario)) {
            return 'no-existe';
        } else {
            if ($usuario->contrasenaUsuario == $password) {
                $this->createSession($usuario->usuarioID, $usuario->rutUsuario, $usuario->nombresUsuario, $usuario->apellidosUsuario, $usuario->emailUsuario, $usuario->generoUsuario, $usuario->fechaNacimientoUsuario);
                return 'ok';
            } else {
                return 'error';
            }
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
