<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function getPositions(Request $request)
    {
        try {
            $position = Position::all();

            $positionData = $position->map(function ($position){
                return [
                    'id'=>$position->id,
                    'name'=>$position->name,
                ];
            });

            return response(['success'=>true,'positions'=>$positionData],200);
        }catch (ModelNotFoundException $e){
            return response(['error'=>'Position not found'],422);
        }catch (\Exception $e){
            return response(['error'=>$e->getMessage()],404);
        }
    }
}
