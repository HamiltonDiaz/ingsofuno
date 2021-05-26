<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductSeeder extends Seeder
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
                'nombre'=>"Queso mozzarella tajado",
                'img'=>"https://www.miaguila.com/tiendas/d1/products/12000084.png",
                'precio_actual'=>6680,
                'precio_anterior'=>5000,
                'cantidad'=>100,
                'active'=>"on",
                'eliminado'=>0,          
            ],
            [
                'nombre'=>"TOMATE CHONTO UNIDAD",
                'img'=>"https://www.lovemysalad.com/sites/default/files/styles/image_415x281/public/tomates_-_vladimir_morozov.jpg?itok=gU1-XJyE",
                'precio_actual'=>780,
                'precio_anterior'=>690,
                'cantidad'=>1000,
                'active'=>"on",
                'eliminado'=>0,  
            ],
            [
                'nombre'=>"Servilletas acolchamax famitaco medianas x 300 und FAMILIA",
                'img'=>"https://images.ctfassets.net/tcoigcjw85h2/7wKKZVr1b9as1hc5D8viHC/ff80e95e5075a7f88109bd6e31d52790/X220-SERVILLETAS-FAMILIA-PRACTI-DIARIAS.png",
                'precio_actual'=>5380,
                'precio_anterior'=>5450,
                'cantidad'=>500,
                'active'=>"on",
                'eliminado'=>0,  
            ],
            [
                'nombre'=>"Leche Alqueria Deslactosada Sixpack x 1300 Ml c.u",
                'img'=>"https://jumbocolombiafood.vteximg.com.br/arquivos/ids/3295314-1000-1000/7702177007341-1.jpg?v=636646649212300000",
                'precio_actual'=>19900,
                'precio_anterior'=>21000,
                'cantidad'=>350,
                'active'=>"on",
                'eliminado'=>0,  
            ],
            [
                'nombre'=>"Gaseosa COCA COLA Sabor Original 1500ml ",
                'img'=>"https://i1.wp.com/www.licoresmedellin.com/wp-content/uploads/2017/10/Cocacola-3lts-Licores_Medellin-.jpg?fit=600%2C800&ssl=1",
                'precio_actual'=>3500,
                'precio_anterior'=>3800,
                'cantidad'=>150,
                'active'=>"on",
                'eliminado'=>0,  
            ],
            [
                'nombre'=>"Avena en hojuelas original megabolsa x 960 g",
                'img'=>"https://exitocol.vtexassets.com/arquivos/ids/1818183-800-auto?width=800&height=auto&aspect=true",
                'precio_actual'=>8650,
                'precio_anterior'=>9325,
                'cantidad'=>230,
                'active'=>"on",
                'eliminado'=>0,  
            ],
            
        );

        foreach ($lines as $line) {
            Product::updateOrCreate($line);
        }
    }
}
