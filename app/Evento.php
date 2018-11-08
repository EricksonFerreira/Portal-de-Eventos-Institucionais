<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
	
class Evento extends Model {
	/*nome da tabela*/
	protected $table 	= 	"eventos";

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['nome', 'descricao', 'email', 'telefone', 'vagas','imagem'];

	/*nome dos atributos que representam as horas*/
	protected $date 	= ['created_at','update_at','inicio_evento','fim_evento'];

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= ['id','user_id'];
	
	/*Função que representa o relacionamento de muitos para muitos*/
	 public function users(){
        return $this->belongsToMany(User::class);
    }	
    /*Função que representa o relacionamento de um para muitos*/
	 public function user(){
        return $this->belongsTo(User::class);
    }

    /*
    public function jaParticipa(id_evento,id_usser){
    		//buscar no banco

        return true/false;
    }
    */

}
 
