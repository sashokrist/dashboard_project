<?php

namespace App\Http\Controllers;

use App\Models\Button;
use Illuminate\Http\Request;

class ButtonController extends Controller
{
    public function index() {
        $buttons = Button::all();
        return view('dashboard', compact('buttons'));
    }

    public function configure($id) {
        $button = Button::find($id);
        return view('configure', compact('button'));
    }

    public function store(Request $request, $id) {
        $button = Button::find($id);
        $button->title = $request->title;
        $button->link = $request->link;
        $button->color = $request->color;
        $button->save();
        return redirect('/');
    }

    public function edit($id) {
        $button = Button::find($id);
        return view('edit', compact('button'));
    }

    public function destroy($id) {
        Button::destroy($id);
        return redirect('/');
    }
}
