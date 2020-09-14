@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel">


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Message Details</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Message List </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th >Name</th>
                  <th >Phone</th>
                  <th >Email</th>
                  <th >Status</th>
                  <th >Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($message as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->phone }}</td>
                  <td>{{ $row->email }}  </td>
                  <td>
                      @if($row->status == 0)
                          <label class="badge badge-danger">New</label>
                      @else
                          <label class="badge badge-info">Readable</label>
                      @endif
                  </td>
                  <td>
                      @if( $row->status == 0)
                        <a href="{{route('all.message.read',$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i>Red</a>
                      @endif
                        <a href="{{route('all.message.show',$row->id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Show</a>
                        <a id="delete" href="{{route('message.delete',$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                  </td>

                </tr>
                @endforeach

              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->




    </div><!-- sl-mainpanel -->





@endsection
