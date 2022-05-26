<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>

    <div class=" row">
        <div class="col-md-12">
            <div class="card-group">
                <div class="card mb-4 d-flex">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-white"> <i class="fas fa-user-circle"></i><b> Edit Data Pembayaran</b></h5>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-bio-diri-tab" data-toggle="pill" href="#custom-tabs-bio-diri" role="tab"><i class="fas fa-user-friends"></i> Data Pembayaran</a>
                            </li>
                        </ul>
                        <p></p>

                        <form action="<?php base_url("pembayaran/editpembayaran"); ?>" method="post">
                            <div class="tab-content" id="custom-tabs-content">
                                <div class="tab-pane fade active show" id="custom-tabs-bio-diri" role="tabpanel">


                                    <!-- Hidden Value -->
                                    <input type="hidden" id="no_invoice" name="no_invoice" value="<?= $pembayaran->no_invoice ?>">
                                    <!-- End of Hidden Value -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Nomor Invoice</label>
                                            <input type="text" class="form-control" name="no_invoice" id="no_invoice" value="<?= $pembayaran->no_invoice; ?>" readonly>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Tanggal Pembayaran</label>
                                            <input type="text" class="form-control" id="tanggal_pembayaran" value="<?= date("y-m-d") ?>" disabled>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Nama Bendahara</label>
                                            <input type="text" class="form-control" id="nama_bendahara" name="nama_bendahara" value="<?= $pembayaran->nama_bendahara; ?>">
                                        </div>

                                        <div class=" form-group col-md-6">
                                            <label for="inputPassword4">Status Pembayaran</label>
                                            <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                                                <option value="Lunas">Lunas</option>
                                                <option value="Belum Lunas">Belum Lunas</option>
                                            </select>
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