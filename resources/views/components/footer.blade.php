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
    <script src="/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="/Flot/jquery.flot.js"></script>
    <script src="/Flot/jquery.flot.pie.js"></script>
    <script src="/Flot/jquery.flot.time.js"></script>
    <script src="/Flot/jquery.flot.stack.js"></script>
    <script src="/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/moment/min/moment.min.js"></script>
    <script src="/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>
  </body>
</html>