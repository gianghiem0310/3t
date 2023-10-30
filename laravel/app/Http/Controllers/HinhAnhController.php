<?php

namespace App\Http\Controllers;

use App\Models\HinhAnh;
use Illuminate\Http\Request;

class HinhAnhController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HinhAnh $hinhAnh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HinhAnh $hinhAnh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HinhAnh $hinhAnh)
    {
        //
    }

    public function uploadmultiple(Request $request)
    {
        $count = 0;
        $files[] = $request->hinh;
        $images = $files[0];

        foreach ($images as $key => $value) {
            $image_name = 'images/'. self::myRandom() . now()->getTimestampMs() . '-' . 'hinhphong' . '.' . $value->extension();
            $value->move(public_path('images'), $image_name);
            $create = HinhAnh::create(['idPhong' => $request->idPhong, 'hinh' => $image_name]);
            if ($create!= null){
                $count++;
            }
        }
        if (count($images) == $count) {
            return 1;
        }
        return 0;
    }
    public function myRandom()
    {
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);
        return $string;
    }
}
