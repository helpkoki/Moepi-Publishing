<?php
	//session_start();
require_once '../../../../config/database.php';

		
		if(isset($_POST['companyid'])){
		
		$companyid = $_POST['companyid'];
		//echo $companyid;
	
		//Fetching Low
		  $sql="select count(DISTINCT tick_id) as low from incidents where priority='Low' ".$companyid;
		  $low=mysqli_query($connection,$sql);
		  
		  if($res=mysqli_fetch_array($low)){
			  $tot_low=$res[0];
		  }
		  
		  
		  //Fetching Medium
		  $sql2="select count(DISTINCT tick_id) as medium from incidents where priority='Medium' ".$companyid;
		  $medium=mysqli_query($connection,$sql2);
		  
		  if($res2=mysqli_fetch_array($medium)){
			  $tot_medium=$res2[0];
		  }
			
		  
		  
		  
		  //Fetching High
		  
		  $sql3="select count(DISTINCT tick_id) as high from incidents where priority='High' ".$companyid;
		  $high=mysqli_query($connection,$sql3);
		  
		  if($res3=mysqli_fetch_array($high)){
			  $tot_high=$res3[0];
		  }
			
		   
		  
		  
		  //Fetching Critical
		  $sql4="select count(DISTINCT tick_id) as critical from incidents where priority='Critical' ".$companyid;
		  $critical=mysqli_query($connection,$sql4);
		  
		  if($res4=mysqli_fetch_array($critical)){
			  $tot_critical=$res4[0];
		  }
		  
		  $sum=$tot_low+$tot_medium+$tot_high+$tot_critical;
		  
		  $low_percent = ($tot_low/$sum)*100;
		  $medium_percent=($tot_medium/$sum)*100;
		  $high_percent=($tot_high/$sum)*100;
		  $critical_percent=($tot_critical/$sum)*100;
	  
		}else{
			

			
			//Fetching Low
			  $sql="select count(DISTINCT tick_id) as low from incidents where priority ='Low'";
			  $low = mysqli_query($connection,$sql);
			  
			  if($res=mysqli_fetch_array($low)){
				  $tot_low=$res[0];
			  }
			  
			  
			  //Fetching Medium
			  $sql2="select count(DISTINCT tick_id) as medium from incidents where priority='Medium'";
			  $medium=mysqli_query($connection,$sql2);
			  
			  if($res2=mysqli_fetch_array($medium)){
				  $tot_medium=$res2[0];
			  }
				
			
			  //Fetching High
			  
			  $sql3="select count(DISTINCT tick_id) as high from incidents where priority='High'";
			  $high=mysqli_query($connection,$sql3);
			  
			  if($res3=mysqli_fetch_array($high)){
				  $tot_high=$res3[0];
			  }
				
			   
			  //Fetching Critical
			  $sql4="select count(DISTINCT tick_id) as critical from incidents where priority='Critical'";
			  $critical=mysqli_query($connection,$sql4);
			  
			  if($res4=mysqli_fetch_array($critical)){
				  $tot_critical=$res4[0];
			  }
			  
			  $sum=$tot_low+$tot_medium+$tot_high+$tot_critical;

			if ($sum != 0) {
				$low_percent = ($tot_low / $sum) * 100;
				$medium_percent = ($tot_medium / $sum) * 100;
				$high_percent = ($tot_high / $sum) * 100;
				$critical_percent = ($tot_critical / $sum) * 100;
			} else {
				$low_percent = 0;
				$medium_percent = 0;
				$high_percent = 0;
				$critical_percent = 0;
			}




}	  
	
	  

  
 
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>
    $(document).ready(function() {
        var ctx = $("#chart-line");
        var myLineChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Low", "Medium", "High", "Critical"],
                datasets: [{
                    data: [<?php echo $tot_low; ?>,<?php echo$tot_medium; ?>, <?php echo $tot_high; ?>, <?php echo $tot_critical ?>],
                    backgroundColor: ["#1cc88a", "#4e73df", "#f6c23e", "#d52a1a"],

                   
                }]
            }
            
        , options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    legend: {
                      display: true
                      
                    }
         }
         
        });
    });
</script>
<head>

  
  </style>
</head>
<div class="page-content page-container" id="page-content">
    <div class="padding">

                    <div class="card">
                        <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">PRIORITY</h6>
                        </div>
                        <div class="card-body" >
                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div> <canvas id="chart-line" width="299" height="90" class="chartjs-render-monitor" style="display: block; width: 299px; height: 180px;"></canvas>
                        </div>
                    </div>
                </div>
 
</div>