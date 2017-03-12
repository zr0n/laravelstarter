<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Gallery as Image;
use Cloudder;

class GalleryAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/gallery')->with('images', Image::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/form_photo')->with('image', new Image());

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
        $photo = new Image();

        $photo->description = $request->input('description');
        $filename = $request->file('image')->path();
        $photo->cloudinary_id = Cloudder::upload($filename)->getPublicId();
        $photo->save();
        return redirect('admin/gallery')->with(['success' => 1]);

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
        $photo = Image::find($id);
        return view('admin/form_photo')->with('image', $photo);
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
        $photo = Image::find($id);
        $photo->description = $request->input("description");
        $photo->save();

        return redirect('admin/gallery')->with(['success' => 1]);
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
        Image::find($id)->delete();

        return redirect('admin/gallery')->with(['success' => 1]);
    }
}
