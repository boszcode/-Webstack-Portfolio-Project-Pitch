<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class HotelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function all_hotels()
    {
        $hotels = Hotel::paginate(20);
        return view('hotel.index',compact('hotels'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all()->where('role','manager');
        return view('hotel.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required|string|unique:hotels|min:1|regex:/^[a-zA-Z ]+$/u|max:255',
            'location' => 'required|string|min:1|regex:/^[a-zA-Z ]+$/u|max:255',
            'image'=>'sometimes|image|max:1024',
            'star_level' => 'required|integer|min:0|max:10'
            ]);
        if(!User::find($request->input('user_id')) && $request->input('user_id')!="No User Yet"){
            throw ValidationException::withMessages([
                'user' => ['Select user correctly'],
            ]);
        }

        $user_id = $request->input('user_id')=='No User Yet'?null:$request->input('user_id');
        $hotel = Hotel::create([
            'name'=>$request->input('name'),
            'location'=>$request->input('location'),
            'star_level'=>$request->input('star_level'),
            'user_id' => $user_id,
        ]);

        if($request->hasFile('image')){
            if($request->file('image')->isValid())
            {
                $path = Request()->file('image')->storePublicly('photos',['disk'=>'public']);
                $hotel->update(['image'=> $path]);
            }
        }
        return redirect(route('hotels.index'))->with('status','Hotel registered successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
        return view('hotel.show',compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //

        $users = User::all()->where('role','manager');
        return view('hotel.edit',compact('hotel','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //

        $request->validate([
            'name' => ['required','string','min:1',Rule::unique('hotels')->ignore($hotel->id),'regex:/^[a-zA-Z ]+$/u','max:255'],
            'location' => 'required|string|min:1|regex:/^[a-zA-Z ]+$/u|max:255',
            'image'=>'sometimes|image|max:1024',
            'star_level' => 'required|integer|min:0|max:10'
        ]);
        if(!User::find($request->input('user_id')) && $request->input('user_id')!="No User Yet"){
            throw ValidationException::withMessages([
                'user' => ['Select user correctly'],
            ]);
        }
        $user_id = $request->input('user_id')=='No User Yet'?null:$request->input('user_id');

        if($request->hasFile('image')){
            if($request->file('image')->isValid())
            {
                $prev = $hotel->image;
                if($prev!='photos/default_user.jpg')
                    $hotel->deleteProfilePhoto();
                $path = Request()->file('image')->storePublicly('photos',['disk'=>'public']);
                $hotel->update(['image'=> $path]);
            }
        }
        $hotel->update([
            'name'=>$request->input('name'),
            'location'=>$request->input('location'),
            'star_level'=>$request->input('star_level'),
            'user_id'=>$user_id,
        ]);
        return redirect(route('hotels.index'))->with('status','Hotel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        //
        $hotel->delete();
        return redirect(route('hotels.index'))->with('status','Hotel deleted successfully');
    }
}
