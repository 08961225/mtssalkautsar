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

                        <?php if ($user['role_id'] == '1') { ?>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#siswa">
                                Add
                            </button>

                        <?php } ?>
                        </p>
                        <div class="table-responsive">
                            <table id="table_id" class="display nowrap table table-striped table-bordered " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Tahun Ajaran</th>
                                        <th>Bulan Bayar</th>
                                        <th>nis</th>
                                        <th>Nama Siswa</th>
                                        <th>No Invoice</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Status</th>
                                        <th>Value Pembayaran</th>
                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($pembayaran as $s) : ?>

                                        <tr>
                                            <td><?= $s->tahun_ajaran; ?></td>
                                            <td><?= $s->nama_bulan; ?></td>
                                            <td><?= $s->nis; ?></td>
                                            <td><?= $s->name; ?></td>
                                            <td><?= $s->no_invoice; ?></td>
                                            <td><?= $s->tanggal_pembayaran; ?></td>
                                            <td><?= $s->status_pembayaran; ?></td>

                                            <td>IDR <?php echo number_format($s->jumlah_pembayaran); ?></td>
                                            <td><?= $s->nama_bulan; ?></td>




                                        <?php endforeach; ?>
                                        </tr>
                                </tbody>
                            </table>
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
            "order": [
                [1, "asc"]
            ]

        });
    });
</script>
