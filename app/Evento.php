<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model {
	protected $fillable = [
		'nome', 'descricao', 'email', 'telefone','inicio_evento', 'update_at','vagas','imagem'
	];
	protected $guarded = ['id','user_id', 'created_at',  'fim_evento'];
	protected $table = "eventos";
	
	public function user() {
    	return $this->belongsTo(User::class);
	}
}
