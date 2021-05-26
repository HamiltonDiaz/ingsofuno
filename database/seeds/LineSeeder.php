<?php

use Illuminate\Database\Seeder;
use App\Line;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lines= array(
            [
                'nombre'=>"Roa",                
            ],
            [
                'nombre'=>"Florhuila"
            ],
            [
                'nombre'=>"Popular",                
            ],
            [
                'nombre'=>"Exito"
            ],
            [
                'nombre'=>"La muñeca",                
            ],
            [
                'nombre'=>"Doria"
            ],
        );

        foreach ($lines as $line) {
            Line::updateOrCreate($line);
        }
    }
}
