<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Student 1 Name',
                'age' => 18,
            ],
            [
                'id' => 2,
                'name' => 'Student 2 Name',
                'age' => 17,
            ],
            [
                'id' => 3,
                'name' => 'Student 3 Name',
                'age' => 19,
            ],
            [
                'id' => 4,
                'name' => 'Student 4 Name',
                'age' => 17,
            ]
        ];

        return response()->json([
            'status' => true,
            'message' => 'Sukses mengambil data student',
            'data' => $data,
        ]);
    }
    public function showName(String $name)
    {
        $data = [
            'name' => $name
        ];

        return response()->json([
            'status' => true,
            'message' => 'Sukses mengambil data student',
            'data' => $data,
        ]);
    }
}
