@extends('admin.admin_layouts')



@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Website Setting</span>
      </nav>

      <div class="sl-pagebody">


 <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add Payment Setting</h6>


       <form method="post" action="{{ route('payment.Setting.update')  }}" enctype="multipart/form-data">
        @csrf
           <input type="hidden" name="id" value="{{ $paymentSetting->id }}">
           <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> Vat: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="vat" required value="{{$paymentSetting->vat}}">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Shipping Charge: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="shipping_charge" required value="{{$paymentSetting->shipping_charge}}">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Shop Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="shopname" required value="{{$paymentSetting->shopname}}">
                </div>
              </div><!-- col-4 -->


                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">E-mail: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email" required value="{{$paymentSetting->email}}">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone" required value="{{$paymentSetting->phone}}">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="adderss" required value="{{$paymentSetting->adderss}}">
                </div>
              </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label"> logo: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="file" name="logo" >
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-12">
                    <div class="form-group text-center">
                        <img width="25%" height="25%" src="{{asset($paymentSetting->logo)}}" alt="{{$paymentSetting->logo}}">
                        <input type="hidden" name="old_logo" value="{{ $paymentSetting->logo }}">
                    </div>
                </div><!-- col-4 -->



            </div><!-- row -->

          </div><!-- end row -->

            <div class="form-layout-footer py-2">
              <button type="submit" class="btn btn-info mg-r-5">Update Settings</button>
            </div><!-- form-layout-footer -->
        </form>




        </div><!-- row -->


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->





@endsection
