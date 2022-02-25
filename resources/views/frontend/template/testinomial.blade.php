@php
    $testimonials=DB::table('testimonials')->where('display_home',1)->where('status',1)->orderBy('id','desc')->get();
@endphp
<style>
    .user_img{
        width:90px!important;
        height: 90px!important;
        margin: auto;
        border-radius: 50%;
        margin-bottom: 1rem;

    }

    .user_no_img{
        max-width:140px!important;
        max-height: 140px!important;
        margin: auto;
        margin-bottom: 1rem;

    }
    .see_more{
        cursor: pointer;
    }
    .modal{
        border-radius: : 0px;

    }
</style>
<section class="feedback ">
    <div class="container ">
        <div class="heading mt-5">
            <h2>
                Tourist Feedback
            </h2>
        </div>
        <div class="owl-carousel testimonials">
            @foreach ($testimonials as $testimonial)
                
            <div class="mx-2">
                <div class="feedback-box text-center ">
                    <div>
                        @if ($testimonial->image!=null)
                        <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}" class="user_img img-fluid">
                        @else    
                        <img src="{{ asset('frontend/user.png') }}" alt="{{ $testimonial->name }}" class="user_no_img ">
                        
                        @endif
                    </div>
                    <p class="comment">{!! strip_tags(Str::limit($testimonial->content,100))!!}
                        @if (Str::length($testimonial->content)>102)
                         <span class='see_more custom-text-primary' data-bs-toggle="modal" data-bs-target="#seemore_modal" data-content="{!! strip_tags($testimonial->content)!!}">See more</span>
                        @endif
                   
                    </p>
                    <div class="client-name custom-text-primary">
                    <i class="fas fa-quote-right custom-text-primary"></i>
                <p class="my-0 py-0 custom-fw-700 custom-fs-25 custom-text-primary">
                    
                    {{ $testimonial->name }}
                </p>
                
                                    </div>
                    
                </div>
            </div>
            @endforeach

            
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade " id="seemore_modal" tabindex="-1" aria-labelledby="seemore_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body see_more_data">
          
        </div>
      
      </div>
    </div>
  </div>








@push('scripts')
<script type="text/javascript"
src="https://www.viralpatel.net/demo/jquery/jquery.shorten.1.0.js"></script>

<script>
	$(document).ready(function() {
	
	


        $('.see_more').click(function(){
      $('.see_more_data').html('')

      let content=   $(this).data('content');
      $('.see_more_data').html(content)
})
	});

 
</script>
@endpush