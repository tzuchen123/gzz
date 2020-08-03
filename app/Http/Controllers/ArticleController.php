<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Services\TagService;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Services\CatagoryService;

class ArticleController extends Controller
{
    protected $articleService;
    protected $catagoryService;
    protected $tagService;

    // 透過 DI 注入 Service
    public function __construct(
        ArticleService $articleService,
        CatagoryService $catagoryService,
        TagService $tagService
    ) {
        $this->articleService = $articleService;
        $this->catagoryService = $catagoryService;
        $this->tagService = $tagService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 透過articleservice抓資料，直接呼叫 Service 包裝好的 method
        $models = $this->articleService->getdatas();
        return view('blog.article.list', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->articleService->new();
        // $tags = $this->tagService->new();
        $catagories = $this->catagoryService->all();
        $action = route('blog.article.store');

        return view('blog.article.form', compact('model', 'action', 'catagories'));
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

        $this->articleService->create(
            $request->except("_token")
        );

        return redirect()->route("blog.article.list");
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

        $model = $this->articleService->findById($request->articleId);
        $catagories = $this->catagoryService->all();

        $action = route('blog.article.update', [$request->articleId]);
  
        return view('blog.article.form', compact('model', 'action','catagories'));
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

        $this->articleService->update(
            $request->except("_token", "_method"), //排除_token
            $request->articleId
        );

        return redirect()->route("blog.article.list");
    }

    public function updateRank(Request $request)
    {
        $this->articleService->updateRank(
            $request->except('_token', '_method'),
            $request->articleId
        );

        return redirect()->back()->with('message', '更改成功!');
    }

    public function updateByCheck(Request $request)
    {

        $this->articleService->updateStatus(
            ['status' => $request->status],
            $request->id
        );
        return 'success';
    }
    // public function delete(Request $request)
    // {

    //      $this->articleService->delete(
    //         $request->articleId
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
        $this->articleService->destroy(
            $request->articleId
        );
        //request->all()全部，except排除，only只送某幾個
        return redirect()->back()->with("message", "刪除成功");
    }

}
