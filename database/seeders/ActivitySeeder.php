<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         TODO: можно сделать одним запросом, например используя стороннюю либу (https://github.com/efureev/laravel-trees). Но тестовых данных немного и сделал отдельными запросами
         */
        $food = Activity::query()->create([
            'title' => 'Еда'
        ]);
            Activity::query()->create([
                'title'     => 'Мясная продукция',
                'parent_id' => $food->id
            ]);
            Activity::query()->create([
                'title'     => 'Молочная продукция',
                'parent_id' => $food->id
            ]);

        $cars = Activity::query()->create([
            'title' => 'Автомобили'
        ]);
            Activity::query()->create([
                'title'     => 'Грузовые',
                'parent_id' => $cars->id
            ]);
        $passengerCars = Activity::query()->create([
                'title'     => 'Легковые',
                'parent_id' => $cars->id
            ]);
                Activity::query()->create([
                    'title'     => 'Запчасти',
                    'parent_id' => $passengerCars->id
                ]);
                Activity::query()->create([
                    'title'     => 'Аксессуары',
                    'parent_id' => $passengerCars->id
                ]);
    }
}
