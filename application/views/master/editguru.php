<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>

    <div class=" row">
        <div class="col-md-12">
            <div class="card-group">
                <div class="card mb-4 d-flex">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-white"> <i class="fas fa-user-circle"></i><b> Edit Data Guru</b></h5>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-bio-diri-tab" data-toggle="pill" href="#custom-tabs-bio-diri" role="tab"><i class="fas fa-user-friends"></i> Data Guru</a>
                            </li>
                        </ul>
                        <p></p>
                        <form action="<?php base_url("data/editguru") ?>" method="post">
                            <div class="tab-content" id="custom-tabs-content">
                                <div class="tab-pane fade active show" id="custom-tabs-bio-diri" role="tabpanel">


                                    <!-- Hidden Value -->

                                    <!-- End of Hidden Value -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?= $guru->nama_guru ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">NUPTK</label>
                                            <input type="text" class="form-control" id="nuptk" name="nuptk" value="<?= $guru->nuptk ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= $guru->email ?>">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputPassword4">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $guru->alamat ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Agama</label>
                                            <select name="agama" id="agama" class="form-control">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Khonghucu">Khonghucu</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $guru->tempat_lahir ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Tanggal Lahir</label>
                                            <input class="form-control" type="date" data-date-format="mm/dd/yyyy" id="tanggal_lahir" name="tanggal_lahir" value="<?= $guru->tanggal_lahir ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">No Handphone</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" onkeypress="return event.charCode >= 48 && event.charCode <=57" maxlength="14" value="<?= $guru->no_hp ?>">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputPassword4">Motto Hidup</label>
                                            <input type="text" class="form-control" id="motto" name="motto" value="<?= $guru->motto ?>">
                                        </div>

                                        <div class="form-group col-sm-12">

                                            <button type="submit" style="float: right;" class="btn btn-primary">Save </button>

                                        </div>


                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>