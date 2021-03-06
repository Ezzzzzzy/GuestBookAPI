<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guest = new Guest();
        return response()->json([
            "data" => $guest->all()
        ]);
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
        try {
            \DB::beginTransaction();
            $guest = new Guest();
            if ($guest->fillguest($request->all())) {
                $guest->save();
                \DB::commit();
                return response()->json([
                    'message' => "Guest is created successfully"
                ], 200);
            }
            return response()->json([
                'message' => "Internal server error"
            ], 500);
        } catch (QueryException $e) {
            \DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        try {
            \DB::beginTransaction();
            if ($guest->updateGuest($guest, $request->all())) {
                $guest->save();
                \DB::commit();
                return response()->json([
                    'message' => "Guest is updated successfully"
                ], 200);
            }
            return response()->json([
                'message' => "Internal server error"
            ], 500);
        } catch (QueryException $e) {
            \DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy($guest)
    {
        try {
            \DB::beginTransaction();
            $guestModel = new Guest();
            $guestModel = $guestModel->findOrFail($guest);
            if ($guestModel->delete()) {
                \DB::commit();
                return response()->json([
                    'message' => "Guest deleted successfully"
                ], 200);
            }
            return response()->json([
                'message' => "Internal server error"
            ], 500);
        } catch (QueryException $e) {
            \DB::rollback();
        } catch (ModelNotFoundException $e){
            return response()->json([
                'message' => "The Guest that you are looking for can not be found"
            ]);
        }
    }
}
