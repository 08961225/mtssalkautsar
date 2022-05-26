<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h1 class="h4 text-gray-800">Procurement Dashboard</h1>
        </div>
        <div class="card-body">
            <?= form_open_multipart('dashboard/add'); ?>

            <div class="form-row">

                <div class="form-group col-md-12">
                    <label for="date_created">Link</label>
                    <input type="text" class="form-control" id="link" name="link">
                    <?= form_error('link', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary" style="float:right">Save </button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->