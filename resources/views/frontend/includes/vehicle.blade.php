<!-- Popular Destination  -->
@php
$packages = DB::table('packages')
    ->where('status', 1)
    ->where('type', 'vehicle')
    ->orderBy('id', 'desc')
    ->limit(3)
    ->get();

@endphp
<section class="py-3 section_1">
    <div class="container">
        <h2 class="custom-fs-32 my-5 text-uppercase custom-fw-800 mt-5">Book 17 seater Tempo</h2>

        <!-- Cards  -->
        <div class="row justify-content-center">
            @foreach ($packages as $package)
                <div class="col-lg-4 col-md-6 mb-5 mb-md-0">
                    <div class="card card_style_1">
                        <a href="{{ route('package.detail', ['id' => $package->id]) }}">
                            <div class="card-img">
                                <img src="{{ asset($package->thumbnail) }}" class="card-img-top" style="object-fit: cover">
                                <a href="{{ route('package.detail', ['id' => $package->id]) }}"
                                    class="btn btn_secondary">View Detail</a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $package->name }}
                                    <span
                                        class="text-end" style="font-size: 12px">  <div class="rating">
                                            @for ($i = 1; $i <= $package->rating; $i++)
                                                <i class="fa-solid fa-star checked"></i>
                                            @endfor

                                            @for ($i = 1; $i <= 5 - $package->rating; $i++)
                                                <i class="fa-solid fa-star "></i>
                                            @endfor
                                        </div></span>
                                </h5>
                                <div class="card-text text-success">
                                  Best Service Guaranteed

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
