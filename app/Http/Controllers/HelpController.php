<?php

namespace App\Http\Controllers;

use App\Models\Help;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $helps = Help::paginate($perPage);

        return view('admin.help.index', compact('helps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.help.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $content = $request->content;
        $dom = new \DomDocument();
        $dom->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= "/upload/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
         }

        $content = $dom->saveHTML();

        Help::create([
            'title' => $request->input('title'),
            'content' => $content,
        ]);

        return redirect()->route('admin.help.index')->with('success', 'A hasznos menüpont sikeresen hozzáadva.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Help $help)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Help $help)
    {
        return view('admin.help.edit', compact('help'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Help $help)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|string',
        ]);

        try {
            $content = $request->content;
            $dom = new DOMDocument();
            $dom->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('img');

            foreach($imageFile as $item => $image){
                $data = $image->getAttribute('src');
                if (strpos($data, 'data:image/') === 0) {
                    list($type, $data) = explode(';', $data);
                    list(, $data) = explode(',', $data);
                    $imgeData = base64_decode($data);
                    $image_name = "/upload/" . time() . $item . '.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $imgeData);
                    $image->removeAttribute('src');
                    $image->setAttribute('src', $image_name);
                } else {
                    $help->title = $request->input('title');
                    $help->content = $request->input('content');
                    $help->save();
                }
             }

            $content = $dom->saveHTML();

            $help->title = $request->input('title');
            $help->content = $content;
            $help->save();

            return redirect()->route('admin.help.index')->with('success', 'A hasznos menüpont frissítése sikeresen megtörtént.');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->withErrors(['error' => 'Már létezik azonos nevű hasznos menüpont.']);
            } else {
                return redirect()->back()->withErrors(['error' => 'Hiba történt a hasznos menüpont frissítése közben.']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Help $help)
    {
        $help->delete();
        return redirect()->back()->with('success', 'A hasznos menüpont törölve');
    }
}
