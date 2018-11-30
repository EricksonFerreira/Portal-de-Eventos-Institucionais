<?php

namespace App;

use App\Evento;
use App\Palestrante;
use App\ParticiparEvento;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;

class User extends Authenticatable
{
    use Notifiable;
	/*nome da tabela*/
    protected $table	= 	"users";
    /*nome dos atributos que poderão ser alterados*/
    protected $fillable = ['id','name', 'email', 'password','role','cpf','telefone'];

    /*nome dos atributos que não poderão ser vistos*/
    protected $hidden 	= ['password', 'remember_token'];
	
   


    /*Função que representa o relacionamento de muitos para muitos*/
     public function eventos(){
        return $this->belongsToMany(Evento::class);
    }	
    /*Função que representa o relacionamento de um para muitos*/
     public function evento(){
        return $this->hasMany(Evento::class);
    }    
    /*Função que representa o relacionamento de um para muitos*/
     public function userPalestra(){
        return $this->hasMany(Palestrante::class);
    }
    /*Função que representa o relacionamento de um para muitos*/
    public function gerencia() {
        return $this->hasOne(ParticiparEvento::class);
    }

}
