<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Mail\ResetPasswordMail;
use Auth;
use Cache;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword ;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    protected $guarded = ['_token'];
    
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }
	

//======== USER ROLES ============//


    
    public function roles() {

        return $this->belongsToMany(Role::class);

    }




    public function hasRole($role) {

    if (is_string($role)) {

   return $this->roles()->contains('name',$role);
   
   }
		
        return !! $role->intersect($this->roles)->count();
		
		


    }


     public function assign($role) {

        if (is_string($role)) {

        return $this->roles()->save( Role::WhereName($role)->firstOrFail() );
                
        }

        return $this->roles()->save($role);

    }

//========= END USER ROLES ===========//

    public function sendPasswordResetNotification($token)
{
   \Mail::to($this->email)->send(new ResetPasswordMail($token));

}



    public function driver()
    {
        return $this->hasOne(Driver::class,'user_id');
    }
    

    public function data() {

        return $this->hasOne(Employee::class , 'employee_id');
     
    }


      public function close_persons() {

        return $this->hasMany(EmployeesClosePersons::class , 'employee_id');
     
      }
      
     
      public function employee_files() {

        return $this->hasMany(EmployeesFiles::class , 'employee_id');
     
      }

    

}
