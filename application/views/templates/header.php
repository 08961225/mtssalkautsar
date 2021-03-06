<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url('assets/'); ?>vendor/home/img/favicon.png" type="image/png">
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>vendor/home/img/favicon.png" type="img/x-icon">


    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->


    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.jqueryui.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    <script src="<?= base_url('assets/'); ?>plugin/tiny/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: [
                "advlist autolink lists charmap print preview",
                "searchreplace visualblocks code fullscreen",
                "table paste pagebreak"
            ],
            toolbar: "pagebreak_split_block:true insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent |"
        });
    </script>




    <style type="text/css">
        #register_form fieldset:not(:first-of-type) {
            display: none;
        }

        input[type=button],
        input[type=submit],
        input[type=reset] {
            float: right;
            margin-left: 5px;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">