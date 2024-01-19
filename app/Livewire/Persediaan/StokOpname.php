<?php

namespace App\Livewire\Persediaan;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Persediaan;
use Livewire\WithPagination;

class StokOpname extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'delete'
    ];
    protected $rules = [
        'tanggal' => 'required',
        'id_barang' => 'required',
        'qty' => 'required',
        'fisik' => 'required',
    ];

    public $lengthData = 5;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId, $tanggal, $id_barang, $qty, $deskripsi, $buku, $fisik, $perbedaan, $status;

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

    public function updatedIdBarang()
    {
        $this->buku = Barang::select('stok')->where('id', $this->id_barang)->first()->stok;
    }

    public function updatedFisik()
    {
        $this->perbedaan = (int)$this->fisik - (int)$this->buku;
    }

    public function mount()
    {
        $this->tanggal      = date('Y-m-d H:i');
        $this->id_barang    = Barang::min('id');
        $this->qty          = 0;
        $this->buku         = 0;
        $this->fisik        = 0;
        $this->perbedaan    = 0;
        $this->deskripsi    = '-';
    }

    public function render()
    {
        $this->searchResetPage();
        $search = '%'.$this->searchTerm.'%';

        $barangs = Barang::select('id', 'nama_barang')->get();

        $data = Persediaan::select('persediaan.*', 'barang.nama_barang')
                ->join('barang', 'barang.id', 'persediaan.id_barang')
                ->where(function ($query) use ($search)  {
                    $query->where('barang.nama_barang', 'LIKE', $search)
                    ->orWhere('persediaan.tanggal', 'LIKE', $search)
                    ->orWhere('persediaan.qty', 'LIKE', $search)
                    ->orWhere('persediaan.buku', 'LIKE', $search)
                    ->orWhere('persediaan.fisik', 'LIKE', $search)
                    ->orWhere('persediaan.perbedaan', 'LIKE', $search);
                })
                ->where('persediaan.opname', 'yes')
                ->orderBy('persediaan.id', 'ASC')
                ->paginate($this->lengthData);

        return view('livewire.persediaan.stok-opname', compact('data', 'barangs'))->title('Stok Opname');
    }

    private function dispatchAlert($type, $message, $text)
    {
        $this->dispatch('swal:modal', [
            'type'      => $type,  
            'message'   => $message, 
            'text'      => $text
        ]);

        $this->resetInputFields();
    }

    public function isEditingMode($mode)
    {
        $this->isEditing = $mode;
    }

    private function resetInputFields()
    {
        $this->tanggal      = date('Y-m-d H:i');
        $this->id_barang    = Barang::min('id');
        $this->qty          = 0;
        $this->buku         = 0;
        $this->fisik        = 0;
        $this->perbedaan    = 0;
        $this->deskripsi    = '-';
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate();

        $fisik  = $this->fisik;
        $buku   = $this->buku;

        $perbedaan = $this->perbedaan;

        if ($perbedaan > 0) {
            $status = 'In';
        } else {
            $status = 'Out';
        }

        Persediaan::create([
            'tanggal'   => $this->tanggal,
            'id_barang' => $this->id_barang,
            'qty'       => abs($perbedaan),
            'deskripsi' => $this->deskripsi,
            'buku'      => $this->buku,
            'fisik'     => $this->fisik,
            'perbedaan' => $perbedaan,
            'opname'    => 'yes',
            'status'    => $status,
        ]);

        Barang::where('id', $this->id_barang)
            ->update(array(
                'stok' => $fisik
            ));

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
    }

    public function deleteConfirm($id)
    {
        $this->dataId = $id;
        $this->dispatch('swal:confirm', [
            'type'      => 'warning',  
            'message'   => 'Are you sure?', 
            'text'      => 'If you delete the data, it cannot be restored!'
        ]);
    }

    public function delete()
    {
        $data  = Persediaan::select('id_barang', 'perbedaan')
                    ->where('id', $this->dataId)
                    ->first();

        $id_barang   = $data->id_barang;
        $perbedaan   = $data->perbedaan;
        $stok_barang = Barang::select('stok')->where('id', $id_barang)
                        ->first()
                        ->stok;
        $stok_sekarang  = $stok_barang - $perbedaan;
        Barang::where('id', $id_barang)
            ->update([
                'stok' => $stok_sekarang
            ]);

        Persediaan::findOrFail($this->dataId)->delete();
        $this->dispatchAlert('success', 'Success!', 'Data deleted successfully.');
    }
}
