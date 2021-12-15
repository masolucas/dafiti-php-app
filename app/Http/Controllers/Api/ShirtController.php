<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shirt;

class ShirtController extends Controller
{
    
    //Function to get all shirt from database
    public function getAll()
    {
        $shirts = Shirt::get()->toJson(JSON_PRETTY_PRINT);
        return response($shirts, 200);
    }

    //Function to get a particular shirt by ID
    public function getByID( $id )
    {
        if (Shirt::where('id', $id)->exists()) {
            $shirt = Shirt::where('id', $id)->first()->toJson(JSON_PRETTY_PRINT);
            return response($shirt, 200);
        } else {
            return response()->json([
              "message" => "Shirt not found"
            ], 404);
        }
    }

    //Function to create a new shirt
    public function createShirt(Request $request)
    {
        $shirt = new Shirt;
        $shirt->name = $request->name;
        $shirt->description = $request->description;
        $shirt->color = $request->color;
        $shirt->size = $request->size;
        $shirt->brand = $request->brand;
        $shirt->material = $request->material;
        $shirt->price = $request->price;
        $shirt->save();

        $data = Shirt::where('id', $shirt->id)->get();
  
        return response()->json([
            "message" => "Shirt created",
            "data" => $data[0]
        ], 201);
    }
    
    //Funtion to update a shirt by ID
    public function updateShirt(Request $request, $id) 
    {
        if (Shirt::where('id', $id)->exists()) {
            $shirt = Shirt::find($id);
    
            $shirt->name = is_null($request->name) ? $shirt->name : $request->name;
            $shirt->description = is_null($request->description) ? $shirt->description : $request->description;
            $shirt->color = is_null($request->color) ? $shirt->color : $request->color;
            $shirt->size = is_null($request->size) ? $shirt->size : $request->size;
            $shirt->brand = is_null($request->brand) ? $shirt->brand : $request->brand;
            $shirt->material = is_null($request->material) ? $shirt->material : $request->material;
            $shirt->price = is_null($request->price) ? $shirt->price : $request->price;
            $shirt->save();
    
            return response()->json([
                "message" => "Shirt updated successfully",
                "request" => $request->name,
                "shirt" => $shirt 
            ], 200);
        } else {
            return response()->json([
                "message" => "Shirt not found"
            ], 404);
        }
    }

    //Function to delete a shirt by ID
    public function deleteShirt ($id) 
    {
        if(Shirt::where('id', $id)->exists()) {
            $shirt = Shirt::find($id);
            $shirt->delete();
    
            return response()->json([
                "message" => "Shirt deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Shirt not found"
            ], 404);
        }
    }


    //Function to parse a CSV file
    public function parseCSV(Request $request) 
    {
        $file = $request->file('uploaded_file');

        if ($file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            
            //Check file extension and size (max size 2mb)
            
            if (!in_array(strtolower($extension), ["csv"])) {
                return response()->json([
                    "message" => "Invalid file extension"
                ], 415);
            }

            if ($fileSize > 2097152) {
                return response()->json([
                    "message" => "Too large file"
                ], 413);
            }
            

            $file = fopen($tempPath, "r");

            //CSV headers to use as key
            $key = fgetcsv($file, 1024, ",");
            $ki = 0;

            // Remove any invalid or hidden characters
            foreach($key as $k){
                $key[$ki] = trim($key[$ki], "\xEF\xBB\xBF");
                $ki++;
            }

            // Result parsed CSV rows into array
            $json = [];
            
            $i = 0;
            while ($row = fgetcsv($file, 1024, ",")) {
                if ($i>0) {
                    $json[] = array_combine($key, $row);
                }

                $i++;
            }
            
            return response()->json([
                "data" => $json
            ], 200);
        } else {
            return response()->json([
                "message" => "No file was uploaded"
            ], 404);
        }
    }

    public function importCSV(Request $request) 
    {
        $file = $request->file('uploaded_file');

        if ($file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            
            //Check file extension and size (max size 2mb)
            
            if (!in_array(strtolower($extension), ["csv"])) {
                return response()->json([
                    "message" => "Invalid file extension"
                ], 415);
            }

            if ($fileSize > 2097152) {
                return response()->json([
                    "message" => "Too large file"
                ], 413);
            }
            

            $file = fopen($tempPath, "r");

            //CSV headers to use as key
            $key = fgetcsv($file, 1024, ",");
            $ki = 0;

            // Remove any invalid or hidden characters
            foreach($key as $k){
                $key[$ki] = trim($key[$ki], "\xEF\xBB\xBF");
                $ki++;
            }

            // Result parsed CSV rows into array
            $json = [];
            
            $i = 0;
            while ($row = fgetcsv($file, 1024, ",")) {
                if ($i>0) {
                    $json[] = array_combine($key, $row);
                }

                $i++;
            }

            foreach ($json as $d) {
                $shirt = new Shirt;
                $shirt->name = $d['name'];
                $shirt->description = $d['description'];
                $shirt->color = $d['color'];
                $shirt->size = $d['size'];
                $shirt->brand = $d['brand'];
                $shirt->material = $d['material'];
                $shirt->price = $d['price'];
                $shirt->save();
            }
            
            return response()->json([
                "message" => "Imported data"
            ], 200);
        } else {
            return response()->json([
                "message" => "No file was uploaded"
            ], 404);
        }
    }
}