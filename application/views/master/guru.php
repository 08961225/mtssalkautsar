<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>

    <div class=" row">
        <div class="col-md-12">
            <div class="card-group">
                <div class="card mb-4 d-flex">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-white"> <i class="fas fa-chalkboard-teacher"></i><b> Data Guru</b></h5>
                    </div>

                    <div class="card-body box-profile">

                        <?php if ($user['role_id'] == '1') { ?>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#guru">
                                Add
                            </button>

                        <?php } ?>
                        </p>

                        <div class="table-responsive">
                            <table id="example" class="display nowrap table table-striped table-bordered " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nip</th>
                                        <th>Nama Guru</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat || Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($guru as $s) : ?>
                                        <tr>
                                            <td scope="row"><?= $i; ?></td>
                                            <td><?= $s->nip; ?></td>
                                            <td><?= $s->nama_guru; ?></td>
                                            <td><?= $s->jenis_kelamin; ?></td>
                                            <td><?= $s->tempat_lahir . " || " . $s->tanggal_lahir; ?></td>
                                            <td><?= $s->agama; ?></td>
                                            <td class="center">
                                                <a href="javascript:void(0)" style="text-decoration:none" onclick="location.href='<?= site_url('data/editguru/' . $s->nip); ?>' ">
                                                    <div class="btn btn-success btn-sm"><i class="far fa-edit fa-1x"></i></div>
                                                </a>

                                                <a onclick="javascript: return confirm('Are you sure to delete this data?')" href="<?= base_url('data/deleteguru/') . $s->nip; ?>" input type="hidden" style="text-decoration:none">
                                                    <div class="btn btn-danger btn-sm"><i class="fa fa-trash fa-1x"></i></div>
                                                </a>



                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tr>
                                </tbody>
                            </table>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade " id="guru" tabindex="-1" role="dialog" aria-labelledby="guruLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white" id="guruLabel"><i class="fas fa-chalkboard-teacher"></i> Input Data Guru</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="guru" action="<?= base_url('data/addguru'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="card card-success card-outline card-outline-tabs">
                                                <div class="card-header p-0 border-bottom-0">
                                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="custom-tabs-four-bio-diri-tab" data-toggle="pill" href="#custom-tabs-bio-diri" role="tab"><i class="fas fa-user"></i> Data Login</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-tabs-bio-wali-tab" data-toggle="pill" href="#custom-tabs-bio-wali" role="tab"><i class="fas fa-user-friends"></i> Data Guru</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content" id="custom-tabs-content">
                                                        <div class="tab-pane fade active show" id="custom-tabs-bio-diri" role="tabpanel">
                                                            <input type="hidden" id="nip" name="nip" value="<?= $nip ?>">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="inputEmail4">NIP</label>
                                                                    <input type="text" class="form-control" value="<?= $nip; ?>" disabled>
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
                                                                    <input type="text" class="form-control" id="nama_guru" name="nama_guru">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">NUPTK</label>
                                                                    <input type="text" name="nuptk" id="nuptk" class="form-control" maxlength="16">
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
                                                                    <label for="inputPassword4">Motto Hidup</label>
                                                                    <input type="text" class="form-control" id="motto" name="motto">
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label for="inputPassword4">Kata Motivasi</label>
                                                                    <input type="text" class="form-control" id="motivasi" name="motivasi">
                                                                </div>


                                                                <!-- /.card -->
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <input id="data/addguru" type="submit" value="Submit" class="btn btn-primary" />
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
        $('guru').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "data/addguru",
                type: "POST",
                data: $("guru").serialize(),
                success: function(data) {
                    alert("Successfully submitted.")
                }
            });
        });
    });
</script>