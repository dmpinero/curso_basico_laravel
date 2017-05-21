<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Note;


class NotesTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * Listado de notas
     *
     * @return void
     */
    public function test_notes_list()
    {

    	// Having
    	Note::create(['note' => 'My first note']);
    	Note::create(['note' => 'Second note']);

    	// When
        $this->visit('notes')
        	// Then
        	->see('My first note')
        	->see('Second note');
    }

    public function test_create_note()
    {
    	$this->visit('notes') 						// Al visitar la URL /notes
    		->click('Add a note')					// Pulsar en el botón con texto Add a note
    		->seePageIs('notes/create')				// Debe visualizarse la página
    		->see('Create a note')					// La página contiene el texto Create a note
    		->type('A new note', 'note') 			// Al introducir el texto A new note en el campo note
    		->press('Create a note')					// Pulsar en el botón Create note
    		->seePageIs('notes')					// Debe visualizarse la página
    		->see('A new note')						// La página contiene el texto A new note
    		->seeInDatabase('notes', [				// En base de datos existe una nota con el campo note con texto A new note	
    			'note' => 'A new note'
			]);
    }
}