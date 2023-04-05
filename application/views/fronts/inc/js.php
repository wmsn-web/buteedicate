<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/slick.js"></script>
    <script src="<?= base_url(); ?>assets/js/aos.js"></script>
    <!-- Internal Data tables -->
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/dataTables.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/responsive.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/jquery.dataTables.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/jszip.min.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/pdfmake.min.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/vfs_fonts.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/buttons.html5.min.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/buttons.print.min.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/buttons.colVis.min.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url(); ?>admin_assets/plugins/datatable/js/responsive.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>admin_assets/js/table-data.js"></script>
    <script src="<?= base_url(); ?>admin_assets/plugins/parsleyjs/parsley.min.js"></script>
    <!-- Optional JavaScript -->
    <script src="<?= base_url(); ?>assets/js/custom.js"></script>
    <script>
        $(document).ready(function(){
            AOS.init();

            $(".flashMsg").fadeOut(8000);
        })
        function showHire()
        {
            $("#hire").modal('show');
        }
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->


