<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    private $admin;

    public function __construct(){
        $this->admin = null;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Check if the user is admin or not
    public function checkAdmin(){
        if($this->admin === null){
            $resp = DB::select('call is_admin(?)',array($this->id));
            switch($resp[0]->admin){
                case 0:
                    $this->admin = false;
                    break;
                case 1:
                    $this->admin = true;
                    break;
                default:
                    $this->admin = false;
                    break;
            }
        }
        return $this->admin;
    }
}
