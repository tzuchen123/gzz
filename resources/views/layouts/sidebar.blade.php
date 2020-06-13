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
            <a class="collapse-item" href=" {{route('"merchandise.product.create')}} ">新增商品</a>
            <a class="collapse-item" href=" {{route('merchandise.product.list')}} ">商品列表</a>
            <a class="collapse-item" href=" {{route('merchandise.picture.create')}} ">新增商品照片</a>
            <a class="collapse-item" href=" {{route('merchandise.picture.list')}} ">商品照片列表</a>
        @endcomponent

        @component('layouts.component.sidebar.item')
            @slot('name', 'banner')
            @slot('title', 'banner管理')
            <a class="collapse-item" href=" {{route('banner.create')}} ">新增Banner</a>
            <a class="collapse-item" href=" {{route('banner.list')}} ">Banner列表</a>
        @endcomponent



           
        </ul>

        <div class="footer">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart"
                    aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>

    </div>
</nav>
