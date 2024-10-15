<html>
<head>
  <script src="https://cdn.jsdelivr.net/gh/jquery/jquery@3.2.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/wrick17/calendar-plugin@master/calendar.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/wrick17/calendar-plugin@master/style.css">
  <style>
      .buttons-container {
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  align-items: center;
  margin-bottom: 10px;
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

.buttons-container .label-container {
  display: inline-block;
  -webkit-box-flex: 1;
  -moz-box-flex: 1;
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  text-align: center;
  text-transform: uppercase;
  font-weight: bold;
}

.year-dropdown {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border: none;
  font-size: inherit;
  font-weight: inherit;
  font-family: inherit;
  padding: 5px 20px;
}

.prev-button,
.next-button {
  background: transparent;
  border: none;
  padding: 2px;
}

.week {
  margin: 10px 0;
}

.week.highlight {
  border-radius: 5px;
}

.weeks-wrapper.header {
  border-bottom: 1px solid #eee;
}

.week .day.header {
  font-weight: bold;
  text-transform: uppercase;
  font-size: 80%;
}

.day span {
  display: inline-block;
  width: 28px;
  height: 28px;
  line-height: 30px;
  border-radius: 50%;
  vertical-align: middle;
}

.day.today span {
  position: relative;
  display: inline-block;
  font-size: 100%;
}

/* weekend */
.week:not(.start-on-monday) .day:first-child,
.week:not(.start-on-monday) .day:last-child {
  color: orange;
}

/* sunday */
.week:not(.start-on-monday) .day:first-child {
  color: red;
}

/* start on monday - weekend */
.week.start-on-monday .day:nth-child(6),
.week.start-on-monday .day:last-child {
  color: orange;
}

/* start on monday - sunday */
.week.start-on-monday .day:last-child {
  color: red;
}

.day.today span::after {
    /**
  content: "";
  position: absolute;
  bottom: 9px;
  left: 50%;
  transform: translateX(-50%);
  border: 2px solid orange;
  width: 10px;
  height: 0.5px;
  **/
}

.day.sunday span {
  color: #ff8a80;
}

.week .day.highlight span {
  color: #2196f3;
}

.week .day.selected span {
  background: #1565c0;
  color: white;
}

.week .day[disabled="disabled"] span {
  color: #aaa;
  cursor: not-allowed;
}

.months-wrapper .month span {
  display: inline-block;
  padding: 10px;
  text-transform: capitalize;
  margin-bottom: 10px;
}

.special-buttons {
  text-align: center;
  border-top: 1px solid #eee;
  padding-top: 10px;
}

.today-button {
  margin: 0 auto;
  background: transparent;
  border: none;
  padding: 5px;
}
      
  </style>
</head>


</body>
</html>

<script>

  function selectDate(date) {
     $('#calendar-wrapper').updateCalendarOptions({
        date: date
      });
      console.log(calendar.getSelectedDate());
      
      //var selected_date=calendar.getSelectedDate();
      var selected_date=calendar.getSelectedDate().toLocaleDateString() 
      
        $.ajax({
         url: "fetch_data.php",
         cache: false,
         data:{selected_date:selected_date},
         success: function(html){       
           $("#display").html(html);    
         },
        });
        
        $.ajax({
         url: "fetch_types.php",
         cache: false,
         data:{selected_date:selected_date},
         success: function(html){       
           $("#incident").html(html);    
         },
        });
     
       


      
      
    }
    
    function selectMonth(date){
     $('#calendar-wrapper').updateCalendarOptions({
        date: date
      });
      console.log(calendar.getSelectedDate());
      
      //var selected_date=calendar.getSelectedDate();
      var selected_date=calendar.getSelectedDate().toLocaleDateString() 
      
        $.ajax({
         url: "select_month.php",
         cache: false,
         data:{selected_date:selected_date},
         success: function(html){       
           $("#display").html(html);    
         },
        });
        
   
         $.ajax({
         url: "select_month_data.php",
         cache: false,
         data:{selected_date:selected_date},
         success: function(html){       
           $("#incident").html(html);    
         },
        });
           
 
     
        
    }

    

    var defaultConfig = {
        weekDayLength: 1,
        date: '<?php echo date("m/d/Y")?>',
        onClickDate: selectDate,
        onChangeMonth:selectMonth,
        showYearDropdown: true,
        startOnMonday: false,
        enableMonthChange:true,
        showTodayButton:false,
    };

    var calendar = $('#calendar-wrapper').calendar(defaultConfig);
    console.log(calendar.getSelectedDate());

</script>