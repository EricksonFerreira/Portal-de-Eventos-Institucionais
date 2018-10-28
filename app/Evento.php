<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model {
	protected $fillable = ['nome', 'email', 'site', 'descricao'];
	protected $guarded = ['id','user_id', 'created_at', 'update_at'];
	protected $table = "eventos";
	
	public function user() {
    	return $this->belongsTo(User::class);
	}
}
