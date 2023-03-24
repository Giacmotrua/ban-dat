<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Mail</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
          rel="stylesheet">
    <style type="text/css">
        .container
        width: 100%;
        padding-right: var(--bs-gutter-x, 0.75rem);
        padding-left: var(--bs-gutter-x, 0.75rem);
        margin-right: auto;
        margin-left: auto;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }
        .card-header {
            padding: 0.5rem 1rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }
        .card-header:first-child {
            border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
        }
        .card-body {
            flex: 1 1 auto;
            padding: 1rem 1rem;
        }
        .card-title {
            margin-bottom: 0.5rem;
        }
        .card-text:last-child {
            margin-bottom: 0;
        }
        .table {
            --bs-table-bg: transparent;
            --bs-table-accent-bg: transparent;
            --bs-table-striped-color: #212529;
            --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
            --bs-table-active-color: #212529;
            --bs-table-active-bg: rgba(0, 0, 0, 0.1);
            --bs-table-hover-color: #212529;
            --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            vertical-align: top;
            border-color: #dee2e6;
        }
        .table-borderless > :not(caption) > * > * {
            border-bottom-width: 0;
        }
        .table-borderless > :not(:first-child) {
            border-top-width: 0;
        }
        .text-center {
            text-align: center !important;
        }
        .border-bottom {
            border-bottom: 1px solid #dee2e6 !important;
        }
        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-0.5 * var(--bs-gutter-x));
            margin-left: calc(-0.5 * var(--bs-gutter-x));
        }
        .row > * {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * 0.5);
            padding-left: calc(var(--bs-gutter-x) * 0.5);
            margin-top: var(--bs-gutter-y);
        }
        .col-3 {
            flex: 0 0 auto;
            width: 25%;
        }
        .col-9 {
            flex: 0 0 auto;
            width: 75%;
        }
    </style>

</head>

<body>
<div class="box"></div>
<div class="container">
    <div class="card" style="width: 40rem;">
        <div class="card-header text-center">
            <img src="{{ asset('frontend/img/zloho7.png') }}" alt="">
        </div>
        <div class="card-body">
            <p class="card-title text-center">Xin chào {{$name}}</p>
            <p class="card-title text-center">{{$header}}</p>
            <p class="card-text text-center border-bottom mb-3">Cảm ơn bạn đã lựa chọn sản phẩm của chúng mình!!!</p>
            <table class="table table-borderless border-bottom">
                <tbody>
                <tr>
                    <td>
                        <p>Mã đơn hàng <span>{{$codeOrder}}</span></p>
                        <p>Ngày đặt: <span>{{$date}}</span></p>
                        <p>Số điện thoại: <span>{{$phone}}</span></p>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-borderless border-bottom">
                <thead>
                <tr>
                    <td>
                        <h4>Thông tin đơn hàng</h4>
                    </td>
                </tr>
                </thead>
                <tbody>
                @php
                    $quantity = 0;
                    $total = 0;
                @endphp
                @foreach($cart as $id => $item)
                    @php
                        $quantity += $item->quantity;
                        $total += $item->price * $item->quantity;
                    @endphp
                    <tr data-id="{{$id}}">
                        <td class="row">
                            <div class="col-3">
                                <img src="{{ asset('storage/images/'.$item->image) }}" height="170px" alt="">
                            </div>
                            <div class="col-9">
                                <div class="product__cart__item__text">
                                    <h3>{{ $item->name }}</h3>
                                    <h5>{{number_format($item->price)}}đ</h5>
                                </div>
                                <div class="product__cart__item__text">
                                    <p>SL: {{ $item->quantity }}</p>
                                    <p>Giá: {{number_format($item->price * $item->quantity)}}đ</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <table>
                <tbody>
                <tr>
                    <td>
                        <h4>Tổng tiền: {{number_format($total)}}đ</h4>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>



</html>
