<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator; //Logica de Validador de Tablas

class PackagesTable extends Table {
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Technology', ['foreignKey' => 'technology_id']);
        $this->belongsTo('Elements', ['foreignKey' => 'os_id']);//Sistema Operativo Que esta en la tabla elementos
        $this->hasMany('PackagesElements', ['foreignKey' => 'packages_id']);
        $this->table('packages');
    }

    //validar tus datos cuando se invoca el método save().
    public function validationDefault(Validator $validator) {
        $validator->notEmpty('name', 'Se requiere un nombre');
        return $validator;
    }

}
