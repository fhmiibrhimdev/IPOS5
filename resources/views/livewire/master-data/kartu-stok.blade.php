<div>
    <section class="section">
        <div class="section-header">
            <h1>Kartu Stok</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_barang">Nama Barang</label>
                                <select wire:model.live="id_barang" id="id_barang" class="form-control">
                                    @foreach ($barangs as $barang)
                                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_awal">Mulai tanggal</label>
                                <input type="date" wire:model.live="tanggal_awal" id="tanggal_awal"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_akhir">s/d Tanggal</label>
                                <input type="date" wire:model.live="tanggal_akhir" id="tanggal_akhir"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="card">
                        <h3>Tabel Kartu Stok</h3>
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
                                        <tr class="text-center">
                                            <th class="px-2 py-0 text-left" rowspan="2">Tanggal</th>
                                            <th class="px-2 py-0 text-left" rowspan="2">Deskripsi</th>
                                            <th class="px-2 py-0" rowspan="2">Stok Awal</th>
                                            <th class="px-2 py-0" colspan="2">Mutasi</th>
                                            <th class="px-2 py-0" rowspan="2">Stok Akhir</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Masuk</th>
                                            <th>Keluar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $row)
                                            <tr class="text-center">
                                                <td class="text-left">{{ $row->tanggal }}</td>
                                                <td class="text-left">{{ $row->deskripsi }}</td>
                                                <td class="text-right">
                                                    @if ($row->status == 'Balance')
                                                        {{ $row->qty }},00
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    @if ($row->status == 'In')
                                                        {{ $row->qty }},00
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    @if ($row->status == 'Out')
                                                        {{ $row->qty }},00
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-right">{{ $row->balancing }},00</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Not data available in the table
                                                </td>
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
            </div>

        </div>
    </section>
</div>
