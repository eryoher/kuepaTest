<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leads;

class LeadsController extends Controller
{

    public function index()
    {
        $leads = Leads::all();
        $estados = [
            "contactar" => 'contactar',
            "contactado" => 'contactado'
        ];

        return view('admin.leads', compact('leads', 'estados'));        
    }
    
    public function store( Request $request ) {               
        $oldLead = Leads::where('email', $request->email)->first();            
        $success = 'Se creo el Contacto correctamente.';
        $validatedData = $request->validate([
            'name'   => 'required',
            'lastname'   => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'career'   => 'required',   
            'state' => 'required'        
        ]);        

        if( !$oldLead ){        
            Leads::create($validatedData); //Se crea sin novedades
        }else{
            $validatedData['state'] = 'No Llamado';  //Se detecta que el email ya existe y se modifica el estado.            
            Leads::whereId($oldLead->id)->update($validatedData);
            $success = 'El email ya existe en el sistema, Los datos fueron Actualizados.';
        }

        return redirect('/')->with( compact('success') );

    }   

    public function edit(Leads $lead)
    {
        return view('admin.editLead',compact('lead'));
    }  

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * 
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'   => 'required',
            'lastname'   => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'career'   => 'required',
            'state'   => 'required',
        ]);

        Leads::whereId($id)->update($validatedData);
        
        return redirect()->route('admin')->with('success','Product updated successfully');
        
    }
}
