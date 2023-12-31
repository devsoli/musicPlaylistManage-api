<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreMusicRequest;
use App\Http\Resources\MusicCollection;
use App\Http\Resources\MusicResource;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $music= Music::paginate();
        return response()->json([new MusicCollection($music)],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateMusic($request);
        Music::create([
            'name'=>$request->name,
            'singer'=>$request->singer,
            'image'=>$this->uploadImage($request),
            'spotifyUrl'=>$request->spotify,

        ]);

        return response()->json([
            'message'=>'Created Music.'
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $music=Music::findorFail($id);
        return response()->json([
            'data'=>new MusicResource($music),
            ],200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $music=Music::findOrFail($id);
        $music->update($request->all());
        return response()->json([
            'message'=>'Updated',
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Music::findOrFail($id)->delete();
        return response()->json([
            'message'=>"Deleted"
        ],200);
    }

    private function validateMusic(Request $request): void{
        $request->validate([
            'name' => ['required'],['max:40'],
            'singer' => ['required'], ['max:70'],
            'image' => ['nullable'],
            'spotifyUrl' => ['nullable']]);
    }
    private function uploadImage(Request $request){
        return $request->hasFile('image')?$request->image->store('public'):null;
    }

}
