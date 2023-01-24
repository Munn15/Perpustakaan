<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Produk</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('produk'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('no' => 'FrmEditProduk', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="no" class="col-sm-2 col-form-label">No</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="no" name="no" value=" <?= $data_produk->no; ?>">
                            <input type="text" class="form-control" id="no" name="no" value=" <?= $data_produk->no; ?>">
                            <small class="text-danger">
                                <?php echo form_error('no') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value=" <?= $data_produk->nama; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="kategori" name="kategori">
                                <option value="Makanan" selected disabled>Pilih</option>
                                <option value="Makanan" <?php if ($data_produk->kategori == "Makanan") : echo "selected";
                                                        endif; ?>>Makanan</option>
                                <option value="Minuman" <?php if ($data_produk->kategori == "Minuman") : echo "selected";
                                                            endif; ?>>Minuman</option>
                                <option value="Kesehatan" <?php if ($data_produk->kategori == "Kesehatan") : echo "selected";
                                                        endif; ?>>Kesehatan</option>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('kategori') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $data_produk->harga; ?>">
                            <small class="text-danger">
                                <?php echo form_error('harga') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="persediaan" class="col-sm-2 col-form-label">Persediaan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="persediaan" name="persediaan" value="<?= $data_produk->persediaan; ?>">
                            <small class="text-danger">
                                <?php echo form_error('persediaan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>