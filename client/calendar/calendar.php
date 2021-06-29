
    <!-- <link rel="stylesheet" href="<?php echo SCEDULE_PLUGIN_DIR?>/client/calendar/style.css" /> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      <div class="calendar">
        <div class="month">
          <i class="fas fa-angle-left prev"></i>
          <div class="date">
            <h1></h1>
            <p></p>
          </div>
          <i class="fas fa-angle-right next"></i>
        </div>
        <div class="weekdays">
          <div>Sun</div>
          <div>Mon</div>
          <div>Tue</div>
          <div>Wed</div>
          <div>Thu</div>
          <div>Fri</div>
          <div>Sat</div>
        </div>
        <div class="days"></div>

        <!-- Modal -->
        <div class="modal fade" id="confirmBox" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" id="titleDate">Available Appointment on </h4>
                </div>
                <div class="modal-body">
                  <p>To confirm appointment click procced</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-default">Procces now</button>
                </div>
              </div>
            </div>
        </div>

      </div>
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#confirmBox">Open Modal</button>
    <script>
    var booked ='<?php echo json_encode($booked);?>';
    // $('#confirmBox').modal('show');
  </script>
  
    <!-- <script src="./client/calendar/script.js"></script> -->
    


  </body>
</html>
