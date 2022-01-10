<?php

namespace App\Http\Controllers\API;

use App\Models\Odeca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OdecaController extends BaseController
{
    public function index()
    {
        $odeca = Odeca::all();
        return $this->sendResponse(\App\Http\Resources\Odeca::collection($odeca), 'Vracene odece.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'model' => 'required',
            'opis' => 'required',
            'tip_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $odeca = Odeca::create($input);

        return $this->sendResponse(new \App\Http\Resources\Odeca($odeca), 'Odeca je kreirana.');
    }


    public function show($id)
    {
        $odeca = Odeca::find($id);
        if (is_null($odeca)) {
            return $this->sendError('Odeca ne postoji.');
        }
        return $this->sendResponse(new \App\Http\Resources\Odeca($odeca), 'Odeca vracena.');
    }


    public function update(Request $request, $id)
    {
        $odeca = Odeca::find($id);
        if (is_null($odeca)) {
            return $this->sendError('Odeca ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'model' => 'required',
            'opis' => 'required',
            'tip_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $odeca->model = $input['model'];
        $odeca->opis = $input['opis'];
        $odeca->tip_id = $input['tip_id'];
        $odeca->save();

        return $this->sendResponse(new \App\Http\Resources\Odeca($odeca), 'Odeca je updejtovana.');
    }

    public function destroy($id)
    {
        $odeca = Odeca::find($id);
        if (is_null($odeca)) {
            return $this->sendError('Odeca ne postoji.');
        }
        $odeca->delete();
        return $this->sendResponse([], 'Odeca je obrisana.');
    }
}
