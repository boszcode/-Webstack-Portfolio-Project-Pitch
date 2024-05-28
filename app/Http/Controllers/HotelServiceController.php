<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class HotelServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('repo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hotels = Auth::user()->hotels;
        return view('representative.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,Hotel $hotel)
    {
        return view('representative.create',compact('hotel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Hotel $hotel)
    {
        //
        $request->validate([
            'name' => 'required|string|min:3|regex:/^[a-zA-Z ]+$/u',
            'type' => 'required|string|min:3',
            'amount'=>'required|integer|min:0',
            'category'=>'required|string|min:2',
            'price'=>'required|numeric|min:0',
            'image'=>'sometimes|image|max:1024',
        ]);
        $path = 'photos/default_service.jpg';
        if($request->hasFile('image')){
            if($request->file('image')->isValid())
            {
                $path = Request()->file('image')->storePublicly('photos',['disk'=>'public']);
            }else{
                throw ValidationException::withMessages(['image'=>'Image not supported']);
            }
        }

        $service = HotelService::create([
            'name'=>$request->input('name'),
            'type'=>$request->input('type'),
            'amount'=>$request->input('amount'),
            'category'=>$request->input('category'),
            'price'=>$request->input('price'),
            'image'=>$path ,
            'hotel_id'=>$hotel->id,
        ]);
        return redirect(route('service.index'))->with('status','Service added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HotelService  $hotelService
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel,HotelService $service)
    {
        //
        return view('representative.show',compact('hotel','service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HotelService  $hotelService
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel, HotelService $service)
    {
        //
        return view('representative.edit',compact('hotel','service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HotelService  $hotelService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel, HotelService $service)
    {
        //
        $request->validate([
            'name' => 'required|string|min:3|regex:/^[a-zA-Z ]+$/u',
            'type' => 'required|string|min:3',
            'amount'=>'required|integer|min:0',
            'category'=>'required|string|min:2',
            'price'=>'required|numeric|min:0',
            'image'=>'sometimes|image|max:1024',
        ]);
        if($request->hasFile('image')){
            if($request->file('image')->isValid())
            {
                $prev = $service->image;
                if($prev!='photos/default_hotel.jpg')
                    $service->deleteProfilePhoto();
                $path = Request()->file('image')->storePublicly('photos',['disk'=>'public']);
                $service->update(['image'=> $path]);
            }
        }
        $service = $service->update([
            'name'=>$request->input('name'),
            'type'=>$request->input('type'),
            'amount'=>$request->input('amount'),
            'category'=>$request->input('category'),
            'price'=>$request->input('price'),
            'hotel_id'=>$hotel->id,
        ]);
        return redirect(route('service.index'))->with('status','Service updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelService  $hotelService
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel, HotelService $service)
    {
        //
        if($service->image!='photos/default_service.jpg'){
            $service->deleteProfilePhoto();
        }
        $service->delete();
        return redirect(route('service.index'))->with('Service deleted successfully');
    }
}
