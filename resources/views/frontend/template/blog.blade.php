<section class="recent-post ">
    <div class="container">
        <div class="heading my-5">
            <h2>Recent Post</h2>
        </div>
        @php
            $blogs=DB::table('blogs')->orderBy('id','desc')->where('post_status','publish')->limit(3)->get();
        @endphp

        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-4 col-sm-12  my-2">
                <div class="post-card-1 card">
                    <a href="{{ route('blog.detail',['id'=>$blog->ID]) }}">
                    <div class="img-container">
                        

                        @if ($blog->image==null)
                        <img src="{{ asset('frontend/assets/recent-post.png')}}" alt="IMG" class="img-fluid" alt="{{$blog->name  }}" >
                        @else 
                        <img src="{{ asset($blog->image)}}" alt="{{$blog->name  }}" class="img-fluid w-100">
                        @endif
                        <div class="date">
                            <span>
                            {{ carbon\carbon::parse($blog->post_date)->format('d') }}
                        </span>                        
                             {{ carbon\carbon::parse($blog->post_date)->format('M Y') }}

                        </div>
                    </div>
                    <div class="px-2">

                    <div class="img-desc">
                        <h2 class="custom-fs-19 text-dark custom-fs-700">{{ Str::limit($blog->post_title,40) }}</h2>
                    </div>
                </div>
                    </a>
                </div>
            </div>
            @endforeach
           
            <div class="col-12 mt-4">
                <a class="btn btn-primary" href="{{ route('blog') }}">
                    Read More
                </a>
            </div>
        </div>
    </div>
</section>