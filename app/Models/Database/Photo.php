<?php
namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model 
{
    protected $table = 'photos';
    public $timestamps = false;
}