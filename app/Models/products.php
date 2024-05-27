<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'products_id';
    protected $fillable =['productname','description','price','stockquantity'];
    use HasFactory;
}
