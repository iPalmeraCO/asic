<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController {

    const modController = 'users';
    const msgValidate = 'El Usuario ya Existe.';

//    public function beforeFilter(Event $event) {
//        parent::beforeFilter($event);
//        $this->Auth->allow('add');
//    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow('logout');
    }

    public function index() {
        
        $this->set('users', $this->Users->find('all'));
    }

    function views() {
        $group_id = 1000;
        $modModel = 'Users';
        $this->loadModel($modModel);
        $listObj = $this->$modModel->find('all',['conditions' => [ $modModel . '.group_id != ' => $group_id]]);
        $status_field = 'status_id';
        $rol_field = 'group_id';
        $infoView = [
            'main_title' => 'Usuarios', 'main_desc' => 'Usuarios', 'title' => 'Usuarios Registrados',
            'menu' => [0 => ['title' => 'Usuarios', 'url' => null]],
            'model' => $modModel,
            'table' => [
                0 => ['class' => 'center', 0 => 'name', 1 => 'NOMBRE', 2 => 'Nombre'],
                1 => ['class' => 'center', 0 => 'surname', 1 => 'APELLIDO', 2 => 'Apellido'],
                2 => ['class' => 'center', 0 => 'type_doc', 1 => 'TIPO DOC', 2 => 'Tipo Doc'],
                3 => ['class' => 'center', 0 => 'document', 1 => 'NUM DOC', 2 => 'Num Doc'],
                4 => ['class' => 'center', 0 => 'username', 1 => 'USUARIO', 2 => 'Usuario'],
                5 => ['class' => 'center', 0 => 'group_id', 1 => 'ROL', 2 => 'Rol'],
                6 => ['class' => 'center', 0 => 'status_id', 1 => 'ESTADO', 2 => 'Estado'],
                
            ],
            'cmdAdd' => ['url' => ['controller' => 'users', 'action' => 'add'], 'title' => 'Agregar'],
            'cmdEdit' => ['url' => ['controller' => 'users', 'action' => 'edit'], 'title' => 'Editar'],
            'cmdDel' => ['url' => ['controller' => 'users', 'action' => 'delete'], 'title' => 'Eliminar'],
            'cmdDetail' => ['url' => ['controller' => 'users', 'action' => 'details'], 'title' => 'Ver'],
        ];
        $this->set(compact('listObj', 'infoView', 'status_field','rol_field' ,$this->set('active', $this->active), $this->set('inactive', $this->inactive), $this->set('delete', $this->delete)));
    }

    public function add() {
        $modModel = 'Users';
        $funcViews = 'views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->newEntity();
        $error = '';


        if ($this->request->is(['post', 'put'])) {
            $this->$modModel->patchEntity($objData, $this->request->data);
            
            
            $error_encontrado = "";
            $objData->status_id = 1;
            if ($this->validate_password($this->request->data['password'], $this->request->data['password2'], $error_encontrado)) {
                $this->process_user($objData, $this->request->data, $modModel, $funcViews);
            } else {
                $error = 'has-error';
                $this->Flash->error($error_encontrado, ['key' => 'msgUserEdit']);
            }
        }

        $infoView = [
            'main_title' => 'Usuarios', 'main_desc' => 'Usuarios', 'title' => 'Usuarios - Creando Datos',
            'menu' => [0 => ['title' => 'Usuarios', 'url' => ['controller' => 'users', 'action' => $funcViews]], 1 => ['title' => 'Agregar', 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => 'users', 'action' => $funcViews], 'title' => 'Cancelar']
        ];
        $listObj01 = $this->arrayTypeDoc; //Tipo de Documento       
        $arrayGroup = $this->arrayGroup;
        $this->set(compact('objData', 'infoView', 'listObj01', 'arrayGroup', 'error', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    private function process_user($objData, $request, $modModel, $funcViews) {
        if ($this->validate_user($request['email']) == 1) {
            $this->Flash->error(self::msgValidate, ['key' => 'msgUserEdit']);
        } else {
            $this->modelAddUser($objData, $request, $modModel, $funcViews);
        }
    }

    private function modelAddUser($objData, $request, $modModel, $funcViews) {
        $this->$modModel->patchEntity($objData, $request);

        $objData->username = $this->request->data['email'];
        //Upload Image
            if (empty($this->request->data['image']['name'])) {
                unset($this->request->data['image']);
            }

            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image'];
                $ary_ext = array('jpg', 'jpeg', 'gif', 'png'); //array of allowed extensions
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                if (in_array($ext, $ary_ext)) {
                    $name = md5(time()).'.'.$ext;
                    move_uploaded_file($file['tmp_name'], WWW_ROOT .'attachment'.DS .'users'.DS. $name);
                    $objData->image = $name;
                }
            }
     
            //Fin Upload Image
        if ($this->$modModel->save($objData)) {
            
            $this->Flash->success(__("Datos creados con exitos"));
            return $this->redirect(['action' => $funcViews]);
        } else {

            $this->Flash->error(__('No se ha podido crear el objeto.'));
        }
    }

    public function edit($id = null) {
        $modModel = 'Users';
        $funcViews = 'views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->get($id);
        $error = '';
        $status = ($objData['status_id'] == 1) ? 'checked' : '';
        if($this->Auth->user('group_id') != 10 && $id != $this->Auth->user('id')){
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        if ($this->request->is(['post', 'put'])) {
            $this->$modModel->patchEntity($objData, $this->request->data);
            
             //Upload Image
            if (empty($this->request->data['image']['name'])) {
                unset($this->request->data['image']);
            }

            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image'];
                $ary_ext = array('jpg', 'jpeg', 'gif', 'png'); //array of allowed extensions
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                if (in_array($ext, $ary_ext)) {
                    //move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/' . $file['name']);
                    $name = md5(time()).'.'.$ext;
                    move_uploaded_file($file['tmp_name'], WWW_ROOT .'attachment'.DS .'users'.DS. $name);
                    $objData->image = $name;
                }
            }
     
            //Fin Upload Image



            if ($this->$modModel->save($objData)) {
                $this->Flash->success(__("Datos editados con exitos"));
                return $this->redirect(['action' => $funcViews]);
            }
            $this->Flash->error(__('No se ha podido crear el objeto.'));
        }

        $infoView = [
            'main_title' => 'Usuarios', 'main_desc' => 'Usuarios', 'title' => 'Usuarios - Editando Datos',
            'menu' => [0 => ['title' => 'Usuarios', 'url' => ['controller' => 'users', 'action' => $funcViews]], 1 => ['title' => 'Agregar', 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => 'users', 'action' => $funcViews], 'title' => 'Cancelar']
        ];
        $listObj01 = $this->arrayTypeDoc; //Tipo de Documento       
        $arrayGroup = $this->arrayGroup;
        $this->set(compact('objData', 'infoView', 'listObj01','arrayGroup' ,'status', 'error', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    public function delete($id = null) {
        $modModel = 'Users';
        $funcViews = 'views';
        $this->loadModel($modModel);

        $objData = $this->$modModel->get($id);
        $objData->status_id = 2;
        if ($this->request->is(['post', 'delete'])) {
            if ($this->$modModel->save($objData)) {
                $this->Flash->success(__('El objeto con id: {0} ha sido eliminado.', h($id)));
            } else {
                $this->Flash->error(__('No se ha podido eliminar el objeto con id: {0}.', h($id)));
            }
        } else {
            $this->Flash->error(__('El Metodo de Eliminacion no es valido: {0}.', h($id)));
        }
        return $this->redirect(['action' => $funcViews]);
    }

    private function validate_user($username) {
        $modModel = 'Users';
        $this->loadModel($modModel);
        $objData = $this->$modModel->find('all', ['conditions' => [$modModel . '.username' => $username]])->toArray();
        $validate = ($objData != null) ? 1 : 0;
        return $validate;
    }

    public function login() {
        $this->layout = 'login';

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
//                if ($user['status_id'] === 1) {
//                    return $this->redirect($this->Auth->redirectUrl());
//                } else {
//                    $this->Flash->error('No Autorizado', ['key' => 'msgLogin']);
//                }
            } else {
                $this->Flash->error('Usuario y/o Contraseña Invalidos', ['key' => 'msgLogin']);
            }
        }
    }

    public function users_password($id = null) {
        $modModel = 'Users';
        $funcViews = 'views';
        $error = '';
        $this->loadModel($modModel);
        if($this->Auth->user('group_id') != 10 && $id != $this->Auth->user('id')){
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $objData = $this->$modModel->get($id);
        if ($this->request->is(['post', 'put'])) {
            if ($this->request->data['password'] != $this->request->data['password2']) {
                $error = 'has-error';
                $this->Flash->error('Las claves no coinciden.', ['key' => 'msgUserEdit']);
            } else {
                $this->modelAdd($objData, $this->request->data, $modModel, $funcViews);
            }
        }
        $infoView = $this->infoView_add_edit($funcViews, $modModel, 'Usuarios ', 'Cambio de contraseña', ' - ' . $objData['name_01'] . ' ' . $objData['name_02'] . ' ' . $objData['lastname_01'] . ' ' . $objData['lastname_02']);
        $this->set(compact('objData', 'infoView', 'error'));
    }

    private function modelAdd($objData, $request, $modModel, $funcViews) {
        $this->$modModel->patchEntity($objData, $request);
        if ($this->$modModel->save($objData)) {
            $this->Flash->success(__("Datos Creados con exitos"));
            return $this->redirect(['action' => $funcViews]);
        }
        $this->Flash->error(__('No se ha podido crear el objeto.'));
    }

    private function infoView_add_edit($funcViews, $modModel, $name, $action, $descriptionForm) {
        $infoView = [
            'main_title' => $name, 'main_desc' => $name,
            'title' => $name . $descriptionForm,
            'menu' => [
                0 => ['title' => $name, 'url' => ['controller' => self::modController, 'action' => $funcViews]],
                1 => ['title' => $action, 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => self::modController, 'action' => $funcViews], 'title' => 'Cancelar']];
        return $infoView;
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}
