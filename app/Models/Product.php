<?php


namespace App\Models;

use App\Models\Details;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'amount',
      'stock',
      'category_id',

    ];
    public function categories(){
      return $this->hasMany(Detail::class);
    }
    public function details(){
      return $this->hasMany(Category::class);
    }
}
