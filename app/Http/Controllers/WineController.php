<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wine;
use App\Http\Requests\StoreWineRequest;
use App\Http\Requests\UpdateWineRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     * Kilistázza az összes elemet
     */
    public function index()
    {
        $wines=Wine::all();
        return response()->json($wines);
    }

    /**
     * Store a newly created resource in storage.
     * Létrehozza és tárolja az új elemet az adatbázisba
     */
    public function store(StoreWineRequest $request)
    {  
        $validator = Validator::make($request->all(), (new StoreWineRequest())->rules());
        if ($validator->fails()) {
            $errormsg = "";
            foreach ($validator->errors()->all() as $error) {
                $errormsg .= $error . " ";
            }
            $errormsg = trim($errormsg);
            return response()->json(["message" => $errormsg], 400);
        }
        $wine = new Wine();
        $wine->fill($request->all());
        $wine->save();
        return response()->json($wine, 201);   
    }

    /**
     * Display the specified resource.
     * Kijelez adott paraméter szerint elemet jelen esetben ez az:(int id)
     */
    public function show(int $id)
    {
        $wine = Wine::find($id);
        if (is_null($wine)) {
            return response()->json(["message" => "A megadott azonosítóval nem található bor."], 404);
        }
        return response()->json($wine);
    }

    /**
     * Update the specified resource in storage.
     * frissíti az elemet
     */
    public function update(UpdateWineRequest $request, int $id)
    {
        if ($request->isMethod('PUT')) {
            $validator = Validator::make($request->all(), (new StoreWineRequest())->rules());
            if ($validator->fails()) {
                $errormsg = "";
                foreach ($validator->errors()->all() as $error) {
                    $errormsg .= $error . " ";
                }
                $errormsg = trim($errormsg);
                return response()->json($errormsg, 400);
            }
        }
        $wine = Wine::find($id);
        if (is_null($wine)) {
            return response()->json(["message" => "A megadott azonosítóval nem található bor."], 404);
        }
        $wine->fill($request->all());
        $wine->save();
        return response()->json($wine, 200);
    }

    /**
     * Remove the specified resource from storage.
     * Törli az adott elemet a megadott paraméter alapján
     */
    public function destroy(int $id)
    {
        $wine = Wine::find($id);
        if (is_null($wine)) {
            return response()->json(["message" => "A megadott azonosítóval nem található bor."], 404);
        }
        Wine::destroy($id);
        return response()->noContent();
    }
}
