<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator; //Logica de Validador de Tablas

class CompanyTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->hasMany('Customers', ['foreignKey' => 'company_id']);
        $this->table('company');
    }
    
    //validar tus datos cuando se invoca el método save().
    public function validationDefault(Validator $validator) {
        $validator->notEmpty('name', 'Se requiere un nombre');
        return $validator;
    }
}