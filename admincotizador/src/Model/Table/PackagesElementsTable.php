<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator; //Logica de Validador de Tablas

class PackagesElementsTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Packages',['foreignKey' => 'packages_id']);
        $this->belongsTo('Elements',['foreignKey' => 'elements_id']);
        $this->table('packages_elements');
    }
}