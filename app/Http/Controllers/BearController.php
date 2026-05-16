<?php

namespace App\Http\Controllers;

use App\Models\Bear;
use Illuminate\Http\Request;

class BearController extends Controller
{
    public function index()
    {
        $bears = Bear::all();
        return view('Bear.index')->with(['bears' => $bears]);
    }

    public function create()
    {
        return view('Bear.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255',
        ]);

        Bear::create($validated);

        return redirect()->route('bears.index');
    }

    public function show($id)
    {
        $bear = Bear::findOrFail($id); // Here we look up the bear by ID. If it's not found, a 404 error will be returned.
        return view('Bear.show')->with(['bear' => $bear]); // return the view with the bear we fetched above.
    // We use return view, not redirect()->route(), so this renders the show file view in the Bear folder, not the route named 'bears.show' in routes/web.php.
        }

    public function edit($id)
    {
        $bear = Bear::findOrFail($id); // retrieve the bear's data by using the ID, this way we can fill the form with the current data of the bear.
        return view('Bear.edit')->with(['bear' => $bear]);
    }


    public function update(Request $request, $id) // How we ensure Request $request takes data from the right form: in routes/web.php there is a route where we use this function. Put that route in the form, that way the form will use this function.
    {
        $bear = Bear::findOrFail($id);
        $validated = $request->validate([ // here we validate the data from the form
            'name' => 'required|string|max:255', // making sure name is required, is a string and has a max length of 255 characters
            'color' => 'required|string|max:255', // making sure color is required, is a string and has a max length of 255 characters
        ]);
        $bear->update($validated);
        return redirect()->route('bears.show', $bear->id);
    }

    public function destroy(Bear $bear)
    {
        // No need for $bear = Bear::findOrFail($id); because there is no $id parameter used.
        $bear->delete(); // simply delete it.
        return redirect()->route('bears.index'); // using redirect()->route() to go back to the index page after deleting the bear. We pretty much use the index function which returns the index view.
    }

}

// Tip: you can use `Bear $bear` instead of `$id` for show, edit, update and destroy.
// If your route uses `{bear}`, Laravel will automatically find the record and pass the `Bear` model to the method.
// If you use `$id` as the parameter, call `Bear::findOrFail($id)` first to get the record.
