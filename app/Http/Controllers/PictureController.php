<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SortService;
use App\Services\PictureService;
use App\Services\ProductService;

class PictureController extends Controller
{
    protected $productService;
    protected $sortService;
    protected $pictureService;

    // 透過 DI 注入 Service
    public function __construct(
        ProductService $productService,
        SortService $sortService,
        PictureService $pictureService
    )
    {
        $this->productService = $productService;
        $this->sortService = $sortService;
        $this->pictureService = $pictureService;

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 透過pictureservice抓資料，直接呼叫 Service 包裝好的 method
        $models = $this->pictureService->all();
        return view('merchandise.picture.list',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->pictureService->new();
        $product = $this->pictureService->new();
        $action = route('merchandise.picture.store');

        return view('merchandise.picture.form',compact('model','action'));
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
        $this->pictureService->create(
            $request->except("_token") //排除_token

        );

        return redirect()->route("banner.list");
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

        $model = $this->pictureService->findById($request->pictureId);

        $action = route('merchandise.picture.update',[$request->pictureId]);

        return view('merchandise.picture.form',compact('model','action'));
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
        $this->pictureService->update(
            $request->except("_token", "_method"), //排除_token
            $request->pictureId
        );
        return redirect()->route("merchandise.picture.list");
    }


    // public function delete(Request $request)
    // {

    //      $this->pictureService->delete(
    //         $request->pictureId
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
        $this->pictureService->destroy(
            $request->pictureId
        );
        //request->all()全部，except排除，only只送某幾個
        return redirect()->back()->with("sucess", "刪除成功");
    }
}
