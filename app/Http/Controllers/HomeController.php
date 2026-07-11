<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\House;
use App\Models\Like;
use App\Models\Overview;
use App\Models\HouseImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //base listing query with house images and the current user's like state
    private function overviewQuery()
    {
        return Overview::leftJoin('house_images', 'overviews.id', 'house_images.overview_id')
            ->select('overviews.*', 'house_images.overview_id as houseId', 'house_images.image as houseImg', 'house_images.price as housePrice')
            ->addSelect(['liked_by_user' => Like::selectRaw('1')
                ->whereColumn('likes.overview_id', 'overviews.id')
                ->where('likes.user_id', Auth::id())
                ->limit(1)]);
    }

    //For home page
    public function home()
    {
        $data = $this->overviewQuery()->paginate(6);
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
        Overview::findOrFail($id);
        Like::firstOrCreate([
            'user_id' => Auth::id(),
            'overview_id' => $id,
        ]);
        return back();
    }
    //for dislike button
    public function dislike($id)
    {
        Like::where('user_id', Auth::id())
            ->where('overview_id', $id)
            ->delete();
        return back();
    }
    //for sale button
    public function sale()
    {
        $data = $this->overviewQuery()
            ->where('type', 'SALE')
            ->paginate(6);
        return view('users.sale', compact('data'));
    }
    //for rent button
    public function rent()
    {
        $data = $this->overviewQuery()
            ->where('type', 'RENT')
            ->paginate(6);
        return view('users.rent', compact('data'));
    }

    // for search form
    public function search(Request $request)
    {
        $data = $this->overviewQuery()
            ->where('house_id', 'like', '%' . $request->property . '%')
            ->where(
                'type',
                'like',
                '%' . $request->type . '%'
            )
            ->where('discover', 'like', '%' . $request->discover . '%')
            ->where('bedrooms', 'like', '%' . $request->bedroom . '%')
            ->get();

        return view('users.query', compact('data'));
    }
    //for apartment
    public function apartment()
    {
        $data = $this->overviewQuery()
            ->where('house_id', 1)
            ->paginate(3);
        return view('users.apartment', compact('data'));
    }
    //for villa
    public function villa()
    {
        $data = $this->overviewQuery()
            ->where('house_id', 2)
            ->paginate(3);
        return view('users.villa', compact('data'));
    }
    //for townhouse
    public function townhouse()
    {
        $data = $this->overviewQuery()
            ->where('house_id', 3)
            ->paginate(3);
        return view('users.townhouse', compact('data'));
    }
    //for penthouse
    public function penthouse()
    {
        $data = $this->overviewQuery()
            ->where('house_id', 4)
            ->paginate(3);
        return view('users.penthouse', compact('data'));
    }
    //for retail
    public function retail()
    {
        $data = $this->overviewQuery()
            ->where('house_id', 5)
            ->paginate(3);
        return view('users.retail', compact('data'));
    }
}
