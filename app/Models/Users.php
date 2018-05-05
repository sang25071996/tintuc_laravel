<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DateTime;

class Users extends Authenticatable
{
    protected $table = 'users';
    protected $guarded  = [];
    public function category(){
    	return $this->hasMany('App\Models\Category');
    }
    public function list_action() {
    	$data = Users::select('id','email','level')->get()->toArray();
    	return $data;
    }
    public function add_action($request) {
    	$data = new Users();
    	$data->email = $request->txtUser;
    	$data->level = $request->rdoLevel;
    	$data->password = bcrypt($request->txtPass);
    	$data->created_at = new DateTime();
    	$data->save();
    }
    public function delete_action($id) {
        $data = Users::where('id',$id)->count();
        if($data > 0){
            $users = Users::find($id);
            $users->delete();
        }
    }
    public function edit_data_action($id) {
        $data = Users::select('id','email','level')->find($id)->toArray();
        return $data;
    }
    public function update_action($request,$id) {
        $users = Users::find($id);
        $users->email = $request->txtUser;
        if(!empty($request->txtPass)){
            $users->password = bcrypt($request->txtPass);
        }
        $users->level = $request->rdoLevel;
        $users->save();
    }
}
