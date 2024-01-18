<?php

namespace App\Livewire\MasterData;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Satuan as ModelsSatuan;

class Satuan extends Component
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

    public $lengthData = 25;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId, $kode, $keterangan;

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

        $data = ModelsSatuan::where('kode', 'LIKE', $search)
                    ->orWhere('keterangan', 'LIKE', $search)
                    ->paginate($this->lengthData);

        return view('livewire.master-data.satuan', compact('data'))->title('Satuan');
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
        $this->keterangan = '';
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate();

        ModelsSatuan::create([
            'kode'       => $this->kode,
            'keterangan' => $this->keterangan,
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
    }
    
    public function edit($id)
    {
        $this->isEditing = true;
        $data = ModelsSatuan::findOrFail($id);
        $this->dataId     = $id;
        $this->kode       = $data->kode;
        $this->keterangan = $data->keterangan;
    }
    
    public function update()
    {
        $this->validate();
        
        if ($this->dataId) {
            ModelsSatuan::findOrFail($this->dataId)->update([
                'kode'       => $this->kode,
                'keterangan' => $this->keterangan,
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
        ModelsSatuan::findOrFail($this->dataId)->delete();
        $this->dispatchAlert('success', 'Success!', 'Data deleted successfully.');
    }
}
