<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Authorized <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure to end this session?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>





<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Dark Mode -->

<script src="<?= base_url('assets/'); ?>js/dark-mode-switch.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/'); ?>plugin/tiny/jquery.tinymce.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.jqueryui.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>






<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );
    $(document).ready(function() {
        $('#example').removeAttr('width').DataTable({
            "scrollX": true,
            "aaSorting": [
                [2, 'desc']
            ],

            "columnDefs": [{
                width: 20,
                targets: 0
            }]

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#archive').removeAttr('width').DataTable({
            "scrollX": true,
            "aaSorting": [
                [2, 'desc']
            ],

            "columnDefs": [{
                    width: 10,
                    targets: 0
                },
                {
                    width: 10,
                    targets: 1
                },
                {
                    width: 40,
                    targets: 2
                },
                {
                    width: 30,
                    targets: 3
                }




            ]




        });
    });
</script>



<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });




    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });

    });
</script>





<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }
</script>

<script>
    $(document).ready(function() {
        var form_count = 1,
            previous_form, next_form, total_forms;
        total_forms = $("fieldset").length;
        $(".next-form").click(function() {
            previous_form = $(this).parent();
            next_form = $(this).parent().next();
            next_form.show();
            previous_form.hide();
            setProgressBarValue(++form_count);
        });
        $(".previous-form").click(function() {
            previous_form = $(this).parent();
            next_form = $(this).parent().prev();
            next_form.show();
            previous_form.hide();
            setProgressBarValue(--form_count);
        });
        setProgressBarValue(form_count);

        function setProgressBarValue(value) {
            var percent = parseFloat(100 / total_forms) * value;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
                .html(percent + "%");
        }
        // Handle form submit and validation
        $("#register_form").submit(function(event) {
            var error_message = '';
            if (!$("#name").val()) {
                error_message += "Please Fill Registered Company Name";
            }
            if (!$("#cfo").val()) {
                error_message += "<br>Please CEO Name";
            }
            if (!$("#ceo").val()) {
                error_message += "<br>Please CFO Name";
            }
            // Display error if any else submit form
            if (error_message) {
                $('.alert-success').removeClass('hide').html(error_message);
                return false;
            } else {
                return true;
            }
        });
    });
</script>

</body>

</html>