<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\House;
use Image;
use App\Land;
use App\Building;

class PropertyController extends Controller
{
    public function addHouse(Request $request){

        $request->validate([
            'name' => 'required|max:30|min:3',
            'type' => 'required',
            'amount' => 'required',
            'city' => 'required',
            'postalcode' => 'required|integer',
            'province' => 'required',
            'description' => 'required',
            'contactno' => 'required',
            'contactemail' => 'email|required',
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'lat' => 'required',
            'lat' => 'required',
            'rooms' => 'required|integer',
            'kitchen' => 'required|integer',
            'floor' => 'required|integer',
            'washroom' => 'required|integer',
            'size' => 'required|integer',
            'swimming' => 'required',
            'garden' => 'required',
            'nschool' => 'required',
            'nrailway' => 'required',
            'nbus' => 'required'
            
        ]);

        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name= time() . '.' . $image->getClientOriginalExtension();
                //$image->move(public_path().'/uploads/property/house', $name);
                Image::make($image)->resize(1280,876)->save(\public_path('/uploads/property/house/' . $name));  
                $data[] = $name;  
            }
         }

        $property = new Property;
        $property->user_id = auth()->id();
        $property->name = request('name');
        $property->type = request('type');
        $property->amount = request('amount');
        $property->city = request('city');
        $property->postalCode = request('postalcode');
        $property->province = request('province');
        $property->description = request('description');
        $property->contactNo = request('contactno');
        $property->contatctEmail = request('contactemail');
        $property->images =json_encode($data);
        $property->latitude = request('lat');
        $property->longitude = request('lng');
        $property->save();

        $house = new House;
        $house->property()->associate($property);
        $house->noOfRooms = request('rooms');
        $house->noOfKitchen = request('kitchen');
        $house->noOfFloors = request('floor');
        $house->noOfWashrooms = request('washroom');
        $house->size = request('size');
        $house->swimmingPool = request('swimming');
        $house->garden = request('garden');
        $house->nearestSchool = request('nschool');
        $house->nearestRailway = request('nrailway');
        $house->nearestBusStop = request('nbus');
        $house->save();

        return back();

    }

    public function addLand(Request $request){

        $request->validate([
            'name' => 'required|max:30|min:3',
            'type' => 'required',
            'amount' => 'required',
            'city' => 'required',
            'postalcode' => 'required|integer',
            'province' => 'required',
            'description' => 'required',
            'contactno' => 'required',
            'contactemail' => 'email|required',
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'lat' => 'required',
            'lat' => 'required',
            'size' => 'required|integer',
            'electricity' => 'required',
            'tapwater' => 'required',
            'nschool' => 'required',
            'nrailway' => 'required',
            'nbus' => 'required'
            
        ]);

        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name= time() . '.' . $image->getClientOriginalExtension();
                //$image->move(public_path().'/uploads/property/house', $name);
                Image::make($image)->resize(1280,876)->save(\public_path('/uploads/property/land/' . $name));  
                $data[] = $name;  
            }
         }

        $property = new Property;
        $property->user_id = auth()->id();
        $property->name = request('name');
        $property->type = request('type');
        $property->amount = request('amount');
        $property->city = request('city');
        $property->postalCode = request('postalcode');
        $property->province = request('province');
        $property->description = request('description');
        $property->contactNo = request('contactno');
        $property->contatctEmail = request('contactemail');
        $property->images =json_encode($data);
        $property->latitude = request('lat');
        $property->longitude = request('lng');
        $property->save();

        $land = new Land;
        $land->property()->associate($property);
        $land->size = request('size');
        $land->electricity = request('electricity');
        $land->tapwater = request('tapwater');
        $land->nearestSchool = request('nschool');
        $land->nearestRailway = request('nrailway');
        $land->nearestBusStop = request('nbus');
        $land->save();

        return back();

    }

    public function addBuilding(Request $request){

        $request->validate([
            'name' => 'required|max:30|min:3',
            'type' => 'required',
            'amount' => 'required',
            'city' => 'required',
            'postalcode' => 'required|integer',
            'province' => 'required',
            'description' => 'required',
            'contactno' => 'required',
            'contactemail' => 'email|required',
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'lat' => 'required',
            'lat' => 'required',
            'lift' => 'required',
            'carpark' => 'required',
            'floorsize' => 'required|integer',
            'floor' => 'required|integer',
            'agreement' => 'required',
            'nschool' => 'required',
            'nrailway' => 'required',
            'nbus' => 'required'
            
        ]);

        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name= time() . '.' . $image->getClientOriginalExtension();
                //$image->move(public_path().'/uploads/property/house', $name);
                Image::make($image)->resize(1280,876)->save(\public_path('/uploads/property/building/' . $name));  
                $data[] = $name;  
            }
         }

        $property = new Property;
        $property->user_id = auth()->id();
        $property->name = request('name');
        $property->type = request('type');
        $property->amount = request('amount');
        $property->city = request('city');
        $property->postalCode = request('postalcode');
        $property->province = request('province');
        $property->description = request('description');
        $property->contactNo = request('contactno');
        $property->contatctEmail = request('contactemail');
        $property->images =json_encode($data);
        $property->latitude = request('lat');
        $property->longitude = request('lng');
        $property->save();

        $building = new Building();
        $building->property()->associate($property);
        $building->agreement = request('agreement');
        $building->noOfFloors = request('floor');
        $building->floorSize = request('floorsize');
        $building->lift = request('lift');
        $building->carpark = request('carpark');
        $building->nearestSchool = request('nschool');
        $building->nearestRailway = request('nrailway');
        $building->nearestBusStop = request('nbus');
        $building->save();

        return back();

    }
}