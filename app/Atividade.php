<?php

namespace App;

use App\Palestrante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

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

    public function palestrante() {
        return $this->belongsTo(Palestrante::class);
    }
}
