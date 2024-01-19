<div>
    <section class="section">
        <div class="section-header">
            <h1>Stok Opname</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <h3>Tabel Stok Opname</h3>
                <div class="card-body px-0">
                    <div class="show-entries">
                        <p class="show-entries-show">Show</p>
                        <select wire:model.live="lengthData" id="length-data">
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="250">250</option>
                            <option value="500">500</option>
                        </select>
                        <p class="show-entries-entries">Entries</p>
                    </div>
                    <div class="search-column">
                        <p>Search: </p><input type="search" wire:model.live.debounce.750ms="searchTerm"
                            id="search-data" placeholder="Search here..." class="form-control" value="">
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="w-[8%] lg:w-[6%]">No</th>
                                    <th class="w-[20%] lg:w-[12%]">Tanggal</th>
                                    <th class="w-[25%] lg:w-[15%]">Nama Barang</th>
                                    <th class="w-[11%] lg:w-[9%] text-right">Buku</th>
                                    <th class="w-[11%] lg:w-[9%] text-right">Fisik</th>
                                    <th class="w-[13%] lg:w-[9%] text-right">Selisih</th>
                                    <th class="w-[20%] lg:w-[30%]">Deskripsi</th>
                                    <th class="w-[10%] text-center"><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $row->tanggal }}</td>
                                        <td>{{ $row->nama_barang }}</td>
                                        <td class="text-right">{{ $row->buku }},00</td>
                                        <td class="text-right">{{ $row->fisik }},00</td>
                                        <td class="text-right">{{ $row->perbedaan }},00</td>
                                        <td>{{ $row->deskripsi }}</td>
                                        <td class="text-center">
                                            <button wire:click.prevent="deleteConfirm({{ $row->id }})"
                                                class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Not data available in the table</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5 px-3">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
        <button wire:click.prevent="isEditingMode(false)" class="btn-modal" data-toggle="modal" data-backdrop="static"
            data-keyboard="false" data-target="#formDataModal">
            <i class="far fa-plus"></i>
        </button>
    </section>
    <div class="modal fade" wire:ignore.self id="formDataModal" aria-labelledby="formDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-kode" id="formDataModalLabel">{{ $isEditing ? 'Edit Data' : 'Add Data' }}</h5>
                    <button type="button" wire:click="cancel()" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="datetime" wire:model="tanggal" id="tanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="id_barang">Nama Barang</label>
                            <select wire:model.live="id_barang" id="id_barang" class="form-control">
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="buku">Buku</label>
                            <input type="number" wire:model="buku" id="buku" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="fisik">Fisik</label>
                            <input type="number" wire:model.live="fisik" id="fisik" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="perbedaan">Selisih</label>
                            <input type="number" wire:model="perbedaan" id="perbedaan" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="cancel()" class="btn btn-secondary tw-bg-gray-300"
                            data-dismiss="modal">Close</button>
                        <button type="submit" wire:click.prevent="{{ $isEditing ? 'update()' : 'store()' }}"
                            wire:loading.attr="disabled" class="btn btn-primary tw-bg-blue-500">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
