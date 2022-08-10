<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\userResource;
use App\Models\users;
use App\Models\cars;
use App\Models\regions;
use App\Models\travels;

class userController extends Controller
{

    public function index()
    {
        $is = users::where('trash', '0')->count();
        $listData = userResource::collection(users::with(['getTravels', 'getCar'])->where('trash', '0')->orderBy('surname', 'asc')->get());
        $listData = json_encode($listData);
        return view('list', ['userList'=>$listData, 'is'=>$is]);
    }

    public function create()
    {
        return view('form', ['edit'=>false, 'cars'=>cars::all(), 'regions'=>regions::all()]);
    }

    public function store(Request $request)
    {
        users::insert(['name'=>$request->name, 'surname'=>$request->surname, 'male'=>$request->male, 'brith_date'=> $request->brith_date, 'mobile'=>$request->tel, 'car'=>$request->car]);
        $getId = users::where(['mobile'=>$request->tel])->first();
        travels::insert(['user_id'=>$getId->id, 'date'=>$request->travel_date, 'region'=>$request->region, 'count_days'=>$request->count_days]);
        return redirect('/');
        
    }

    public function edit($id)
    {
        $getUser = users::where(['id'=>$id])->first();
        $getTravel = travels::where(['user_id'=>$id])->orderBy('date', 'desc')->first();
        return view('form', ['edit'=>true, 'user'=>$getUser, 'travel'=>$getTravel, 'cars'=>cars::all(), 'regions'=>regions::all()]);
    }

    public function update(Request $request, $id)
    {
        users::where('id', $id)->update(['name'=>$request->name, 'surname'=>$request->surname, 'male'=>$request->male, 'brith_date'=> $request->brith_date, 'mobile'=>$request->tel, 'car'=>$request->car]);
        travels::where(['user_id'=>$id])->orderBy('date', 'desc')->update(['date'=>$request->travel_date, 'region'=>$request->region, 'count_days'=>$request->count_days]);
        return redirect('/');
    }

    public function sort(Request $request)
    {
        $is = users::where('trash', '0')->count();
        $listData = userResource::collection(users::with(['getTravels', 'getCar'])->where('trash', '0')->orderBy($request->sort_value, 'asc')->get());
        $listData = json_encode($listData);
        return view('list', ['userList'=>$listData, 'is'=>$is]);
    }

    public function destroy($id)
    {
        users::where('id', $id)->update(['trash'=>1]);
        return redirect('/');
    
    }
}
