        <!-- footer content -->
      </div>
    </div>    

    <script>
      document.getElementById('fotoReceipt').addEventListener('change', function (event) {
          const file = event.target.files[0];
          if (file) {
              document.getElementById('receiptFoto').src = URL.createObjectURL(file);
          }
      });
      document.getElementById('fotoDispenser').addEventListener('change', function (event) {
          const file = event.target.files[0];
          if (file) {
              document.getElementById('dispenserFoto').src = URL.createObjectURL(file);
          }
      });
      document.getElementById('fotoOdometer').addEventListener('change', function (event) {
          const file = event.target.files[0];
          if (file) {
              document.getElementById('odometerFoto').src = URL.createObjectURL(file);
          }
      });
      document.getElementById('fotoFulfillment').addEventListener('change', function (event) {
          const file = event.target.files[0];
          if (file) {
              document.getElementById('fulfillmentFoto').src = URL.createObjectURL(file);
          }
      });
      </script>
    <script>
        document.getElementById('fotoInput').addEventListener('change', function (event) {
              const file = event.target.files[0];
              if (file) {
                  document.getElementById('previewFoto').src = URL.createObjectURL(file);
              }
        });
    </script>
    
    <!-- jQuery -->
    <script src="../public/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../public/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
    <!-- FastClick -->
    <script src="../public/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../public/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../public/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../public/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="../public/Flot/jquery.flot.js"></script>
    <script src="../public/Flot/jquery.flot.pie.js"></script>
    <script src="../public/Flot/jquery.flot.time.js"></script>
    <script src="../public/Flot/jquery.flot.stack.js"></script>
    <script src="../public/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../public/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../public/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../public/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../public/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../public/moment/min/moment.min.js"></script>
    <script src="../public/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../public/build/js/custom.min.js"></script>
  </body>
</html>