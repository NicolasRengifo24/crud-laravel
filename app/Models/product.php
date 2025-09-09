<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //como se va a llenar el objeto producto
    // indicarle los campos que se van a agisnar masivamente
    //cuando vaya a hacer registros

    use HasFactory;

    // filliable es que es llenable , como se va a llenar
    //con un array 
    //son como los constructores 

    protected $fillable = ['nombre','descripcion','precio','stock'];
    // es como es DTO
}
