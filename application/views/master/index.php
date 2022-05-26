<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>

    <div class=" row">
        <div class="col-md-12">
            <div class="card-group">
                <div class="card mb-4 d-flex">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-white"> <i class="fas fa-user-circle"></i><b> Data Siswa</b></h5>
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
                                        <th>No</th>
                                        <th>Nis</th>
                                        <th>Name</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Periode</th>
                                        <th>Kelas</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($siswa as $s) : ?>
                                        <tr>
                                            <td scope="row"><?= $i; ?></td>
                                            <td><?= $s->nis; ?></td>
                                            <td><?= $s->name; ?></td>
                                            <td><?= $s->jenis_kelamin; ?></td>
                                            <td><?= $s->tahun_ajaran; ?></td>
                                            <td><?= $s->nama_ruangan; ?></td>
                                            <td class="center">
                                                <a href="javascript:void(0)" style="text-decoration:none" onclick="location.href='<?= site_url('data/editsiswa/' . $s->nis); ?>' ">
                                                    <div class="btn btn-success btn-sm"><i class="far fa-edit fa-1x"></i></div>
                                                </a>

                                                <a onclick="javascript: return confirm('Are you sure to delete this data?')" href="<?= base_url('data/delete/') . $s->nis; ?>" input type="hidden" style="text-decoration:none">
                                                    <div class="btn btn-danger btn-sm"><i class="fa fa-trash fa-1x"></i></div>
                                                </a>



                                                <?php $i++; ?>
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
                                        <h5 class="modal-title text-white" id="siswaLabel"><i class="fas fa-user-circle"></i> Input Data Siswa</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="siswa" action="<?= base_url('data/addsiswa'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="card card-success card-outline card-outline-tabs">
                                                <div class="card-header p-0 border-bottom-0">
                                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="custom-tabs-four-bio-diri-tab" data-toggle="pill" href="#custom-tabs-bio-diri" role="tab"><i class="fas fa-user"></i> Data Login</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-tabs-bio-wali-tab" data-toggle="pill" href="#custom-tabs-bio-wali" role="tab"><i class="fas fa-user-friends"></i> Data Siswa</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content" id="custom-tabs-content">
                                                        <div class="tab-pane fade active show" id="custom-tabs-bio-diri" role="tabpanel">
                                                            <input type="hidden" id="nis" name="nis" value="<?= $nis ?>">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="inputEmail4">NIS</label>
                                                                    <input type="text" class="form-control" value="<?= $nis; ?>" disabled>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Password</label>
                                                                    <input type="password" class="form-control" id="password1" name="password1">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Repeat Password</label>
                                                                    <input type="password" class="form-control" id="password2" name="password2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="custom-tabs-bio-wali" role="tabpanel">

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" id="name" name="name">
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Periode</label>
                                                                    <select name="periode" id="periode" class="form-control">
                                                                        <?php foreach ($periode as $k) : ?>
                                                                            <option value="<?php echo $k->id_periode ?>"><?php echo $k->tahun_ajaran ?></option>';
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Email</label>
                                                                    <input type="email" class="form-control" id="email" name="email">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="inputPassword4">Alamat</label>
                                                                    <input type="text" class="form-control" id="alamat" name="alamat">
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
                                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Tanggal Lahir</label>
                                                                    <input class="form-control" type="date" data-date-format="mm/dd/yyyy" id="tanggal_lahir" name="tanggal_lahir">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">No Handphone</label>
                                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" onkeypress="return event.charCode >= 48 && event.charCode <=57" maxlength="14">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Kelas</label>
                                                                    <select name="id_kelas" id="id_kelas" class="form-control">
                                                                        <?php foreach ($kelas as $k) : ?>

                                                                            <option value="<?php echo $k->id_kelas ?>"><?php echo $k->nama_ruangan ?></option>';
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label for="inputPassword4">Motto Hidup</label>
                                                                    <input type="text" class="form-control" id="motto" name="motto">
                                                                </div>


                                                                <!-- /.card -->
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
                url: "data/addsiswa",
                type: "POST",
                data: $("siswa").serialize(),
                success: function(data) {
                    alert("Successfully submitted.")
                }
            });
        });
    });
</script>