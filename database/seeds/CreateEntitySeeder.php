<?php

use Illuminate\Database\Seeder;
use App\Entity;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CreateEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entity = [

            [
               'user_id'=>'2',
               'title'=>'asd_1',
               'description_short'=>'description_short',
               'published'=> Carbon::now()->toDateTimeString(),
               'is_active'=> '1',
               'slug'=>Str::slug( 'asd_1' . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-'),

            ],
            [
                'user_id'=>'2',
                'title'=>'asd_2',
                'description_short'=>'description_short',
                'published'=> Carbon::now()->toDateTimeString(),
                'is_active'=> '1',
                'slug'=>Str::slug( 'asd_2' . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-'),

             ],
             [
                'user_id'=>'2',
                'title'=>'asd_3',
                'description_short'=>'description_short',
                'published'=> Carbon::now()->toDateTimeString(),
                'is_active'=> '0',
                'slug'=>Str::slug( 'asd_3' . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-'),

             ],
             [
                'user_id'=>'2',
                'title'=>'asd_4',
                'description_short'=>'description_short',
                'published'=> Carbon::now()->toDateTimeString(),
                'is_active'=> '0',
                'slug'=>Str::slug( 'asd_4' . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-'),

             ],



        ];
        foreach ($entity as $key => $value) {

            Entity::create($value);

        }

    }

}
