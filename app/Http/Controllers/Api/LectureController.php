<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class LectureController extends Controller
{
    public function index()
    {
        return [
            [
                "id" => 1,
                "name" => "Lecture 1",
                "description" => "Description 1",
                "text" => "Text 1"
            ],
            [
                "id" => 2,
                "name" => "Lecture 2",
                "description" => "Description 2",
                "text" => "Text 2"
            ]
        ];
    }

    public function show($id)
    {
        return [
            "id" => $id,
            "name" => "Lecture {$id}",
            "description" => "Description {$id}",
            "text" => "Text {$id}"
        ];
    }
}
