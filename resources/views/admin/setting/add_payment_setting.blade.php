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


       <form method="post" action="{{ route('payment.Setting.add')  }}" enctype="multipart/form-data">
        @csrf

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> Vat: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="vat" required placeholder="EX:10 => ( 10$ )">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Shipping Charge: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="shipping_charge" required placeholder="EX:50 => ( 50$ )">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Shop Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="shopname" required placeholder="EX:A7M-Store">
                </div>
              </div><!-- col-4 -->


                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">E-mail: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email" required placeholder="EX: example@example.example">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone" required placeholder="EX:059XXXXXXX">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> logo: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="logo" required>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="adderss" required placeholder="EX:gaza - ps">
                </div>
              </div><!-- col-4 -->




            </div><!-- row -->

          </div><!-- end row -->

            <div class="form-layout-footer py-2">
              <button type="submit" class="btn btn-info mg-r-5">Add Payment Settings</button>
            </div><!-- form-layout-footer -->
        </form>




        </div><!-- row -->


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->





@endsection
