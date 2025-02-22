<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\MyModel;
use Illuminate\Support\Facades\DB;

class Akseslevel extends MyModel
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'akseslevel';
    protected $fillable = [
        "KodeLevel",
        "NamaLevel",
        "IsAktif"
    ];

    public function get_fitur($kodelevel = '')
    {
        $data = DB::table('fiturlevel')
        ->selectRaw('fiturlevel.KodeFitur, fiturlevel.ViewData, fiturlevel.AddData, fiturlevel.EditData, fiturlevel.EditData, fiturlevel.DeleteData, fiturlevel.PrintData, serverfitur.NamaFitur, serverfitur.KelompokFitur, serverfitur.Icon, serverfitur.Url, serverfitur.Slug, serverfitur.Method')
        ->leftJoin('serverfitur', function ($join) {
            $join->on('serverfitur.KodeFitur', '=', 'fiturlevel.KodeFitur');
        })
        ->when($kodelevel, function ($query, $kodelevel) {
            return $query->where('fiturlevel.KodeLevel', $kodelevel);
        })
        ->where('fiturlevel.ViewData', 1)
        ->where('serverfitur.IsAktif', 1)
        ->orderBy('serverfitur.NoUrut');
        return $data->get();
    }

    public function get_server_fitur()
    {
        $data = DB::table('serverfitur')
        ->selectRaw('serverfitur.KodeFitur, serverfitur.NamaFitur, serverfitur.KelompokFitur, serverfitur.Icon, serverfitur.Url, serverfitur.Slug, serverfitur.Method, serverfitur.NoUrut')
        ->where('serverfitur.IsAktif', 1)
        ->orderBy('serverfitur.NoUrut');
        return $data->get();
    }

    public function get_kode()
    {
        $data = self::select("KodeLevel AS kode")->orderByRaw("KodeLevel DESC")->first();
        if ($data) {
            $kode = $data->kode;
        } else {
            $kode =  0;
        }
        return ($kode + 1);
    }
}
