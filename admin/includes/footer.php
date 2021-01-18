
 

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 | Design & Developed by: <a href="https://codingstudio.in">wowcuz opc & codingstudio.in</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->






<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>




<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<script src="./js/sweetalert.min.js"></script>
<script src="./js/Chart.min.js"></script>
<script src="js/jquery.js"></script>
<?php
    if(isset($_SESSION['formStatus'])){
      if($_SESSION['formStatus']==true){
            echo "
            <script>
                swal({
                  title: 'Success',
                  text: 'Form Submitted Successful',
                  icon: 'success',
                });
            </script>   
            ";
        }else{
          echo "
          <script>
              swal({
                title: 'Failure',
                text: 'Form Submitted Unsuccessful',
                icon: 'error',
              });
          </script>   
          ";
        }
      unset($_SESSION['formStatus']);
    }  
  ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>