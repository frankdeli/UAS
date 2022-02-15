<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Ebook extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ebooks = [
            [
                'title' => 'Introduction to Programming',
                'author' => 'Yal',
                'description' => 'Programming is coding like people always use that to make software like game, application and etc.'
            ],
            [
                'title' => 'Chemical',
                'author' => 'Arthur Jo',
                'description' => "Everything about sciencetific already include in here like molekul, atom, and etc."
            ],
            [
                'title' => 'Biology',
                'author' => 'Ta-Nehisi Coates',
                'description' => 'In Biology we learn everything in the world, like about our healthy, gen, DNA and etc.'
            ],
            [
                'title' => 'The Three Musketeers',
                'author' => 'Alexandre Dumas',
                'description' => " The Three Musketeers tells the story of the early adventures of the young Gascon gentleman, D'Artagnan and his three friends from the regiment of the King's Musketeers - Athos, Porthos and Aramis."
            ],
            [
                'title' => 'Software and Hardware',
                'author' => 'Josh Malerman',
                'description' => 'In here we learn every single item from software and hardware, the meaning of both of them and the example and functional.'
            ],
        ];

        DB::table('ebooks')->insert($ebooks);
    }
}
