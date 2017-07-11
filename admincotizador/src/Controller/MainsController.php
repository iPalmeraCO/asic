<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MainsController
 *
 * @author MrDaz_000
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Controller\Component\RequestHandlerComponent;

class MainsController extends AppController {

    public $components = ['Flash'];

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->isAuthorized();
        //$this->Auth->allow('calculadora_admin');
        $this->isAuthorized('El usuario no cuenta con los permisos para acceder a este Módulo Mains', 'Mains.*');
    }

    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index() {
        $infoView = [
            'main_title' => 'asic', 'main_desc' => 'asic', 'title' => 'ASIC - DASHBOARD',
            'menu' => null,
            'model' => null,
            'cmdAdd' => null,
            'cmdBack' => null,
            'cmdEdit' => null,
            'cmdDel' => null,
            'cmdDetail' => null,
            'cmdAsignar' => null,
        ];
        $this->set(compact('objData', 'infoView'));
    }
    
    
    public function elements(){
       $modModelCat = 'Elements';
       $this->loadModel($modModelCat);
       $conditions = [
           'LOWER(Category.name)' => $this->request->data['name'],
           'Elements.status_id' => 1
       ];
       $listObj = $this->$modModelCat->find('all', ['conditions' => $conditions])->contain(['Category', 'Technology', 'Unitymeasure', 'Configuracion'])->hydrate(false)->toArray();
       $this->set(compact('listObj'));
       $this->set('_serialize', ['listObj']);
   }

    //---------------CATEGORIAS-------

    function category_views() {
        $modModel = 'Category';
        $this->loadModel($modModel);
        //$listObj = $this->$modModel->find('all');
        $listObj = $this->$modModel->find('all')->hydrate(false)->toArray();
        $infoView = [
            'main_title' => 'Categoria', 'main_desc' => 'Categorias', 'title' => 'Categorias Registradas',
            'menu' => [0 => ['title' => 'Categoria', 'url' => null]],
            'model' => $modModel,
            'table' => [
                0 => ['class' => 'hidden-xs center', 0 => 'id', 1 => 'No', 2 => 'Indentificador'],
                1 => ['class' => 'center', 0 => 'name', 1 => 'NOMBRE', 2 => 'Nombre'],
                2 => ['class' => 'center', 0 => 'description', 1 => 'DESCRIPCIÓN', 2 => 'Descripción'],
                3 => ['class' => 'center', 0 => 'status_id', 1 => 'ESTADO', 2 => 'Estado'],
            ],
            'cmdAdd' => ['url' => ['controller' => 'mains', 'action' => 'category_add'], 'title' => 'Agregar'],
            'cmdEdit' => ['url' => ['controller' => 'mains', 'action' => 'category_edit'], 'title' => 'Editar'],
            'cmdDel' => ['url' => ['controller' => 'mains', 'action' => 'category_delete'], 'title' => 'Eliminar'],
        ];
        $this->set(compact('listObj', 'infoView', $this->set('active', $this->active), $this->set('inactive', $this->inactive), $this->set('delete', $this->delete)));
    }

    public function category_add() {
        $modModel = 'Category';
        $funcViews = 'category_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->newEntity();
        if ($this->request->is(['post', 'put'])) {
            $this->$modModel->patchEntity($objData, $this->request->data);
            if ($this->$modModel->save($objData)) {
                $this->Flash->success(__("Datos creados con exitos"));
                return $this->redirect(['action' => $funcViews]);
            }
            $this->Flash->error(__('No se ha podido crear el objeto.'));
        }
        $infoView = [
            'main_title' => 'Categorias', 'main_desc' => 'Categorias', 'title' => 'Categorias - Creando Datos',
            'menu' => [0 => ['title' => 'Categorias', 'url' => ['controller' => 'mains', 'action' => $funcViews]], 1 => ['title' => 'Agregar', 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => 'mains', 'action' => $funcViews], 'title' => 'Cancelar']
        ];
        $this->set(compact('objData', 'infoView', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    public function category_edit($id = null) {
        $modModel = 'Category';
        $funcViews = 'category_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->$modModel->patchEntity($objData, $this->request->data);
            if ($this->$modModel->save($objData)) {
                $this->Flash->success(__("Datos Editados con exitos"));
                return $this->redirect(['action' => $funcViews]);
            }
            $this->Flash->error(__('No se ha podido actualizar el objeto.'));
        }
        $infoView = [
            'main_title' => 'Categorias', 'main_desc' => 'Categorias', 'title' => 'Categorias - Editando Datos',
            'menu' => [0 => ['title' => 'Categorias', 'url' => ['controller' => 'mains', 'action' => $funcViews]], 1 => ['title' => 'Editar', 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => 'mains', 'action' => $funcViews], 'title' => 'Cancelar']
        ];
        $this->set(compact('objData', 'infoView', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    public function category_delete($id = null) {
        $modModel = 'Category';
        $funcViews = 'category_views';
        $this->loadModel($modModel);
        //$this->request->allowMethod(['post', 'delete']);
        $objData = $this->$modModel->get($id);
        if ($this->request->is(['post', 'delete'])) {
            if ($this->$modModel->delete($objData)) {
                $this->Flash->success(__('El objeto con id: {0} ha sido eliminado.', h($id)));
            } else {
                $this->Flash->error(__('No se ha podido eliminar el objeto con id: {0}.', h($id)));
            }
        } else {
            $this->Flash->error(__('El Metodo de Eliminacion no es valido: {0}.', h($id)));
        }
        return $this->redirect(['action' => $funcViews]);
    }

    //------------ELEMENTOS-------------

    function elements_views() {
        $modModel = 'Elements';
        $this->loadModel($modModel);
        //$listObj = $this->$modModel->find('all')->contain(['category'])->hydrate(false)->toArray();
        $listObj = $this->$modModel->find('all')->contain(['Category', 'Technology', 'Unitymeasure'])->hydrate(false)->toArray();
        $infoView = [
            'main_title' => 'Elementos', 'main_desc' => 'Elementos', 'title' => 'Elementos Registrados',
            'menu' => [0 => ['title' => 'Elementos', 'url' => null]],
            'model' => $modModel,
            'table' => [
                0 => ['class' => 'hidden-xs center', 0 => 'id', 1 => 'No', 2 => 'Indentificador'],
                1 => ['class' => 'center', 0 => 'name', 1 => 'NOMBRE', 2 => 'Nombre'],
                2 => ['class' => 'center', 0 => 'category_id', 1 => 'CATEGORIA', 2 => 'Categoría'],
                3 => ['class' => 'center', 0 => 'Unity_measure_id', 1 => 'MEDIDA', 2 => 'Unidad de medida'],
                4 => ['class' => 'center', 0 => 'technology_id', 1 => 'TIPO TECNOLOGÍA', 2 => 'Tipo de Tecnología'],
                5 => ['class' => 'center', 0 => 'created', 1 => 'FECHA DE CREACION', 2 => 'Fecha de creación'],
            ],
            'cmdAdd' => ['url' => ['controller' => 'mains', 'action' => 'elements_add'], 'title' => 'Agregar'],
            'cmdEdit' => ['url' => ['controller' => 'mains', 'action' => 'elements_edit'], 'title' => 'Editar'],
            'cmdDel' => ['url' => ['controller' => 'mains', 'action' => 'elements_delete'], 'title' => 'Eliminar'],
        ];
        $this->set(compact('listObj', 'infoView'));
    }

    private function categorylist($id = null) {
        $modModel = 'category';
        $this->loadModel($modModel);
        $listObj = $this->$modModel->find('list', [ 'keyField' => 'id', 'valueField' => 'name']);
        return $listObj;
    }

    public function elements_add() {
        $modModel = 'Elements';
        $funcViews = 'elements_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->newEntity();
        $modModelCat = 'category';
        $this->loadModel($modModelCat);
        $lstObj = $this->$modModelCat->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        $modModelCat = 'technology';
        $this->loadModel($modModelCat);
        $lstObjTec = $this->$modModelCat->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        $modModelCat = 'unitymeasure';
        $this->loadModel($modModelCat);
        $lstObjUni = $this->$modModelCat->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        if ($this->request->is(['post', 'put'])) {
            $this->$modModel->patchEntity($objData, $this->request->data);
            if ($this->$modModel->save($objData)) {
                $id = $objData->id;
                $status_id = $objData->status_id;
                $modelconfig = 'Configuracion';
                $this->modelAdd($id, $status_id, $modelconfig, $funcViews);
            }
            $this->Flash->error(__('No se ha podido crear el objeto.'));
        }
        $infoView = [
            'main_title' => 'Elementos', 'main_desc' => 'Elementos', 'title' => 'Elementos - Creando Datos',
            'menu' => [0 => ['title' => 'Elementos', 'url' => ['controller' => 'mains', 'action' => $funcViews]], 1 => ['title' => 'Agregar', 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => 'mains', 'action' => $funcViews], 'title' => 'Cancelar']
        ];
        $this->set(compact('objData', 'infoView', 'lstObj', 'lstObjTec', 'lstObjUni', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    private function modelAdd($id, $status_id, $modModel, $funcViews) {
        $this->loadModel($modModel);
        $objData = $this->$modModel->newEntity();
        $objData->element_id = $id;
        $objData->status_id = $status_id;
        $objData->tier1 = 0;
        $objData->tier2 = 0;
        $objData->tier3 = 0;
        $objData->tier4 = 0;
        if ($this->$modModel->save($objData)) {
            $this->Flash->success(__("Datos Creados con exitos"));

            return $this->redirect(['action' => $funcViews]);
        }
        $this->Flash->error(__('No se ha podido crear el objeto.'));
    }

    public function elements_edit($id = null) {
        $modModel = 'Elements';
        $funcViews = 'elements_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->get($id);
        $modModelCat = 'Category';
        $this->loadModel($modModelCat);
        $lstObj = $this->$modModelCat->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        $modModelCat = 'Technology';
        $this->loadModel($modModelCat);
        $lstObjTec = $this->$modModelCat->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        $modModelCat = 'Unitymeasure';
        $this->loadModel($modModelCat);
        $lstObjUni = $this->$modModelCat->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        if ($this->request->is(['post', 'put'])) {
            $this->$modModel->patchEntity($objData, $this->request->data);
            if ($this->$modModel->save($objData)) {
                $this->Flash->success(__("Datos Editados con exitos"));
                return $this->redirect(['action' => $funcViews]);
            }
            $this->Flash->error(__('No se ha podido actualizar el objeto.'));
        }
        $infoView = [
            'main_title' => 'Elementos', 'main_desc' => 'Elementos', 'title' => 'Elementos - Editando Datos',
            'menu' => [0 => ['title' => 'Elementos', 'url' => ['controller' => 'mains', 'action' => $funcViews]], 1 => ['title' => 'Editar', 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => 'mains', 'action' => $funcViews], 'title' => 'Cancelar']
        ];
        $this->set(compact('objData', 'infoView', 'lstObj', 'lstObjTec', 'lstObjUni', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    public function elements_delete($id = null) {
        $modModel = 'Elements';
        $funcViews = 'elements_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->get($id, ['contain' => ['Configuracion'], 'hydrate' => false]);
        $idc = $objData['configuracion'][0]['id'];
        if ($this->request->is(['post', 'delete'])) {
            if ($this->$modModel->delete($objData)) {
                $this->configurador_delete($idc);
                $this->Flash->success(__('El objeto con id: {0} ha sido eliminado.', h($id)));
                $this->Flash->success(__('El objeto con id: {0} ha sido eliminado.', h($id)));
            } else {
                $this->Flash->error(__('No se ha podido eliminar el objeto con id: {0}.', h($id)));
            }
        } else {
            $this->Flash->error(__('El Metodo de Eliminacion no es valido: {0}.', h($id)));
        }
        return $this->redirect(['action' => $funcViews]);
    }

    //----------TIPOS DE TECNLOGIA-------------

    function technology_views() {

        $modModel = 'Technology';
        $this->loadModel($modModel);
        $listObj = $this->$modModel->find('all');
        $infoView = [
            'main_title' => 'Tipos De Tecnología', 'main_desc' => 'Tipos De Tecnología', 'title' => 'Tipos De Tecnología Registradas',
            'menu' => [0 => ['title' => 'Tipos De Tecnología', 'url' => null]],
            'model' => $modModel,
            'table' => [
                0 => ['class' => 'hidden-xs center', 0 => 'id', 1 => 'No', 2 => 'Indentificador'],
                1 => ['class' => 'center', 0 => 'name', 1 => 'NOMBRE', 2 => 'Nombre'],
                2 => ['class' => 'center', 0 => 'description', 1 => 'DESCRIPCION', 2 => 'Descripción'],
                3 => ['class' => 'center', 0 => 'status_id', 1 => 'ESTADO', 2 => 'Estado'],
                4 => ['class' => 'center', 0 => 'created', 1 => 'CREADO', 2 => 'Creado'],
                5 => ['class' => 'center', 0 => 'modified', 1 => 'MODIFICADO', 2 => 'Modificado'],
            ],
            'cmdAdd' => ['url' => ['controller' => 'mains', 'action' => 'technology_add'], 'title' => 'Agregar'],
            'cmdEdit' => ['url' => ['controller' => 'mains', 'action' => 'technology_edit'], 'title' => 'Editar'],
            'cmdDel' => ['url' => ['controller' => 'mains', 'action' => 'technology_delete'], 'title' => 'Eliminar'],
            'cmdDetail' => ['url' => ['controller' => 'mains', 'action' => 'technology_details'], 'title' => 'Ver'],
        ];
        $this->set(compact('listObj', 'infoView', $this->set('active', $this->active), $this->set('inactive', $this->inactive), $this->set('delete', $this->delete)));
    }

    public function technology_add() {
        $modModel = 'Technology';
        $funcViews = 'technology_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->newEntity();
        if ($this->request->is(['post', 'put'])) {
            $this->$modModel->patchEntity($objData, $this->request->data);
            if ($this->$modModel->save($objData)) {
                $this->Flash->success(__("Datos creados con exitos"));
                return $this->redirect(['action' => $funcViews]);
            }
            $this->Flash->error(__('No se ha podido crear el objeto.'));
        }
        $infoView = [
            'main_title' => 'Tipos De Tecnología', 'main_desc' => 'Tipos De Tecnología', 'title' => 'Tipos De Tecnología - Creando Datos',
            'menu' => [0 => ['title' => 'Tipos De Tecnología', 'url' => ['controller' => 'mains', 'action' => $funcViews]], 1 => ['title' => 'Agregar', 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => 'mains', 'action' => $funcViews], 'title' => 'Cancelar']
        ];
        $this->set(compact('objData', 'infoView', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    public function technology_edit($id = null) {
        $modModel = 'Technology';
        $funcViews = 'technology_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->$modModel->patchEntity($objData, $this->request->data);
            if ($this->$modModel->save($objData)) {
                $this->Flash->success(__("Datos Editados con exitos"));
                return $this->redirect(['action' => $funcViews]);
            }
            $this->Flash->error(__('No se ha podido actualizar el objeto.'));
        }
        $infoView = [
            'main_title' => 'Tipos De Tecnología', 'main_desc' => 'Tipos De Tecnología', 'title' => 'Tipos De Tecnología - Editando Datos',
            'menu' => [0 => ['title' => 'Tipos De Tecnología', 'url' => ['controller' => 'mains', 'action' => $funcViews]], 1 => ['title' => 'Editar', 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => 'mains', 'action' => $funcViews], 'title' => 'Cancelar']
        ];
        $this->set(compact('objData', 'infoView', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    public function technology_delete($id = null) {
        $modModel = 'Technology';
        $funcViews = 'technology_views';
        $this->loadModel($modModel);
        //$this->request->allowMethod(['post', 'delete']);
        $objData = $this->$modModel->get($id);
        if ($this->request->is(['post', 'delete'])) {
            if ($this->$modModel->delete($objData)) {
                $this->Flash->success(__('El objeto con id: {0} ha sido eliminado.', h($id)));
            } else {
                $this->Flash->error(__('No se ha podido eliminar el objeto con id: {0}.', h($id)));
            }
        } else {
            $this->Flash->error(__('El Metodo de Eliminacion no es valido: {0}.', h($id)));
        }
        return $this->redirect(['action' => $funcViews]);
    }

    // ------ UNIDAD DE MEDIDA -------------

    function unitymeasure_views() {
        $modModel = 'Unitymeasure';
        $this->loadModel($modModel);
        $listObj = $this->$modModel->find('all');
        $infoView = [
            'main_title' => 'Unidades De Medida', 'main_desc' => 'Unidades De Medida', 'title' => 'Unidades De Medida Registradas',
            'menu' => [0 => ['title' => 'Unidades De Medida', 'url' => null]],
            'model' => $modModel,
            'table' => [
                0 => ['class' => 'hidden-xs center', 0 => 'id', 1 => 'No', 2 => 'Indentificador'],
                1 => ['class' => 'center', 0 => 'name', 1 => 'NOMBRE', 2 => 'Nombre'],
                2 => ['class' => 'center', 0 => 'description', 1 => 'DESCRIPCION', 2 => 'Descripción'],
                3 => ['class' => 'center', 0 => 'status_id', 1 => 'ESTADO', 2 => 'Estado'],
                4 => ['class' => 'center', 0 => 'created', 1 => 'CREADO', 2 => 'Creado'],
                5 => ['class' => 'center', 0 => 'modified', 1 => 'MODIFICADO', 2 => 'Modificado'],
            ],
            'cmdAdd' => ['url' => ['controller' => 'mains', 'action' => 'unitymeasure_add'], 'title' => 'Agregar'],
            'cmdEdit' => ['url' => ['controller' => 'mains', 'action' => 'unitymeasure_edit'], 'title' => 'Editar'],
            'cmdDel' => ['url' => ['controller' => 'mains', 'action' => 'unitymeasure_delete'], 'title' => 'Eliminar'],
            'cmdDetail' => ['url' => ['controller' => 'mains', 'action' => 'unitymeasure_details'], 'title' => 'Ver'],
        ];
        $this->set(compact('listObj', 'infoView', $this->set('active', $this->active), $this->set('inactive', $this->inactive), $this->set('delete', $this->delete)));
    }

    public function unitymeasure_add() {
        $modModel = 'Unitymeasure';
        $funcViews = 'unitymeasure_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->newEntity();
        if ($this->request->is(['post', 'put'])) {
            $this->$modModel->patchEntity($objData, $this->request->data);

            if ($this->$modModel->save($objData)) {
                $this->Flash->success(__("Datos creados con exitos"));
                return $this->redirect(['action' => $funcViews]);
            }
            $this->Flash->error(__('No se ha podido crear el objeto.'));
        }
        $infoView = [
            'main_title' => 'Unidades De Medida', 'main_desc' => 'Unidades De Medida', 'title' => 'Unidades De Medida - Creando Datos',
            'menu' => [0 => ['title' => 'Unidades De Medida', 'url' => ['controller' => 'mains', 'action' => $funcViews]], 1 => ['title' => 'Agregar', 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => 'mains', 'action' => $funcViews], 'title' => 'Cancelar']
        ];
        $this->set(compact('objData', 'infoView', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    public function unitymeasure_edit($id = null) {
        $modModel = 'Unitymeasure';
        $funcViews = 'unitymeasure_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->$modModel->patchEntity($objData, $this->request->data);


            if ($this->$modModel->save($objData)) {
                $this->Flash->success(__("Datos Editados con exitos"));
                return $this->redirect(['action' => $funcViews]);
            }
            $this->Flash->error(__('No se ha podido actualizar el objeto.'));
        }
        $infoView = [
            'main_title' => 'Unidades De Medida', 'main_desc' => 'Unidades De Medida', 'title' => 'Unidades De Medida - Editando Datos',
            'menu' => [0 => ['title' => 'Unidades De Medida', 'url' => ['controller' => 'mains', 'action' => $funcViews]], 1 => ['title' => 'Editar', 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => 'mains', 'action' => $funcViews], 'title' => 'Cancelar']
        ];
        $this->set(compact('objData', 'infoView', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    public function unitymeasure_delete($id = null) {
        $modModel = 'Unitymeasure';
        $funcViews = 'unitymeasure_views';
        $this->loadModel($modModel);
        //$this->request->allowMethod(['post', 'delete']);
        $objData = $this->$modModel->get($id);
        if ($this->request->is(['post', 'delete'])) {
            if ($this->$modModel->delete($objData)) {
                $this->Flash->success(__('El objeto con id: {0} ha sido eliminado.', h($id)));
            } else {
                $this->Flash->error(__('No se ha podido eliminar el objeto con id: {0}.', h($id)));
            }
        } else {
            $this->Flash->error(__('El Metodo de Eliminacion no es valido: {0}.', h($id)));
        }
        return $this->redirect(['action' => $funcViews]);
    }

    //------ CONFIGURADOR DE COSTOS GENERALES------------//

    function configuracion_views($id = null) {
        $modModel = 'Configuracion';
        $this->loadModel($modModel);
        $listObj = $this->getListObj($modModel);
        $clasificacion = $this->categorylist($id);
        $infoView = [
            'main_title' => 'Configurador Costos Generales', 'main_desc' => 'Configurador Costos Generales', 'title' => 'Configurador Costos Generales Registrados',
            'menu' => [0 => ['title' => 'Configurador Costos Generales', 'url' => null]],
            'model' => $modModel,
            'table' => [
                //0 => ['class' => 'hidden-xs center', 0 => 'id', 1 => 'No', 2 => 'Indentificador'],
                1 => ['class' => 'center', 0 => 'element_id', 1 => 'CLASIFICACIÓN', 2 => 'Clasificación', 3 => 'category'],
                2 => ['class' => 'center', 0 => 'element_id', 1 => 'ELEMENTO', 2 => 'Nombre del Elemento', 3 => 'name'],
                3 => ['class' => 'center','width'=>'10%', 0 => 'element_id', 1 => 'DESCRIPCION', 2 => 'Descripción del elemento', 3 => 'description', 4 => 'measure'],
            //4 => ['class' => 'center', 0 => 'element_id', 1 => 'MEDIDA', 2 => 'Medida', 3 => 'medida'],
            ],
            'cmdAdd' => ['url' => ['controller' => 'mains', 'action' => 'configuracion_add'], 'title' => 'Agregar'],
            'cmdEdit' => ['url' => ['controller' => 'mains', 'action' => 'configuracion_edit'], 'title' => 'Editar'],
            'cmdDel' => ['url' => ['controller' => 'mains', 'action' => 'configuracion_delete'], 'title' => 'Eliminar'],
        ];
        $this->set(compact('listObj', 'infoView', 'clasificacion'));
    }

    public function configurador_edit_field() {
        $this->render(false);
        $this->isAuthorized();
        $data = $this->request->data;
        $modModel = 'Configuracion';
        $this->loadModel($modModel);
        $conf = $this->$modModel->get($data['id']);
        $data[$data['class']] = $data['value'];
        $this->$modModel->patchEntity($conf, $data);
        $conf['total_sale_price'] = ($conf['unit_cost'] * ($conf['margin'] / 100)) + $conf['unit_cost'];
        if ($this->$modModel->save($conf)) {
            echo '$ ' . number_format($conf['total_sale_price'], 2, '.', ',');
            //echo $conf['total_sale_price'];
        }
        die;
    }

    public function configurador_delete($id = null) {
        $modModel = 'Configurador';
        $this->loadModel($modModel);
        //$this->request->allowMethod(['post', 'delete']);
        $objData = $this->$modModel->get($id);
        if ($this->request->is(['post', 'delete'])) {
            if ($this->$modModel->delete($objData)) {
                $this->Flash->success(__('El objeto con id: {0} ha sido eliminado.', h($id)));
            } else {
                $this->Flash->error(__('No se ha podido eliminar el objeto con id: {0}.', h($id)));
            }
        } else {
            $this->Flash->error(__('El Metodo de Eliminacion no es valido: {0}.', h($id)));
        }
    }

    //------ CONFIGURADOR DE COS
    //---------- CALCULADOR ADMIN -----------------

    public function calculadora_admin() {
        $modModel = 'customers';
        $funcViews = 'customers_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->newEntity();

        $modModelCat = 'Department';
        $this->loadModel($modModelCat);

        $lstObj = $this->$modModelCat->find('list', [
            'keyField' => 'id',
            'valueField' => 'name']);
        $infoView = [
            'main_title' => 'Calculadora Administrador', 'main_desc' => 'Calculadora Administrador', 'title' => 'Generar Cotizacion Administrador',
            'menu' => [0 => ['title' => 'Configurador Costos Generales', 'url' => null]],
            //'model' => $modModel,
            'cmdAdd' => ['url' => ['controller' => 'mains', 'action' => 'configuracion_add'], 'title' => 'Agregar'],
            'cmdEdit' => ['url' => ['controller' => 'mains', 'action' => 'configuracion_edit'], 'title' => 'Editar'],
            'cmdDel' => ['url' => ['controller' => 'mains', 'action' => 'configuracion_delete'], 'title' => 'Eliminar'],
            'cmdDetail' => ['url' => ['controller' => 'mains', 'action' => 'configuracion_details'], 'title' => 'Ver'],
        ];
        $this->set(compact('infoView','objData','lstObj'));
    }

    //------ PAQUETES ------------

    public function packages_views() {

        $modModel = 'Packages';
        $this->loadModel($modModel);
        $listObj = $this->$modModel->find('all')->contain(['Elements','Technology'])->hydrate(false)->toArray();
        $infoView = [
            'main_title' => 'Paquetes', 'main_desc' => 'Paquetes', 'title' => 'Paquetes Registrados',
            'menu' => [0 => ['title' => 'Paquetes', 'url' => null]],
            'model' => $modModel,
            'table' => [
                0 => ['class' => 'center', 0 => 'image', 1 => 'IMAGEN', 2 => 'Imagen'],
                1 => ['class' => 'center', 0 => 'name', 1 => 'NOMBRE', 2 => 'Nombre del Elemento'],
                2 => ['class' => 'center', 0 => 'description', 1 => 'DESCRIPCION', 2 => 'Descripción del paquete'],
                3 => ['class' => 'center', 0 => 'os_id', 1 => 'SO', 2 => 'Sistema Operativo'],
                4 => ['class' => 'center', 0 => 'technology_id', 1 => 'TIPO DE TECNOLOGÍA', 2 => 'Tipo De Tecnlogía'],
                5 => ['class' => 'center', 0 => 'status_id', 1 => 'ESTADO', 2 => 'Estado'],
                6 => ['class' => 'center', 0 => 'created', 1 => 'FECHA DE CREACION', 2 => 'Fecha de creación'],
            ],
            'cmdAdd' => ['url' => ['controller' => 'mains', 'action' => 'packages_add'], 'title' => 'Agregar'],
            'cmdEdit' => ['url' => ['controller' => 'mains', 'action' => 'packages_edit'], 'title' => 'Editar'],
            'cmdDel' => ['url' => ['controller' => 'mains', 'action' => 'packages_delete'], 'title' => 'Eliminar'],
            'cmdDetail' => ['url' => ['controller' => 'mains', 'action' => 'packages_details'], 'title' => 'Ver'],
            'cmdAsignar' => ['url' => ['controller' => 'mains', 'action' => 'package_elemento'], 'title' => 'Asignar Elementos'],
        ];
        $this->set(compact('listObj', 'infoView', $this->set('active', $this->active), $this->set('inactive', $this->inactive), $this->set('delete', $this->delete)));
    }

    public function packages_add() {
        $modModel = 'Packages';
        $funcViews = 'packages_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->newEntity();
        $modModelCat = 'Elements';
        $this->loadModel($modModelCat);
        $lstObj = $this->$modModelCat->find('list')->select(['id', 'name'])->where(['category_id' => 1]);
        $modModelCat = 'Technology';
        $this->loadModel($modModelCat);
        $lstObjTec = $this->$modModelCat->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
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
                    $name = md5(time()) . '.' . $ext;
                    move_uploaded_file($file['tmp_name'], WWW_ROOT  . 'attachment' . DS . 'packages' . DS . $name);
                    $objData->image = $name;
                }
            }
            //Fin Upload Image
            if ($this->$modModel->save($objData)) {
                $this->Flash->success(__("Datos creados con exitos"));
                return $this->redirect(['action' => $funcViews]);
            }
            $this->Flash->error(__('No se ha podido crear el objeto.'));
        }
        $infoView = [
            'main_title' => 'Paquetes', 'main_desc' => 'Paquetes', 'title' => 'Paquetes - Creando Datos',
            'menu' => [0 => ['title' => 'Paquetes', 'url' => ['controller' => 'mains', 'action' => $funcViews]], 1 => ['title' => 'Agregar', 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => 'mains', 'action' => $funcViews], 'title' => 'Cancelar']
        ];
        $this->set(compact('objData', 'infoView', 'lstObj', 'lstObjTec', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    public function packages_edit($id = null) {
        $modModel = 'Packages';
        $funcViews = 'packages_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->get($id);
        $modModelCat = 'Elements';
        $this->loadModel($modModelCat);
        $lstObj = $this->$modModelCat->find('list')->select(['id', 'name'])->where(['category_id' => 1]);
        $modModelCat = 'Technology';
        $this->loadModel($modModelCat);
        $lstObjTec = $this->$modModelCat->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
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
                    $name = md5(time()) . '.' . $ext;
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'attachment' . DS . 'packages' . DS . $name);
                    $objData->image = $name;
                }
            }
            //Fin Upload Image
            if ($this->$modModel->save($objData)) {
                $this->Flash->success(__("Datos Editados con exitos"));
                return $this->redirect(['action' => $funcViews]);
            }
            $this->Flash->error(__('No se ha podido actualizar el objeto.'));
        }
        $infoView = [
            'main_title' => 'Paquetes', 'main_desc' => 'Paquetes', 'title' => 'Paquetes - Editanto Datos',
            'menu' => [0 => ['title' => 'Paquetes', 'url' => ['controller' => 'mains', 'action' => $funcViews]], 1 => ['title' => 'Editar', 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => 'mains', 'action' => $funcViews], 'title' => 'Cancelar']
        ];
        $this->set(compact('objData', 'infoView', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
        $this->set(compact('objData', 'infoView', 'lstObj', 'lstObjTec', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    public function packages_delete($id = null) {
        $modModel = 'Packages';
        $funcViews = 'packages_views';
        $this->loadModel($modModel);
        //$this->request->allowMethod(['post', 'delete']);
        $objData = $this->$modModel->get($id);
        if ($this->request->is(['post', 'delete'])) {
            if ($this->$modModel->delete($objData)) {
                $this->Flash->success(__('El objeto con id: {0} ha sido eliminado.', h($id)));
            } else {
                $this->Flash->error(__('No se ha podido eliminar el objeto con id: {0}.', h($id)));
            }
        } else {
            $this->Flash->error(__('El Metodo de Eliminacion no es valido: {0}.', h($id)));
        }
        return $this->redirect(['action' => $funcViews]);
    }

    public function package_elemento($id = null) {
        $modModelP = 'Packages';
        $this->loadModel($modModelP);
        $listObjP = $this->$modModelP->get($id,['contain'=>['Elements','Technology']]);

        $modModel = 'Elements';
        $this->loadModel($modModel);
        $listObj = $this->$modModel->find('all')->contain(['Category', 'Technology', 'Unitymeasure'])->hydrate(false)->toArray();

        $modModel = 'PackagesElements';
        $this->loadModel($modModel);
        $listObjPE = $this->$modModel->find('all')->where(['packages_id' => $id])->hydrate(false)->toArray();

        $infoView = [
            'main_title' => 'Asignar Elementos a paquete', 'main_desc' => 'Elementos', 'title' => 'Elementos Registrados',
            'menu' => [0 => ['title' => 'Elementos', 'url' => null]],
            'model' => $modModel,
            'table' => [
                0 => ['class' => 'center', 0 => 'id', 1 => 'No', 2 => 'Indentificador'],
                1 => ['class' => 'center', 0 => 'name', 1 => 'NOMBRE DEL ELEMENTO', 2 => 'Nombre del Elemento'],
                2 => ['class' => 'center', 0 => 'category_id', 1 => 'CATEGORIA', 2 => 'Categoría'],
                3 => ['class' => 'center', 0 => 'Unity_measure_id', 1 => 'UNIDAD DE MEDIDA', 2 => 'Unidad de medida'],
                4 => ['class' => 'center', 0 => 'technology_id', 1 => 'NOMBRE DE FABRICANTE', 2 => 'Nombre de fabricante'],
                5 => ['class' => 'center', 0 => 'element_id', 1 => 'ASIGNAR', 2 => 'Asignar'],
            ],
            'table2' => [
                0 => ['class' => 'center', 0 => 'image', 1 => 'IMAGEN', 2 => 'Imagen'],
                1 => ['class' => 'center', 0 => 'name', 1 => 'NOMBRE DEL PAQUETE', 2 => 'Nombre del Elemento'],
                2 => ['class' => 'center', 0 => 'description', 1 => 'DESCRIPCION DEL PAQUETE', 2 => 'Descripción del paquete'],
                3 => ['class' => 'center', 0 => 'os_id', 1 => 'SISTEMA OPERATIVO', 2 => 'Sistema Operativo'],
                4 => ['class' => 'center', 0 => 'technology_id', 1 => 'TIPO DE TECNOLOGÍA', 2 => 'Tipo De Tecnlogía'],
                5 => ['class' => 'center', 0 => 'status_id', 1 => 'ESTADO', 2 => 'Estado'],
            ],
            'cmdAdd' => ['url' => ['controller' => 'mains', 'action' => 'elements_add'], 'title' => 'Agregar'],
            'cmdEdit' => ['url' => ['controller' => 'mains', 'action' => 'elements_edit'], 'title' => 'Editar'],
            'cmdDel' => ['url' => ['controller' => 'mains', 'action' => 'elements_delete'], 'title' => 'Eliminar'],
            'cmdDetail' => ['url' => ['controller' => 'mains', 'action' => 'elements_details'], 'title' => 'Ver'],
        ];
        $this->set(compact('listObj', 'listObjP', 'listObjPE', 'infoView', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    public function package_elem() {
        $data = $this->request->data;
        $modModel = 'PackagesElements';

        $this->loadModel($modModel);
        if ($data['value'] == 'true') {
            $conf = $this->$modModel->newEntity();
            $conf->packages_id = $data['idp'];
            $conf->elements_id = $data['ide'];
            if ($this->$modModel->save($conf)) {
                echo 'Guardado';
            }
        } else {
            $idp = $data['idp'];
            $ide = $data['ide'];

            $modModel = 'PackagesElements';
            $this->loadModel($modModel);
            $elem = $this->$modModel->find('all')->where(['packages_id' => $idp, 'elements_id' => $ide])->first();
            if ($this->$modModel->delete($elem)){
                echo 'Eliminado';
            }
        }
        die;
    }

    //-------CLIENTES-----------

    public function customers_views() {

        $modModel = 'Customers';
        $this->loadModel($modModel);
        //$listObj = $this->$modModel->find('all')->contain(['category'])->hydrate(false)->toArray();
        $listObj = $this->$modModel->find('all')->contain(['Department', 'City'])->hydrate(false)->toArray();


        $infoView = [
            'main_title' => 'Clientes', 'main_desc' => 'Clientes', 'title' => 'Clientes Registrados',
            'menu' => [0 => ['title' => 'Clientes', 'url' => null]],
            'model' => $modModel,
            'table' => [

                1 => ['class' => 'center', 0 => 'name', 1 => 'NOMBRE', 2 => 'Nombre'],
                2 => ['class' => 'center', 0 => 'surname', 1 => 'APELLIDO', 2 => 'Apellido'],
                3 => ['class' => 'center', 0 => 'email', 1 => 'EMAIL', 2 => 'Email'],
                4 => ['class' => 'center', 0 => 'phone_number', 1 => 'TELEFONO', 2 => 'telefono'],
                5 => ['class' => 'center', 0 => 'department_id', 1 => 'DEPARTAMENTO', 2 => 'Departamento'],
                6 => ['class' => 'center', 0 => 'city_id', 1 => 'CIUDAD', 2 => 'Ciudad'],
                7 => ['class' => 'center', 0 => 'address', 1 => 'DIRECCIÓN', 2 => 'Direccioón'],
            ],
            'cmdAdd' => ['url' => ['controller' => 'mains', 'action' => 'customers_add'], 'title' => 'Agregar'],
            'cmdEdit' => ['url' => ['controller' => 'mains', 'action' => 'customers_edit'], 'title' => 'Editar'],
            'cmdDel' => ['url' => ['controller' => 'mains', 'action' => 'customers_delete'], 'title' => 'Eliminar'],
            'cmdDetail' => ['url' => ['controller' => 'mains', 'action' => 'customers_details'], 'title' => 'Ver'],
            'cmdAsignar' => ['url' => ['controller' => 'mains', 'action' => 'package_elemento'], 'title' => 'Asignar Elementos'],
        ];
        $this->set(compact('listObj', 'infoView', $this->set('active', $this->active), $this->set('inactive', $this->inactive), $this->set('delete', $this->delete)));
    }

    public function customers_add() {

        $modModel = 'Customers';
        $funcViews = 'customers_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->newEntity();

        $modModelCat = 'Department';
        $this->loadModel($modModelCat);

        $lstObj = $this->$modModelCat->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        if ($this->request->is(['post', 'put'])) {

            $this->$modModel->patchEntity($objData, $this->request->data);
            $idc = 0;
            if ($objData['empresaradio'] == 'empresa') {
                $idc = $this->modelAddEmpresa($objData['namecompany'], $objData['nit']);
            }
            $objData->company_id = $idc;
            if ($this->$modModel->save($objData)) {
                $this->Flash->success(__("Datos creados con exitos"));
                return $this->redirect(['action' => $funcViews]);
            }
            $this->Flash->error(__('No se ha podido crear el objeto.'));
        }

        $infoView = [
            'main_title' => 'Clientes', 'main_desc' => 'Clientes', 'title' => 'Clientes - Creando Datos',
            'menu' => [0 => ['title' => 'Clientes', 'url' => ['controller' => 'mains', 'action' => $funcViews]], 1 => ['title' => 'Agregar', 'url' => null]],
            'model' => $modModel,
            'cmdBack' => ['url' => ['controller' => 'mains', 'action' => $funcViews], 'title' => 'Cancelar']
        ];
        $this->set(compact('objData', 'infoView', 'lstObj', $this->set('switchOn', $this->switchOn), $this->set('switchOff', $this->switchOff)));
    }

    private function modelAddEmpresa($name, $nit) {
        $modModel = 'company';
        $this->loadModel($modModel);
        $objData = $this->$modModel->newEntity();
        $objData->name = $name;
        $objData->nit = $nit;
        $id = $this->process_empresa($objData);
        return $id;
    }

    private function process_empresa($objData) {
        $id = 0;
        if ($this->validate_nit($objData['nit']) == 1) {
            $id = $this->getIdCompany($objData['nit']);
        } else {
            $id = $this->modelAddEmp($objData);
        }
        return $id;
    }

    private function getIdCompany($nit) {
        $modModel = 'company';
        $this->loadModel($modModel);
        $objData = $this->$modModel->find('all', ['conditions' => [$modModel . '.nit' => $nit]])->toArray();

        $id = $objData[0]['id'];
        return $id;
    }

    private function validate_nit($nit) {
        $modModel = 'company';
        $this->loadModel($modModel);
        $objData = $this->$modModel->find('all', ['conditions' => [$modModel . '.nit' => $nit]])->toArray();
        $validate = ($objData != null) ? 1 : 0;
        return $validate;
    }

    private function modelAddEmp($objData) {
        $modModel = 'company';
        $this->loadModel($modModel);
        if ($this->$modModel->save($objData)) {
            $id = $objData['id'];

            $this->Flash->success(__("Datos Creados con exitos"));
        }
        $this->Flash->error(__('No se ha podido crear el objeto.'));
        return $id;
    }

    public function customers_delete($id = null) {
        $modModel = 'Customers';
        $funcViews = 'customers_views';
        $this->loadModel($modModel);
        //$this->request->allowMethod(['post', 'delete']);
        $objData = $this->$modModel->get($id);
        if ($this->request->is(['post', 'delete'])) {
            if ($this->$modModel->delete($objData)) {
                $this->Flash->success(__('El objeto con id: {0} ha sido eliminado.', h($id)));
            } else {
                $this->Flash->error(__('No se ha podido eliminar el objeto con id: {0}.', h($id)));
            }
        } else {
            $this->Flash->error(__('El Metodo de Eliminacion no es valido: {0}.', h($id)));
        }
        return $this->redirect(['action' => $funcViews]);
    }

    public function getCityByDepartment() {
        $this->layout = 'ajax';
        $data = $this->request->data;
        $modModel = 'City';
        $this->loadModel($modModel);
        $idc = -1;
        if (isset($data['city'])) {
            $idc = $data['city'];
        }
        $lista = $this->$modModel->find('all', [
            'fields' => ['id', 'name'],
            'conditions' => ['departament_id' => $data['id']]]);
        $this->set("lista", $lista);
        $this->set("id", $idc);
    }

    public function addCustomer() {
        if ($this->request->is('ajax')) {
            $this->render('edit', 'ajax');
        }
    }

    private function getListObj($modModel = '') {
        $listObj = $this->$modModel->find('all')->where(['Configuracion.status_id' => 1])->contain(['Elements' => function ($q) {
                        return $q->where(['Elements.status_id' => 1])->contain(['Category', 'Technology', 'Unitymeasure']);
                    }])->hydrate(false)->toArray();
                return $listObj;
   }
   
    public function quotesAdd() {
            $modModel = 'Quotes';
            $this->loadModel($modModel);
            $objData = $this->$modModel->newEntity();
            if ($this->request->is(['post', 'put'])) {
                $data = [
                    'system' => json_encode($this->request->data['system']),
                    'processor' => json_encode($this->request->data['processor']),
                    'memory' => json_encode($this->request->data['memory']),
                    'harddisk' => json_encode($this->request->data['harddisk']),
                    'connectivity' => json_encode($this->request->data['connectivity']),
                    'servers' => json_encode($this->request->data['servers']),
                    'additionals' => json_encode($this->request->data['additionals']),
                    'subtotal' => $this->request->data['subtotal'],
                    
                ];
                
                $this->$modModel->patchEntity($objData, $data);
                if ($this->$modModel->save($objData)) {
                    $id = $objData->id;
                    $this->request->data['id']=$id;
                    $this->request->data['customer']['name'] = $this->Auth->user('name');
                    $this->request->data['customer']['email'] = $this->Auth->user('email');
                    $this->request->data['customer']['surname'] = $this->Auth->user('surname');
                    $this->sendMail($this->request->data);
                    echo "bien";
                } else {
                    echo "error";
                }
            }
            die;
        }
        
        //CONFIGURACIONA ARQUITECTO
        
        function configuracion_arquitecto($id = null) {
            $modModel = 'Configuracion';
            $this->loadModel($modModel);
            $listObj = $this->getListObj($modModel);
            $clasificacion = $this->categorylist($id);
            $infoView = [
                'main_title' => 'Configurador Costos Generales', 'main_desc' => 'Configurador Costos Generales', 'title' => 'Configurador Costos Generales Registrados',
                'menu' => [0 => ['title' => 'Configurador Costos Generales', 'url' => null]],
                'model' => $modModel,
                'table' => [
                    //0 => ['class' => 'hidden-xs center', 0 => 'id', 1 => 'No', 2 => 'Indentificador'],
                    1 => ['class' => 'center', 'width'=>'4%',0 => 'element_id', 1 => 'CLASIFICACIÓN', 2 => 'Clasificación', 3 => 'category'],
                    2 => ['class' => 'center', 'width'=>'4%',0 => 'element_id', 1 => 'ELEMENTO', 2 => 'Nombre del Elemento', 3 => 'name'],
                    3 => ['class' => 'center','width'=>'4%', 0 => 'element_id', 1 => 'DESCRIPCION', 2 => 'Descripción del elemento', 3 => 'description', 4 => 'measure'],
                    4 => ['class' => 'center','width'=>'12%','title'=>'COSTO UNITARIO', 0 => 'unit_cost', 1 => 'C.U', 2 => 'Costo unitario'],
                    5 => ['class' => 'center','width'=>'8%', 'title'=>'% MARGEN' ,0 => 'margin', 1 => '% MRG', 2 => 'Margen'],
                    6 => ['class' => 'center','width'=>'13%', 'title'=>'PRECIO DE VENTA TOTAL',0 => 'total_sale_price', 1 => 'P VENTA', 2 => 'Margen'],
                    7 => ['class' => 'center','width'=>'11%', 'title'=>'TIER 1',0 => 'tier1', 1 => 'TIER 1', 2 => 'Tier 1'],
                    8 => ['class' => 'center','width'=>'11%', 'title'=>'TIER 2', 0 => 'tier2', 1 => 'TIER 2', 2 => 'Tier 2'],
                    9 => ['class' => 'center','width'=>'11%', 'title'=>'TIER 3', 0 => 'tier3', 1 => 'TIER 3', 2 => 'Tier 3'],
                    10 => ['class' => 'center','width'=>'11%', 'title'=>'TIER 4', 0 => 'tier4', 1 => 'TIER 4', 2 => 'Tier 4'],
                    11 => ['class' => 'center','width'=>'12%', 0 => 'observations', 1 => 'OBSERVACIONES', 2 => 'Tier 1'],
                //4 => ['class' => 'center', 0 => 'element_id', 1 => 'MEDIDA', 2 => 'Medida', 3 => 'medida'],
                ],
                'cmdAdd' => ['url' => ['controller' => 'mains', 'action' => 'configuracion_add'], 'title' => 'Agregar'],
                'cmdEdit' => ['url' => ['controller' => 'mains', 'action' => 'configuracion_edit'], 'title' => 'Editar'],
                'cmdDel' => ['url' => ['controller' => 'mains', 'action' => 'configuracion_delete'], 'title' => 'Eliminar'],
            ];
            $this->set(compact('listObj', 'infoView', 'clasificacion'));
        }
    }