<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function products(Request $request)
    {
        $user_id = Auth::id();
        $usedproducts = DB::table('produkti')
            ->select('id', 'pirkumsid', 'created_at', 'nosaukums', 'cena', 'sveramais', 'sveramaistype', 'total')
            ->where('userid', '=', $user_id)
            ->get();
        foreach ($usedproducts as $product) {
            if ($product->sveramaistype == 'Skaits') {
                $product->sveramais = number_format($product->sveramais);
            } elseif ($product->sveramaistype == 'Svars') {
                if (round($product->sveramais) == $product->sveramais) {
                    $product->sveramais = number_format($product->sveramais);
                } else {
                    $product->sveramais = number_format($product->sveramais, 3);
                }
            }
        }
        return view('Produkti',['products'=>$usedproducts]);
    }
}
