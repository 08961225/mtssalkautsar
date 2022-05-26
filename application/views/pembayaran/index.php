<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>

    <div class=" row">
        <div class="col-md-12">
            <div class="card-group">
                <div class="card mb-4 d-flex">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-white"> <i class="fas fa-dollar-sign"></i><b> List Pembayaran Siswa</b></h5>
                    </div>

                    <div class="card-body box-profile">

                        <?php if ($user['role_id'] == '12') { ?>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#siswa">
                                Add
                            </button>

                        <?php } ?>
                        </p>
                        <div class="table-responsive">
                            <table id="table_id" class="display nowrap table table-striped table-bordered " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Bendahara</th>
                                        <th>Tgl Pembayaran</th>
                                        <th>Invoice</th>
                                        <th>Nama Siswa</th>
                                        <th>Bulan Pembayaran</th>
                                        <th>St Pembayaran</th>
                                        <th>Kelas</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($pembayaran as $s) : ?>
                                        <tr>
                                            <td><?= $s->nama_bendahara; ?></td>
                                            <td><?= $s->tanggal_pembayaran; ?></td>
                                            <td><?= $s->no_invoice; ?></td>
                                            <td><?= $s->name; ?></td>
                                            <td><?= $s->nama_bulan; ?></td>
                                            <td><?= $s->status_pembayaran; ?></td>
                                            <td><?= $s->nama_ruangan; ?></td>
                                            <td class="center">
                                                <a href="javascript:void(0)" style="text-decoration:none" onclick="location.href='<?= site_url('pembayaran/editpembayaran/' . $s->no_invoice); ?>' ">
                                                    <div class="btn btn-success btn-sm"><i class="far fa-edit fa-1x"></i></div>
                                                </a>

                                                <a onclick="javascript: return confirm('Are you sure to delete this data?')" href="<?= base_url('data/delete/') . $s->nis; ?>" input type="hidden" style="text-decoration:none">
                                                    <div class="btn btn-danger btn-sm"><i class="fa fa-trash fa-1x"></i></div>
                                                </a>




                                            <?php endforeach; ?>
                                        </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade " id="siswa" tabindex="-1" role="dialog" aria-labelledby="siswaLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white" id="siswaLabel"><i class="fas fa-dollar-sign"></i> Input Pembayaran</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form id="siswa" action="<?= base_url('pembayaran/addpembayaran'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="card card-success card-outline card-outline-tabs">
                                                <div class="card-header p-0 border-bottom-0">
                                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="custom-tabs-four-bio-diri-tab" data-toggle="pill" href="#custom-tabs-bio-diri" role="tab"><i class="fas fa-dollar-sign"></i> Data Pembayaran</a>
                                                        </li>


                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content" id="custom-tabs-content">
                                                        <div class="tab-pane fade active show" id="custom-tabs-bio-diri" role="tabpanel">

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputEmail4">Nomor Invoice</label>
                                                                    <input type="text" class="form-control" name="no_invoice" id="no_invoice" value="<?= $noinvoice; ?>" readonly>
                                                                </div>



                                                                <div class="form-group col-md-6">
                                                                    <label for="inputEmail4">Tanggal Pembayaran</label>
                                                                    <input type="text" class="form-control" id="tanggal_pembayaran" value="<?= date("y-m-d") ?>" disabled>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Siswa</label>
                                                                    <select name="nis" id="nis" class="form-control">
                                                                        <?php foreach ($siswa as $k) : ?>
                                                                            <option value="<?php echo $k->nis ?>"><?php echo $k->nis . "-" . $k->name ?></option>';
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Nama Bendahara</label>
                                                                    <input type="text" class="form-control" id="nama_bendahara" name="nama_bendahara">
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Status Pembayaran</label>
                                                                    <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                                                                        <option value="Lunas">Lunas</option>
                                                                        <option value="Belum Lunas">Belum Lunas</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Periode</label>
                                                                    <select name="id_periode" id="id_periode" class="form-control">
                                                                        <?php foreach ($periode as $k) : ?>
                                                                            <option value="<?php echo $k->id_periode ?>"><?php echo $k->tahun_ajaran ?></option>';
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Jumlah Pembayaran</label>
                                                                    <select name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control">
                                                                        <?php foreach ($periode as $k) : ?>
                                                                            <option value="<?php echo $k->biaya ?>"><?php echo number_format($k->biaya) ?></option>';
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Nama Bulan</label>
                                                                    <select name="nama_bulan" id="nama_bulan" class="form-control">
                                                                        <option value="Januari">Januari</option>
                                                                        <option value="Februari">Februari</option>
                                                                        <option value="Maret">Maret</option>
                                                                        <option value="April">April</option>
                                                                        <option value="Mei">Mei</option>
                                                                        <option value="Juni">Juni</option>
                                                                        <option value="Juli">Juli</option>
                                                                        <option value="Agustus">Agustus</option>
                                                                        <option value="September">September</option>
                                                                        <option value="Oktober">Oktober</option>
                                                                        <option value="November">November</option>
                                                                        <option value="Desember">Desember</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>





                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <input id="data/addsiswa" type="submit" value="Submit" class="btn btn-primary" />
                                                        </div>
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
    </div>

</div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable({

        });
    });
</script>
<script>
    $(function() {
        $('siswa').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "pembayaran/addpembayaran",
                type: "POST",
                data: $("siswa").serialize(),
                success: function(data) {
                    alert("Successfully submitted.")
                }
            });
        });
    });
</script>