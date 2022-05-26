<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>

    <div class=" row">
        <div class="col-md-12">
            <div class="card-group">
                <div class="card mb-4 d-flex">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-white"> <i class="fas fa-user-circle"></i><b> Periode</b></h5>
                    </div>

                    <div class="card-body box-profile">

                        <?php if ($user['role_id'] == '1') { ?>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#periode">
                                Add
                            </button>

                        <?php } ?>
                        </p>
                        <div class="table-responsive">
                            <table id="table_id" class="display nowrap table table-striped table-bordered " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Biaya</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($periode as $s) : ?>
                                        <tr>
                                            <td scope="row"><?= $i; ?></td>
                                            <td><?= $s->tahun_ajaran; ?></td>
                                            <td><?= $s->biaya; ?></td>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade " id="periode" tabindex="-1" role="dialog" aria-labelledby="periodeLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white" id="periodeLebel"><i class="fas fa-user-circle"></i> Input Data Periode</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="siswa" action="<?= base_url('data/addperiode'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="card card-success card-outline card-outline-tabs">
                                                <div class="card-header p-0 border-bottom-0">
                                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                        <a class="nav-link active" id="custom-tabs-bio-wali-tab" data-toggle="pill" href="#custom-tabs-bio-wali" role="tab"><i class="fas fa-user-friends"></i> Periode</a>
                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content" id="custom-tabs-content">
                                                        <div class="tab-pane fade active show" id="custom-tabs-bio-wali" role="tabpanel">

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Tahun Ajaran</label>
                                                                    <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4">Biaya</label>
                                                                    <input type="text" class="form-control" id="biaya" name="biaya">
                                                                </div>
                                                                <!-- /.card -->
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <input id="data/addperiode" type="submit" value="Submit" class="btn btn-primary" />
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
        $('periode').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "data/addperiode",
                type: "POST",
                data: $("periode").serialize(),
                success: function(data) {
                    alert("Successfully submitted.")
                }
            });
        });
    });
</script>