<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entity = auth()->user()->entitys()->latest()->paginate(10);

        return view('entity.index',compact('entity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $entity = new Entity;

        return view('entity.create',compact('entity'));
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
        'title' => 'required|max:255',
        ]);

        $entity = Entity::create([
            'user_id'=>$request->get('user_id'),
            'slug'=>Str::slug( $request->get('title') . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-'),
            'title'=>$request->get('title'),
            'description_short'=>$request->get('description_short'),
            'description'=>$request->get('description'),

        ]);
        return redirect()->route('entity.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entity = Entity::find($id);

        return view('entity.show',compact('entity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entity = Entity::find($id);

        return view('entity.edit',compact('entity'));
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
        $request->validate([
            'title' => 'required|max:255',
            ]);
        // $entity->user_id=$request->get('user_id');
        $entity = Entity::find($id);
        
        $entity->title=$request->get('title');
        $entity->description_short=$request->get('description_short');
        $entity->description=$request->get('description');

        $entity->save();

        return redirect()->route('entity.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entity = Entity::find($id);

        $entity->delete();
        return redirect()->back();
    }
}
