<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Local extends Model
{
    use SoftDeletes;

    protected $fillable = ['descricao', 'endereco', 'cidade', 'estado', 'qtd_mesas', 'qtd_cadeiras', 'custo_hora', 'periodo_disponivel', 'horario_disponivel', 'image'];

    protected $dates = ['deleted_at'];

    public function user(){
        //relationship
     	return $this->belongsTo('App\User','user_id');
     }

     public static function listLocals($pages){
     	$user = auth()->user(); 
        
         //list of local, by user_id
        return $listLocals = DB::table('locals')
                 ->select('locals.id','locals.descricao', 'locals.endereco', 'locals.cidade', 'locals.qtd_mesas', 'locals.qtd_cadeiras', 'locals.custo_hora', 'locals.periodo_disponivel', 'locals.horario_disponivel')
                 ->join('users', 'users.id', '=', 'locals.user_id')
                 ->whereNull('locals.deleted_at')
                 ->where('locals.user_id', '=', $user->id)
                 ->paginate($pages);
        
     }
}
