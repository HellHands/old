<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" style="font-size:0.8em !important;" >
				<thead>
					<tr>
						<th>District</th>
						<th>Taluka</th>
						<th>Union Council</th>
						<th>SEMIS New / ID</th>
						<th>School Name</th>
						<?php if($uname == 'admin') { ?>
						<th>Edit / Status</th>
						<?php } ?>
						<th>View Report</th>
					</tr>
				</thead>
				<tbody>
<?php foreach($allschoolsforms as $allschoolsform) { ?>
				<tr>
					<td><?php foreach($districts as $district) { if($district['SemisCodeDistrict']['district_id'] == $allschoolsform['semis_hs_universal201314s']['bi_school_district']) { echo $district['SemisCodeDistrict']['district']; } } ?></td>
					<td><?php foreach($tehsils as $tehsil) { if($tehsil['CodesForDistrictAndTehsil']['tehsil_id'] == $allschoolsform['semis_hs_universal201314s']['bi_school_taluka']) { echo $tehsil['CodesForDistrictAndTehsil']['tehsil']; } } ?></td>
					<td><?php foreach($union_councils as $union_council) { if($union_council['CodesForUc']['uc_id'] == $allschoolsform['semis_hs_universal201314s']['bi_school_uc']) { echo $union_council['CodesForUc']['uc_name']; } } ?></td>
					<td><?php echo $allschoolsform['semis_hs_universal201314s']['school_semis_new']; ?></td>
					<td><?php echo $allschoolsform['semis_hs_universal201314s']['bi_school_name']; ?></td>
					<?php if($uname == 'admin') { ?>
						<td><?php if($allschoolsform['semis_hs_universal201314s']['final'] == 1) { ?><a href="<?php echo $this->webroot; ?>home/unfinalize_form/<?php echo $allschoolsform['semis_hs_universal201314s']['year']; ?>/<?php echo $allschoolsform['semis_hs_universal201314s']['quarter']; ?>/<?php echo $allschoolsform['semis_hs_universal201314s']['school_semis_new']; ?>" >Un Finalize Form</a><?php }else{ ?>Form is not finalized<?php } ?></td>
					<?php } ?>
					<td><a target="_blank" href="<?php echo $this->webroot; ?>home/online_school_report/<?php echo $allschoolsform['semis_hs_universal201314s']['id']; ?>" >View School Report</a></td>
				</tr>
<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<?php if($uname == 'admin') { ?>
							<th></th>
						<?php } ?>
						<th></th>
					</tr>
				</tfoot>
</table>

<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable();
			} );
</script>