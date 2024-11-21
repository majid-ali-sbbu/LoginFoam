<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    // Show the map form
    public function showMap()
    {
        return view('map');
    }

    // Process the coordinates from the form
    public function processCoordinates(Request $request)
{
    $sourceLat = $request->input('lag1');
    $sourceLng = $request->input('log1');
    $destinationLat = $request->input('lag2');
    $destinationLng = $request->input('log2');
    $sourceName = $request->input('sourceName');
    $destinationName = $request->input('destinationName');

    return view('map', [
        'sourceLat' => $sourceLat,
        'sourceLng' => $sourceLng,
        'destinationLat' => $destinationLat,
        'destinationLng' => $destinationLng,
        'sourceName' => $sourceName,
        'destinationName' => $destinationName,
    ]);
}

}
