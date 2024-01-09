<?php

class UserSession {
    public function __construct() {
        session_start();
        $this->checkTimeout();
    }

    public function setCurrentUser($usuario) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['last_activity'] = time(); // Actualizar la última actividad
    }

    public function getCurrentUser() {
        $_SESSION['last_activity'] = time(); // Actualizar la última actividad
        return $_SESSION['usuario'];
    }

    public function claseSession() {
        session_unset();
        session_destroy();
    }

    private function checkTimeout() {
        $inactive_time = 10; // tiempo de inactividad en segundos

        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactive_time)) {
            // Si ha pasado más tiempo del permitido, destruir la sesión y redirigir a login.php
            $this->claseSession();
            header("Location: login.php");
            exit();
        }

        // Regenerar el ID de sesión periódicamente para evitar problemas de seguridad
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 60)) {
            session_regenerate_id(true);
            $_SESSION['last_activity'] = time();
        }
    }
}

?>
