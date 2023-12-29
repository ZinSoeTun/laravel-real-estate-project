<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\House;
use App\Models\Overview;
use App\Models\HouseImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class HomeController extends Controller
{
    //For home page
    public function home()
    {
        $data =  Overview::leftJoin('house_images', 'overviews.id', 'house_images.overview_id')
            ->select('overviews.*', 'house_images.overview_id as houseId', 'house_images.image as houseImg', 'house_images.price as housePrice')
            ->paginate(6);
        $agentData =    Agent::get();
        return view('users.home', compact('data', 'agentData'));
    }
    //for home page house detail
    public function detail($id)
    {
        $houseImg =  HouseImages::where('overview_id', $id)->first();
        $houseDetail =   Overview::where('id', $id)->first();
        $houseProperty = House::where('id', $houseDetail->house_id)->first();
        $agent = Agent::where('id', $houseDetail->agent_id)->first();
        return view('users.houseDetail', compact('houseImg', 'houseDetail', 'agent', 'houseProperty'));
    }
    //for like button
    public function like($id)
    {
        Overview::where('id', $id)->update([
            'user_id' =>  Auth::user()->id
        ]);
        return back();
    }
    //for dislike button
    public function dislike($id)
    {
        Overview::where('id', $id)->update([
            'user_id' =>  0
        ]);
        return back();
    }
    //for sale button
    public function sale()
    {
        $data =  Overview::leftJoin('house_images', 'overviews.id', 'house_images.overview_id')
        ->where('type', 'SALE')
        ->select('overviews.*', 'house_images.overview_id as houseId', 'house_images.image as houseImg', 'house_images.price as housePrice')
        ->paginate(6);
        return view('users.sale', compact('data'));
    }
    //for rent button
    public function rent()
    {
        $data =  Overview::leftJoin('house_images', 'overviews.id', 'house_images.overview_id')
        ->where('type', 'RENT')
        ->select('overviews.*', 'house_images.overview_id as houseId', 'house_images.image as houseImg', 'house_images.price as housePrice')
        ->paginate(6);
        return view('users.rent', compact('data'));
    }

    // for search form
    public function search(Request $request)
    {
        $data =  Overview::leftJoin('house_images', 'overviews.id', 'house_images.overview_id')
            ->where('house_id', 'like', '%' . $request->property . '%')
            ->where(
                'type',
                'like',
                '%' . $request->type . '%'
            )
            ->where('discover', 'like', '%' . $request->discover . '%')
            ->where('bedrooms', 'like', '%' . $request->bedroom . '%')
            ->select('overviews.*', 'house_images.overview_id as houseId', 'house_images.image as houseImg', 'house_images.price as housePrice')
            ->get();

        return view('users.query', compact('data'));
    }
    //for apartment
    public function apartment()
    {
        $data =  Overview::leftJoin('house_images', 'overviews.id', 'house_images.overview_id')
            ->where('house_id', 1)
            ->select('overviews.*', 'house_images.overview_id as houseId', 'house_images.image as houseImg', 'house_images.price as housePrice')
            ->paginate(3);
        return view('users.apartment', compact('data'));
    }
    //for villa
    public function villa()
    {
        $data =  Overview::leftJoin('house_images', 'overviews.id', 'house_images.overview_id')
            ->where('house_id', 2)
            ->select('overviews.*', 'house_images.overview_id as houseId', 'house_images.image as houseImg', 'house_images.price as housePrice')
            ->paginate(3);
        return view('users.villa', compact('data'));
    }
    //for townhouse
    public function townhouse()
    {
        $data =  Overview::leftJoin('house_images', 'overviews.id', 'house_images.overview_id')
            ->where('house_id', 3)
            ->select('overviews.*', 'house_images.overview_id as houseId', 'house_images.image as houseImg', 'house_images.price as housePrice')
            ->paginate(3);
        return view('users.townhouse', compact('data'));
    }
    //for penthouse
    public function penthouse()
    {
        $data =  Overview::leftJoin('house_images', 'overviews.id', 'house_images.overview_id')
            ->where('house_id', 4)
            ->select('overviews.*', 'house_images.overview_id as houseId', 'house_images.image as houseImg', 'house_images.price as housePrice')
            ->paginate(3);
        return view('users.penthouse', compact('data'));
    }
    //for retail
    public function retail()
    {
        $data =  Overview::leftJoin('house_images', 'overviews.id', 'house_images.overview_id')
            ->where('house_id', 5)
            ->select('overviews.*', 'house_images.overview_id as houseId', 'house_images.image as houseImg', 'house_images.price as housePrice')
            ->paginate(3);
        return view('users.retail', compact('data'));
    }
}
