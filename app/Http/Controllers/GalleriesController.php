<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gallery;

class GalleriesController extends Controller
{

    public function index() {
    	return Gallery::with('images', 'user')->get();
    }

    public function show($id) {
    	return Gallery::where('id', $id)->with('images', 'user')->first();
    }

    public function author($id) {
    	return Gallery::where('user_id', $id)->with('images', 'user')->get();
    }

    public function store(Request $request)
    {
        

        $request->validate(Gallery::STORE_RULES);
        if (!$request->has([
                'name',
                'description', 
                'user_id'
        ])) {
            return response()->json(
                [
                    'message' => 'All field are mandatory!',
                    'error' => 'Invalid request!'
                ], 401);
            }
        //     dd($request);
        // return Gallery::save($request->all());
        $newGallery = new Gallery();
        $newGallery->name = $request->input('name');
        $newGallery->description = $request->input('description');
        $newGallery->user_id = $request->input('user_id');

        $newGallery->save();

        return $newGallery;
    }

    public function destroy($id) {
        $gallery = Gallery::findOrFail($id);

        $gallery->delete();

        return new JsonResponse(true);
    }
}
