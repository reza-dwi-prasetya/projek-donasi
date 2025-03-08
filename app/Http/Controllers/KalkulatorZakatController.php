<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorZakatController extends Controller
{
    public function create()
    {
        return view('pages.kalkulator-zakat');
    }

    public function store(Request $request)
    {
        $jenisZakat = $request->jenis_zakat;
        $jumlah = $request->jumlah;

        switch ($jenisZakat) {
            case 'maal':
                $jumlahZakat = $jumlah * 0.025;
                break;

            case 'penghasilan':
                $jumlahZakat = $jumlah * 0.025;
                break;

            default:
                $jumlahZakat = 0;
                break;
        }

        return back()->with('zakat', [
            'jenisZakat' => $jenisZakat,
            'jumlah' => $jumlah,
            'jumlahZakat' => $jumlahZakat,
        ]);
    }
}
