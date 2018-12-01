<?php

namespace App;

use App\User;
use App\Evento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParticiparEvento extends Model
{
  /*nome da tabela*/
	protected $table 	= 	"participar_eventos";

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= ['id','user_id','evento_id'];

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['checking'];

	/*nome dos atributos que representam as horas*/
	protected $date 	= ['created_at','update_at'];
  
  
  /*Função que representa o relacionamento de um para muitos*/
	public function gerencia() {
        return $this->belongsTo('App\User' , 'user_id', 'id');
    }
}
