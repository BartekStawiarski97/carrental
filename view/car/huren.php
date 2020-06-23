<h2 class="text-center color-blue"><?php echo $carbyid['merknaam']?> <?php echo $carbyid['modelnaam']?></h2>
<div class="d-flex justify-content-center mt-5 ">
  <section class="d-block">
    <p class="text-center">Huurprijs (per dag): €<?php $huur = $carbyid['prijs'] * 0.002; echo number_format($huur, 2, ',','.');?> </p>
    <form action="<?=URL?>car/reserveren/<?php echo $carbyid['car_id'] ?>" method="POST">
    	<div class="container">
        <div class="row">
            <div class="col-12 form-group has-feedback">
              <label>Datum <span class="text-danger">*</span></label>
              <input type="text" class="form-control has-feedback-left" id="daterange"         name="daterange">
            </div>
            <div class="col-12 form-group has-feedback">
              <label>Aantal dagen <span class="text-danger">*</span></label>
              <input type="number" class="form-control has-feedback-left" name="numberdays" 
                 id="numberdays" readonly>

            </div>
            <div class="col-12 form-group has-feedback">
              <label>Prijs <span class="text-danger">*</span></label>
              <input type="number" class="form-control has-feedback-left" name="price" 
                 id="price" readonly>
            </div>
        </div>  
      </div>
  
      <input class="d-block m-auto" type="submit" name="" value="verder">
      <p><?php echo $_POST['daterange'] ?></p>
    </form>
	</section>
</div> 

<script>



var huur = "<?php echo $huur ?>"; 

  $(function() {
    $('#daterange').daterangepicker({
    minDate: new Date() 
    });
    
    $('#daterange').on('apply.daterangepicker', function(ev, picker) {
        // picker.startDate and picker.endDate are already Moment.js objects.
        // You can use diff() method to calculate the day difference.
        $('#numberdays').val(picker.endDate.diff(picker.startDate, "days")+1);
        
        $('#price').val((picker.endDate.diff(picker.startDate, "days")+1)*huur);
    });
});

var d = new Date();
           var currMonth = d.getMonth();
           var currYear = d.getFullYear();
           var startDate = new Date(currYear, currMonth, 1);

           $("#datepicker").daterangepicker();
           $("#datepicker").daterangepicker("setDate", startDate);


</script>