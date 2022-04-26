@extends('admin.layouts.app') 
@section('content')
<section class="container">
  <div class="card">
      <div class="card-body">
          
          <!-- /. -->

          <div class="d-flex justify-content-between align-items-center">
            <div >
              <h3 class="-title">Packages</h3>
            </div>
    <div> <a class="btn btn-primary" href="{{ route('admin.categories-packages.create') }}"><i class="fa fa-plus"></i> Add Packages</a></div>

          </div>
            <!-- /.-header -->
            <div class="-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody class="sortable-posts">
                  @foreach($packages as $package)
                    <tr id="{{ $package->id }}">
                        <td>
                          <a href="{{ asset($package->banner) }}" target="_blank" rel="noopener noreferrer">  <img src="{{ asset($package->banner) }}" width="80"></a>
                        </td>
                        <td>{{ $package->name }}</td>
                        <td>{!! Str::limit(strip_tags($package->overview),140, '...') !!}</td>
                        <td>{!! $package->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                        <td>
                           <a href="{{ route('admin.categories-packages.edit',$package->id) }}" class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                           </a>

                           <a href="{{ route('admin.categories-packages.delete',['id'=>$package->id ]) }}" class="btn btn-danger btn-sm delete_row"  ><i class="fa fa-trash"></i>
                           </a>

                      
                           @if ($package->status==1)
                           <a href="{{route('admin.deactive',['id'=>$package->id,'table'=>'packages'])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                           @else
                           <a href="{{route('admin.active',['id'=>$package->id,'table'=>'packages'])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a>
                           @endif
                           </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.-body -->
          </div>
          <!-- /. -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>




@endsection


