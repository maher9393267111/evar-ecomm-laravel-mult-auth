<table class="table shopping-summery text-center">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Price</th>

                                    <th scope="col">Action</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count()>0)
                                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $item)
                                <tr>
                                    <td class="image product-thumbnail"><img src="{{$item->model->photo}}" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="{{route('product.detail',$item->model->slug)}}">{{$item->name}}</a></h5>

                                    </td>
                                    <td class="price" data-title="Price"><span>RS {{number_format($item->price,2)}}</span></td>

                                    <td class="text-right" data-title="Cart">
                                    <a href="javascript:void(0);" data-id="{{$item->rowId}}" class=" move-to-cart btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</a>
                                    </td>
                                    <td class="action delete_wishlist" data-id="{{$item->rowId}}" data-title="Remove"><a href="#"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                      <td colspan="5" class="text-center"> No Products in the wishlist</td>
                        </tr>
                        @endif


                            </tbody>
                          
                        </table>
                       