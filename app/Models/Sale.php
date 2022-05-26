<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
   protected $fillable=['size_id', 'weight', 'cartons', 'fruit_type', 'buying_price', 'selling_price', 'sub_total', 'profit','supplier_total'];
}
