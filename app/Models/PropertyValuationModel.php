<?php namespace App\Models;

use CodeIgniter\Model;

class PropertyValuationModel extends Model{
    protected $table = 'property_valuation';
    // TODO: Update fields
    protected $allowedFields = [
        'id', 
        'lot_id', 
        'valuation_amount', 
        'tree_valuation_amount',
        'disturbance_amount',
        'house_structure_amount',
        ];
    protected $beforeInsert = [];
    protected $beforeUpdate = [];
}