<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demomodel extends Model
{
    protected $table ='demodata';
    protected $primarykey='id';
    protected $fillable=['name','address','mobile'];
    use HasFactory;
}
