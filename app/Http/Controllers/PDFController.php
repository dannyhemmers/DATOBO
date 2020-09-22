<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use mikehaertl\pdftk\Pdf;

class PDFController extends Controller
{

    public function upload(Request $request)
    {
        $files = $request->file('pdfs');
        Log::debug($files);

        $i = 1;
        foreach($files as $file) {
            $file->move(public_path('uploads'), $i . '.pdf');
            $i++;
        }

        $pdf = new Pdf([
            'A' => public_path('uploads/1.pdf')
        ]);

        $pdf->addFile(public_path('uploads/2.pdf'),'B');

        $pdf->cat(1, null, 'A')
            ->cat(1, null, 'B')
            ->saveAs(public_path('uploads/fertig.pdf'));

        return response()->json([
            'files' => $request->pdfs
        ]);
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
        //
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
