<!-- other packages  -->
@php
$packages = DB::table('packages')
    ->where('status', 1)
    ->where('price', '!=', null)
    ->inRandomOrder()
    ->limit(4)
    ->get();
@endphp
<section class=" pb-5">
    <div class="container">
        <h2 class="custom-fs-32 my-5 text-uppercase custom-fw-800">Featured Package</h2>
        <div class="grid-5">
            @foreach ($packages as $package)
                <div class="card card_style_2">
                    <a href="{{ route('package.detail', ['id' => $package->id]) }}">

                        <div class="card-img">
                            <img src="{{ $package->thumbnail }}" class="card-img-top">
                            <a href="{{ route('package.detail', ['id' => $package->id]) }}"
                                class="btn btn_secondary">View
                                Detail</a>
                            <h5 class="card-title">{{ $package->name }} </h5>
                        </div>

                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>
