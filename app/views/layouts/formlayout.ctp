<!doctype html>
<html lang="en">
<head>
	<!-- Meta tags !-->
	<meta charset="utf-8">
    <?= $this->Html->meta(array('http-equiv' => 'X-UA-Compatible', 'content' => 'IE-edge')); ?>
    <?= $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1')); ?>
	<?= $this->Html->meta(array('name' => 'robots', 'content' => 'noindex,nofollow')); ?>
	<?= $this->Html->meta('icon', $this->webroot.'images/rsu-favicon.ico'); ?>
			
	<!-- Title !-->	
	<title><?= $title; ?></title>
            
	<!-- Stylesheets !-->
    <?= $this->Html->css('/css/bootstrap.min.css'); ?>	
    <?= $this->Html->css('/css/form_custom.css'); ?>	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    .form-control2{
    	width: auto !important;
    	display: inline !important;
    	margin-left: 4px !important;
    }
    
    .row{
    	background-color: #F5FFFF;
    	border: 1px solid black;
    	padding: 14px 0 0 0;
    }
    .btn-primary{
    	margin-top: 10px;
    }
    #minheightcont{
    	min-height: 500px;
    }
    .lead{
    	background: rgba(218, 218, 181, 0.52);
    }
    </style>
</head> 

<!--Body starts here !-->
<body>
<nav class="navbar navbar-default">
  	<div class="container">
    	<!-- Brand and toggle get grouped for better mobile display -->
    	<div class="navbar-header">
	      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      	</button>
	      	<a class="navbar-brand" href=<?= $this->webroot.'home/index';?>>RSU</a>
      	</div>
      	<?php if(isset($logout)){?>
	    <ul class="nav navbar-nav navbar-right">
	    	<li><a href="#"><?= $username; ?></a></li>		       
		   	<li><a href="<?= $this->webroot.'users/logout'; ?>">Log out</a></li>		       
	    </ul><?php } ?>
	
  	</div><!-- /.container-fluid -->
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-12" style="text-align: center;">
			<img src="<?= $this->webroot.'img/sindhgovt_logo.png'; ?>" class="img-rounded"></img>
		</div>
		<center><h1>Monitoring Proforma <br><small>Reform Support Unit</small></h1></center>
		<div class="col-md-10" style="float: none; margin: 0 auto;" id="minheightcont">		
			<hr>
			<?= $content_for_layout; ?>			
		</div>
	</div>
	
</div>

