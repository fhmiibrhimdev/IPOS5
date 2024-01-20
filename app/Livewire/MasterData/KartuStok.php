<?php

namespace App\Livewire\MasterData;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Persediaan;
use Carbon\Carbon;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class KartuStok extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'delete'
    ];
    protected $rules = [
        'kode'       => 'required',
        'keterangan' => 'required',
    ];

    public $lengthData = 5;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId, $id_barang, $tanggal_awal, $tanggal_akhir;

    public function updatingLengthData()
    {
        $this->resetPage();
    }

    private function searchResetPage()
    {
        if ($this->searchTerm !== $this->previousSearchTerm) {
            $this->resetPage();
        }
    
        $this->previousSearchTerm = $this->searchTerm;
    }

    public function mount()
    {
        $this->id_barang     = Barang::min('id');
        $this->tanggal_awal  = Carbon::now()->firstOfMonth()->format('Y-m-d');;
        $this->tanggal_akhir = Carbon::now()->lastOfMonth()->format('Y-m-d');;
    }

    public function render()
    {
        $this->searchResetPage();
        $search = '%'.$this->searchTerm.'%';

        $barangs = Barang::select('id', 'nama_barang')->get();

        $data = Persediaan::select('tanggal', 'nama_barang', 'persediaan.deskripsi', 'status', 'qty', DB::raw("SUM(CASE WHEN status = 'Out' THEN -qty ELSE qty END) OVER(ORDER BY tanggal ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) AS balancing"))
                    ->join('barang', 'barang.id', 'persediaan.id_barang', )
                    ->where(function ($query) use ($search)  {
                        $query->where('tanggal', 'LIKE', $search)
                        ->orWhere('persediaan.deskripsi', 'LIKE', $search)
                        ->orWhere('status', 'LIKE', $search)
                        ->orWhere('qty', 'LIKE', $search);
                    })
                    ->where('id_barang', $this->id_barang)
                    ->whereBetween('tanggal', [$this->tanggal_awal, $this->tanggal_akhir])
                    ->orderBy('tanggal', 'ASC')
                    ->paginate($this->lengthData);

        return view('livewire.master-data.kartu-stok', compact('data', 'barangs'))->title('Kartu Stok');
    }
}
