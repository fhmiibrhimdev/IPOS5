<?php

namespace App\Livewire\MasterData;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MitraPengguna;

class Supplier extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'delete'
    ];
    protected $rules = [
        'nama_lengkap' => 'required',
    ];

    public $lengthData = 5;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId, $kode, $nama_lengkap, $alamat, $kota, $provinsi, $negara, $kode_pos, $telepon, $fax, $email, $kontak, $no_rek, $rek_an, $bank, $npwp, $keterangan, $role;

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
        $this->kode = '';
        $this->nama_lengkap = '';
        $this->alamat = '';
        $this->kota = '';
        $this->provinsi = '';
        $this->negara = '';
        $this->kode_pos = '';
        $this->telepon = '';
        $this->fax = '';
        $this->email = '';
        $this->kontak = '';
        $this->no_rek = '';
        $this->rek_an = '';
        $this->bank = '';
        $this->npwp = '';
        $this->keterangan = '';
        $this->role = '';
    }

    public function render()
    {
        $this->searchResetPage();
        $search = '%'.$this->searchTerm.'%';

        $data = MitraPengguna::where(function($query) use($search) {
                    $query->where('kode', 'LIKE', $search)
                    ->orWhere('nama_lengkap', 'LIKE', $search)
                    ->orWhere('telepon', 'LIKE', $search)
                    ->orWhere('email', 'LIKE', $search);
                })
                ->where('role', 'Supplier')
                ->paginate($this->lengthData);

        return view('livewire.master-data.supplier', compact('data'))->title('Mitra Pengguna | Supplier');
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
        $latestData = MitraPengguna::where('role', 'Supplier')->latest('kode')->first();

        $urutan = ($latestData) ? (int)substr($latestData->kode, 4) + 1 : 1;

        $kode = "SPL-" . sprintf("%04s", $urutan);
        return $kode;
    }

    private function resetInputFields()
    {
        $this->kode = '';
        $this->nama_lengkap = '';
        $this->alamat = '';
        $this->kota = '';
        $this->provinsi = '';
        $this->negara = '';
        $this->kode_pos = '';
        $this->telepon = '';
        $this->fax = '';
        $this->email = '';
        $this->kontak = '';
        $this->no_rek = '';
        $this->rek_an = '';
        $this->bank = '';
        $this->npwp = '';
        $this->keterangan = '';
        $this->role = '';
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate();

        MitraPengguna::create([
            'kode'          => $this->generateKode(),
            'nama_lengkap'  => $this->nama_lengkap,
            'alamat'        => $this->alamat,
            'kota'          => $this->kota,
            'provinsi'      => $this->provinsi,
            'negara'        => $this->negara,
            'kode_pos'      => $this->kode_pos,
            'telepon'       => $this->telepon,
            'fax'           => $this->fax,
            'email'         => $this->email,
            'kontak'        => $this->kontak,
            'no_rek'        => $this->no_rek,
            'rek_an'        => $this->rek_an,
            'bank'          => $this->bank,
            'npwp'          => $this->npwp,
            'keterangan'    => $this->keterangan,
            'role'          => 'Supplier',
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
    }
    
    public function edit($id)
    {
        $this->isEditing = true;
        $data = MitraPengguna::findOrFail($id);
        $this->dataId       = $id;
        $this->kode         = $data->kode;
        $this->nama_lengkap = $data->nama_lengkap;
        $this->alamat       = $data->alamat;
        $this->kota         = $data->kota;
        $this->provinsi     = $data->provinsi;
        $this->negara       = $data->negara;
        $this->kode_pos     = $data->kode_pos;
        $this->telepon      = $data->telepon;
        $this->fax          = $data->fax;
        $this->email        = $data->email;
        $this->kontak       = $data->kontak;
        $this->no_rek       = $data->no_rek;
        $this->rek_an       = $data->rek_an;
        $this->bank         = $data->bank;
        $this->npwp         = $data->npwp;
        $this->keterangan   = $data->keterangan;
        $this->role         = $data->role;
    }
    
    public function update()
    {
        $this->validate();
        
        if ($this->dataId) {
            MitraPengguna::findOrFail($this->dataId)->update([
                'nama_lengkap'  => $this->nama_lengkap,
                'alamat'        => $this->alamat,
                'kota'          => $this->kota,
                'provinsi'      => $this->provinsi,
                'negara'        => $this->negara,
                'kode_pos'      => $this->kode_pos,
                'telepon'       => $this->telepon,
                'fax'           => $this->fax,
                'email'         => $this->email,
                'kontak'        => $this->kontak,
                'no_rek'        => $this->no_rek,
                'rek_an'        => $this->rek_an,
                'bank'          => $this->bank,
                'npwp'          => $this->npwp,
                'keterangan'    => $this->keterangan,
                'role'          => 'Supplier',
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
        MitraPengguna::findOrFail($this->dataId)->delete();
        $this->dispatchAlert('success', 'Success!', 'Data deleted successfully.');
    }
}
