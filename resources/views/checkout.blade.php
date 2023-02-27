@extends('/frequently-used/header-and-footer')
@section('title','checkout')
@section('other-content')
@php
  $sn = 1;
@endphp
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<section class="checkout-Section-header">
        <div class="img-section">
            <img src="./img/try5.jpg" alt="" />
          </div>
          <div class="linear"></div>
          <div class="text-about">
              <h1>Checkout</h1>
          </div>
</section>
<div class="checkout-main-box">
    <div class="checkout-detail">
        <form action="{{route('save-checkout-info')}}" method="POST">
          @csrf
          <input type="text" hidden value="{{$value->id}}" name="restaurantId">
         <div class="detail-section">
          <p class="Info">Contact Info</p>


         <div class="d-flex mb-3" style="gap:10px;margin-left:20px;margin-right:20px;">
          <div class="mb-3  w-50">
                        <label class="form-label fs-4" style="letter-spacing: 1px;">First Name</label>
                        <input type="text" style="letter-spacing: 1px;" class="form-control fs-4  @error('firstName') is-invalid @enderror"  name="firstName" placeholder="Your First Name" value="{{old('firstName')}}" >
                        <span style="color: red;"> @error('firstName'){{$message}}@enderror</span>
          </div>
          <div class="mb-3 w-50">
                        <label class="form-label fs-4" style="letter-spacing: 1px;">Last Name</label>
                        <input type="text" style="letter-spacing: 1px;" class="form-control fs-4  @error('lastName') is-invalid @enderror"  placeholder="Your Last Name" name="lastName" value="{{old('lastName')}}">
                        <span style="color: red;"> @error('lastName'){{$message}}@enderror</span>
          </div>
        </div>
        <div style="margin-right:40px;">
          <div class="mb-3 w-100" style="margin-left:20px;">
                            <label class="form-label fs-4" style="letter-spacing: 1px;">PHONE NUMBER</label>
                            <input type="text" style="letter-spacing: 1px;" class="form-control fs-4  @error('contactNumber') is-invalid @enderror" id="" placeholder="YOUR NUMBER"  name="contactNumber" value="{{old('phoneNumber')}}">
                            <span style="color: red;"> @error('contactNumber'){{$message}}@enderror</span>
            </div>
        </div>
         </div>
         <div class="detail-section">
          <p class="Info">Location Info</p>

         <div class="d-flex mb-3" style="gap:10px;margin-left:20px;margin-right:20px;">
          <div class="mb-3  w-50">
                        <label class="form-label fs-4" style="letter-spacing: 1px;">Street Name</label>
                        <input type="text" style="letter-spacing: 1px;" class="form-control fs-4  @error('streetName') is-invalid @enderror"   name="streetName" placeholder="Your street Name" value="{{old('streetName')}}">
                        <span style="color: red;"> @error('streetName'){{$message}}@enderror</span>
          </div>
          <div class="mb-3 w-50">
                        <label class="form-label fs-4" style="letter-spacing: 1px;">City Name</label>
                        <input type="text" style="letter-spacing: 1px;" class="form-control fs-4  @error('cityName') is-invalid @enderror"  placeholder="Your City Name" name="cityName" value="{{old('cityName')}}">
                        <span style="color: red;"> @error('cityName'){{$message}}@enderror</span>
          </div>
          </div>
          <div style="margin-right:40px;">
          <div class="mb-3 w-100" style="margin-left:20px;">
                            <label class="form-label fs-4" style="letter-spacing: 1px;">Near By Organization</label>
                            <input type="text" style="letter-spacing: 1px;" class="form-control fs-4 "  placeholder="Enter Near By Organization(If Exists)"  name="organization" value="{{old('organization')}}">
                            <span style="color: red;"> @error('organization'){{$message}}@enderror</span>
            </div>
          </div>
          <div style="margin-right:40px;">
          <div class="mb-5 w-100" style="margin-left:20px;">
                            <label class="form-label fs-4" style="letter-spacing: 1px;">Detail Address Direction</label>
                            <textarea type="text" style="letter-spacing: 1px;" class="form-control fs-4  @error('detailAddress') is-invalid @enderror" id="" placeholder="Enter Detail Address Location"  name="detailAddress" value="{{old('detailAddress')}}"></textarea>
                            <span style="color: red;"> @error('detailAddress'){{$message}}@enderror</span>
            </div>
          </div>
         </div>
         <div class="detail-section">
          <p class="Info">DELIVERY DATE AND TIME</p>
         <div class="d-flex mb-3" style="gap:10px;margin-left:20px;margin-right:20px;">
          <div class="mb-3  w-75">
           <input type="text" id="actualDate" name="serviceDate2" hidden>
                        <label class="form-label fs-4" style="letter-spacing: 1px;">Date</label>
                        <select id="dates" name="serviceDate1" onchange="changeDate();" class="form-select fs-4  @error('date') is-invalid @enderror" style="letter-spacing: 1px;">
                             <option value="">SELECT A DATE</option>
                        </select>
                        <span style="color: red;"> @error('date'){{$message}}@enderror</span>
          </div>
          <div class="mb-3 w-25">
                        <label class="form-label fs-4" style="letter-spacing: 1px;">Time</label>
                        <input type="text" style="letter-spacing: 1px;" class="form-control fs-4  @error('deliveryTime') is-invalid @enderror" placeholder="Time" name="deliveryTime" value="{{old('time')}}">
                        <span style="color: red;"> @error('deliveryTime'){{$message}}@enderror</span>
          </div>
          <div class="mb-3 w-25">
          <label class="form-label fs-4" style="letter-spacing: 1px;">Service Type</label>
                        <select id="dates" name="serviceType"  class="form-select fs-4  @error('serviceType') is-invalid @enderror" style="letter-spacing: 1px;">
                             <option value="delivery">Delivery</option>
                             <option value="pickup">Pickup</option>
                        </select>
                        <span style="color: red;"> @error('date'){{$message}}@enderror</span>
          </div>
          </div>
        
         </div>
         <div class="detail-section">
          <p class="Info">PAYMENT OPTION</p>
          <div class="form-check form-check-inline mb-3" style="margin-left: 30px;">
            <input class="form-check-input fs-4" type="radio" name="paymentMethod" id="inlineRadio1" value="cashOnDelivery">
            <label class="form-check-label fs-4" for="inlineRadio1" style="letter-spacing: 1px;">Cash On Delivery</label>
            </div>
            <div class="form-check form-check-inline mb-3" style="margin-left: 30px;">
            <input class="form-check-input fs-4" type="radio" name="paymentMethod" id="inlineRadio2" value="payOnline">
            <label class="form-check-label fs-4" style="letter-spacing: 1px;" for="inlineRadio2">Pay Online</label>
          </div>
          <p style="color: red;margin-left: 30px;"> @error('paymentMethod'){{$message}}@enderror</p>
         </div>
         <div class="detail-section">
          <p class="Info">SPECIAL INSTRUCTION</p>
          <div style="margin-right:40px;">
          <div class="mb-5 w-100" style="margin-left:20px;">
                            <label class="form-label fs-4" style="letter-spacing: 1px;">Instruction</label>
                            <textarea type="text" style="letter-spacing: 1px;" class="form-control fs-4" id="" placeholder="If Any Warning For Delivery Person"  name="instruction" value="{{old('detailAddress')}}"></textarea>
            </div>
          </div>
         </div>
         <div class="d-flex justify-content-between align-items-center">
            <button class="btn btn-secondary fs-4">Go Back</button>
            <button type="submit" class="btn btn-success fs-4">Continue</button>
         </div>
        </form>
    </div>
    <div class="cart-detail">
      <p>{{$value->restaurantName}}</p>
    <table class="table">
        <tr>
            <th>SN</th>
            <th>Food name</th>
            <th>Food price</th>
            <th>Food quantity</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
          @foreach ($newValue->my_carts as $cart)
          <tr>
              <th>{{$sn++}}</th>
              <td>{{$cart->foodName}}</td>
              <td>{{$cart->foodPrice}}</td>
              <td>{{$cart->foodQuantity}}</td>
              <td>{{$cart->total}}</td>
              <td>
                <!-- <button  class="btn btn-success" id="{{$cart->id}}" onclick="openFoodEditBox(this.id);" style="border-radius: 50%;"><i class="fa fa-pencil" style="color:white;font-size:12px"></i></button> -->
                <button class="btn btn-danger" style="border-radius: 50%;"><ion-icon name="trash"  style="color:white;font-size:12px;"></ion-icon></button>
              </td>
          </tr>
          @endforeach
      </table>
      <p class="fs-4">Grand total: {{ collect($newValue->my_carts)->sum('total')}}</p>
    </div>
</div>
<script>
  var today = new Date();
  var monthNames = [
    "January", "February", "March", "April",
    "May", "June", "July", "August", "September",
    "October", "November", "December"
  ];
  for (var i = 0; i < 7; i++) {
    var date = new Date(today.getTime() + i * 24 * 60 * 60 * 1000);
    var year = date.getFullYear();
    var month = monthNames[date.getMonth()];
    var day = ("0" + date.getDate()).slice(-2);
    var option = document.createElement("option");
    option.value = year + "-" + (date.getMonth() + 1) + "-" + day;
    option.text = month + " " + day + ", " + year;
    document.getElementById("dates").appendChild(option);
  }
  function changeDate()
  {
    var dateStr = document.getElementById("dates").value;
        const dateObj = new Date(dateStr);
    const year = dateObj.getFullYear();
    const month = ('0' + (dateObj.getMonth() + 1)).slice(-2);
    const day = ('0' + dateObj.getDate()).slice(-2);
    const formattedDate = `${year}-${month}-${day}`;
    document.getElementById("actualDate").value = formattedDate;
  }
</script>
<script src="./js/script.js"></script>
@endsection