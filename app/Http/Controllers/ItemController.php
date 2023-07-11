<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($user->can('administrator')) {

            $query = Item::query();
            $search = $request->query('search');
        
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('jenis', 'LIKE', '%' . $search . '%')
                        ->orWhere('brand', 'LIKE', '%' . $search . '%')
                        ->orWhere('stok', 'LIKE', '%' . $search . '%')
                        ->orWhere('serial_number', 'LIKE', '%' . $search . '%');
                });
            }
        
            $items = $query->get();
            $totalItems = $items->count();
            $totalBrands = $items->pluck('brand')->unique()->count();

            return view('Barang.index', compact('items', 'totalItems', 'totalBrands'));
        }
        else
        {
            $query = Item::query();
            $search = $request->query('search');
        
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('jenis', 'LIKE', '%' . $search . '%')
                        ->orWhere('brand', 'LIKE', '%' . $search . '%')
                        ->orWhere('stok', 'LIKE', '%' . $search . '%')
                        ->orWhere('serial_number', 'LIKE', '%' . $search . '%');
                });
            }

            $items = $query->get();
            $totalItems = $items->count();
            $totalBrands = $items->pluck('brand')->unique()->count();

            return view('pembeli.index', compact('items', 'totalItems', 'totalBrands'));
        }    
    }

    public function show(Item $item) {
        
        return view('Barang.show', compact('item'));
    }

    public function create()
    {
        return view('Barang.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'stok' => 'required',
            'jenis' => 'required',
            'harga' => 'required|integer',
            'serial_number' => 'required|integer',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable',
        ]);

        $photoPath = $request->file('photo')->store('public/img/items');

        $item = new Item([
            'name' => $validatedData['name'],
            'brand' => $validatedData['brand'],
            'stok' => $validatedData['stok'],
            'jenis' => $validatedData['jenis'],
            'harga' => $validatedData['harga'],
            'serial_number' => $validatedData['serial_number'],
            'photo' => Storage::url($photoPath),
            'description' => $validatedData['description'],
        ]);

        $success = $item->save();

        if ($success) {
            return redirect()->route('barang.index')->with('success', 'Item has been created.');
        } else {
            return redirect()->route('barang.index')->with('error', 'Item failed to create.');
        }
    }

    public function edit(Item $item)
    {
        return view('Barang.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    { 
    
        $item->name = $request->input('name');
        $item->brand = $request->input('brand');
        $item->stok = $request->input('stok');
        $item->jenis = $request->input('jenis');
        $item->serial_number = $request->input('serial_number');
        $item->harga = $request->input('harga');
        $item->description = $request->input('description');
    
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/img/items');
            $item->photo = Storage::url($photoPath);
        }
    
        $item->save();
    
        return redirect()->route('barang.index')->with('success', 'Item updated successfully');
    }    

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('barang.index')->with('success', 'Item deleted successfully.');
    }
}
