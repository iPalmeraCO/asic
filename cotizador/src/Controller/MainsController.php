<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Controller\Component\RequestHandlerComponent;

class MainsController extends AppController {

    public $components = ['Flash'];

    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index() {
        
    }

    public function calculadora() {
        $modModel = 'customers';
        $funcViews = 'customers_views';
        $this->loadModel($modModel);
        $objData = $this->$modModel->newEntity();
        $modModelCat = 'Department';
        $this->loadModel($modModelCat);
        $lstObj = $this->$modModelCat->find('list', [
            'keyField' => 'id',
            'valueField' => 'name']);
        $this->set(compact('objData', 'lstObj'));
    }

    public function paquetes() {
        $modModel = 'Packages';
        $this->loadModel($modModel);
        $listObj = $this->$modModel->find('all')->contain([
            'PackagesElements' => [
                'fields' => ['id', 'packages_id', 'elements_id'],
                'Elements' => [
                    'fields' => ['id', 'name', 'category_id', 'technology_id', 'Unity_measure_id', 'status_id'],
                    'Category' => [
                        'fields' => ['id', 'name'],
                    ],
                    'Unitymeasure' => [
                        'fields' => ['id', 'name']
                    ],
                    'Technology' => [
                        'fields' => ['id', 'name']
                    ],
                    'Configuracion' => [
                        'fields' => ['id', 'total_sale_price', 'element_id']
                    ]
                ]
            ]
        ])->toArray();
        //pr(json_decode(json_encode($listObj), true));die;
        $modModelDept = 'Department';
        $this->loadModel($modModelDept);
        $lstDpto = $this->$modModelDept->find('list', ['keyField' => 'id', 'valueField' => 'name']);
        $this->set(compact('listObj', 'lstDpto'));
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

    //-------CLIENTES-----------

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

    public function getCityByDepartment() {
        $this->layout = 'ajax';
        $data = $this->request->data;
        $modModel = 'city';
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

    public function quotesadd() {
        $modModel = 'Quotes';
        $this->loadModel($modModel);
        $objData = $this->$modModel->newEntity();
        if ($this->request->is(['post', 'put'])) {
            if($this->request->data['package_id']){
                $data['customer'] = $this->request->data['customer'];
                if($data['customer']['company']['nit'] && $data['customer']['company']['name']) {
                    $idc = $this->modelAddEmpresa($data['customer']['company']['name'], $data['customer']['company']['nit']);
                    $data['customer']['company_id'] = $idc;
                }
                $this->$modModel->patchEntity($objData, $data);
                if ($this->$modModel->save($objData)) {
                    $data['id'] = $objData->id;
                    $modModel2 = 'Packages';
                    $this->loadModel($modModel2);
                    $data['package'] = $this->$modModel2->find('all')->contain([
                        'PackagesElements' => [
                            'fields' => ['id', 'packages_id', 'elements_id'],
                            'Elements' => [
                                'fields' => ['id', 'name', 'description', 'category_id', 'technology_id', 'Unity_measure_id', 'status_id'],
                                'Category' => [
                                    'fields' => ['id', 'name'],
                                ],
                                'Unitymeasure' => [
                                    'fields' => ['id', 'name']
                                ],
                                'Technology' => [
                                    'fields' => ['id', 'name']
                                ],
                                'Configuracion' => [
                                    'fields' => ['id', 'total_sale_price', 'element_id']
                                ]
                            ]
                        ]
                    ])->where(['id' => $this->request->data['package_id']])->first()->toArray();
                    $this->sendMail($data, 'quote');
                    echo $data['customer']['email'];
                } else {
                    echo "error";
                }
            }else{
                $data = [
                    'system' => json_encode($this->request->data['system']),
                    'processor' => json_encode($this->request->data['processor']),
                    'memory' => json_encode($this->request->data['memory']),
                    'harddisk' => json_encode($this->request->data['harddisk']),
                    'connectivity' => json_encode($this->request->data['connectivity']),
                    'additionals' => json_encode($this->request->data['additionals']),
                    'subtotal' => $this->request->data['subtotal'],
                    'customer' => $this->request->data['customer']
                ];
                if ($data['customer']['company']['nit'] && $data['customer']['company']['name']) {
                    $idc = $this->modelAddEmpresa($data['customer']['company']['name'], $data['customer']['company']['nit']);
                    $data['customer']['company_id'] = $idc;
                }
                $this->$modModel->patchEntity($objData, $data);
                if ($this->$modModel->save($objData)) {
                    $this->request->data['id'] = $objData->id;
                    $this->sendMail($this->request->data, 'quote_custom');
                    echo $data['customer']['email'];
                } else {
                    echo "error";
                }
            }
            die;
        }
    }
}
        