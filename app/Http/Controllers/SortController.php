<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SortService;

class SortController extends Controller
{
    protected $sortService;
 

    // 透過 DI 注入 Service
    public function __construct(SortService $sortService)
    {
        $this->sortService = $sortService;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 透過sortservice抓資料，直接呼叫 Service 包裝好的 method
        $models = $this->sortService->all();

        return view('merchandise.sort.list',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->sortService->new();
        $action = route('merchandise.sort.store');

        return view('merchandise.sort.form',compact('model','action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->sortService->create(
            $request->except("_token") //排除_token

        );

        return redirect()->route("merchandise.sort.list");
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

        $model = $this->sortService->findById($request->sortId);

        $action = route('merchandise.sort.update',[$request->sortId]);

        return view('merchandise.sort.form',compact('model','action'));
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
        $this->sortService->update(
            $request->except("_token", "_method"), //排除_token
            $request->sortId
        );
        return redirect()->route("merchandise.sort.list");
    }


    // public function delete(Request $request)
    // {

    //      $this->sortService->delete(
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
        $this->sortService->destroy(
            $request->sortId
        );
        //request->all()全部，except排除，only只送某幾個
   
        return redirect()->back()->with("message", "刪除成功");
    }
}
