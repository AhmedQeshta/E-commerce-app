@extends('admin.admin_layouts')



@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Starlight</a>
        <span class="breadcrumb-item active">Seo Setting Section</span>
      </nav>

      <div class="sl-pagebody">


 <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add Seo Setting</h6>

       <form method="post" action="{{ route('add.seo')}}" >
        @csrf

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Meta Title: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_title" required placeholder="Ex: meta Title">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Meta Author: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_author" required placeholder="Ex: Ahmed Qeshta" >
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Meta Tag: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_tag" required placeholder="Ex: Css - html - js - laravel " >
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Meta Description: <span class="tx-danger">*</span></label>
                    <textarea class="form-control" name="meta_description" required placeholder="Ex:meta description"></textarea>
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-12">
                <div class="form-group">
                     <label class="form-control-label">Google Analytics: <span class="tx-danger">*</span></label>
                     <textarea class="form-control" name="google_analytics" required placeholder="Ex:google analytics"></textarea>
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Bing Analytics: <span class="tx-danger">*</span></label>
                    <textarea class="form-control" name="bing_analytics" required placeholder="Ex:bing analytics"></textarea>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
          </div><!-- end row -->

            <div class="form-layout-footer py-3">
              <button class="btn btn-info mg-r-5" type="submit">Add SEO Settings</button>
            </div><!-- form-layout-footer -->


        </form>


        </div><!-- row -->


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



@endsection
