<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\DTO\UserDto;

class UserDetails extends Controller
{
    protected $baseUrl = 'https://reqres.in/api/';

    public function getUserById($id)
    {
        $apiUrl = $this->baseUrl . "users/{$id}";
        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $data = $response->json();
            $responseDto = new UserDto(200, $data, 'Success');
            return response()->json($responseDto);
        } else {
            $responseDto = new UserDto(500, '', 'error');
            return response()->json($responseDto);
        }
    }

    public function paginatedUserList($id)
    {
        $apiUrl = $this->baseUrl . "users?page={$id}";
        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $data = $response->json();
            $responseDto = new UserDto(200, $data, 'Success');
            return response()->json($responseDto);
        } else {
            $responseDto = new UserDto(500, '', 'error');
            return response()->json($responseDto);
        }
    }
    public function createNewUser(Request $request)
    {
        $apiUrl = $this->baseUrl . "users";

        $validatedData = $request->validate([
            'name' => 'required|string',
            'job' => 'required|string',
        ]);

        $response = Http::post($apiUrl, [
            'name' => $validatedData['name'],
            'job' => $validatedData['job'],
        ]);

        if ($response->successful()) {

            $data = $response->json();
            $responseDto = new UserDto(201, $data, 'Success');
            return response()->json($responseDto);
        } else {
            $responseDto = new UserDto(500, '', 'error');
            return response()->json($responseDto);
        }
    }
}
