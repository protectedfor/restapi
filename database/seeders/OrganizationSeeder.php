<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $org1 = Organization::query()->create([
            'title'       => 'ООО “Восток и Партнеры”',
            'phones'      => ['2-345-678', '3-456-789', '8-923-123-45-67'],
            'building_id' => 1,
        ]);
        $org1->activities()->sync([2, 3]);

        $org2 = Organization::query()->create([
            'title'       => 'АО “Сибирь Инвест”',
            'phones'      => ['4-567-890', '5-678-901', '8-923-234-56-78'],
            'building_id' => 1,
        ]);
        $org2->activities()->sync([4, 5, 6]);

        $org3 = Organization::query()->create([
            'title'       => 'Фонд “Золотое Время”',
            'phones'      => ['6-789-012', '7-890-123', '8-923-345-67-89'],
            'building_id' => 1,
        ]);
        $org3->activities()->sync([5, 6]);

        $org4 = Organization::query()->create([
            'title'       => 'ПАО “Северная Коронка”',
            'phones'      => ['2-234-567', '3-345-678', '8-923-456-78-90'],
            'building_id' => 4,
        ]);
        $org4->activities()->sync([4, 6]);

        $org5 = Organization::query()->create([
            'title'       => 'ООО “Московская Традиция”',
            'phones'      => ['4-456-789', '5-567-890', '8-923-567-89-01'],
            'building_id' => 5,
        ]);
        $org5->activities()->sync([1, 4]);

    }
}
