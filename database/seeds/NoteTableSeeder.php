<?php

use Illuminate\Database\Seeder;
use App\Note;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Note::class)->times(100)->create(); // Create crea los modelos y los graba en la base de datos en un único paso. times especifica el nº de modelos a crear
    }
}
