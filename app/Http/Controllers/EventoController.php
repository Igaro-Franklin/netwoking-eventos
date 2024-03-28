<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    public function index(){
    
        $eventos = Evento::all();
    
        return view('welcome', ['eventos' => $eventos]);
            
    }

    public function criar(){
        return view('eventos.criar');
    }

    public function store(Request $request){
        $evento = new Evento;

        $evento->title = $request->title;
        $evento->city = $request->city;
        $evento->private = $request->private;
        $evento->description = $request->description;

        // upload de imagens

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/eventos'), $imageName);

            $evento->image = $imageName;
        }

        $evento->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id){

        $evento = Evento::findOrFail($id);

        return view('eventos.show', ['evento' => $evento]);
    }
}
