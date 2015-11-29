	<div id="form_container">
	
		<!-- <h1><a>Hospital Discharge Form</a></h1> -->
		<form id="form_1076783" class="appnitro" enctype="multipart/form-data" method="post" action="client_hospital_discharge_save_view.php">
					<div class="form_description">
			<h2>Hospital Discharge Form </h2>
			<p></p>
		</div>						
			<ul >
						<li id="li_1" >
		<label class="description" for="element_1">Client ID </label>
		<div>	
			<input id="element_1" name="client_id" class="element text medium" type="text" maxlength="255" value="<?php if(isset($_GET) && isset($_GET['client_id'])) { echo $_GET['client_id'];}?>" readonly> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Date Of Discharge </label>
		<div>
			<input type="text" class="element text medium" id="hospital_discharge_date" name="hospital_discharge_date" readonly value="<?php echo date('d/m/Y')?>">
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Duration of Stay </label>
		<div>
			<input id="element_3" name="hospital_stay_duration" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Address After Discharge </label>
		<div>
			<textarea id="element_4" name="hospital_discharge_address" class="element textarea medium"></textarea> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Images Of Burns </label>
		<div>
			<input id="element_5" name="Hospital_Dischanrge_Images" class="element file" type="file"/> 
		</div>  
				<label class="description" for="element_12">Discharge Critical </label>
		<span>
			<input id="element_12_1" name="client_discharge_critical" class="element radio" type="radio" value="Yes" />
            <label class="choice" for="element_12_1">Yes</label>
            <input id="element_12_2" name="client_discharge_critical" class="element radio" type="radio" value="No" />
            <label class="choice" for="element_12_2">No</label>

		</span>
		
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Discharge Summary </label>
		<div>
			<textarea id="element_6" name="hospital_discharge_summary" class="element textarea medium"></textarea> 
		</div> 
		</li>
					<li class="buttons">
				<input id="client_enrolled_by" type="hidden" name="client_enrolled_by" value="<?php if((isset($_COOKIE) && (isset($_COOKIE['admin_name'])))) { echo  $_COOKIE['admin_name'] ; } ?>" />
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
	</div>