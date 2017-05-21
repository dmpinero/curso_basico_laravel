<?php

namespace App\Http\Controllers;

use App\Note;

class NotesController extends Controller
{

    public function index() 
    {
		//$notes = Note::all();

        $notes = Note::paginate(10); // Paginación (Como primer argumento podemos poner el nº de registros por página)

		return view('notes/list', compact('notes'));
    }

    public function create()
    {
		return view('notes/create');
    }

    public function store()
    {

        $this->validate(request(), [
            'note' => ['required', 'max:200']
            ]);

    	$data = request()->all();

        Note::create($data);

        return redirect()->to('notes');

    }

    public function show($note)
    {
    	dd($note);
    }

}
