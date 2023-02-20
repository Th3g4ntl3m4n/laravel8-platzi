<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //campos virtuales que no existen en la tabla

    //Vamos a retornar una description como si fuera extracto excerpt
    public function getExcerptAttribute(){
          //usamos substr con los parametros 0,80 oara trear solo 80 caracateres
        //de los 800 que tiene la descipcion y completamos con ...  
        
        return substr($this->description, 0,80). "...";
      
        
    }
// Metodo personalizado
    //Para buscar en la misma categoria
    public function similar()
    {
        return $this->where('category_id', $this->category_id)->with('user')
        ->take(2)->get();
    }
}
