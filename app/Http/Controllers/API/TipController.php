<?php

namespace App\Http\Controllers\API;

use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipController extends BaseController
{
    public function index()
    {
        $tipovi = Tip::all();
        return $this->sendResponse(\App\Http\Resources\Tip::collection($tipovi), 'Vraceni tipovi.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'tip' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $tip = Tip::create($input);

        return $this->sendResponse(new \App\Http\Resources\Tip($tip), 'Tip je kreiran.');
    }


    public function show($id)
    {
        $tip = Tip::find($id);
        if (is_null($tip)) {
            return $this->sendError('Tip ne postoji.');
        }
        return $this->sendResponse(new \App\Http\Resources\Tip($tip), 'Tip vracen.');
    }


    public function update(Request $request, $id)
    {
        $tip = Tip::find($id);
        if (is_null($tip)) {
            return $this->sendError('Tip ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'tip' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $tip->tip = $input['tip'];
        $tip->save();

        return $this->sendResponse(new \App\Http\Resources\Tip($tip), 'Tip je updejtovan.');
    }

    public function destroy($id)
    {
        $tip = Tip::find($id);
        if (is_null($tip)) {
            return $this->sendError('Tip ne postoji.');
        }
        $tip->delete();
        return $this->sendResponse([], 'Tip je obrisan.');
    }
}
