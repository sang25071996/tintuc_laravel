<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Category\AddRequest;
use DateTime;

class Category extends Model
{
    protected $table = 'category';
    protected $guarded  = [];
    public function users(){
        return $this->belongsTo('App\Models\Users','user_id');
    }
    public function add_action($request){
    	$category = new Category();
    	$category->name = $request->txtCateName;
    	$category->user_id = 1;
    	$category->created_at = new DateTime();
    	$category->save();
    	
    }
    public function list_action(){
        //$data = Category::find(1)->users()->first();
        $data = Category::select('id','name','user_id')->with(
                    [
                        'users' => function ($query) {
                            $query->select('id','email');
                        }

                    ]
                )->orderBy('id','desc')->get()->toArray();
                    return $data;
    }
    public function edit_data_action ($id) {
        $data = Category::select('id','name')->where('id',$id)->first()->toArray();
        return $data ;
    }
    public function edit_action($request,$id) {
        $cate = Category::find($id);
        $cate->name = $request->txtCateName;
        $cate->
        $cate->updated_at = new DateTime();
        $cate->save();
    }
    public function delete_action($id) {
        $news = News::where('category_id',$id)->count();
        //dd($news);
        if($news <= 0){
            $cate = Category::find($id);
            $cate->delete();
        }
    }
    public function getAll() {
       $category = Category::select('id','name')->get()->toArray();
       return $category;
    }
}
