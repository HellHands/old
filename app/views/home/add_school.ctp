<script>
$(function() {
$('#new_school_form').validate();
});
</script>

<table style="width:900px;">
	<tr><td colspan="4"><h1><div style="float:left; text-align:center; width:100%; height:30px; background-color:#4455ff; color:#fff;">Add New School</div></h1></td></tr>
	<form id="new_school_form" action="<?php echo $this->webroot?>home/submit_school_details" method="post">
	<tr><td>School Name</td><td><input type="hidden" name="cluster_id" value="<?php echo $cluster_id?>" /><input type="text" value="" name="school_name" class="required"/></td></tr>
	<tr><td>Semis Code</td><td><input type="text" value="" name="semis_code" class="number" /></td></tr>
	<tr><td>Prefix</td><td><input type="text" value="" name="prefix" /></td></tr>
	
	<tr>
		<td>SNE hm available?</td>
		<td><input type="radio" name="sne_hm" checked="checked" value="1" >Yes</input><br /><input type="radio" name="sne_hm" value="0" >No</input></td>
	</tr>
	
	<tr><td>Head teacher name</td><td><input type="text" value="" name="ht_name" /></td></tr>
	<tr><td>CNIC</td><td><input type="text" value="" name="ht_cnic" class="number" /></td></tr>
	<tr><td>Head teacher phone?</td><td><input type="text" value="" name="ht_phone" class="number" /></td></tr>
	
	
	<tr><td>Teaching Staff Male?</td><td><input type="text" value="" name="teachers_male" class="number" /></td></tr>
	<tr><td>Teaching Staff female?</td><td><input type="text" value="" name="teachers_female" class="number" /></td></tr>
	
	<tr><td>Non Teaching Staff Male?</td><td><input type="text" value="" name="non_teachers_male" class="number" /></td></tr>
	<tr><td>Non Teaching Staff female?</td><td><input type="text" value="" name="non_teachers_female" class="number" /></td></tr>
	
	<tr><td>Enrollment boys?</td><td><input type="text" value="" name="enrolled_boys" class="number" /></td></tr>
	<tr><td>Enrollment girls?</td><td><input type="text" value="" name="enrolled_girls" class="number" /></td></tr>
	
	<tr>
		<td>School?</td>
		<td><input type="radio" name="school_type" checked="checked" value="1" >Girls</input><br /><input type="radio" name="school_type" value="0" >Boys</input></td>
	</tr>
	
	<tr>
		<td>Guide School?</td>
		<td><input type="radio" name="guide_school" checked="checked" value="1" >Yes</input><br /><input type="radio" name="guide_school" value="0" >No</input></td>
	</tr>
	
	<tr>
		<td><h2>If Not Guide School</h2><br />Distance from guide school</td>
		<td><input type="radio" name="guide_school_distance" checked="checked" value="1" >1 km or less</input><br /><input type="radio" name="guide_school_distance" value="2" >1 to 1.5 km</input><br /><input type="radio" name="guide_school_distance" value="3" >1.5 to 2 km</input><br /><input type="radio" name="guide_school_distance" value="4" >more then 2 km</input></td>
	</tr>
	
	
	<tr>
		<td>Is SMC notified?</td>
		<td><input type="radio" name="is_smc_notified" checked="checked" value="1" >Yes</input><br /><input type="radio" name="is_smc_notified" value="0" >No</input></td>
	</tr>
	
	<tr>
		<td>Is SMC functional?</td>
		<td><input type="radio" name="is_smc_functional" checked="checked" value="1" >Yes</input><br /><input type="radio" name="is_smc_functional" value="0" >No</input></td>
	</tr>
	
	<tr>
		<td>Has Building?</td>
		<td><input type="radio" name="has_building" checked="checked" value="1" >Yes</input><br /><input type="radio" name="has_building" value="0" >No</input></td>
	</tr>
	
	<tr><td>Number of households</td><td><input type="text" value="" name="no_of_hh" class="number" /></td></tr>
	
	
	<tr><td><h2>Number of Schools in 1.5 KM Area</h2></td></tr>
	<tr><td>1.Govt. Primary Schools</td><td><input type="text" value="" name="govt_pri_school" class="number" /></td></tr>
	<tr><td>2.Govt. middle Schools</td><td><input type="text" value="" name="govt_middle_school" class="number" /></td></tr>
	<tr><td>3.Govt. high schools</td><td><input type="text" value="" name="govt_high_school" class="number" /></td></tr>
	<tr><td>4.Private/other schools offering class1-10 </td><td><input type="text" value="" name="pri_other_school" class="number" /></td></tr>
	
	
	<tr><td><h2>School located from</h2></td></tr>
	<tr><td>1.Majority of Households</td><td><input type="text" value="" name="location_from_hh" class="number" /></td></tr>
	<tr><td>2.From Road</td><td><input type="text" value="" name="locatin_from_road" class="number" /></td></tr>
	
	<tr><td><h2>GPS</h2></td></tr>
	<tr><td>latitude</td><td><input type="text" value="" name="latitude" class="number" /></td></tr>
	<tr><td>longitude</td><td><input type="text" value="" name="longitude" class="number" /></td></tr>
	
	
	
	<tr><td><input type="submit" value="submit" /></td></tr>
</form>
</table>

<div style="float:right;" ><a href="<?php echo $this->webroot?>/home/cluster_details/<?php echo $taluka['Taluka']['cluster_id']?>">Go back</a></div>