<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use File;
class News extends Model
{
    protected $table = 'news';
    protected $guarded  = [];
    public function add_action($request) {
    	$new = new News();
        // dd($request->sltCate);
    	$new->title = $request->txtTitle;
    	$new->author = $request->txtAuthor;
    	$new->intro = $request->txtIntro;
    	$new->content = $request->txtFull;
    	$new->image = time().$request->newsImg->getClientOriginalName();
    	$new->status = $request->rdoPublic;
    	$new->user_id = 1;
    	$new->category_id = $request->sltCate;
    	$new->created_at = new DateTime();
   		$result = $new->save();
        return $result;
    }
    public function list_action(){
        $data = News::select('id','title','author','created_at')->orderBy('id','DESC')->get()->toArray();
        return $data;
    }
    public function delete_action($id){
        $data = News::where('id',$id)->count();
        if($data > 0){
            $news = News::find($id);
            $news->delete();
        }
    }
    public function edit_data_action($id){
        $data = News::select('title','author','intro','content','image','status','category_id')->where('id',$id)->first()->toArray();
        return $data;
    }
    public function edit_action($request,$id) {
        $data = News::find($id);
        $data->title = $request->txtTitle;
        $data->author = $request->txtAuthor;
        $data->intro = $request->txtIntro;
        $data->content = $request->txtFull;
        if(!empty($request->newsImg))
        {
            $data->image = time().$request->newsImg->getClientOriginalName();
        }
        $data->status = $request->rdoPublic;
        $data->user_id = 1;
        $data->category_id = $request->sltCate;
        $data->updated_at = new DateTime();
        $result = $data->save();
        return $result;
    }
}
