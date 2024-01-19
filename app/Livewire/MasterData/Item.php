<?php

namespace App\Livewire\MasterData;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\MitraPengguna;
use App\Models\Satuan;
use Livewire\Component;
use Livewire\WithPagination;

class Item extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'delete'
    ];
    protected $rules = [
        'nama_barang'   => 'required',
        'harga_pokok'   => 'required',
        'harga_jual'    => 'required',
        'status_jual'   => 'required',
    ];

    public $lengthData = 5;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId, $kode, $nama_barang, $id_jenis, $id_satuan,
    $barcode, $harga_pokok, $harga_jual, $stok = '0',
    $stok_minimum, $id_supplier, $keterangan,
    $status_jual = 'Masih dijual', $gambar;

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
        $this->nama_barang = '';
        $this->id_jenis = Jenis::min('id');
        $this->id_satuan = Satuan::min('id');
        $this->barcode = '';
        $this->harga_pokok = '';
        $this->harga_jual = '';
        $this->stok = '0';
        $this->stok_minimum = '';
        $this->id_supplier = MitraPengguna::where('role', 'Supplier')->min('id');
        $this->keterangan = '';
        $this->status_jual = 'Masih dijual';
        $this->gambar = '';
    }

    public function render()
    {
        $this->searchResetPage();
        $search = '%'.$this->searchTerm.'%';

        $jenis = Jenis::get();
        $satuans = Satuan::get();
        $suppliers = MitraPengguna::select('id', 'nama_lengkap')->where('role', 'Supplier')->get();

        $data = Barang::where('kode', 'LIKE', $search)
                    ->orWhere('nama_barang', 'LIKE', $search)
                    ->orWhere('harga_pokok', 'LIKE', $search)
                    ->orWhere('harga_jual', 'LIKE', $search)
                    ->orWhere('stok', 'LIKE', $search)
                    ->paginate($this->lengthData);

        return view('livewire.master-data.item', compact('data', 'jenis', 'satuans', 'suppliers'))->title('Data Barang (Item)');
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

    private function generateKode()
    {
        $latestData = Barang::latest('kode')->first();

        $urutan = ($latestData) ? (int)substr($latestData->kode, 4) + 1 : 1;

        $kode = "BRG-" . sprintf("%04s", $urutan);
        return $kode;
    }

    private function resetInputFields()
    {
        $this->mount();
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate();

        Barang::create([
            'kode'           => $this->generateKode(),
            'nama_barang'    => $this->nama_barang,
            'id_jenis'       => $this->id_jenis,
            'id_satuan'      => $this->id_satuan,
            'barcode'        => $this->barcode,
            'harga_pokok'    => $this->harga_pokok,
            'harga_jual'     => $this->harga_jual,
            'stok'           => '0',
            'stok_minimum'   => $this->stok_minimum,
            'id_supplier'    => $this->id_supplier,
            'keterangan'     => $this->keterangan,
            'status_jual'    => $this->status_jual,
            'gambar'         => $this->gambar,
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
    }
    
    public function edit($id)
    {
        $this->isEditing = true;
        $data = Barang::findOrFail($id);
        $this->dataId = $id;
        $this->kode = $data->kode;
        $this->nama_barang = $data->nama_barang;
        $this->id_jenis = $data->id_jenis;
        $this->id_satuan = $data->id_satuan;
        $this->barcode = $data->barcode;
        $this->harga_pokok = $data->harga_pokok;
        $this->harga_jual = $data->harga_jual;
        $this->stok = $data->stok;
        $this->stok_minimum = $data->stok_minimum;
        $this->id_supplier = $data->id_supplier;
        $this->keterangan = $data->keterangan;
        $this->status_jual = $data->status_jual;
        $this->gambar = $data->gambar;
    }
    
    public function update()
    {
        $this->validate();
        
        if ($this->dataId) {
            Barang::findOrFail($this->dataId)->update([
                'nama_barang'    => $this->nama_barang,
                'id_jenis'       => $this->id_jenis,
                'id_satuan'      => $this->id_satuan,
                'barcode'        => $this->barcode,
                'harga_pokok'    => $this->harga_pokok,
                'harga_jual'     => $this->harga_jual,
                'stok_minimum'   => $this->stok_minimum,
                'id_supplier'    => $this->id_supplier,
                'keterangan'     => $this->keterangan,
                'status_jual'    => $this->status_jual,
                'gambar'         => $this->gambar,
            ]);

            $this->dispatchAlert('success', 'Success!', 'Data updated successfully.');
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
        Barang::findOrFail($this->dataId)->delete();
        $this->dispatchAlert('success', 'Success!', 'Data deleted successfully.');
    }
}
