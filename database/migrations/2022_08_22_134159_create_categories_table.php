<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img');
            $table->timestamps();
        });

        $categories = [
            ['name' => 'Motori', 'img' => '/img/categories/motori.png'],
            ['name' => 'Informatica', 'img' => '/img/categories/informatica.png'],
            ['name' => 'Elettrodomestici', 'img' => '/img/categories/elettrodomestici.png'],
            ['name' => 'Libri', 'img' => '/img/categories/libri.png'],
            ['name' => 'Giochi', 'img' => '/img/categories/giochi.png'],
            ['name' => 'Sport', 'img' => '/img/categories/sport.png'],
            ['name' => 'Immobili', 'img' => '/img/categories/immobili.png'],
            ['name' => 'Telefoni', 'img' => '/img/categories/telefoni.png'],
            ['name' => 'Arredamento', 'img' => '/img/categories/arredamento.png'],
            ['name' => 'Musica', 'img' => '/img/categories/musica.png'],
            ['name' => 'Giardinaggio', 'img' => '/img/categories/giardinaggio.png'],
            ['name' => 'Animali', 'img' => '/img/categories/animali.png']
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'img' => $category['img']
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
