<?php namespace App\Models;

use CodeIgniter\Model;

class LotModel extends Model{
    protected $table = 'lot_details';
    protected $allowedFields = [
        'id',
        'lot_no',
        'cad_no',
        'size_of_area',
        'location',
        'phase',
        'land_owner', 
        'status', 
        ];
    protected $beforeInsert = [];
    protected $beforeUpdate = [];
}