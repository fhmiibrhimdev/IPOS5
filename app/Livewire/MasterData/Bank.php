<?php

namespace App\Livewire\MasterData;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bank as ModelsBank;

class Bank extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'delete'
    ];
    protected $rules = [
        'kode'       => 'required',
        'nama_bank'  => 'required',
    ];

    public $lengthData = 5;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId, $kode, $nama_bank;

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

        $data = ModelsBank::where('kode', 'LIKE', $search)
                    ->orWhere('nama_bank', 'LIKE', $search)
                    ->paginate($this->lengthData);

        return view('livewire.master-data.bank', compact('data'))->title('Bank');
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
        $this->kode      = '';
        $this->nama_bank = '';
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate();

        ModelsBank::create([
            'kode'      => $this->kode,
            'nama_bank' => $this->nama_bank,
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
    }
    
    public function edit($id)
    {
        $this->isEditing = true;
        $data = ModelsBank::findOrFail($id);
        $this->dataId    = $id;
        $this->kode      = $data->kode;
        $this->nama_bank = $data->nama_bank;
    }
    
    public function update()
    {
        $this->validate();
        
        if ($this->dataId) {
            ModelsBank::findOrFail($this->dataId)->update([
                'kode'      => $this->kode,
                'nama_bank' => $this->nama_bank,
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
        ModelsBank::findOrFail($this->dataId)->delete();
        $this->dispatchAlert('success', 'Success!', 'Data deleted successfully.');
    }
}
