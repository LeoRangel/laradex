<?php

namespace Projeto\Http\Controllers;

use Projeto\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Projeto\Http\Requests\StoreTrainerRequest;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRole(['user', 'admin' ]); //(['user', 'admin' ])

        $trainers = Trainer::all();

        return view('trainers.index', compact('trainers'));
        // return view('trainers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRequest $request)
    {
        // $validateData = $request->validate([
        //     'name' => 'required|max: 10',
        //     'avatar' => 'required|image',
        //     'slug' => 'required'

        // ]);
        
        
        $trainer = new Trainer();

        if($request->hasFile('avatar')){ //imagem
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }

        $trainer->name = $request->input('name');
        $trainer->avatar = $name;
        $trainer->slug = $request->input('slug');
        // $trainer->slug = ($request->input('name')). time(); //para slug altomatico
        $trainer->save();

        return redirect()->route('trainers.index');
        // return 'Saved';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer) //usando implicing binding
    // public function show($slug)
    {
        //$trainer = Trainer::find($id);
        
        // $trainer = Trainer::where('slug', '=', $slug)->firstOrFail(); //first... lança uma exeção se nao encontrar

        return view('trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $trainer->fill($request->except('avatar')); //$request->all() atualiza todos os atributos de uma vez
        
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $trainer->avatar = $name;
            $file->move(public_path().'/images/', $name);
        }

        $trainer->save();
        
        return redirect()->route('trainers.show', [$trainer])->with('status', 'The trainer is updated.');
        
        // return 'updated';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $file_path = public_path().'/images/'.$trainer->avatar;
        \File::delete($file_path);

        $trainer->delete();
        
        return redirect()->route('trainers.index');
        // return 'deleted';
    }
}
