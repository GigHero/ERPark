<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Patio extends Model
{
    use SoftDeletes;
    protected $table = 'patio';
    protected $fillable = ['entrada','saida','placa','obs','vaga','valor','taxa_id','mensalista_id'];
    protected $dates = ['entrada','saida'];
    // Relacionamento
    public function mensalista() {
        return $this->belongsTo('App\Mensalista');
    }
    public function taxa() {
        return $this->belongsTo('App\Taxas');
    }
    public function getValor(){
        
        $saida = $this->saida;
       if($saida != null && $this->taxa_id != null){
            $entrada = $this->entrada;
            $valor = $saida->diffInMinutes($entrada);
            return $valor/60 * $this->taxa->valor;
       }
        if($saida != null && $this->mensalista_id != null){
            return 'Mensalista';
        }
    }
    
}