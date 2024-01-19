<div>
    <section class="section">
        <div class="section-header">
            <h1>Barang (Item)</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <h3>Tabel Barang (Item)</h3>
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
                                    <th class="text-center" width="7%">No</th>
                                    <th width="13%">Kode</th>
                                    <th width="17%">Nama Barang</th>
                                    <th class="text-right">HRG Pokok</th>
                                    <th class="text-right">HRG Jual</th>
                                    <th class="text-right">Stok</th>
                                    <th class="text-center"><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td>{{ $row->kode }}</td>
                                        <td>{{ $row->nama_barang }}</td>
                                        <td class="text-right">{{ number_format($row->harga_pokok) }}.00</td>
                                        <td class="text-right">{{ number_format($row->harga_jual) }}.00</td>
                                        <td class="text-right">{{ $row->stok }},00</td>
                                        <td class="text-center">
                                            <button wire:click.prevent="edit({{ $row->id }})"
                                                class="btn btn-primary" data-toggle="modal"
                                                data-target="#formDataModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button wire:click.prevent="deleteConfirm({{ $row->id }})"
                                                class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Not data available in the table</td>
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
        <div class="modal-dialog modal-lg">
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
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" wire:model="nama_barang" id="nama_barang" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="id_jenis">Jenis</label>
                                    <select wire:model="id_jenis" id="id_jenis" class="form-control">
                                        @foreach ($jenis as $jeni)
                                            <option value="{{ $jeni->id }}">{{ $jeni->kode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="id_satuan">Satuan</label>
                                    <select wire:model="id_satuan" id="id_satuan" class="form-control">
                                        @foreach ($satuans as $satuan)
                                            <option value="{{ $satuan->id }}">{{ $satuan->kode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="harga_pokok">Harga Pokok</label>
                                    <input type="number" wire:model="harga_pokok" id="harga_pokok"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="number" wire:model="harga_jual" id="harga_jual"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="stok_minimum">Stok Minimum</label>
                                    <input type="number" wire:model="stok_minimum" id="stok_minimum"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_supplier">Supplier</label>
                            <select wire:model="id_supplier" id="id_supplier" class="form-control">
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea wire:model="keterangan" id="keterangan" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status_jual">Status Jual</label>
                            <select wire:model="status_jual" id="status_jual" class="form-control">
                                <option value="Masih dijual">Masih dijual</option>
                                <option value="Tidak dijual">Tidak dijual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="text" wire:model="gambar" id="gambar" class="form-control">
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
