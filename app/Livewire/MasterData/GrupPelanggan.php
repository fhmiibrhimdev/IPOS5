<?php

namespace App\Livewire\MasterData;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GrupPelanggan as ModelsGrupPelanggan;

class GrupPelanggan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'delete'
    ];
    protected $rules = [
        'kode'          => 'required',
        'grup'          => 'required',
        'potongan'      => 'required',
        'level_harga'   => 'required',
    ];

    public $lengthData = 5;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId, $kode, $grup, $potongan, $level_harga;

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

    public function render()
    {
        $this->searchResetPage();
        $search = '%'.$this->searchTerm.'%';

        $data = ModelsGrupPelanggan::where('kode', 'LIKE', $search)
                    ->orWhere('grup', 'LIKE', $search)
                    ->orWhere('potongan', 'LIKE', $search)
                    ->orWhere('level_harga', 'LIKE', $search)
                    ->paginate($this->lengthData);

        return view('livewire.master-data.grup-pelanggan', compact('data'))->title('Grup Pelanggan');
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
        $this->kode = '';
        $this->grup = '';
        $this->potongan = '';
        $this->level_harga = '';
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate();

        ModelsGrupPelanggan::create([
            'kode'          => $this->kode,
            'grup'          => $this->grup,
            'potongan'      => $this->potongan,
            'level_harga'   => $this->level_harga,
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
    }
    
    public function edit($id)
    {
        $this->isEditing = true;
        $data = ModelsGrupPelanggan::findOrFail($id);
        $this->dataId     = $id;
        $this->kode         = $data->kode;
        $this->grup         = $data->grup;
        $this->potongan     = $data->potongan;
        $this->level_harga  = $data->level_harga;
    }
    
    public function update()
    {
        $this->validate();
        
        if ($this->dataId) {
            ModelsGrupPelanggan::findOrFail($this->dataId)->update([
                'kode'          => $this->kode,
                'grup'          => $this->grup,
                'potongan'      => $this->potongan,
                'level_harga'   => $this->level_harga,
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
        ModelsGrupPelanggan::findOrFail($this->dataId)->delete();
        $this->dispatchAlert('success', 'Success!', 'Data deleted successfully.');
    }
}
