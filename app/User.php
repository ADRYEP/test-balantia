<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

use App\Rol;
use App\City;

class User extends Eloquent
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'city_id', 'rol_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * Relation one to many with rol
     */
    public function rol(){
        return $this->hasOne(\App\Rol::class, 'id', 'rol_id');
    }

    /**
     * Relation one to many with city
     */
    public function city(){
        return $this->hasOne(\App\City::class, 'id', 'city_id');
    }

    /**
     * Create a new user
     * @return Created user objetc
     */
    public static function createUser($request){

        $data = $request->all();
        $user = new User;
        

        $user->name = $data['name'];
        
        $user->rol_id = $data['rol_id'];
        $user->city_id = $data['city_id'];
        
        $user->save();
        return $user;
    }

    /**
     * Display all users
     * @return all users in database
     * @return users.index view
     */
    public static function getUsers(){
  
        $data = $request->all();
      
        return $data;
        return redirect()->route('users.index');
        
    }

    /**
     * Show specified user information
     * @return user object to be edited
     */
    public static function getUser($id){

        $user = DB::table('users')->where('id', $id)->first();

        return ['user' => $user];
        return redirect()->route('users.edit');

    }

    /**
     * Edit user with spicified data
     * @return users.show view (Specified user information)
     */
    public static function updateUser($id, $request){

        $data = $request->all();
        $user = User::find($id);

        $user->update(request()->all());
        $user->save();      

        return redirect()->route('users.show', ['user' => $user]);

    }

    /**
     * Remove specified user
     * @return users.index view
     */
    public static function destroyUser($id){

        $user = User::find($id);
        $user->delete();
  
        return redirect()->route('users.index');
  
    }

    /**
     * Show a message if specified user is on Madrid or another if he's not
     * @return text
     */
    public static function showInfoIfUserIsOnMadrid($id){

        $user = User::find($id);
        $city = City::find($user->city_id);
        
        
        if ($city->id == 1) {
            $mensaje = $user->name."Está en".$city->name;
        }
        else {
            $mensaje = $user->name."No puede ingresar";
        }

        return $mensaje;

    }

    /**
     * Allows user to see users list if he's admin
     * @return list of all users if rol->id = 1 or message if rol != 1
     */
    public static function showAllUsersIfRolIsAdmin($id){

        $allUsers = User::all();
        $user = User::find($id);
        $rol = Rol::find($user->rol_id);
    
        if ($rol->id == 1) {
            $mensaje = $user->name." es admin, puede gestionar usuarios";
            return $allUsers;
        }
        else {
            $mensaje = "Rol de usuario: ".$user->name." es: ".$rol->name;
        }
    
        return $mensaje;

    }
}
