<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h1 class="h4 text-gray-800">Procurement Dashboard</h1>
        </div>
        <div class="card-body">
            <?php foreach ($dashboards as $dashboard) : ?>
                <?= $dashboard->link; ?>
            <?php endforeach; ?>



            <?php if ($user['role_id'] == "1") { ?>
                <div class="table-responsive">
                    <table id="example" class="display nowrap table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($dashboards as $dashboard) : ?>

                                <tr>
                                    <td scope="row"><?= $i; ?></td>
                                    <td><?= $dashboard->id; ?></td>
                                    <td> <a href="javascript:void(0)" onclick="location.href='<?= site_url('dashboard/edit/' . $dashboard->id); ?>' ">
                                            <div class="btn btn-success btn-sm"><i class="far fa-edit fa-1x"></i></div>
                                        </a></td>



                                    <?php $i++; ?>
                                <?php endforeach; ?>
                                </tr>

                        </tbody>
                    </table>
                </div>

            <?php } ?>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->