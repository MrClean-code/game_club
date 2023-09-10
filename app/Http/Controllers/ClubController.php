<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function getClubs()
    {
        return response()->json(Room::get(), 200);
    }

    public function getClubById($id)
    {
        $room = Room::find($id);
        if (is_null($room)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        return response()->json($room, 200);
    }

    public function saveClub(Request $request)
    {
        $rules = [
            'iso' => 'required|min:2|max:2',
            'name' => 'required|min:3',
            'name_en' => 'required|min:3'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $room = Room::create($request->all());
        return response()->json($room, 201);
    }

    public function editClub(Request $request, $id)
    {
        $rules = [
            'iso' => 'required|min:2|max:2',
            'name' => 'required|min:3',
            'name_en' => 'required|min:3'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $room = Room::find($id);
        if (is_null($room)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $room->update($request->all());
        return response()->json($room, 200);
    }

    public function deleteClub($id)
    {
        $room = Room::find($id);
        if (is_null($room)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $room->delete();
        return response()->json('', 204);
    }

}
