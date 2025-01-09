<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;
use MatanYadaev\EloquentSpatial\Objects\Point;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Тестовые данные Зданий, необходимо добавлять через модель по-отдельности. При массовом заполнении (используя метод insert) не отрабатывает setter для поля coordinates
        Building::query()->create([
            'address'     => 'улица Ленина, 1, офис 3',
            'coordinates' => new Point(55.600170, 37.165675, 4326)
        ]);
        Building::query()->create([
            'address'     => 'улица Труда, 5',
            'coordinates' => new Point(55.602678, 37.171909, 4326)
        ]);
        Building::query()->create([
            'address'     => 'Майская улица, 2Б',
            'coordinates' => new Point(55.599596, 37.173580, 4326)
        ]);
        Building::query()->create([
            'address'     => 'Линейный проезд, 18/2',
            'coordinates' => new Point(55.602535, 37.177811, 4326)
        ]);
        Building::query()->create([
            'address'     => 'Минская улица, 1А',
            'coordinates' => new Point(55.604987, 37.172807, 4326)
        ]);
    }
}
