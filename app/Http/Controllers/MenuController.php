<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Restoran; 
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index($id) {
        $id_resto = $id;
        $resto = Restoran::where('id', $id_resto)->get(['nama']);
        // dd($resto);
        $menus = Menu::where('id_resto', $id_resto)->get();
        return view('admin/menu', compact('menus', 'id_resto', 'resto'));
    }

    public function create($id_resto){
        return view('admin/tambahmenu', compact('id_resto'));
    }

    public function store(Request $request, $id_resto)
    {
        $validator = Validator::make($request->all(), [
            'nama_menu' => 'required|string|min:3',
            'kategori_menu' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
    
        $imageName = time().'-'.$request->image->getClientOriginalName();
        $request->image->move(public_path('menu'), $imageName);
    
        Menu::create([
            'id_resto' => $id_resto,
            'nama_menu' => $request->nama_menu,
            'kategori_menu' => $request->kategori_menu,
            'harga' => $request->harga,
            'image' => $imageName,
        ]);
    
        return redirect()->route('menu', ['id' => $id_resto]);
    }    

    public function edit($id) 
    {
        $menu = Menu::find($id);
        $id_resto = $menu->id_resto;

        return view('admin/ubahmenu', compact('menu', 'id_resto'));
    }

    public function update(Request $request, $id) 
    {
        $validator = Validator::make($request->all(), [
            'nama_menu' => 'required|string|min:3',
            'kategori_menu' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('menu', ['id' => $request->id_resto])->withErrors(['message' => 'Menu not found']);
        }
    
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($menu->image && file_exists(public_path('menu/'.$menu->image))) {
                unlink(public_path('menu/'.$menu->image));
            }
    
            $imageName = time().'-'.$request->image->getClientOriginalName();
            $request->image->move(public_path('menu'), $imageName);
            $menu->image = $imageName;
        }
        $menu->update([
            'id_resto' => $request->id_resto,
            'nama_menu' => $request->nama_menu,
            'kategori_menu' => $request->kategori_menu,
            'harga' => $request->harga,
            'image' => isset($imageName) ? $imageName : $menu->image,
        ]);
        return redirect()->route('menu', ['id' => $menu->id_resto]);
    }

    public function destroy($id) 
{
    $menu = Menu::find($id);
    if (!$menu) {
        return redirect()->route('menu', ['id' => $id])->withErrors(['message' => 'Menu not found']);
    }

    // Delete the image file if it exists
    if ($menu->image && file_exists(public_path('menu/'.$menu->image))) {
        unlink(public_path('menu/'.$menu->image));
    }

    $menu->delete();

    return redirect()->route('menu', ['id' => $menu->id_resto])->with('success', 'Menu deleted successfully');
}

}