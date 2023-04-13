<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specialization::create([
            'name'=>'Курьерские услуги',
            'picture'=>'https://youdo.com/_next/static/media/courier.6971270f720bd6aa114518e07680b880.svg',
        ]);

        Specialization::create([
            'name'=>'Грузоперевозки',
            'picture'=>'https://youdo.com/_next/static/media/trucking.daf0dd8d1c590afa4906ed52e9f5a461.svg',
        ]);

        Specialization::create([
            'name'=>'Ремонт и строительство',
            'picture'=>'https://youdo.com/_next/static/media/clerical.e7a5bf585044ad571b3fed637e032ff0.svg',
        ]);

        Specialization::create([
            'name'=>'Разработка ПО',
            'picture'=>'https://youdo.com/_next/static/media/webdevelopment.1ac7d2c0090f12cf63059cf3891fa871.svg',
        ]);

        Specialization::create([
            'name'=>'Фото и видео',
            'picture'=>'https://youdo.com/_next/static/media/photoshop.5e02010129d3a3ee19c53f4c4b065a58.svg',
        ]);

        Specialization::create([
            'name'=>'Репетиторы и образование',
            'picture'=>'https://youdo.com/_next/static/media/teaching.2419bc13068882c724b93a9c3d70a5fa.svg',
        ]);

        Specialization::create([
            'name'=>'Юридическая помощь',
            'picture'=>'https://youdo.com/_next/static/media/legaladvice.9917bdd78f1c9fb670d4b0fc4c6a7400.svg',
        ]);

        Specialization::create([
            'name'=>'Мероприятия',
            'picture'=>'https://youdo.com/_next/static/media/promo.5a6e7808b9cc7292677969a37307e4fd.svg',
        ]);

        Specialization::create([
            'name'=>'Уборка и помощь по хозяйству',
            'picture'=>'https://youdo.com/_next/static/media/house.9dcd32d86419657b56b47508d1532e8b.svg',
        ]);

        Specialization::create([
            'name'=>'Ремонт цифровой техники',
            'picture'=>'https://youdo.com/_next/static/media/electronicrepair.e8803a935db8c16701bbcac50f2796f8.svg',
        ]);
    }
}
