<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use DB;

date_default_timezone_set('Asia/Jakarta');

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $barang = Barang::all();

        $q = DB::table('barang')->select(DB::raw('MAX(RIGHT(id_barang,4)) as kode'));
        $kd = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int) $k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        return view('admin.master.v_barang', compact('barang', 'kd'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Barang::create([
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            's_stok' => $request->s_stok,
            'satuan' => $request->satuan,
            's_satuan' => $request->s_satuan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        // Alert::success('Ditambah','Data Berhasil Ditambah');
        return redirect('/barang')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->stok = $request->stok;
        $barang->s_stok = $request->s_stok;
        $barang->satuan = $request->satuan;
        $barang->s_satuan = $request->s_satuan;
        $barang->updated_at = date('Y-m-d H:i:s');

        $barang->save();
        // Alert::success('Diedit','Data Berhasil Diedit');
        return redirect('/barang')->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);

        $barang->delete();
        //    Alert::success('Dihapus','Data Berhasil Dihapus');
        return redirect('/barang')->with('success', 'Data Berhasil Dihapus');
    }
}
