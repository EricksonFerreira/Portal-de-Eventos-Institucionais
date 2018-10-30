<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
	
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
	 public function user(){
        return $this->belongsToMany(User::class);
    } 
}
