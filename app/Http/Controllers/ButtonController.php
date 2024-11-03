<?php

namespace App\Http\Controllers;

use App\Models\Button;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ButtonController extends Controller
{
    public function index()
    {
        $buttons = Button::where('user_id', auth()->id())
            ->orderBy('created_at', 'asc')
            ->get();

        return view('dashboard', compact('buttons'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'link' => 'nullable|string',
            'color' => 'required|string|max:7',
        ]);

        $button = Button::create([
            'title' => $data['title'] ?? '',
            'link' => $data['link'] ?? '',
            'color' => $data['color'],
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'button' => $button
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'link' => 'nullable|url',
            'color' => 'required|string|max:50',
        ]);

        $button = Button::findOrFail($id);

        $button->title = $request->input('title') ?? '';
        $button->link = $request->input('link') ?? '';
        $button->color = $request->input('color');
        $button->save();

        return response()->json([
            'success' => true,
            'message' => 'Button updated successfully.'
        ]);
    }

    public function destroy($id)
    {
        $button = Button::findOrFail($id);

        if ($button->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to delete this button.');
        }
        $button->delete();

        return redirect()->route('dashboard')->with('success', 'Button deleted successfully.');
    }
}
