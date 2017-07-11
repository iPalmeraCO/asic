<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuotesTable
 *
 * @author eduardo
 */

namespace App\Model\Table;

use Cake\ORM\Table;


class QuotesTable extends Table {
    
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Customers', ['foreignKey' => 'customer_id']);
        $this->table('quotes');
    }
    
}
