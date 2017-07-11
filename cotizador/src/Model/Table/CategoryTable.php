<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator; 

class CategoryTable extends Table{
    
     public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->hasMany('Elements', ['foreignKey' => 'category_id']);        
        $this->table('category');
    }
    
    //validar tus datos cuando se invoca el método save().
    public function validationDefault(Validator $validator) {
        $validator->notEmpty('name', 'Se requiere un Nombre');
        return $validator;
    }
}