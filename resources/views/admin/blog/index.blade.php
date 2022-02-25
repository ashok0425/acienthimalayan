@extends('admin.layouts.app') 
@section('content')
<section class="container">
  <div class="card">
      <div class="card-body">
          
          <!-- /. -->

          <div class="d-flex justify-content-between align-items-center">
            <div >
              <h3 class="-title">Blog List</h3>
            </div>
    <div> <a class="btn btn-primary" href="{{ route('admin.blogs.create') }}"><i class="fa fa-plus"></i> Add Blog</a></div>

          </div>
            <!-- /.-header -->
            <div class="-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Details</th>

                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody class="sortable-posts">
                  @foreach($blogs as $blog)
                    <tr id="{{ $blog->id }}">
                        <td>
                            <img src="{{ asset($blog->guid) }}" width="80">
                        </td>
                        <td>{{ $blog->post_title }}</td>
                        <td>{!! Str::limit(strip_tags($blog->post_content), 100, '...') !!}</td>
                         


                        <td>{!! $blog->post_status=='publish' ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                        <td>
                           <a href="{{ route('admin.blogs.edit',$blog->ID) }}" class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                           </a>

                           <a href="{{ route('admin.blogs.delete',$blog->ID ) }}" class="btn btn-danger btn-sm delete_row" id="" ><i class="fa fa-trash"></i>
                           </a>

                           @if ($blog->status==1)
                           <a href="{{route('admin.blog.deactive',['id'=>$blog->ID,'table'=>'blogs'])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                           @else
                           <a href="{{route('admin.blog.active',['id'=>$blog->ID,'table'=>'blogs'])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a>
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
             
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


