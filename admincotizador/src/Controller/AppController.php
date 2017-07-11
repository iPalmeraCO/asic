<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Email\Email;

class AppController extends Controller {

    public function initialize() {
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'loginRedirect' => [
                'controller' => 'Mains',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
            ],
            'unauthorizedRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
            ],
        ]);
        
    }
    
    public function isAuthorized($sms = "",  $class = ['key' => 'msgLogin']) {
        $objUser = $this->Auth->user();
        if ($objUser) {
            if((int) @$objUser['group_id'] == 10 && @$objUser['status_id'] == 1) {
                return true;
            } elseif ((int) @$objUser['group_id'] == 20 && @$objUser['status_id'] == 1) {
                if ($this->request->params['controller']=='Mains'){
                    $permissions = [
                        'index', 'configuracion_arquitecto', 'calculadora_admin', 'elements', 'quotesAdd'
                    ];
                    if (in_array($this->request->params['action'], $permissions)){
                        return true;
                    }
                } elseif ($this->request->params['controller']=='Users'){
                    if (in_array($this->request->params['action'], array('users_password', 'edit'))){
                        return true;
                    }
                }
                return false;
            }
        }
    }

    function validate_password($clave, $clave2, &$error_clave) {
        if (strlen($clave) < 6) {
            $error_clave = "La contraseÃ±a debe tener al menos 6 caracteres";
            return false;
        }
        if (strlen($clave) != strlen($clave2)) {
            $error_clave = "Las contraseÃ±as no coinciden.";
            return false;
        }
        if (strlen($clave) > 16) {
            $error_clave = "La contraseÃ±a no puede tener mÃ¡s de 16 caracteres";
            return false;
        }
        if (!preg_match('`[a-z]`', $clave)) {
            $error_clave = "La contraseÃ±a debe tener al menos una letra minÃºscula";
            return false;
        }
        if (!preg_match('`[A-Z]`', $clave)) {
            $error_clave = "La contraseÃ±a debe tener al menos una letra mayÃºscula";
            return false;
        }
        if (!preg_match('`[0-9]`', $clave)) {
            $error_clave = "La contraseÃ±a debe tener al menos un caracter numÃ©rico";
            return false;
        }
        $error_clave = "";
        return true;
    }
    
    public function sendMail($data){
        $email = new Email('gmail');
        $email->viewVars(['data'=>$data]);
        $email->template('quote')
                ->emailFormat('html')
                ->to($data['customer']['email'],'eduardo.mendoza@linktic.com')
                ->from(['eduardo.mendoza@linktic.com' => 'eduardo'])
                ->subject('Cotizacion')
                ->send();
                
    }

    public function beforeFilter(Event $event) {
        //$this->Auth->allow(['configuracion_views']);
    }
    public $arraySexo = [0 => 'Masculino', 1 => 'Femenino', 2 => 'Otros'];
    public $arrayTypeDoc = [
        'CC' => 'Cédula de ciudadanía',
        'CE' => 'Cédula de extranjería',
        'PA' => 'Pasaporte',
        'RC' => 'Registro civil',
        'TI' => 'Tarjeta de Identidad',
        'AS' => 'Adulto sin ID',
        'MS' => 'Menor sin ID'
    ];
    public $arrayGroup = [
        '10' => 'Administrador',
        '20' => 'Arquitecto de Infraestructura',
        
    ];

    // Variables que definen el label de los estados en las grillas 
    public $active = '<span class="label label-success label-sm">ACTIVO</span>';
    public $inactive = '<span class="label label-danger label-sm">INACTIVO</span>';
    public $delete = '<span class="label label-danger label-sm">ELIMINADO</span>';
    // Variables que definen los colores del switch de estado en los formulario de agregar y editar 
    public $switchOn = 'success';
    public $switchOff = 'danger';
    
    

}