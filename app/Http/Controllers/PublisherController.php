<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::all();
        return view('publisher.publisherIndex', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');

        return view('publisher.publisherForm');
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
            'nombre' => 'required|min:3|max:255',
            'telefono' => 'required|min:5|max:15',
            'pais' => 'required|min:4|max:25',
            'ciudad' => 'required|min:4|max:25',
            'email' => 'required|min:10|max:255|unique:publishers,email',
        ]);
        Publisher::create($request->all());
        return redirect()->route('publisher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        $this->authorize('view');
        
        return view('publisher.publisherShow', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        return view('publisher.publisherForm', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publisher $publisher)
    {
        if( $request->user()->cannot('update', $publisher )){
            abort(403);
        }

        // $publisher->element = $request->element; that's the general form as an alternative to update
        // $publisher->save();
        $request->validate([
            'nombre' => ['required','min:3','max:255'],
            'telefono' => ['required','min:5','max:15'],
            'pais' => ['required','min:4','max:25'],
            'ciudad' => ['required','min:4','max:25'],
            'email' => ['required','min:10','max:255',Rule::unique('publishers')->ignore($publisher->id)],
        ]);
        Publisher::where('id',$publisher->id)->update($request->except('_token','_method'));
        return redirect()->route('publisher.show', $publisher);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('publisher.index');
    }
}
