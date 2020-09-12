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
          <h6 class="card-body-title">Add Site Setting</h6>


       <form method="post" action="{{ route('add.siteSetting')  }}" >
        @csrf

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> Phone One: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone_one" required placeholder="EX:059XXXXXXX">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone Two: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone_two" required placeholder="EX:059XXXXXXX">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email" required placeholder="EX:ex@example.ex">
                </div>
              </div><!-- col-4 -->




<div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Compay Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="company_name" required placeholder="EX:A7M-Store">
                </div>
              </div><!-- col-4 -->

                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Company Address: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="company_address" required placeholder="EX: Place - place">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Facebook: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="facebook" required placeholder="EX:Facebook Account">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Youtube: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="youtube" required placeholder="EX:Youtube Account">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">  Instagram: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="instagram" required placeholder="EX:Instagram Account">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">twitter: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="twitter" required placeholder="EX:twitter Account">
                </div>
              </div><!-- col-4 -->




            </div><!-- row -->

          </div><!-- end row -->

            <div class="form-layout-footer py-2">
              <button type="submit" class="btn btn-info mg-r-5">Add Site Settings</button>
            </div><!-- form-layout-footer -->
        </form>




        </div><!-- row -->


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->





@endsection
