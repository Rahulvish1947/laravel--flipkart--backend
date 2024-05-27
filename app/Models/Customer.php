<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
   

 protected $table = 'customers';
 protected $primaryKey = 'customer_id';
 protected $fillable=['firstname','lastname','email','password','address'];

    use HasFactory;
}
