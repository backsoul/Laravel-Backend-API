<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\finances;
class FinancesController extends Controller
{
    //
    public function getAllFinances(){
        $finances = finances::get()->toJson(JSON_PRETTY_PRINT);
        return response($finances,200);
    }

    public function getFinance($id){
        if (finances::where('id', $id)->exists()) {
            $finance = finances::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($finance, 200);
          } else {
            return response()->json([
              "message" => "finances not found"
            ], 404);
          }
    }

    public function createFinance(Request $request) {
        $finance = new finances;
        $finance->entry = $request->entry;
        $finance->spending = $request->spending;
        $finance->save();

        return response()->json([
          "message" => "Book record created"
        ], 201);
    }

    public function updateFinance(Request $request, $id) {
        if (finances::where('id', $id)->exists()) {
          $finance = finances::find($id);

          $finance->entry = is_null($request->entry) ? $finance->entry : $finance->entry;
          $finance->spending = is_null($request->spending) ? $finance->spending : $finance->spending;
          $finance->save();

          return response()->json([
            "message" => "finance updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "finance not found"
          ], 404);
        }
    }
    public function deleteFinance ($id) {
        if(finances::where('id', $id)->exists()) {
          $finance = finances::find($id);
          $finance->delete();
          $finance->id;

          return response()->json(
              array(
                  'success' => true,
                  'id' => $finance->id,
                  'message' => 'se elimino sactifactoriamente.'
                  )
              , 200);
        } else {
          return response()->json([
            "message" => "error al eliminar la financia."
          ], 404);
        }
      }
}
