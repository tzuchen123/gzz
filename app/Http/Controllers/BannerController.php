<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use App\Services\BannerService;


class BannerController extends Controller
{
    protected $bannerService;
 

    // 透過 DI 注入 Service
    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 透過bannerservice抓資料，直接呼叫 Service 包裝好的 method
        $models = $this->bannerService->getdatas();
    
        return view('banner.list',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->bannerService->new();
        $action = route('banner.store');

        return view('banner.form',compact('model','action'));
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
        $this->bannerService->create(
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

        $model = $this->bannerService->findById($request->bannerId);

        $action = route('banner.update',[$request->bannerId]);

        return view('banner.form',compact('model','action'));
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
        $this->bannerService->update(
            $request->except("_token", "_method"), //排除_token
            $request->bannerId
        );
        return redirect()->route("banner.list");
    }

    public function updateRank(Request $request)
    {
        $this->bannerService->updateRank(
            $request->except('_token', '_method'),
            $request->bannerId
        );

        return redirect()->back()->with('message', '更改成功!');
    }

    public function updateByCheck(Request $request)
    {
       
        $this->bannerService->updateStatus(
            ['status' => $request->status],
            $request->id
        );
        return 'success';
    }
    // public function delete(Request $request)
    // {

    //      $this->bannerService->delete(
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
        $this->bannerService->destroy(
            $request->bannerId
        );
        //request->all()全部，except排除，only只送某幾個
        return redirect()->back()->with("sucess", "刪除成功");
    }
}
