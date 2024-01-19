<?php

namespace App\Livewire\Persediaan;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Persediaan;
use Livewire\WithPagination;

class SaldoAwalItem extends Component
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
    ];

    public $lengthData = 5;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId, $tanggal, $id_barang, $qty, $deskripsi, $status;

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
        $this->tanggal      = date('Y-m-d H:i');
        $this->id_barang    = Barang::min('id');
        $this->qty          = 1;
        $this->deskripsi    = '-';
    }

    public function render()
    {
        $this->searchResetPage();
        $search = '%'.$this->searchTerm.'%';

        $barangs = Barang::select('id', 'nama_barang')->get();

        $data = Persediaan::select('persediaan.*', 'barang.nama_barang', )
                    ->join('barang', 'barang.id', 'persediaan.id_barang', )
                    ->where(function ($query) use ($search)  {
                        $query->where('barang.nama_barang', 'LIKE', $search)
                        ->orWhere('persediaan.tanggal', 'LIKE', $search)
                        ->orWhere('persediaan.qty', 'LIKE', $search)
                        ->orWhere('persediaan.deskripsi', 'LIKE', $search);
                    })
                    ->where('persediaan.status', 'Balance')
                    ->where('persediaan.opname', 'no')
                    ->orderBy('persediaan.id', 'DESC')
                    ->paginate($this->lengthData);

        return view('livewire.persediaan.saldo-awal-item', compact('data', 'barangs'))->title('Saldo Awal Item');
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

    private function logikaStok($total_stok_sekarang, $qty_baru, $qty_akhir, $id_barang, $tanggal, $id, $deskripsi)
    {
        $total          = $qty_baru - $qty_akhir;
        $total_stok     = $total_stok_sekarang + $total;
        if ( $total_stok < 0 )
        {
            $this->alertStockMinus();
        } else {
            Barang::where('id', $id_barang)
                ->update(array(
                    'stok' => $total_stok
                ));

            $data = Persediaan::findOrFail($id);
            $data->update([
                'tanggal'       => date('Y-m-d H:i', strtotime($tanggal)),
                'qty'           => $qty_baru,
                'deskripsi'     => $deskripsi,
            ]);

            $this->dispatchAlert('success', 'Success!', 'Data updated successfully.');
        }
    }

    private function alertStockMinus()
    {
        $this->dispatchAlert('warning', 'Warning!', 'Stok tidak boleh kurang dari nol atau minus.');
    }

    private function resetInputFields()
    {
        $this->tanggal      = date('Y-m-d H:i');
        $this->id_barang    = Barang::min('id');
        $this->qty          = 1;
        $this->deskripsi    = '-';
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate();
        
        $stok_akhir_barang = Barang::where('id', $this->id_barang)->first()->stok;
        $tambah_stok = $stok_akhir_barang + $this->qty;
        if($tambah_stok < 0) {
            $this->alertStockMinus();
        } else {
            Persediaan::create([
                'tanggal'   => $this->tanggal,
                'id_barang' => $this->id_barang,
                'qty'       => $this->qty,
                'deskripsi' => $this->deskripsi,
                'status'    => 'Balance',
            ]);

            Barang::where('id', $this->id_barang)
                ->update(array(
                    'stok' => $tambah_stok
                ));

            $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
        }
    }
    
    public function edit($id)
    {
        $this->isEditing = true;
        $data = Persediaan::findOrFail($id);
        $this->dataId     = $id;
        $this->tanggal      = $data->tanggal;
        $this->id_barang    = $data->id_barang;
        $this->qty          = $data->qty;
        $this->deskripsi    = $data->deskripsi;
    }
    
    public function update()
    {
        $this->validate();
        
        if ($this->dataId) {
            $id_barang    = Persediaan::where('id', $this->dataId)->first()->id_barang; // ID: 1
            $total_stok_sekarang = Barang::where('id', $id_barang)->first()->stok; // 
            $qty_akhir   = Persediaan::where('id', $this->dataId)->first()->qty;
            $qty_baru    = $this->qty;

            $this->logikaStok($total_stok_sekarang, $qty_baru, $qty_akhir, $id_barang, $this->tanggal, $this->dataId, $this->deskripsi);
            $this->dataId = null;
        }
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
        $qty_akhir   = Persediaan::where('id', $this->dataId)->first()->qty;
        $id_barang    = Persediaan::where('id', $this->dataId)->first()->id_barang;
        $stok_akhir = Barang::where('id', $id_barang)->first()->stok;

        $total_stok = $stok_akhir - $qty_akhir;

        Barang::where('id', $id_barang)
            ->update(array(
                'stok' => $total_stok
            ));

        Persediaan::findOrFail($this->dataId)->delete();
        $this->dispatchAlert('success', 'Success!', 'Data deleted successfully.');
    }
}
