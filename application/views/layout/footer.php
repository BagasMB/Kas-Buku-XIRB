<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0">
                    <a class="text-muted" href="https://github.com/BagasMB" target="_blank"><strong>BagasMB</strong></a> &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </p>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<script src="<?= base_url('assets/'); ?>js/app.js"></script>
<script>
    $('#ngilang').delay('slow').slideDown('slow').delay(4000).slideUp(600)
</script>

<!-- DataTable -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function() {
        $("#myTable").DataTable();
    });
</script>

</body>

</html>