<?php

namespace App\Services;

use App\Models\Category;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;

class CategoryService
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  array  $values
     * @return bool
     * @return void
     */



    function store($data)
    {
        // $insert = DB::table('categories')->insert([
        //     'name_user'=>$data['name_user'],
        //     'address_user' => $data['address_user'],
        //     'city_user' => $data['city_user']
        // ]);
        $insert = Category::create([
            'name_user' => $data['name'],
            'address_user' => $data['address'],
            'city_user' => $data['city'],         
        ]);

        return $insert;
    }
}

?>
