<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>

    <div class=" row">
        <div class="col-md-12">
            <div class="card-group">
                <div class="card mb-4 d-flex">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-white"> <i class="fas fa-list-ol"></i><b> List Penilaian Siswa</b></h5>
                    </div>

                    <div class="card-body box-profile">

                        <?php if ($user['role_id'] == '11') { ?>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#siswa">
                                Add
                            </button>

                        <?php } ?>
                        </p>
                        <div class="table-responsive">
                            <table id="table_id" class="display nowrap table table-striped table-bordered " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Guru</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Nis Siswa</th>
                                        <th>Nama Siswa</th>
                                        <th>Nilai</th>
                                        <th>Periode</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($nilai as $s) : ?>
                                        <tr>
                                            <td><?= $s->nama_guru; ?></td>
                                            <td><?= $s->nama_pelajaran; ?></td>
                                            <td><?= $s->nis; ?></td>
                                            <td><?= $s->name; ?></td>
                                            <td><?= $s->nilai; ?></td>
                                            <td><?= $s->tahun_ajaran; ?></td>




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








    <!-- Modal -->
    <div class="modal fade " id="siswa" tabindex="-1" role="dialog" aria-labelledby="siswaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="siswaLabel"><i class="fas fa-list-ol"></i><b> Input Nilai Siswa</b></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="siswa" action="<?= base_url('penilaian/save'); ?>" method="post">
                    <div class="modal-body">
                        <div class="card card-success card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-bio-diri-tab" data-toggle="pill" href="#custom-tabs-bio-diri" role="tab"><i class="fas fa-list-ol"></i><b> Data Penilaian</b></a>
                                    </li>


                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-content">
                                    <div class="tab-pane fade active show" id="custom-tabs-bio-diri" role="tabpanel">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Nis</label>
                                                <select name="nis" id="nis" class="form-control">
                                                    <?php foreach ($siswa as $k) : ?>
                                                        <option value="<?php echo $k->nis ?>"><?php echo $k->nis . "-" . $k->name ?></option>';
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Mata Pelajaran</label>
                                                <select name="id_mata_pelajaran" id="id_mata_pelajaran" class="form-control">
                                                    <?php foreach ($mapel as $k) : ?>
                                                        <option value="<?php echo $k->id_mata_pelajaran ?>"><?php echo $k->nama_pelajaran; ?></option>';
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Nama Guru</label>
                                                <input type="text" class="form-control" id="nip" name="nama_guru" value="<?= $user['name'] ?>" disabled>
                                            </div>

                                            <input type="hidden" id="nip" name="nip" value="<?= $user['no_induk'] ?>">

                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Nilai</label>
                                                <input type="text" class="form-control" id="nilai" name="nilai">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Periode</label>
                                                <select name="id_periode" id="id_periode" class="form-control">
                                                    <?php foreach ($periode as $k) : ?>
                                                        <option value="<?php echo $k->id_periode ?>"><?php echo $k->tahun_ajaran ?></option>';
                                                    <?php endforeach; ?>
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
