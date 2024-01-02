<div class="modal fade" id="modal-add-sekolah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Sekolah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form text-left" id="tambah-sekolah">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group mb-3">
                                <label>Nama Sekolah</label>
                                <input type="text" class="form-control" id="add-nama" name="nama">
                                <div id="add-nama-msg"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Alamat</label>
                                <textarea class="form-control" id="add-alamat" name="alamat" rows="1"></textarea>
                                <div id="add-alamat-msg"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Gambar Sekolah</label>
                                <input type="file" class="form-control" id="add-gambar" name="gambar">
                                <div id="add-gambar-msg"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group mb-3">
                                <label>Latitude</label>
                                <input type="text" class="form-control" id="add-latitude" name="latitude">
                                <div id="add-latitude-msg"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Longitude</label>
                                <input type="text" class="form-control" id="add-longitude" name="longitude">
                                <div id="add-longitude-msg"></div>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <button type="button"
                                        class="btn btn-round bg-gradient-secondary btn-lg w-100 mt-1 mb-0"
                                        data-bs-dismiss="modal">Batal</button>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <button type="submit"
                                        class="btn btn-round bg-gradient-info btn-lg w-100 mt-1 mb-0">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-sekolah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Sekolah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form text-left" id="form-edit-sekolah">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group mb-3">
                                <label>Nama Sekolah</label>
                                <input type="text" class="form-control" id="edit-nama" name="nama">
                                <input type="hidden" class="form-control" id="edit-id_sekolah" name="id_sekolah">
                                <div id="edit-nama-msg"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Alamat</label>
                                <textarea class="form-control" id="edit-alamat" name="alamat" rows="1"></textarea>
                                <div id="edit-alamat-msg"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Gambar Sekolah</label>
                                <input type="file" class="form-control" id="edit-gambar" name="gambar">
                                <div id="edit-gambar-msg"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group mb-3">
                                <label>Latitude</label>
                                <input type="text" class="form-control" id="edit-latitude" name="latitude">
                                <div id="edit-latitude-msg"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Longitude</label>
                                <input type="text" class="form-control" id="edit-longitude" name="longitude">
                                <div id="edit-longitude-msg"></div>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <button type="button"
                                        class="btn btn-round bg-gradient-secondary btn-lg w-100 mt-1 mb-0"
                                        data-bs-dismiss="modal">Batal</button>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <button type="submit"
                                        class="btn btn-round bg-gradient-info btn-lg w-100 mt-1 mb-0">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>