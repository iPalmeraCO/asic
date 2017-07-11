<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator; //Logica de Validador de Tablas

class TechnologyTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->hasMany('Elements', ['foreignKey' => 'technology_id']);
        $this->hasMany('Packages', ['foreignKey' => 'technology_id']);
        $this->table('technology');
    }
    //validar tus datos cuando se invoca el método save().
    public function validationDefault(Validator $validator) {
        $validator->notEmpty('name', 'Se requiere un nombre');
        return $validator;
    }
}