<br><br>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?= $this->Html->script('/js/jquery.min.js'); ?>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?= $this->Html->script('/js/bootstrap.min.js'); ?>    

    <script>
    	//global variables!
		var tehsils_url  = window.location.protocol + "//" + window.location.host + '/home/get_tehsils/';
		var ucs_url      = window.location.protocol + "//" + window.location.host + '/home/get_ucs/';
		var statuses_url = window.location.protocol + "//" + window.location.host + '/home/get_statuses/';
		
		var username = '<?php echo $username; ?>';
		var uid      = <?php echo $uid; ?>;

		var govtmale;
		var govtfemale;
		var nongovtmale;
		var nongovtfemale;
		
		var nonteacher_male;
		var nonteacher_female;

		var total_teachers;
		var total_nonteachers;

		var total_enrollment;
		var headcount;
		
		function get_total_teachers()
		{
			govtmale       = parseInt($('#mnformGovtMale').val());
			govtfemale     = parseInt($('#mnformGovtFemale').val());
			nongovtmale    = parseInt($('#mnformNongovtMale').val());
			nongovtfemale  = parseInt($('#mnformNongovtFemale').val());
			total_teachers = (govtmale+govtfemale+nongovtmale+nongovtfemale);

			return total_teachers;
		}

		function get_total_nonteachers()
		{
			male              = parseInt($('#mnformNonteachingMale').val());
			female            = parseInt($('#mnformNonteachingFemale').val());
			total_nonteachers = (male+female);

			return total_nonteachers;
		}

		function get_teachers_headcount(){

			headcount = parseInt($('#mnformHeadcountTeachingstaff').val());
			
			return headcount;
		}

		function get_nonteachers_headcount(){
			headcount = parseInt($('#mnformHeadcountNonteachingstaff').val());
			
			return headcount;
		}



		$('#mnformHeadcountTeachingstaff').keyup(function(e){
			var total_teachers     = get_total_teachers();
			var teachers_headcount = get_teachers_headcount();			

			if(total_teachers < teachers_headcount){
				e.preventDefault();
				alert('Error!, Teachers Headcount should be less than total teachers!');
				$('#mnformHeadcountTeachingstaff').val('');
			}
		});

		$('#mnformHeadcountTeachingstaff').keydown(function(e){
			var total_teachers     = get_total_teachers();
			var teachers_headcount = get_teachers_headcount();			

			var keyCode = e.keyCode || e.which;
			if(keyCode === 9){
				if(total_teachers < teachers_headcount){
					e.preventDefault();
					alert('Error!, Teachers Headcount should be less than total teachers!');
					$('#mnformHeadcountTeachingstaff').val('');
				}	
			}

		});

		$('#mnformHeadcountNonteachingstaff').keyup(function(){
			var total_nonteachers     = get_total_nonteachers();
			var nonteachers_headcount = get_nonteachers_headcount();

			if(total_nonteachers < nonteachers_headcount){
				alert('Error!, NonTeachers Headcount should be less than total NonTeachers!');
				$('#mnformHeadcountNonteachingstaff').val('');
			}

		});

		$('#mnformHeadcountNonteachingstaff').keydown(function(e){
			var total_teachers     = get_total_teachers();
			var teachers_headcount = get_teachers_headcount();			

			var keyCode = e.keyCode || e.which;
			if(keyCode === 9){
				if(total_teachers < teachers_headcount){
					e.preventDefault();
					alert('Error!, Teachers Headcount should be less than total teachers!');
					$('#mnformHeadcountNonteachingstaff').val('');
				}	
			}

		});


		$('#mnformGovtMale').keyup(function(){
			//total_teachers = parseInt(total_teachers) + parseInt($('#mnformGovtMale').val());
			total_teachers = get_total_teachers();//(govtmale+govtfemale+nongovtmale+nongovtfemale);
	        $('#mnformTotalTeachers').val(total_teachers);	
	        
		});

		$('#mnformNongovtMale').keyup(function(){
			total_teachers = get_total_teachers();
	        $('#mnformTotalTeachers').val(total_teachers);	
		});

		$('#mnformGovtFemale').keyup(function(){
			total_teachers = get_total_teachers();
	        $('#mnformTotalTeachers').val(total_teachers);	
		});

		$('#mnformNongovtFemale').keyup(function(){
			total_teachers = get_total_teachers();
	        $('#mnformTotalTeachers').val(total_teachers);	
		});

		$('#mnformNonteachingMale').keyup(function(){
			total_teachers = get_total_nonteachers();
	        $('#mnformTotalNonteachingStaff').val(total_teachers);	
		});

		$('#mnformNonteachingFemale').keyup(function(){
			total_teachers = get_total_nonteachers();
	        $('#mnformTotalNonteachingStaff').val(total_teachers);	
		});


		$(function() {
			//alert(tehsils_url);
			//alert(username + ' ' + uid);
			total_teachers = (govtmale+govtfemale+nongovtmale+nongovtfemale);
			$('#mnformTotalTeachers').val(total_teachers);
			$("#district_select").change(function() {				
				var v = $('#district_select option:selected').text();		
				
				if(v)
				{
					$("#uc_select").load(ucs_url);
				}
			  	//$("#tehsil_select").load('http://localhost/old/monitoring_forms201516/get_tehsils/' + $("#district_select").val());

			  	$('#tehsil_select').prepend($('#tehsil_select option:selected').text('Loading...'));
			  	$("#tehsil_select").load(tehsils_url + $("#district_select").val());
			});

			$("#tehsil_select").change(function() {
				$("#uc_select").load(ucs_url + $("#tehsil_select").val());
			});

			$("#condition_select").change(function() {
				$("#status_select").load(statuses_url + $("#condition_select").val());

				//var choice = $('#condition_select option:selected').text();
				var choice = parseInt($('#condition_select option:selected').val());
				
				if(choice == 0){
					$("#closure_dmyDay").attr('disabled','disabled');
					$("#closure_dmyMonth").attr('disabled','disabled');
					$("#closure_dmyYear").attr('disabled','disabled');
					$("#closure_reason").attr('disabled', 'disabled');	
					$("#mnformHeadcount").attr('disabled', 'disabled');
				}else if(choice == 2){
					$("#closure_dmyDay").removeAttr('disabled');
					$("#closure_dmyMonth").removeAttr('disabled');
					$("#closure_dmyYear").removeAttr('disabled');
					$("#closure_reason").removeAttr('disabled');	
					$("#mnformHeadcount").attr('disabled', 'disabled');
				}else{
					$("#closure_dmyDay").attr('disabled','disabled');
					$("#closure_dmyMonth").attr('disabled','disabled');
					$("#closure_dmyYear").attr('disabled','disabled');
					$("#closure_reason").attr('disabled', 'disabled');	
					$("#mnformHeadcount").removeAttr('disabled', 'disabled');	
				}				
			});

			$("#own_govt_building").change(function() {
				choice = $('#own_govt_building option:selected').text();
				if(choice == 'No')
				{
					$("#nogovt_specify").removeAttr('disabled');										
				}else{
					$("#nogovt_specify").attr('disabled','disabled');
				}
			});


			$("#washroom_facility").change(function() {
				choice = $('#washroom_facility option:selected').text();
				if(choice == 'Yes')
				{
					$("#functional_washrooms").removeAttr('disabled');					
					$("#nonfunctional_washrooms").removeAttr('disabled');					
					//$("#functional_washrooms").attr('required', 'required');
					//$("#nonfunctional_washrooms").attr('required', 'required');
				}else{
					$("#functional_washrooms").attr('disabled','disabled');
					$("#nonfunctional_washrooms").attr('disabled', 'disabled');					
				}
			});



		});
	</script>
</body>
<!--End Body-->
</html>
