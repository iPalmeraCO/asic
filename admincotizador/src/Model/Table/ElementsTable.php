<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ElementsTable extends Table {
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Category', ['foreignKey' => 'category_id']);
        $this->belongsTo('Technology', ['foreignKey' => 'technology_id']);
        $this->belongsTo('Unitymeasure', ['foreignKey' => 'Unity_measure_id']);
        $this->hasMany('Configuracion', ['foreignKey' => 'element_id']);
        $this->hasMany('PackagesElements',['foreignKey' => 'elements_id']);
        $this->hasMany('Packages',['foreignKey' => 'os_id']);//Sistema Operativo Que esta en la tabla elementos
        $this->table('elements');
    }

    //validar tus datos cuando se invoca el método save().
    public function validationDefault(Validator $validator) {
        $validator->notEmpty('name', 'Se requiere un Nombre');
        return $validator;
    }

}
