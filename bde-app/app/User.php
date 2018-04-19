<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    private $admin = null;
    public $groupName = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'surname', 'mail', 'password','id_group',
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
    
    public function checkSalarie() {
    if($this->id_group === 3){//groupName == 'Salarié CESI'){
            return true;
        }
        else {
            return false;
        }
    }

    public function getGroup(){
        if($this->group === null){
            $this->groupName = $this->group;
            return $this->groupName;
        }
        return $this->group;
    }

    public function change($firstname, $surname, $mail, $group){

        $this->first_name = $firstname;
        $this->surname = $surname;
        $this->mail = $mail;

        $this->id_group = DB::table('groups')->where('name', '=', $group)->get()->all()[0]->id;

        $this->save();
    }

    public function group()
    {
        return $this->belongsTo('App\Group','id_group');
    }

    public function events()
    {
        return $this->belongsToMany('App\Event','participate','id_user','id_event');
    }

    public function ideas()
    {
        return $this->hasMany('App\EventIdea','id_user');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Notification', 'is_for', 'id_user', 'id_notif');
    }

    public function authorNotifications()
    {
        return $this->hasMany('App\Notification', 'id_user');
    }

}
