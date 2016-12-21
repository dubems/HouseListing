@extends('layout')

@section('content')
     <div class="row">

         <div class="col-md-3">
             <div class="flyer_info box-shadows">
    <h3>{{$flyer->street}}</h3>
    <hr>
    <div class="description">
        {{$flyer->description}}
    </div>
    <h4> #{!! number_format($flyer->price) !!} </h4>

                 <button id="btn-checkout" class="btn btn-success">BUY NOW</button>

             </div>
         </div>
         
         <div class="col-md-9">
             <div class="images box-shadows">
             @foreach($flyer->photos->chunk(4) as $set)
                 <div class="row">
                     @foreach($set as $photo)
                         <div class="col-md-3">
                             <a href="/{{$photo->photo_path}}" data-lity> <img src="/{{$photo->thumbnail_path}}" alt="" class="house-image" ></a>
                             </div>
                 @endforeach
                     </div>
                 @endforeach
                 </div>

             @if($user && $user->owns($flyer))
                 <h3> Add Your Photo</h3>
                 <form id="AddNewPhotos" action="/flyers/{{$flyer->name}}/photos" method="post" class="dropzone">
                     {{csrf_field()}}

                 </form>
                 @endif
         </div>
         </div>
     <hr>

     <form action="{{ url()->current() }}" method="post" id="checkout-form">
         <input type="hidden" name="_method" value="PUT">
     </form>
   @endsection

@section('section.footer')

    <script>
        function processPayment (token) {
            console.log(token);
            // implement your code here - we call this after a token is generated
            // example:
            var form = $('#checkout-form');
            form.append(
                    $('<input />', { name: 'token', type: 'hidden', value: token })
            );
            form.submit();
        }

        // Configure SimplePay's Gateway
        var handler = SimplePay.configure({
            token: processPayment, // callback function to be called after token is received
            key: 'test_pu_demo', // place your api key. Demo: test_pu_*. Live: pu_*
        });

        $('#btn-checkout').on('click', function (e) { // add the event to your "pay" button
            e.preventDefault();

            handler.open(SimplePay.CHECKOUT, // type of payment
                    {
                        email: 'customer@store.com', // optional: user's email
                        phone: '+234*', // optional: user's phone number
                        description: 'My Test Store Checkout 123-456', // a description of your choosing
                        address: '31 Kade St, Abuja, Nigeria', // user's address
                        postal_code: '110001', // user's postal code
                        city: 'Abuja', // user's city
                        country: 'NG', // user's country
                        amount: '1000', // value of the purchase, ₦ 1100
                        currency: 'NGN' // currency of the transaction
                    });
        });

    </script>
    <script src="/js/libs/dropzone.js"></script>
@endsection

{{--<script>--}}
    {{--Dropzone.option.AddNewPhotos = {--}}
        {{--paramName: "photo",--}}
        {{--maxFileSize: 3,--}}
        {{--acceptedFiles:'.jpg,.jpeg,.gif,.png'--}}
    {{--};--}}
{{--</script>--}}