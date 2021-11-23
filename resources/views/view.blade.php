@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row mt-4">
            <div class="col-sm-2" id="spy">
                <ul class="nav nav-pills flex-column">
                    @foreach ($categories as $key => $category)
                        @if ($key == 0)
                            <li class="nav-item"><a class="nav-link active"
                                    href="#scroll{{ $category->id }}">{{ $category->name }}</a></li>

                        @else
                            <li class="nav-item"><a class="nav-link"
                                    href="#scroll{{ $category->id }}">{{ $category->name }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="col-sm-6 scrollspy-example" data-bs-spy="scroll" data-bs-target="#spy" data-bs-offset="0"
                class="scrollspy-example" tabindex="0">
                @foreach ($categories as $category)
               
               
                    <div class="p-card bg-white p-2 rounded px-3" id="scroll{{ $category->id }}">
                        <h3 class="mt-2">{{ $category->name }}</h3>
                        <hr class="new1">

                            
                        
                        @foreach (App\Models\Food::where('category_id', $category->id)->get() as $food)
                        @if ($food->category_id != $category->id)
                        Not Available..
                        @else
                            @if ($food->type == 'Veg')
                                <div class="d-flex align-items-center credits"><img src="/images/veg.png" width="16px">
                                </div>

                            @else
                                <div class="d-flex align-items-center credits"><img src="/images/non-veg.png" width="16px">
                                </div>

                            @endif
                            <h5 class="mt-2">{{ $food->name }}</h5><span
                                class="badge badge-success py-1 mb-2">Offer Available</span>
                            <span class="d-block mb-5">{{ $food->description }}</span>
                            <div class="d-flex justify-content-between stats">
                                <div><i class="fa fa-coins"></i>
                                    <span class="ml-2">Rs. {{ $food->price }}</span>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <span class="ml-3"><a href="" onclick="add_cart({{ $food->id }})"
                                            class="p-3"><i class="fa fa-plus"></i></a>CART <a href=""
                                            onclick="remove_cart({{ $food->id }})" class="p-3"><i
                                                class="fa fa-minus"></i></a>
                                    </span>
                                </div>
                            </div>
                            <div class="pb-3">
                                <hr>
                            </div>

                           
                            @endif
                        @endforeach
                       

                    </div>



                @endforeach
            </div>
            <div class="col-sm-4 d-flex justify-content-center">
                <div class="p-card bg-white p-2 rounded px-3" id="">
                  <div class="justify-content-center">
                    <h2 class="m-2 px-5">Cart</h2>
                  </div>
                    
                    <hr class="new1">
                    <?php $total = 0; ?>
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity']; ?>


                            @if ($details['type'] == 'Veg')
                                <div class="d-flex align-items-center credits"><img src="/images/veg.png" width="16px">
                                </div>

                            @else
                                <div class="d-flex align-items-center credits"><img src="/images/non-veg.png" width="16px">
                                </div>

                            @endif
                            <h5 class="mt-2">{{ $details['name'] }}</h5>
                            <div class="d-flex justify-content-between stats">
                                <div><i class="fa fa-coins"></i>
                                    <span class="ml-2">Rs. {{ $details['price'] }}</span>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <span class="ml-3"><a href="" onclick="add_cart({{ $details['id'] }})"
                                            class="p-3"><i
                                                class="fa fa-plus"></i></a>{{ $details['quantity'] }} <a href=""
                                            onclick="remove_cart({{ $details['id'] }})" class="p-3"><i
                                                class="fa fa-minus"></i></a>
                                    </span>
                                    <span
                                        class="badge badge-success py-1 mb-2">Rs.{{ $details['price'] * $details['quantity'] }}</span>
                                </div>
                            </div>
                            <div class="pt-3"></div>

                        @endforeach
                        <hr>
                        <div class="d-flex justify-content-between stats">
                          <div>
                            <h5 class="mt-2">Sub Total</h5>
                          </div>
                          <div class="d-flex flex-row align-items-center">
                             
                              <span
                                  class="badge badge-success p-3 mb-2">Rs.{{ $total}}</span>
                          </div>
                      </div>
                      <div class="d-flex justify-content-center p-2">
                        <span class="badge badge-primary px-5 py-2">Login to buy....</span>
                        <div>
                    @else
                        <div class="p-5"><span class="badge badge-danger p-2 mb-2">Your Cart is Empty</span>
                        </div>


                    @endif
                </div>
            </div>

        </div>


    </div>

    <script type="text/javascript">
        function add_cart(foodid) {

            $.ajax({
                url: '/add/' + foodid,
                type: "GET",
                success: function(data) {



                }
            });

        }

        function remove_cart(foodid) {
            $.ajax({
                url: '/remove/' + foodid,
                type: 'GET',
                success: function(data) {

                }
            });

        }
    </script>
@endsection
