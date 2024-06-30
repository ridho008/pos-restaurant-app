<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','description','type', 'photo'];

    public function getPricesAttribute() {
        return "Rp. " . Number::format($this->price);
    }
    public function getPicturesAttribute() {
        return $this->photo ? Storage::url($this->photo) : url('no-image.jpg');
    }

    public function getImagesAttribute() {
        return  asset('uploads'). '/' . $this->photo;
    }

    public static $types = ['coffe','non-coffe','tea','dessert'];
}
