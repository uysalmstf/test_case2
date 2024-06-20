<?php

namespace App\Http\Controllers\Integration;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\IDBInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;

class IntegrationController extends Controller
{
    protected $integrationRepository;
    public function __construct(IDBInterface $integrationRepository) {
        $this->integrationRepository = $integrationRepository;
    }
    
    public function list(){

        $integrations = $this->integrationRepository->all();
        return response()->json(array('success'=> true, 'integrations' => $integrations));
    }

    public function store(Request $request){

        try {
            $data = $request->validate([
                'integration' => 'required',
                'username' => 'max:255',
                'password' => 'max:255',
            ]);

            $this->integrationRepository->create($data);
            return response()->json(array('success'=> true), 201);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } 
    }

    public function update(Request $request, $id){

        try {

            $res = $this->integrationRepository->find($id);
            if ($res == null) {
                
                return response()->json(['errors' => "Record not found"], 422);
            }

            $data = $request->validate([
                'integration' => 'required',
                'username' => 'max:255',
                'password' => 'max:255',
            ]);

            $this->integrationRepository->update($data, $id);
            return response()->json(array('success'=> true), 201);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } 
    }

    public function delete(Request $request){

        try {

            $res = $this->integrationRepository->find($request->get('id'));
            if ($res == null) {
                
                return response()->json(['errors' => "Record not found"], 422);
            }

            $data = $request->validate([
                'id' => 'required',
            ]);

            $this->integrationRepository->delete($request->get('id'));
            return response()->json(array('success'=> true), 201);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } 
    }

}
