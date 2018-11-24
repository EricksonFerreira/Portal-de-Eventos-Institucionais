<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
	/*nome da tabela*/
	protected $table 	= 	"atividades";

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['titulo', 'descricao', 'confirmacao'];

	/*nome dos atributos que representam as horas*/
	protected $date 	= ['created_at','update_at','data','hora_inicio','hora_fim'];

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= ['id','evento_id', 'palestrante_id'];
}
