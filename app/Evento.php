<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model {
	protected $fillable = ['nome','user_id', 'email', 'site', 'descricao'];
	protected $guarded = ['id','created_at', 'update_at'];
	protected $table = "eventos";
	
	public function user() {
    	return $this->belongsTo(User::class);
	}
}
