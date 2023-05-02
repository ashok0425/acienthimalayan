<?php

namespace App\Http\Controllers\BackEnd\Travel;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use App\Models\CategoryDestination;
use App\Models\CategoryPlace;
use App\Models\Destination;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use File;

class PackagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::orderBy('created_at', 'desc')->get();

        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = Destination::orderBy('name')->get();
        return view('admin.packages.create', compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $url = $this->toAscii($request->name);
        $this->validate($request, [
            'name' => 'required|min:3|max:255|unique:packages',
            'destination_id' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $package = new Package;
            $package->name = $request->name;
            $package->trip_id = $request->trip_id;
            $package->popular_package = $request->popular_package;
            $package->destination_id = $request->destination_id;
            $package->category_place_id = ($request->category_place_id) ? $request->category_place_id : null;
            $package->category_destination_id = $request->category_destination_id;
            $package->status = 1;
            $package->duration = $request->duration;
            $package->difficulty = $request->difficulty;
            $package->max_altitude = $request->max_altitude;
            $package->url = ($request->url) ? $request->url : $url;
            $package->outline_itinerary = $request->outline_itinerary;
            $package->detailed_itinerary = $request->detailed_itinerary;
            $package->include_exclude = $request->include_exclude;
            $package->trip_excludes = $request->trip_excludes;
            $package->useful_info = $request->useful_info;
            $package->equipment = $request->equipment;
            $package->order = $request->order;
            $package->activity = $request->activity;
            $package->meals = $request->meals;
            $package->room = $request->room;
            $package->transport = $request->transport;
            $package->best_month = $request->best_month;
            $package->group_size = $request->group_size;
            $package->faq = $request->faq;
            if ($request->price) $package->price = $request->price;
            $package->rating = $request->rating;
            if ($request->discounted_price) $package->discounted_price = $request->discounted_price;
            $package->overview = $request->overview;
            $package->important_notes = $request->important_notes;
            $package->physical_condition = $request->physical_condition;
            $package->additional_info = $request->additional_info;
            $package->slogan = $request->slogan;
            $package->arrival = $request->arrival;
            $package->departure_from = $request->departure_from;
            $package->fitness_level = $request->fitness_level;
            $package->page_title = $request->page_title;
            $package->meta_keywords = $request->meta_keywords;
            $package->meta_author = $request->meta_author;
            $package->meta_description = $request->meta_description;
            $package->video = $request->video;

            $banner = $request->file('thumbnail');
            if ($banner) {
                $fname = rand() . $request->name . $banner->getClientOriginalExtension();
                $package->thumbnail = 'upload/package/thumbnail/' . $fname;
                $banner->move(public_path() . '/upload/package/thumbnail/', $fname);
            }

            $roadmap = $request->file('cover');
            if ($roadmap) {
                $fname = rand() . $request->name . $roadmap->getClientOriginalExtension();
                $package->banner = 'upload/package/banner/' . $fname;
                $roadmap->move(public_path() . '/upload/package/banner/', $fname);
            }
            $package->save();
            if (isset($request->featured_package)) {
                foreach ($request->featured_package as $value) {
                    DB::table('package_featured')->insert(['package_id' => $package->id, 'featured_id' => $value]);
                }
            }
            DB::commit();
            $notification = array(
                'alert-type' => 'success',
                'messege' => 'Successfully Added package.',

            );
        } catch (QueryException $e) {
            return $e->getMessage();
            DB::rollback();
            $notification = array(
                'alert-type' => 'error',
                'messege' => 'Failed to Add package, Try again.',

            );
        }

        return redirect()->route('admin.categories-packages.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $featured_package = Package::where('status', 1)->orderBy('name')->get();
        $package = Package::findOrFail($id);
        $destinations = Destination::orderBy('name')->get();
        return view('admin.packages.edit', compact('package', 'destinations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $url = $this->toAscii($request->name);


        $this->validate($request, [
            'name' => 'required|min:3|max:255|unique:packages,name,' . $id,
            'destination_id' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $package = Package::findOrFail($id);
            $package->name = $request->name;
            $package->trip_id = $request->trip_id;
            $package->popular_package = $request->popular_package;

            // $package->category_id = ($request->category_id == "")? null : $request->category;;
            $package->destination_id = $request->destination_id;
            $package->category_place_id = ($request->category_place_id) ? $request->category_place_id : null;
            $package->category_destination_id = $request->category_destination_id;
            $package->status = 1;
            $package->duration = $request->duration;
            $package->difficulty = $request->difficulty;
            $package->max_altitude = $request->max_altitude;
            // $package->min_people_required = $request->min_people_required;
            $package->url = ($request->url) ? $request->url : $url;
            $package->outline_itinerary = $request->outline_itinerary;
            $package->detailed_itinerary = $request->detailed_itinerary;
            $package->include_exclude = $request->include_exclude;
            $package->trip_excludes = $request->trip_excludes;
            $package->useful_info = $request->useful_info;
            $package->equipment = $request->equipment;
            $package->order = $request->order;
            $package->activity = $request->activity;
            $package->meals = $request->meals;
            $package->room = $request->room;
            $package->transport = $request->transport;
            $package->best_month = $request->best_month;
            $package->group_size = $request->group_size;
            $package->faq = $request->faq;
            if ($request->price) $package->price = $request->price;
            $package->rating = $request->rating;
            if ($request->discounted_price) $package->discounted_price = $request->discounted_price;
            $package->overview = $request->overview;
            $package->important_notes = $request->important_notes;
            $package->physical_condition = $request->physical_condition;
            $package->additional_info = $request->additional_info;
            $package->slogan = $request->slogan;
            $package->arrival = $request->arrival;
            $package->departure_from = $request->departure_from;
            $package->fitness_level = $request->fitness_level;
            $package->page_title = $request->page_title;
            $package->meta_keywords = $request->meta_keywords;
            $package->meta_author = $request->meta_author;
            $package->meta_description = $request->meta_description;
            $package->video = $request->video;



            $banner = $request->file('thumbnail');
            if ($banner) {
                File::delete($package->thumbnail);
                $fname = rand() . $request->name . $banner->getClientOriginalExtension();
                $package->thumbnail = 'upload/package/thumbnail/' . $fname;
                $banner->move(public_path() . '/upload/package/thumbnail/', $fname);
            }

            $roadmap = $request->file('cover');
            if ($roadmap) {
                File::delete($package->banner);
                $fname = rand() . $request->name . $roadmap->getClientOriginalExtension();
                $package->banner = 'upload/package/banner/' . $fname;
                $roadmap->move(public_path() . '/upload/package/banner/', $fname);
            }


         


            $package->save();

            if (isset($request->featured_package)) {
                foreach ($request->featured_package as $value) {
                    DB::table('package_featured')->insert(['package_id' => $package->id, 'featured_id' => $value]);
                }
            }
            DB::commit();
            $notification = array(
                'alert-type' => 'success',
                'messege' => 'Successfully updated package.',

            );
        } catch (QueryException $e) {
            return $e->getMessage();
            DB::rollback();
            $notification = array(
                'alert-type' => 'error',
                'messege' => 'Failed to updated package, Try again.',

            );
        }

        return redirect()->route('admin.categories-packages.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $package = Package::findOrFail($id);
            $package->delete();

            $notification = array(
                'alert-type' => 'success',
                'messege' => ' package Deleted.',

            );

            return redirect()->route('admin.categories-packages.index')->with($notification);
        } catch (QueryException $e) {
            $notification = array(
                'alert-type' => 'error',
                'messege' => 'Failed to delete package, Try again.',

            );
            return redirect()->route('admin.categories-packages.index')->with($notification);
        }
    }

    // public function removeImage($id, Request $request) {
    //     $pacakge_image = PackageImage::findOrFail($id);
    //     $pacakge_image->deleteImage();
    //     $pacakge_image->delete();

    //     return response()->json(['status' => 'success']);
    // }

    private function toAscii($str)
    {
        $clean = preg_replace('~[^\\pL\d]+~u', '-', $str);
        $clean = strtolower(trim($clean, '-'));

        return $clean;
    }
}
