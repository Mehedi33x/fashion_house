@extends('frontend.master')
@section('content')
    <div>
        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content" style="text-align: center">
                            <h1 class="page-name">Products</h1>
                            <ol class="breadcrumb">
                                {{-- <li><a href="index.html">Home</a></li>
                                <li class="active">shop</li> --}}
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <form action="">
        <div class="col-lg-6 col-md-offset-3">
            <div class="input-group subscription-form">
                <input type="text" class="form-control" placeholder="Search Your Products">
                <span class="input-group-btn">
                    <button class="btn btn-main" type="button">Search</button>
                </span>
            </div>
        </div>
    </form>
    <div>
        <section class="products section">
            <div class="container">
                <div class="row">
                    @foreach ($allProducts as $product)
                        <div class="col-md-4">
                            <div class="product-item">
                                <div class="product-thumb">
                                    <img style="height:450px;width:360px" class="img-responsive"
                                        src="{{ url('/uploads/product/', $product->image) }}" alt="product-img" />
                                    <div class="preview-meta">
                                        <ul>
                                            <li>
                                                <span data-toggle="modal" data-target="#product-modal">
                                                    <i class="tf-ion-ios-search-strong"></i>
                                                </span>
                                            </li>
                                            <li>
                                                <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                            </li>
                                            <li>
                                                <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="{{route('web.singleproduct')}}">{{ $product->name }}</a></h4>
                                    <p class="price">{{ $product->price }} BDT</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
