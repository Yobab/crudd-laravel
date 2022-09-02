<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create(Request $request) //creacion del customer
    {
        $data = $this->validateForm($request);

        Customer::create($data);

    }
    public function read()//leer todos los customer
    {
        return Customer::all();
    }

    public function readOne($id)//leer un customer
    {
        return Customer::find($id);
    }

    public function delete($id)//elimiar un customer
    {
        Customer::find($id)->delete();

    }

    public function edit(Request $request, $id)//editar un customer
    {
        $data = $this->validateForm($request);
        Customer::find($id)->update($data);
    }

    public function validateForm(Request $request)//validar el formulario
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);
        return $validated;
    }
    
}
