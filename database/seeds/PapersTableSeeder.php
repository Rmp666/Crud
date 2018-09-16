<?php

use Illuminate\Database\Seeder;
use App\Paper; // Подключаем пользовательскую модель

class PapersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paper::create(
                [
                'title'    =>'Times',
                 'discr'   =>'What you doing',
                 'text'    =>'What you doing, when all people died?',
                 'contview'=>'2'
                ]
               );
        Paper::create(
                [
                'title'   =>'Magasines',
                'discr'   =>'In god we trust',
                'text'    =>'In god we trust, but where he is?',
                'contview'=>'8'
                ]
               );
        Paper::create(
                [
                'title'   =>'Forbes',
                'discr'   =>'How work 4 hours a week?',
                'text'    =>'How work 4 hours a week and dont die',
                'contview'=>'5'
                ]
               );
    }
}
