<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OctoFormLogistics extends Model
{
    protected $connection = 'mysql';
    protected $table = 'tbl_octo_logistics';

    //To Aviod the the updated_at and created_at coloumns in the table.
    public $timestamps = false;
    use HasFactory;
}
