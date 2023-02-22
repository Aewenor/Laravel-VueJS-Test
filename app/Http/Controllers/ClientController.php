<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $clients = Client::orderBy('id','desc')->paginate(5);
        return view('clients.index', compact('clients'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('clients.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        
        Client::create($request->post());

        return redirect()->route('clients.index')->with('success','Client has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $client
    * @return \Illuminate\Http\Response
    */
    public function show(Client $client)
    {
        return view('clients.show',compact('company'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Client  $client
    * @return \Illuminate\Http\Response
    */
    public function edit(Client $client)
    {
        return view('clients.edit',compact('company'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $client
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        
        $client->fill($request->post())->save();

        return redirect()->route('clients.index')->with('success','Client Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Client  $client
    * @return \Illuminate\Http\Response
    */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success','Client has been deleted successfully');
    }
}
