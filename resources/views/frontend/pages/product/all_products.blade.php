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
    @if ($allProducts != null || [])
    @else
        <h1>No Product Found</h1>
    @endif
    <div>
        <section class="products section">
            <div class="container">
                <div class="row">
                    @foreach ($allProducts as $product)
                        {{-- @dd($allProducts) --}}
                        <div class="col-md-4">
                            <div class="product-item">
                                <div class="product-thumb">
                                    <img style="height:450px;width:360px" class="img-responsive"
                                        src="{{ url('/uploads/product/', $product->image) }}" alt="product-img" />
                                    {{-- <div class="preview-meta">
                                        <ul>
                                            <li>
                                                <a href="{{ route('web.singleproduct', $product->id) }}"><i
                                                        class="tf-ion-ios-search-strong"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                            </li>
                                            <li>
                                                <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    <form action="">
                                        <div class="preview-meta">
                                            <ul>
                                                <li>
                                                    <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                                <div class="product-content">
                                    <h4><a href="{{ route('web.singleproduct', $product->id) }}">Product Name:
                                            {{ $product->name }}</a>
                                    </h4>
                                    <h4>Category: {{ $product->catData->name }}</h4>
                                    <p class="price" style="color: black;">Price: {{ $product->price }} BDT</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
