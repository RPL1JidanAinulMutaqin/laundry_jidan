<!-- Button trigger modal -->
<button type="button" class="badge bg-success border-0" data-toggle="modal" data-target="#editinventarisModal{{ $bi->id }}">
    <i class="ni ni-ruler-pencil"></i>
</button>

<!-- Modal Edit -->
<div class="modal fade" id="editinventarisModal{{ $bi->id }}" tabindex="-1" aria-labelledby="editinventarisModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-dark">
             <h5 class="modal-title" id="exampleModalLabel">Update Inventaris</h5>
             <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="/{{ request()->segment(1)}}/inventaris/{{ $bi->id }}" method="POST" class="text-dark">
                @method('PUT')
             @csrf
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" required autofocus value="{{ old('nama_barang', $bi->nama_barang) }}">
                    @error('nama_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="merk_barang" class="form-label">Merk Barang</label>
                    <input type="text" class="form-control @error('merk_barang') is-invalid @enderror" id="merk_barang" name="merk_barang" required autofocus value="{{ old('merk_barang', $bi->merk_barang) }}">
                    @error('merk_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">Qty</label>
                    <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" required autofocus value="{{ old('qty', $bi->qty) }}">
                    @error('qty')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kondisi" class="form-label">Kondisi</label>
                    <select class="form-select form-select mb-3" aria-label=".form-select example" id="kondisi" name="kondisi" required>
                      <option selected>Pilih Kondisi</option>
                      <option name="kondisi" value="layak_pakai">Layak Pakai</option>
                      <option name="kondisi" value="rusak_ringan">Rusak ringan</option>
                      <option name="kondisi" value="rusak_berat">Rusak berat</option>
                    </select>
                    @error('kondisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_pengadaan" class="form-label">Tanggal Pengadaan</label>
                    <input type="date" class="form-control @error('tanggal_pengadaan') is-invalid @enderror" id="tanggal_pengadaan"
                        name="tanggal_pengadaan" required autofocus value="{{ date('Y-m-d') }}">
                    @error('tanggal_pengadaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark btn-outline-primary border-0">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--End Modal Edit -->
