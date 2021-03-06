<nav id="sidebar">
    <div class="p-4 pt-5">
        <ul class="list-unstyled components mb-5">
            <li>
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url('/logo.jpg');"></a>
            </li>

        @component('layouts.component.sidebar.item')
            @slot('name', 'banner')
            @slot('title', 'banner管理')
            <a class="collapse-item" href=" {{route('banner.create')}} ">新增Banner</a>
            <a class="collapse-item" href=" {{route('banner.list')}} ">Banner列表</a>
        @endcomponent

        
        @component('layouts.component.sidebar.item')
            @slot('name', 'merchandise')
            @slot('title', '商品管理')
            <a class="collapse-item" href=" {{route('merchandise.sort.create')}} ">新增商品分類</a>
            <a class="collapse-item" href=" {{route('merchandise.sort.list')}} ">商品分類列表</a>
            <a class="collapse-item" href=" {{route('merchandise.product.create')}} ">新增商品</a>
            <a class="collapse-item" href=" {{route('merchandise.product.list')}} ">商品總表</a>
            @foreach ($sorts as $sort)
             <a class="collapse-item" href=" {{route('merchandise.product.sort.list', [$sort->id])}} ">商品列表-{{$sort->title}}</a>
            @endforeach
            {{-- <a class="collapse-item" href=" {{route('merchandise.picture.create')}} ">新增商品照片</a>
            <a class="collapse-item" href=" {{route('merchandise.picture.list')}} ">商品照片列表</a> --}}
        @endcomponent

        @component('layouts.component.sidebar.item')
            @slot('name', 'blog')
            @slot('title', '文章管理')
            <a class="collapse-item" href=" {{route('blog.tag.create')}} ">新增標籤</a>
            <a class="collapse-item" href=" {{route('blog.tag.list')}} ">標籤列表</a>
            <a class="collapse-item" href=" {{route('blog.catagory.create')}} ">新增分類</a>
            <a class="collapse-item" href=" {{route('blog.catagory.list')}} ">分類列表</a>
            <a class="collapse-item" href=" {{route('blog.article.create')}} ">新增文章</a>
            <a class="collapse-item" href=" {{route('blog.article.list')}} ">文章列表</a>
        @endcomponent

        {{-- @component('layouts.component.sidebar.item')
        @slot('name', 'order')
        @slot('title', '訂單管理')
        <a class="collapse-item" href=" {{route('blog.article.list')}} ">訂單列表</a>
        <a class="collapse-item" href=" {{route('blog.article.list')}} ">已寄出訂單</a>
        <a class="collapse-item" href=" {{route('blog.article.list')}} ">已付款訂單</a>
        <a class="collapse-item" href=" {{route('blog.article.list')}} ">未付款訂單</a>
        @endcomponent

         --}}
        

           
        </ul>

        {{-- <div class="footer">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart"
                    aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div> --}}

    </div>
</nav>
