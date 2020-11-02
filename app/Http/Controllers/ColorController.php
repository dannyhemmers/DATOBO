<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColorController extends Controller
{

    public function createRandomColor()
    {
        $arr = array();
        
        for($i = 0; $i < 9; $i++)
        {
            $colorObject = new \stdClass();

            $red = str_pad(strval(rand(0,255)), 3, "0", STR_PAD_LEFT);
            $green = str_pad(strval(rand(0,255)), 3, "0", STR_PAD_LEFT);
            $blue = str_pad(strval(rand(0,255)), 3, "0", STR_PAD_LEFT);

            $colorObject->red = $red;
            $colorObject->green = $green;
            $colorObject->blue = $blue;
            $colorObject->color = 'rgb('. $red .', '. $green .', '. $blue .')';
            $colorObject->hex = '#' . $this->toHexString($red) . $this->toHexString($green) . $this->toHexString($blue);
            $colorObject->colorcomp = 'rgb('. $this->calcCompColor($red) .', '. $this->calcCompColor($green) .', '. $this->calcCompColor($blue) .')';
            $colorObject->hexcomp = '#' . $this->toHexString($this->calcCompColor($red)) . $this->toHexString($this->calcCompColor($green)) . $this->toHexString($this->calcCompColor($blue));

            array_push($arr, $colorObject);
        }

        return json_encode($arr);
    }

    public function toHexString($color)
    {
        return str_pad(dechex(intval($color)), 2, "0", STR_PAD_LEFT);
    }

    //Not sure if this is really the complementary color???
    public function calcCompColor($color)
    {
        return str_pad(255 - intval($color), 3, "0", STR_PAD_LEFT);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
