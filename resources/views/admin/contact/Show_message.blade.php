@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel">


      <div class="sl-pagebody">
        <div class="sl-page-title">
            @foreach($message as $row)
                @if($row->status == 0)
                    <h5 style="position: relative">Message Details <span style="position: absolute;top:-12px;left:150px;" class="badge badge-danger">NEW</span></h5>
                @else
                    <h5 style="position: relative">Message Details <span style="position: absolute;top:-12px;left:150px; " class="badge badge-info">READABLE</span></h5>
                @endif
            @endforeach
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            @foreach($message as $row)
                <div class="row" style="position: relative">
                    @if($row->status == 0)
                        <a style="position: absolute;top:-25px;right:0px;" href="{{route('all.message.read',$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i>Red</a>
                    @endif
                    <div class="col col-md-4" >
                        <h5 class="card-title text-dark"> <strong>Name</strong></h5>
                        <label style="font-size: 17px"  class="card-body-title text-info"><strong>{{$row->name}}</strong></label>
                    </div>
                    <div class="col col-md-4" >
                        <h5  class="card-title text-dark"> <strong>Phone</strong></h5>
                        <label style="font-size: 17px" class="card-body-title text-info"><strong>{{$row->phone}}</strong></label>
                    </div>
                    <div class="col col-md-4" >
                        <h5  class="card-title text-dark"> <strong>E-mail</strong></h5>
                        <label style="font-size: 17px" class="card-body-title text-info text-lowercase "><strong>{{$row->email}}</strong></label>
                    </div>
                </div>
                <hr style="color: #0d82d3;width: 100%; height: 50px">
                <div class="row">
                    <div class="col col-md-12">
                        <h5 class="card-title text-center"> <strong>Message</strong></h5>
                        <label  class="card-body-title text-center text-capitalize"><strong>{{$row->message}}</strong></label>
                    </div>
                </div>
            @endforeach

        </div><!-- card -->
    </div><!-- sl-mainpanel -->





@endsection
