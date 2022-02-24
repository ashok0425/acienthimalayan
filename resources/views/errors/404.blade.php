{{-- @extends('frontend.master') --}}
{{-- @section('main-content') --}}
<style>
    .error{
        background: var(--custom-primary);
        border-radius: 100px;
        color: white;
        padding: .5rem 1rem;
    }
</style>

	<div class="container my-5">
<br>
<br>
<br>

        <center>
            <h3>PAGE NOT FOUND</h3>
       <span class="text-danger font-weight-bold">  Sorry,We couldn't find the page you are requesting for.</span>
<br><br>
<br>
           <a href="{{ route('/')}}" class="error">&laquo; Back to home page</a>
        </center>
        <br>
<br>
<br>

    </div>


{{-- @endsection --}}
