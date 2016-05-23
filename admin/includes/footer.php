<footer>
	<p class="copyright pull-right">&copy; <?php echo date('Y'); ?> <a href="http://vertexsolution.com.np">Vertex Solution Inc</a>. All Rights Reserved.</p>
</footer>

<!-- Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- DATA TABLE SCRIPTS -->
    <script src="includes/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="includes/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>


<!--Date picker -->
<script type="text/javascript" src="js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="js/advanced-form.js"></script>
<!--Date picker -->
 <script>

        //disabling past date from datepicker
var nowDate = new Date();
var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
      $(function() {
  




$('.datepicker1').datepicker({
	
     startDate: today    
});



 });





    </script>
</body>

</html>