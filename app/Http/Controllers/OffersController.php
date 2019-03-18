<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use Illuminate\Support\Facades\DB;


class OffersController extends Controller
{

    public function load_store()
    {
        $path = storage_path() . "/json/data.json";
        $jsonData = json_decode(file_get_contents($path), true);

        try {
           foreach ($jsonData as $json) {
              foreach ($json as $key => $value) {
                 $insertArr[] = $value;
                 if ($value['availability'] == true){
                     $insertArr[$key]['availability'] = "tak";
                 }
                 elseif ($value['availability'] == false) {
                     $insertArr[$key]['availability'] = "nie";
                 }
                 if (empty($value['photo'])) {
                     $insertArr[$key]['photo'] = "";
                 }
              }

              if (Offer::count() == 0) {
                  DB::table('offers')->insert($insertArr);
              }
           }
           return redirect()->route('offers_show');

       } catch(\Exception $e) {
          echo $e->getMessage();
       }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        if (Offer::count() == 0) {
            $request->session()->flash('empty', 'Lista produktów jest pusta');
        }

        return view('products.show', [
            'productes' => Offer::all(),
        ]);
    }

    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect()->route('offers_show')->with('delete', 'Product usunięty pomyślnie');
    }

    public function edit($id)
    {
        $car =  DB::table('offers')->whereId($id)->first();
        return view('products.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        if (!empty($request->available)) {
            $select = $request->available;
        }

        DB::table('offers')
            ->where('id', $id)
            ->update(['availability' => $select]);

        return redirect()->route('offers_show')->with('update','Product zaktualizowany pomyślnie');
    }
}
