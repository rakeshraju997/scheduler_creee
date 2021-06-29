
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="scheduler">
    <form method="post" id="categoryForm">
        <input id="categoryFormEmail" type="text" placeholder="Type your email id"></input>
        <select class="selctCategory" name="selctCategory" >
            <option value="1">Half Day</option>
            <option value="2">Full Day</option>
            <option value="3">Three Day</option>
        </select>
        <button type="submit" >Procced</button>
    </form>
</div>

<script type="text/javascript">
//     var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
//     $("#categoryForm").submit(function (event) {
// alert('fdsf');
//         var formData = {
//             email: $("#categoryFormEmail").val(),
//             category: $("select.selctCategory").val()
//         };
        
//         $.ajax({
//         type: "POST",
//         url: ajaxurl,
//         data: formData,
//         dataType: "json",
//         encode: true,
//         success:function(data){  
//           console.log(data);
//           let mainDiv = document.querySelector('.scheduler');
//           mainDiv.innerHTML=data;
//          } 
//         });

//         event.preventDefault();
//     });

//wordpress ajax

    // AJAX url
    var ajax_url = plugin_ajax_object.ajax_url;

    $("#categoryForm").submit(function (event) {
        var formData = {
            email: $("#categoryFormEmail").val(),
            category: $("select.selctCategory").val(),
            action: 'scheduler'
        };

        $.ajax({
        url: ajax_url,
        type: 'post',
        data: formData,
        dataType: 'json',
        success: function(response){
           // Add new rows to table
           let mainDiv = document.querySelector('.scheduler');
           mainDiv.innerHTML=response.calendar;
            document.querySelector(".prev").addEventListener("click", () => {
            date.setMonth(date.getMonth() - 1);
            renderCalendar(response.booked,response.category);
            });

            document.querySelector(".next").addEventListener("click", () => {
            date.setMonth(date.getMonth() + 1);
            renderCalendar(response.booked,response.category);
            });
            renderCalendar(response.booked,response.category);
        }
    });
    event.preventDefault();
    });
</script>