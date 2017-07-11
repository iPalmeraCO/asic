<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator; //Logica de Validador de Tablas

class CustomersTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Company', ['foreignKey' => 'company_id']);
        $this->belongsTo('Department', ['foreignKey' => 'department_id']);
        $this->belongsTo('City', ['foreignKey' => 'city_id']);
        $this->hasMany('Quotes', ['foreignKey' => 'customers_id']);
        $this->table('customers');
    }
    //validar tus datos cuando se invoca el método save().
    public function validationDefault(Validator $validator) {
        $validator->notEmpty('name', 'Se requiere un nombre');
        return $validator;
    }
}