<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\AddRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = new News();
        $get_data = $news->list_action();
        // dd($get_data);
        return view('backend.module.news.news_list',['data' => $get_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = new Category();
        $cate = $category->getAll();
        return view('backend.module.news.news_add',['category' => $cate]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        //dd($request->newsImg->getClientOriginalName());
        $news = new News();
        $check = $news->add_action($request);
        //dd($check);
        if($check){
            $file = $request->newsImg;
            $file->move('public/upload',time().$file->getClientOriginalName());
        }
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = new News();
        $dulieu = $news->edit_data_action($id);
        $category = new Category();
        $category = $category->getAll();
        return view('backend.module.news.news_edit',['data' => $dulieu,'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $news = new News();
        if(!empty($request->newsImg)) {
            $tenhinh = $news->edit_data_action($id);
            // $file = asset('public/upload/'.$tenhinh['image']);
            // dd($file);
            File::Delete('public/upload/'.$tenhinh['image']);
        }
        $check = $news->edit_action($request,$id);
        if($check) {
            if(!empty($request->newsImg)) {
                $file = $request->newsImg;
                $file->move('public/upload',time().$file->getClientOriginalName());
                
            }
        }
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = new News();
        $news->delete_action($id);
        return redirect()->route('admin.news.index');
    }
}
