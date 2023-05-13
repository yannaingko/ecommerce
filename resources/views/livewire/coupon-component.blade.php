<div>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
    
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        }
    
        /* .box {
        width: 450px;
        height: 180px;
        justify-content: center;
        align-items: center;
        display: flex;
        border-radius: 40px 0 0 40px;
        background-color: #dc143c;
        } */
    
        .card {
        width: 400px;
        height: 180px;
        border-radius: 5px;
        box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.2);
        background-color: #fff;
        padding: 10px 10px;
        position: relative;
        }
    
        .main,
        .copy-button {
        display: flex;
        justify-content: space-between;
        padding: 0 10px;
        align-items: center;
        }
        .card::after {
        position: absolute;
        content: "";
        height: 40px;
        right: -20px;
        border-radius: 40px;
        z-index: 1;
        top: 70px;
        background-color: #dc143c;
        width: 40px;
        }
    
        .card::before {
        position: absolute;
        content: "";
        height: 40px;
        left: -20px;
        border-radius: 40px;
        z-index: 1;
        top: 70px;
        background-color: #dc143c;
        width: 40px;
        }
    
        .co-img img {
        width: 100px;
        height: 100px;
        }
        .vertical {
        border-left: 5px dotted black;
        height: 100px;
        position: absolute;
        left: 40%;
        }
    
        .content h1 {
        font-size: 35px;
        margin-left: -20px;
        color: #565656;
        }
    
        .content h1 span {
        font-size: 18px;
        }
        .content h2 {
        font-size: 18px;
        margin-left: -20px;
        color: #565656;
        text-transform: uppercase;
        }
    
        .content p {
        font-size: 16px;
        color: #696969;
        margin-left: -20px;
        }
    
        .copy-button {
        margin: 12px 0 -5px 0;
        height: 45px;
        border-radius: 4px;
        padding: 0 5px;
        border: 1px solid #e1e1e1;
        }
    
        .copy-button input {
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        font-size: 15px;
        }
    
        .copy-button a {
        padding: 5px 20px;
        background-color: #dc143c;
        color: #fff;
        border: 1px solid transparent;
        }
        #couponbg{
          background-color: #dc143c
        }
    </style>
    <div class="container">
      @if(session('message'))
        <div class="alert alert-success alert-dismissible">
          {{session('message')}}
        </div>          
      @endif
      <div id="couponbg" class="row">
          <div class="col-1"></div>
          <div class="col">
          
          {{-- filter for Button  --}}

            @if(auth()->user()->utype === 'ADM')
              <a href="{{route('admin.coupon.add')}}" class="btn btn-info">Add Coupon</a>
            @endif

              <div class="row">
                @foreach($coupons as $coupon)
                  <div class="col my-3">
                      <div class="box">
                          <div class="card">

                            @if(auth()->user()->utype === 'ADM')
                              <span class="btn-close" wire:click.prevent="deleteCoupon({{$coupon->id}})"></span>
                            @endif
                            
                            <div class="main">
                              <div class="co-img">
                                <img
                                  src="{{asset('assets/imgs/logo/Online Shop Logo .jpg')}}"
                                  alt=""
                                />
                              </div>
                              <div class="vertical"></div>
                              <div class="content">
                                <h2>minimum:{{(int)$coupon->amount_limit}}$</h2>
                                <h1>{{(int)$coupon->value}}
                                  @if($coupon->type == 'percent')
                                    % 
                                  @else
                                    $
                                  @endif
                                  <span>Coupon</span></h1>
                                <p class="mt-2">Coupons Amount: <span class="text-success">{{$coupon->quantities}}</span></p>
                              </div>
                            </div>
                            <div class="copy-button">
                              <input id="copyvalue" type="text" class="text-center" readonly value="{{$coupon->code}}" />
                              @if(auth()->user()->utype === 'ADM')
                                <a href="{{route('admin.coupon.edit',['code'=>$coupon->code])}}" class="copybtn">Edit</a>
                              @endif

                            </div>
                          </div>
                      </div>            
                  </div>
                @endforeach  
              </div>
          </div>
          <div class="col-1"></div>
      </div>

    </div>
</div>
