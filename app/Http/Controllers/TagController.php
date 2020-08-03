<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagService;
 

    // 透過 DI 注入 Service
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 透過tagservice抓資料，直接呼叫 Service 包裝好的 method
        $models = $this->tagService->all();
        return view('blog.tag.list',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->tagService->new();
        $action = route('blog.tag.store');
        return view('blog.tag.form',compact('model','action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->tagService->create(
            $request->except("_token") //排除_token

        );

        return redirect()->route("blog.tag.list");
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
    public function edit(Request $request)
    {

        $model = $this->tagService->findById($request->tagId);

        $action = route('blog.tag.update',[$request->tagId]);

        return view('blog.tag.form',compact('model','action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->tagService->update(
            $request->except("_token", "_method"), //排除_token
            $request->tagId
        );
        return redirect()->route("blog.tag.list");
    }


    // public function delete(Request $request)
    // {

    //      $this->tagService->delete(
    //         $request->bannerId
    //     );
    //     //request->all()全部，except排除，only只送某幾個
    //     return redirect()->back()->with("sucess", "刪除成功");
    // }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->tagService->destroy(
            $request->tagId
        );
        //request->all()全部，except排除，only只送某幾個
   
        return redirect()->back()->with("message", "刪除成功");
    }
}
