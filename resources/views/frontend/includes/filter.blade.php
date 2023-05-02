
    <!-- filter Search  -->
    <section class="filter_search">
        <div class="container">
            <div class="search w-75 mx-auto" >
                <form action="{{route('search')}}" class="mt-2">
                    <div class="row justify-content-evenly align-items-center">
                        <div class="col-md-7 mb-4 mb-lg-0">
                                <input type="search" placeholder="Where are you going ?" id="location"
                                    class="form-control py-2 " name="keyword">
                        </div>
                   
                        
                        <div class="col-md-2 mb-4 mb-lg-0">
                            <div class="wrap">
                            <button class="btn btn_primary">
                                Search
                            </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>