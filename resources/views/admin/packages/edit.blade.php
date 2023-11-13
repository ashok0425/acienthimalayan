@push('style')
    <style>
        .image-input {
            text-aling: center;
        }

        .image-input input {
            display: none;
        }

        .image-input label {
            display: block;
            color: #FFF;
            background: #000;
            padding: .3rem .6rem;
            font-size: 115%;
            cursor: pointer;
        }

        .image-input label i {
            font-size: 125%;
            margin-right: .3rem;
        }

        .image-input label:hover i {
            animation: shake .35s;
        }

        .image-input img {
            max-width: 175px;
            display: none;
        }

        .image-input span {
            display: none;
            text-align: center;
            cursor: pointer;
        }

        .image-preview1,
        .image-preview2,
        .image-preview3,
        .image-preview4,
        .image-preview5 {
            max-height: 100px;
        }

        @keyframes shake {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(10deg);
            }

            50% {
                transform: rotate(0deg);
            }

            75% {
                transform: rotate(-10deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        #thumbAppendAlt input,
        #thumbAppendAlt1 input,
        #thumbAppendAlt2 input {
            width: 100px;
            margin: 10px 17px;
        }

        .nav-tabs {}
    </style>
@endpush
@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Package Form
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories-packages.update', $package->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')

                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs d-flex justify-content-between" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                        data-toggle="tab">Trip Details</a></li>

                                <li role="presentation"><a href="#seo" aria-controls="seo" role="tab"
                                        data-toggle="tab">Seo</a></li>
                                <button type="submit" class="pull-right btn btn-success btn-lg">Submit</button>
                            </ul>
                            <div class="tab-content">
                                <div role="tabcard" class="tab-pane active" id="home">
                                    {{-- <h3>Package Details <small>Enter information.</small></h3> --}}
                                    <div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-group ">
                                                                <label>Name</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    required value="{{ $package->name }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="form-group ">
                                                                <label>Type</label>
                                                                <select name="type" id="" class="form-control">
                                                                    <option value="package"
                                                                        @if ($package->type == 'package') selected @endif>
                                                                        Package</option>
                                                                    <option value="vehicle"  @if ($package->type == 'vehicle') selected @endif>Vehicle</option>

                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="form-group ">

                                                            <label> Destination</label>
                                                            <select name="destination_id" id="destination_id"
                                                                class="form-control" required>
                                                                <option value="">--select destination--</option>
                                                                @foreach ($destinations as $destination)
                                                                    <option value="{{ $destination->id }}"
                                                                        @if ($destination->id == $package->destination_id) selected @endif>
                                                                        {{ $destination->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Duration</label>
                                                            <input type="text" name="duration" class="form-control"
                                                                value="{{ $package->duration }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Price</label>
                                                            <input type="number" name="price" class="form-control"
                                                                required value="{{ $package->price }}">
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12" id="addSelect">
                                                                <div class="form-group">
                                                                    <label class="ckbox ckbox-success">
                                                                        <input type="checkbox" name="deal_package"
                                                                            value="1" id="deal"
                                                                            @if ($package->discounted_price) checked @endif>
                                                                        <span>Deal/discount Package</span>
                                                                    </label>
                                                                    <label class="ckbox ckbox-success">
                                                                        <input type="checkbox" name="popular_package"
                                                                            value="1"
                                                                            @if ($package->deal == 1) checked @endif>
                                                                        <span>Popular Package</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" id="show"
                                                            @if ($package->discounted_price == null) style="display: none;" @endif>
                                                            <input type="number" name="discounted_price"
                                                                class="form-control"
                                                                value="{{ $package->discounted_price }}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- ./ row -->
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Thumbnail Image</label>
                                                <div class="image-input">
                                                    <input type="file" accept="image/*" id="imageInput1"
                                                        name="thumbnail">
                                                    <label for="imageInput1" class="image-button"><i
                                                            class="far fa-image"></i> Choose image</label>
                                                    <img src="" class="image-preview1">

                                                </div>
                                                <img src="{{ asset($package->thumbnail) }}" class="image-fluid"
                                                    width="100">

                                            </div>
                                            <div class="col-md-6">
                                                <label>Cover Image</label>
                                                <div class="image-input">
                                                    <input type="file" accept="image/*" id="imageInput2"
                                                        name="cover">
                                                    <label for="imageInput2" class="image-button"><i
                                                            class="far fa-image"></i> Choose image</label>
                                                    <img src="" class="image-preview2">

                                                </div>
                                                <img src="{{ asset($package->banner) }}" class="image-fluid"
                                                    width="100">

                                            </div>
                                        </div>
                                        {{-- <div class="row">
                            <div class="col-md-12">
                                <label >Gallery Image</label>
                                <div class="image-input">
                                    <input type="file" accept="image/*" id="imageInput3" name="gallery" >
                                    <label for="imageInput3" class="image-button"><i class="far fa-image"></i> Choose image</label>
                                    <img src="" class="image-preview3">

                                  </div>
                                </div>

                            </div> --}}

                                        <div class="row">

                                            <div class="col-md-12">
                                                <label>Trip Introduction:</label>
                                                <textarea name="overview" cols="30" rows="10" id="summernote">
                                  {{ $package->overview }}
                                </textarea>
                                            </div>

                                            <div class="col-md-12">
                                                <label>Outline itinerary:</label>
                                                <textarea name="outline_itinerary" cols="30" rows="10" id="summernote7">
                                  {{ $package->outline_itinerary }}

                                 </textarea>
                                            </div>


                                        </div>
                                    </div>
                                    <!-- ./ first tab ends -->
                                </div>
                                {{-- <div role="tabcard" class="tab-pane" id="profile">

                                    <div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Detailed itinerary:</label>
                                                <textarea name="detailed_itinerary" cols="30" rows="10" id="summernote1">

                                  {{ $package->detailed_itinerary }}

                                 </textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div role="tabcard" class="tab-pane" id="messages">

                                    <div>
                                        <div class="form-group">

                                            <label>Useful Info:</label>
                                            <textarea name="useful_info" cols="30" rows="10" id="summernote2">

                                  {{ $package->useful_info }}

                                 </textarea>
                                        </div>

                                    </div>
                                </div>
                                <div role="tabcard" class="tab-pane" id="faq">

                                    <div>
                                        <div class="form-group">

                                            <label>FAQ:</label>
                                            <textarea name="faq" cols="30" rows="10" id="summernote3">
                                {{ $package->faq }}

                            </textarea>
                                        </div>

                                    </div>
                                </div>
                                <div role="tabcard" class="tab-pane" id="settings">

                                    <div>
                                        <div class="form-group">
                                            <label>Whats Included:</label>
                                            <textarea name="include_exclude" cols="30" rows="10" id="summernote4">
                                {{ $package->include_exclude }}

                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Whats Excluded:</label>
                                            <textarea name="trip_excludes" cols="30" rows="10" id="summernote5">
                                {{ $package->trip_excludes }}

                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabcard" class="tab-pane" id="equipment">
                                    <div>
                                        <div class="form-group">
                                            <label>Equipments required:</label>
                                            <textarea name="equipment" cols="30" rows="10" id="summernote6">
                                {{ $package->equipment }}

                            </textarea>
                                        </div>
                                    </div>
                                </div> --}}

                                <div role="tabcard" class="tab-pane" id="seo">
                                    <div class="form-group">

                                        <label>Meta Title</label>
                                        <input type="text" name="page_title" class="form-control"
                                            value="{{ $package->page_title }} ">
                                    </div>
                                    <div class="form-group ">
                                        <label>Meta Keyword</label>
                                        <input type="text" name="meta_keywords" class="form-control"
                                            value="{{ $package->meta_keywords }} ">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Author</label>
                                        <input type="text" name="meta_author" class="form-control"
                                            value="{{ $package->meta_author }} ">
                                    </div>
                                    <div class="form-group ">
                                        <label>Meta Description</label>

                                        <textarea name="meta_description" cols="30" rows="5" class="form-control">
                            {{ $package->meta_description }}
                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- col-md-6 -->
                    </div>
                </form>
            </div>
        </div>
        <!-- row -->
    </div>
@endsection


@push('scripts')
    {{-- custom input fielsd file --}}
    <script>
        // Add the following code if you want the name of the file appear on select
        $('#imageInput1').on('change', function() {
            $input = $(this);

            if ($input.val().length > 0) {
                fileReader = new FileReader();
                fileReader.onload = function(data) {
                    $('.image-preview1').attr('src', data.target.result);
                }
                fileReader.readAsDataURL($input.prop('files')[0]);
                //   $('.image-button').css('display', 'none');
                $('.image-preview1').css('display', 'block');
                $('.change-image').css('display', 'block');
            }
        });


        // Add the following code if you want the name of the file appear on select
        $('#imageInput2').on('change', function() {

            $input = $(this);

            if ($input.val().length > 0) {
                fileReader = new FileReader();
                fileReader.onload = function(data) {
                    $('.image-preview2').attr('src', data.target.result);
                }
                fileReader.readAsDataURL($input.prop('files')[0]);
                //   $('.image-button').css('display', 'none');
                $('.image-preview2').css('display', 'block');
                $('.change-image').css('display', 'block');
            }
        });

        // Add the following code if you want the name of the file appear on select
        $('#imageInput3').on('change', function() {

            $input = $(this);

            if ($input.val().length > 0) {
                fileReader = new FileReader();
                fileReader.onload = function(data) {
                    $('.image-preview3').attr('src', data.target.result);
                }
                fileReader.readAsDataURL($input.prop('files')[0]);
                //   $('.image-button').css('display', 'none');
                $('.image-preview3').css('display', 'block');
                $('.change-image').css('display', 'block');
            }
        });


        if ($("#deal").attr("checked")) {
            $('#show').show();
        }
        $("#deal").click(function() {
            $('#show').slideToggle();
            $('#show').show();

        })


        function ajaxCategory() {
            category_destination = $('#all_category_destination').val();
            let arr = JSON.parse(category_destination)
            $('#destination_id').change(function() {
                var myCategory = $(this).val();
                newarr = arr.filter((item) => (item.destination_id == myCategory))
                let data = newarr.map(item => (
                    '<option value ="' + item.id + '">' + item.name + '</option>'
                ))
                $('#category_destination_id').html(data)
            })
        }

        ajaxCategory();
    </script>
@endpush
