<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SortService;
use App\Services\PictureService;
use App\Services\ProductService;

class ProductController extends Controller
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

        // 透過productservice抓資料，直接呼叫 Service 包裝好的 method
        $models = $this->productService->getdatas();
       
    

        return view('merchandise.product.list',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->productService->new();
        $sorts = $this->sortService->all();
        $action = route('merchandise.product.store');

        return view('merchandise.product.form',compact('model','action','sorts'));
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
        $this->productService->create(
            $request->except("_token") //排除_token

        );

        return redirect()->route("merchandise.product.list");
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

        $model = $this->productService->findById($request->productId);
        $action = route('merchandise.product.update',[$request->productId]);
        $sorts = $this->sortService->all();

        return view('merchandise.product.form',compact('model','action','sorts'));
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
        $this->productService->update(
            $request->except("_token", "_method"), //排除_token
            $request->productId
        );
        return redirect()->route("merchandise.product.list");
    }

    public function updateRank(Request $request)
    {
        $this->productService->updateRank(
            $request->except('_token', '_method'),
            $request->productId
        );

        return redirect()->back()->with('message', '更改成功!');
    }

    public function updateByCheck(Request $request)
    {
       
        $this->productService->updateStatus(
            ['status' => $request->status],
            $request->id
        );
        return 'success';
    }
    // public function delete(Request $request)
    // {

    //      $this->productService->delete(
    //         $request->productId
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
        $this->productService->destroy(
            $request->productId
        );
        //request->all()全部，except排除，only只送某幾個
        return redirect()->back()->with("message", "刪除成功");
    }
}
