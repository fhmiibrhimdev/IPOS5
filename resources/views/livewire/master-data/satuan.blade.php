<div>
    <section class="section">
        <div class="section-header">
            <h1>Satuan</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <h3>Tabel Satuan</h3>
                <div class="card-body">
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
                                <th width="10%">No</th>
                                <th width="35%">Kode</th>
                                <th>Keterangan</th>
                                <th class="text-center"><i class="fas fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>BOX</td>
                                <td>BOX</td>
                                <td class="text-center">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>BOX</td>
                                <td>BOX</td>
                                <td class="text-center">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>BOX</td>
                                <td>BOX</td>
                                <td class="text-center">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>BOX</td>
                                <td>BOX</td>
                                <td class="text-center">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>BOX</td>
                                <td>BOX</td>
                                <td class="text-center">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>
        </div>
    </section>
</div>
