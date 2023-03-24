@extends('backend.login-layout')

@section('title', 'Login Admin')

@section('content')
    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Admin login!</h1>

                                {{-- Không đúng định dạng --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{-- Login với tài khoản k tồn tại --}}
                                @if (session('status'))
                                    <div class="alert alert-danger">
                                        {{ session('status') }}
                                    </div>
                                @endif


                            </div>
                            <form class="user" method="post" action="{{ route('admin.handle-login') }}">
                                @csrf
                                <div class="form-group">
                                    <input name="username" type="text" class="form-control form-control-user"
                                           id="username" placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-user"
                                           id="password" placeholder="Password">
                                </div>
                                <button type="submit" name="btnLogin" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
