@extends('layouts.frontend')

@section('content')
<main>
    <div class="container">
        <h1>CHECK</h1>
        <div>
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">商品名稱</th>
                        <th scope="col">價格</th>
                        <th scope="col">數量</th>
                        <th scope="col">小計</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $item)
                    <tr>

                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->price * $item->quantity}}</td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div>
            <h2>Total:$ {{$total}}</h2>
        </div>
        <hr>


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{route('frontend.order.sendCheckout')}}">
            @csrf
            <div class="form-group">
                <label for="name">姓名</label>
                <input type="text" class="form-control" id="name" placeholder="姓名" name='name'>

            </div>
            <div class="form-group">
                <label for="phone">連絡電話</label>
                <input type="text" class="form-control" id="phone" placeholder="連絡電話" name='phone'>

            </div>
            <div class="form-group">
                <label for="address">地址</label>
                <input type="text" class="form-control" id="address" placeholder="地址" name='address'>

            </div>

            <div class="form-group">
                <label for="email">信箱</label>
                <input type="text" class="form-control" id="email" placeholder="信箱" name='email'>
            </div>

            <div class="form-group">
                <label for=" id_number ">身分證字號</label>
                <input type="text" class="form-control" id=" id_number " placeholder="信箱" name=' id_number '>
            </div>

            <button type="submit" class="btn btn-dark btn-send">
                前往付款
                <i class="fas fa-chevron-right"></i>
            </button>

        </form>
    </div>
</main>
@endsection