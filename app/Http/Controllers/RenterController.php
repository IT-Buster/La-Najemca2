<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Renter;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renter = Renter::all();
        return view('index', compact('renter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'PESEL' => 'required|max:50',
            'id_card' => 'required|max:255',
        ]);
        $renter = Renter::create($storeData);

        return redirect('/renters')->with('completed', 'Najemca został zapisany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $renter = Renter::findOrFail($id);
        return view('edit', compact('renter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'PESEL' => 'required|max:255',
            'id_card' => 'required|max:255',
        ]);
        renter::whereId($id)->update($updateData);
        return redirect('/renters')->with('completed', 'Najemca został zaktualizowany!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $renter = renter::findOrFail($id);
        $renter->delete();

        return redirect('/renters')->with('completed', 'Najemca usunięty!');

    }
}
