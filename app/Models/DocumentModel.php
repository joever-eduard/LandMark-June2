<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentModel extends Model
{
    protected $table = 'upload';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'file_name', 
        'original_name',
        'upload_date',
        'file_path'
        ];
}
