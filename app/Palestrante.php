<?php

namespace App;

use App\Evento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Palestrante extends Model
{
  /*nome da tabela*/
	protected $table 	= 	"palestrantes";

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= ['id','user_id','evento_id'];

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['descricao', 'imagem'];
    
    /*Função que representa o relacionamento de um para muitos*/
     public function palestra(){
        return $this->belongsTo(Evento::class);
    }    
    /*Função que representa o relacionamento de um para muitos*/
     public function userPalestra(){
        return $this->belongsTo(User::class);
    }
}
