<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h4 text-gray-800"><?= $title; ?></h1>

        </div>


        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">

                    <?= form_error(
                        'menu',
                        '<div class="alert alert-danger" role="alert">',
                        '</div>'
                    ); ?>

                    <?= $this->session->flashdata('message'); ?>



                    <table class="display nowrap table table-striped table-bordered" id="example" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($role as $r) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $r['role']; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-sm btn-warning fas fa-question-circle"></a>
                                        <a href="" class="btn btn-sm btn-danger fa fa-trash-alt"></a>


                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <!-- Modal -->
    <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/role'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

</div>
</div>