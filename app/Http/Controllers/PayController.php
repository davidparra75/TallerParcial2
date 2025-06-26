<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pay;

class PayController extends Controller
{
    public function index()
    {
        $pays = Pay::all();
        return view('pays.index')->with('pays',$pays);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $pay = new Pay;
        $pay -> user_id = auth()->id();
        $pay -> date = $request->date;
        $pay -> value = $request->value;
        $pay -> save();
        
        return redirect()-> route('pays.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $pay = Pay::find($id);
        return view('pays.edit')->with('pay',$pay);
    }

    public function update(Request $request, $id)
    {
        $pay = Pay::find($id);
        $pay->date = $request->date;
        $pay->value = $request->value;
        $pay->save();
        return redirect()->route('pays.index');
    }

    public function destroy($id)
    {
        $pay = Pay::find($id);
        $pay-> delete();
        return redirect()->route('pays.index');
    }
}
