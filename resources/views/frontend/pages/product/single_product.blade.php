@extends('frontend.master')
@section('content')
    <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="shop.html">Shop</a></li>
                        <li class="active">Single Product</li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <ol class="product-pagination text-right">
                        <li><a href="blog-left-sidebar.html"><i class="tf-ion-ios-arrow-left"></i> Next </a></li>
                        <li><a href="blog-left-sidebar.html">Preview <i class="tf-ion-ios-arrow-right"></i></a></li>
                    </ol>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-5">
                    <div class="single-product-slider">
                        <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                            <div class='carousel-outer'>
                                <!-- me art lab slider -->
                                <div class='carousel-inner '>
                                    <div class='item active'>
                                        <img src='{{ url('/uploads/product/', $product->image) }}' alt=''
                                            data-zoom-image="images/shop/single-products/product-1.jpg" />
                                    </div>
                                    {{-- <div class='item'>
                                        <img src='images/shop/single-products/product-2.jpg' alt=''
                                            data-zoom-image="images/shop/single-products/product-2.jpg" />
                                    </div>

                                    <div class='item'>
                                        <img src='images/shop/single-products/product-3.jpg' alt=''
                                            data-zoom-image="images/shop/single-products/product-3.jpg" />
                                    </div>
                                    <div class='item'>
                                        <img src='images/shop/single-products/product-4.jpg' alt=''
                                            data-zoom-image="images/shop/single-products/product-4.jpg" />
                                    </div>
                                    <div class='item'>
                                        <img src='images/shop/single-products/product-5.jpg' alt=''
                                            data-zoom-image="images/shop/single-products/product-5.jpg" />
                                    </div>
                                    <div class='item'>
                                        <img src='images/shop/single-products/product-6.jpg' alt=''
                                            data-zoom-image="images/shop/single-products/product-6.jpg" />
                                    </div> --}}

                                </div>

                                <!-- sag sol -->
                                <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                    <i class="tf-ion-ios-arrow-left"></i>
                                </a>
                                <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                    <i class="tf-ion-ios-arrow-right"></i>
                                </a>
                            </div>

                            <!-- thumb -->
                            <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                <li data-target='#carousel-custom' data-slide-to='0' class='active'>
                                    <img src='images/shop/single-products/product-1.jpg' alt='' />
                                </li>
                                <li data-target='#carousel-custom' data-slide-to='1'>
                                    <img src='images/shop/single-products/product-2.jpg' alt='' />
                                </li>
                                <li data-target='#carousel-custom' data-slide-to='2'>
                                    <img src='images/shop/single-products/product-3.jpg' alt='' />
                                </li>
                                <li data-target='#carousel-custom' data-slide-to='3'>
                                    <img src='images/shop/single-products/product-4.jpg' alt='' />
                                </li>
                                <li data-target='#carousel-custom' data-slide-to='4'>
                                    <img src='images/shop/single-products/product-5.jpg' alt='' />
                                </li>
                                <li data-target='#carousel-custom' data-slide-to='5'>
                                    <img src='images/shop/single-products/product-6.jpg' alt='' />
                                </li>
                                <li data-target='#carousel-custom' data-slide-to='6'>
                                    <img src='images/shop/single-products/product-7.jpg' alt='' />
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-details">
                        <h2>{{ $product->name }}</h2>

                        <div class="product-category">
                            <span>Categories:</span>
                            <ul>
                                <li>{{ $product->catData->name }}</li>
                            </ul>
                        </div>
                        <div class="product-quantity">
                            <span>In Stock:</span>
                            <div class="product-quantity-slider">
                                {{ $product->stock }}
                            </div>
                        </div>
                        <div class="product-size">
                            <span>Size:</span>
                            <select class="form-control">
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                            </select>
                        </div>
                        <div class="color-swatches">
                            <span>Color:</span>
                            <ul>
                                <li>
                                    <a href="#!" class="swatch-violet"></a>
                                </li>
                                <li>
                                    <a href="#!" class="swatch-black"></a>
                                </li>
                                <li>
                                    <a href="#!" class="swatch-cream"></a>
                                </li>
                            </ul>
                        </div>
                        <h4 class="product-price mt-2" style="color: black">Price: {{ $product->price }} BDT</h4>
                        <a href="cart.html" class="btn btn-main mt-20">Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="tabCommon mt-20">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
                            <li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews
                                    (3)</a></li>
                        </ul>
                        <div class="tab-content patternbg">
                            <div id="details" class="tab-pane fade active in">
                                <h4>Product Description</h4>
                                <p>{{ $product->description }}</p>

                            </div>
                            <div id="reviews" class="tab-pane fade">
                                <div class="post-comments">
                                    <ul class="media-list comments-list m-bot-50 clearlist">
                                        <!-- Comment Item start-->
                                        <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="images/blog/avater-1.jpg"
                                                    alt="" width="50" height="50" />
                                            </a>

                                            <div class="media-body">
                                                <div class="comment-info">
                                                    <h4 class="comment-author">
                                                        <a href="#!">Jonathon Andrew</a>

                                                    </h4>
                                                    <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
                                                    <a class="comment-button" href="#!"><i
                                                            class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>

                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at
                                                    magna ut ante eleifend eleifend.Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Quod laborum minima, reprehenderit laboriosam officiis
                                                    praesentium? Impedit minus provident assumenda quae.
                                                </p>
                                            </div>

                                        </li>
                                        <!-- End Comment Item -->

                                        <!-- Comment Item start-->
                                        <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="images/blog/avater-4.jpg"
                                                    alt="" width="50" height="50" />
                                            </a>

                                            <div class="media-body">

                                                <div class="comment-info">
                                                    <div class="comment-author">
                                                        <a href="#!">Jonathon Andrew</a>
                                                    </div>
                                                    <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
                                                    <a class="comment-button" href="#!"><i
                                                            class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>

                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at
                                                    magna ut ante eleifend eleifend. Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Magni natus, nostrum iste non delectus atque ab a
                                                    accusantium optio, dolor!
                                                </p>

                                            </div>

                                        </li>
                                        <!-- End Comment Item -->

                                        <!-- Comment Item start-->
                                        <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="images/blog/avater-1.jpg"
                                                    alt="" width="50" height="50">
                                            </a>

                                            <div class="media-body">

                                                <div class="comment-info">
                                                    <div class="comment-author">
                                                        <a href="#!">Jonathon Andrew</a>
                                                    </div>
                                                    <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
                                                    <a class="comment-button" href="#!"><i
                                                            class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>

                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at
                                                    magna ut ante eleifend eleifend.
                                                </p>

                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div>
        <section class="products related-products section">
            <div class="container">
                <div class="row">
                    <div class="title text-center">
                        <h2>Related Products</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-thumb">
                                <span class="bage">Sale</span>
                                <img class="img-responsive" src="images/shop/products/product-5.jpg" alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <span data-toggle="modal" data-target="#product-modal">
                                                <i class="tf-ion-ios-search"></i>
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
                                <h4><a href="product-single.html">Reef Boardsport</a></h4>
                                <p class="price">$200</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive" src="images/shop/products/product-1.jpg" alt="product-img" />
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
                                <h4><a href="product-single.html">Rainbow Shoes</a></h4>
                                <p class="price">$200</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive" src="images/shop/products/product-2.jpg" alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <span data-toggle="modal" data-target="#product-modal">
                                                <i class="tf-ion-ios-search"></i>
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
                                <h4><a href="product-single.html">Strayhorn SP</a></h4>
                                <p class="price">$230</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive" src="images/shop/products/product-3.jpg" alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <span data-toggle="modal" data-target="#product-modal">
                                                <i class="tf-ion-ios-search"></i>
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
                                <h4><a href="product-single.html">Bradley Mid</a></h4>
                                <p class="price">$200</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
