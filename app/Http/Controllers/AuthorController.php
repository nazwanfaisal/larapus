<?php
namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $author = Author::all();
        return view('admin.author.index', compact('author'));
    }

    /**
@@ -24,7 +25,7 @@ public function index()
     */
    public function create()
    {
        //
        return view('admin.author.create');
    }

    /**
@@ -35,7 +36,15 @@ public function create()
     */
    public function store(Request $request)
    {
        //
        // validasi data
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $author = new Author;
        $author->name = $request->name;
        $author->save();
        return redirect()->route('author.index');
    }

    /**
@@ -44,9 +53,10 @@ public function store(Request $request)
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
        $author = Author::findOrFail($id);
        return view('admin.author.show', compact('author'));
    }

    /**
@@ -55,9 +65,10 @@ public function show(Author $author)
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
        $author = Author::findOrFail($id);
        return view('admin.author.edit', compact('author'));
    }

    /**
@@ -67,9 +78,17 @@ public function edit(Author $author)
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
        // validasi data
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $author = Author::findOrFail($id);
        $author->name = $request->name;
        $author->save();
        return redirect()->route('author.index');
    }

    /**
@@ -78,8 +97,11 @@ public function update(Request $request, Author $author)
     @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->route('author.index');

    }
}
