<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator; 

class DepartmentTable extends Table{
    
     public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->hasMany('City', ['foreignKey' => 'department_id']);
        $this->hasMany('Customers', ['foreignKey' => 'department_id']);
        $this->table('department');
    }
    
    //validar tus datos cuando se invoca el método save().
    public function validationDefault(Validator $validator) {
        $validator->notEmpty('name', 'Se requiere un Nombre');
        return $validator;
    }
    
}