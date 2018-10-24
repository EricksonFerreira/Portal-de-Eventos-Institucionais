<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model {
	protected $fillable = ['nome', 'email', 'site', 'descricao'];
	protected $guarded = ['id','created_at', 'update_at'];
	protected $table = "eventos";

}
