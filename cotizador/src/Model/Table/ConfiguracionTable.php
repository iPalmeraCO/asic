<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator; //Logica de Validador de Tablas

class ConfiguracionTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Elements', ['foreignKey' => 'element_id']);
        $this->table('configurador');
    }
}
