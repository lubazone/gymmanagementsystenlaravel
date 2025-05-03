<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::all();
        return view('admin.equipment.index', compact('equipments'));
    }

    public function index1()
    {
        return view('admin.equipment.create');
    }

    public function create()
    {
        return view('equipment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vendor' => 'required|string|max:255',
            'amount' => 'required|integer',
            'quantity' => 'required|integer',
            'reminder' => 'required|integer',
            'status' => 'required|integer',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        // dd($request->all());
        $data = $request->all();
        $data['reminderfirst'] = $request->reminder;

        Equipment::create($data);

        return redirect()->route('admin.manageEquipment')->with('success', 'Equipment added successfully');
    }

    public function show($id)
    {
        $equipment = Equipment::findOrFail($id);
        return view('equipment.show', compact('equipment'));
    }

    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);
        // dd($equipment);
        return view('admin.equipment.edit', compact('equipment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vendor' => 'required|string|max:255',
            'amount' => 'required|integer',
            'quantity' => 'required|integer',
            'reminder' => 'required|integer',
            'status' => 'required|integer',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $data = $request->all();
        $data['reminderfirst'] = $request->reminder;

        $equipment = Equipment::findOrFail($id);
        $equipment->update($data);

        return redirect()->route('admin.manageEquipment')->with('success', 'Equipment updated successfully');
    }
    public function reminderupdate(Request $request, $id)
    {
        $request->validate([
            'reminder' => 'required|integer',
        ]);
        //dd($request->all());

        $equipment = Equipment::findOrFail($id);

        $data = $request->all();
        $data['reminder'] = $request->reminder;
        $date = Carbon::today();
        $equipment->update($data);
        $equipment->date = $date;
        $equipment->status = 1;
        $equipment->save();

        return redirect()->route('admin.manageEquipment')->with('success', 'Equipment updated successfully');
    }


    public function reminder($id)
    {
        $equipment = Equipment::findOrFail($id);
        return view('admin.equipment.reminder', compact('equipment'));
    }

    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();

        return redirect()->route('admin.manageEquipment')->with('success', 'Equipment deleted successfully');
    }
}
