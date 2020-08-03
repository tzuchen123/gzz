<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CatagoryService;

class CatagoryController extends Controller
{
    protected $catagoryService;
 

    // 透過 DI 注入 Service
    public function __construct(CatagoryService $catagoryService)
    {
        $this->catagoryService = $catagoryService;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 透過catagoryservice抓資料，直接呼叫 Service 包裝好的 method
        $models = $this->catagoryService->all();
        return view('blog.catagory.list',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->catagoryService->new();
        $action = route('blog.catagory.store');
        return view('blog.catagory.form',compact('model','action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->catagoryService->create(
            $request->except("_token") //排除_token

        );

        return redirect()->route("blog.catagory.list");
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

        $model = $this->catagoryService->findById($request->catagoryId);

        $action = route('blog.catagory.update',[$request->catagoryId]);

        return view('blog.catagory.form',compact('model','action'));
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
        $this->catagoryService->update(
            $request->except("_token", "_method"), //排除_token
            $request->catagoryId
        );
        return redirect()->route("blog.catagory.list");
    }


    // public function delete(Request $request)
    // {

    //      $this->catagoryService->delete(
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
        $this->catagoryService->destroy(
            $request->catagoryId
        );
        //request->all()全部，except排除，only只送某幾個
   
        return redirect()->back()->with("message", "刪除成功");
    }
}
