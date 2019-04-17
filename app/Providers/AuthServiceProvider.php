<?php

namespace App\Providers;

use App\Evento;
use App\User;
use Auth;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        
    /* Caso seja chamado e o usuario que criou o evento esteja logado poderá entrar no @can */
        $gate->define('update-evento', function(User $user, Evento $evento){
            if(Auth::user()->id == $evento->user_id){
                return true;
            }
        }); 
    
    /* O usuario manager pode editar e excluir qualquer evento */
        $gate->define('manager-edit-evento', function(User $user, Evento $evento){
            return $user->role == 'manager';
        });        

    /* Só o usuario manager pode criar evento */
        $gate->define('criar-meus-evento', function(User $user){
            return $user->role == 'manager';
        });

        
    }
}
