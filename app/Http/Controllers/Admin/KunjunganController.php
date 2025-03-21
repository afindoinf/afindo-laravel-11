<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mstloket;
use App\Models\TrKunjungan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mstlayanan;
use Illuminate\Support\Facades\View;

class KunjunganController extends Controller
{
    private $menu = 'Lap. Kunjungan';
    private $kunjungan;
    public function __construct()
    {
        View::share('menu', $this->menu);
        View::share('title', $this->menu);
        $this->kunjungan = new TrKunjungan();
        $this->akses = $this->getAkses();
    }

    public function getIndex(Request $request)
    {
        $columns = [
            [
                "data" => "DT_RowIndex",
                "orderable" => false,
                "searchable" => false,
                "name" => "No",
                "cetak" => true
            ],
            [
                "data" => "TanggalJam",
                "name" => "Tanggal Kunjungan",
                "cetak" => true
            ],
            [
                "data" => "JamDilayani",
                "name" => "Dilayani Pada",
                "cetak" => true
            ],
            [
                "data" => "NoAntrian",
                "name" => "No. Antrian",
                "cetak" => true,
                "class" => "text-right",
                "total" => true,
                "format" => "RP",
                "label" => "Total No. Antrian"
            ],
            [
                "data" => "NamaLoket",
                "name" => "Nama Loket",
                "cetak" => true
            ],
            [
                "data" => "NamaLayanan",
                "name" => "Nama Layanan",
                "cetak" => true
            ],
            [
                "data" => "NilaiSPM",
                "name" => "Anggap Saja Rupiah",
                "cetak" => true,
                "class" => "text-right",
                "total" => true,
                "label" => "Total Nilai SPM"

            ],
            [
                "data" => "StatusAntrian",
                "name" => "Status",
                "cetak" => false,
                "class" => "text-center"
            ],
        ];

        $buttons = [];
        ## opsional tambahkan pengecekan akses print data
        if ($this->akses->PrintData) {
            $printButton = [
                [
                    "type" => "pdf",
                    'url' => "", // jika url kosong maka default print pdf datatable
                ],
                [
                    "type" => "excel",
                    'url' => "", // jika url kosong maka default export excel datatable
                ],
            ];
            $buttons = array_merge($buttons, $printButton);
        }

        ## ambil data untuk filter dropdown
        $lokets = Mstloket::select(['IDLoket AS value', 'NamaLoket AS label'])
            ->where('IsAktif', 1)
            ->orderBy('NamaLoket')
            ->get()
            ->toArray();

        ## ambil data untuk filter dropdown
        $layanans = Mstlayanan::select(['IDLayanan AS value', 'NamaLayanan AS label'])
            ->where('IsAktif', 1)
            ->orderBy('NamaLayanan')
            ->get()
            ->toArray();

        $config = [
            ## digunakan untuk menghilangkan pagination, biasanya untuk format laporan
            "paginate" => false,
            ## tambahkan addRow jika ingin menampilkan total, hitung total dari variable $columns dengan menambahkan atribut "total" => true dan atribut "label" => "label total"
            "addRow" => true,
            "ajaxUrl" => url('admin/kunjungan/listdata'),
            "columns" => $columns,
            "buttons" => $buttons,
            "title" => "Data Kunjungan",
            "filters" => [
                [
                    'type' => 'select',
                    'id' => 'status-antrian',
                    'label' => '',
                    'options' => [
                        [
                            'value' => '',
                            'label' => 'Semua'
                        ],
                        [
                            'value' => 'tunggu',
                            'label' => 'Tunggu'
                        ],
                        [
                            'value' => 'proses',
                            'label' => 'Proses'
                        ],
                        [
                            'value' => 'lewati',
                            'label' => 'Lewati'
                        ],
                        [
                            'value' => 'selesai',
                            'label' => 'Selesai'
                        ],
                        [
                            'value' => 'batal',
                            'label' => 'Batal'
                        ]
                    ]
                ],
                [
                    'type' => 'select',
                    'id' => 'id-loket',
                    'label' => '',
                    ## tambahkan option semua pada dropdown
                    'options' => array_merge([['value' => '', 'label' => 'Semua']], $lokets)
                ],
                [
                    'type' => 'select',
                    'id' => 'id-layanan',
                    'label' => '',
                    ## tambahkan option semua pada dropdown
                    'options' => array_merge([['value' => '', 'label' => 'Semua']], $layanans)
                ],
                [
                    'type' => 'daterange',
                    'id' => 'tanggal-jam',
                    'label' => '',
                ],
            ]
        ];

        return view('admin.kunjungan.index', [
            'config' => $config,
            'ajaxUrl' => url('admin/kunjungan/listdata'),
            'title' => 'Data Kunjungan'
        ]);
    }

    public function xgetListdata(Request $request)
    {
        $params = $request->all();

        ## param disini harus disamakan dengan id filters pada fungsi getIndex
        $tgl = $params['tanggal-jam'] ?? '';
        unset($params['tanggal-jam']);
        if ($tgl != '') {
            $tgl = explode(" - ", $tgl);
            $tglawal = date('Y-m-d', strtotime($tgl[0]));
            $tglakhir = date('Y-m-d', strtotime($tgl[1]));
        } else {
            $tglawal = date("Y-m-d", strtotime('-1 month'));
            $tglakhir = date('Y-m-d');
        }

        $params['where'] = [
            ['TanggalJam', '>=', $tglawal],
            ['TanggalJam', '<=', $tglakhir],
        ];

        $status = $params['status-antrian'] ?? '';
        unset($params['status-antrian']);
        if ($status != '') {
            $params['where'][] = ['StatusAntrian', '=', $status];
        }

        $idloket = $params['id-loket'] ?? '';
        unset($params['id-loket']);
        if ($idloket != '') {
            $params['where'][] = ['trkunjungan.IDLoket', '=', $idloket];
        }

        $idlayanan = $params['id-layanan'] ?? '';
        unset($params['id-layanan']);
        if ($idlayanan != '') {
            $params['where'][] = ['trkunjungan.IDLayanan', '=', $idlayanan];
        }

        $params['select'] = [
            'trkunjungan.IDKunjungan',
            'trkunjungan.TanggalJam',
            'trkunjungan.JamDilayani',
            'trkunjungan.NoAntrian',
            'trkunjungan.StatusAntrian',
            'trkunjungan.IDLoket',
            'mstloket.NamaLoket',
            'trkunjungan.UserName',
            'trkunjungan.IDUser',
            'trkunjungan.NilaiSPM',
            'trkunjungan.IDLayanan',
            'mstlayanan.NamaLayanan'
        ];

        $params['join'] = [
            ['table' => 'mstloket', 'on' => ['mstloket.IDLoket', 'trkunjungan.IDLoket'], 'param' => 'left'],
            ['table' => 'mstlayanan', 'on' => ['mstlayanan.IDLayanan', 'trkunjungan.IDLayanan'], 'param' => 'left'],
        ];

        $params['pre_datatable'] = function ($datatable) {
            return $datatable->editColumn('StatusAntrian', function ($row) {
                return '<div class="badge badge-primary">' . $row->StatusAntrian . '</div>';
            })->editColumn('NoAntrian', function ($row) {
                return "Rp. " . number_format($row->NoAntrian, 0);
            })
                ->rawColumns(['StatusAntrian']);
        };

        return $this->kunjungan->getRows($params);
    }
}
