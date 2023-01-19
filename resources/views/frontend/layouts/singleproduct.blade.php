
                            @foreach($products as $items)
                            <div class="col-lg-3 col-md-4">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="shop-product-right.html">
                                                @php
                                                $photo=explode(',',$items->photo);
                                                @endphp
                                                <img class="default-img" src="{{$photo[0]}}" alt="">
                                                <!-- <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt=""> -->
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
<i class="fi-rs-search"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up add_to_wishlist" data-quantity="1" data-id="{{$items->id}}" id="add_to_wishlist_{{$items->id}}" href="javascript:void(0);" ><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">{{$items->conditions}}</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="">{{\App\Models\Brand::where('id',$items->brand_id)->value('title')}}</a>
                                        </div>
                                        <h2><a href="{{route('product.detail',$items->slug)}}">{{ucfirst($items->title)}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>${{number_format($items->offer_price,2)}}</span>
                                            <span class="old-price">${{number_format($items->price,2)}}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" data-quantity="1" data-product-id="{{$items->id}}" class="action-btn hover-up add_to_cart" id="add_to_cart{{$items->id}}" href="#"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endforeach
                        </div>
                       