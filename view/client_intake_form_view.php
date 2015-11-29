	<div id="form_container">
	
		<!-- <h1><a>CLIENT PROFILE</a></h1> -->
		<form id="form_1076783" class="appnitro" enctype="multipart/form-data" method="post" action="client_intake_save_view.php">
					<div class="form_description">
			<h2>CLIENT PROFILE</h2>
			<p></p>
		</div>						
			<ul >
			
					<li id="li_2" >
		<label class="description" for="element_2">Client ID </label>
		<div>
			<input id="element_2" name="client_id" class="element text medium" type="text" maxlength="255" value="<?php if(isset($container) && isset($container->next_client_id)) { echo $container->next_client_id; } ?>"/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Name </label>
		<div>
			<input id="element_3" name="client_name" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Date of admission </label>
		<div>
			<input type="text" class="element text medium" id="client_date_of_admission" name="client_date_of_admission" readonly value="<?php echo date('d/m/Y')?>">
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Mobile </label>
		<div>
			<input id="element_5" name="client_phonenumber" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Address before the incident </label>
		<div>
			<textarea id="element_6" name="client_old_address" class="element text medium" cols="50" rows="2"></textarea>
		</div> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Address after the incident </label>
		<div>
			<textarea id="element_7" name="client_new_address" class="element text medium" cols="50" rows="2" ></textarea>
		</div> 
		</li>		
		<li id="li_8" >
		<label class="description" for="element_8">Date of birth </label>
		<span>
			<input type="text" class="element text large" id="client_dob" name="client_dob" readonly value="">
		</span>
		</li>		
		<li id="li_15" >
		<label class="description" for="element_15">Educational Qualification </label>
		<div>
		<select class="element select medium" id="element_15" name="client_qualifiaction"> 
			<option value="Uneducated" >Uneducated</option>
			<option value="5th and above" >5th and above</option>
			<option value="10th and above" >10th and above</option>
			<option value="Graduate" >Graduate</option>
			<option value="Post graduate and above" >Post graduate and above</option>
		</select>
		</div> 
		</li>		<li id="li_16" >
		<label class="description" for="element_16">Occupation </label>
		<div>
		<select class="element select medium" id="element_16" name="client_occupation"> 
			<option value="Student" >Student</option>
			<option value="Housewife" >Housewife</option>
			<option value="Teacher" >Teacher</option>
			<option value="Farmer" >Farmer</option>
			<option value="Domestic worker" >Domestic worker</option>
			<option value="Tailor" >Tailor</option>
			<option value="Others" >Others</option>
		</select>
		</div> 
		</li>		<li id="li_17" >
		<label class="description" for="element_17">Marital status </label>
		<div>
		<select class="element select medium" id="element_17" name="client_marital_status"> 
			<option value="Married" >Married</option>
			<option value="Single" >Single</option>
			<option value="Seperated" >Seperated</option>
			<option value="Divorced" >Divorced</option>
			<option value="Widowed" >Widowed</option>
		</select>
		</div> 
		</li>		<li id="li_9" >
		<label class="description" for="element_9">Length of the relationship with partner </label>
		<div>
			<input id="element_9" name="client_relationship_period" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_10" >
		<label class="description" for="element_10">Children </label>
		<div>
		<textarea id="element_10" name="client_children" class="element text medium" cols="50" rows="2"></textarea>
		</div> 
		</li>		<li id="li_18" >
		<label class="description" for="element_18">Religion </label>
		<div>
		<select class="element select medium" id="element_18" name="client_religion"> 
			<option value="Hindu" >Hindu</option>
			<option value="Muslim" >Muslim</option>
			<option value="Christian" >Christian</option>
			<option value="Others" >Others</option>
		</select>
		</div> 
		<div class="form_description">
		<h2>CARE TAKER PROFILE</h2>
		</div> 
		</li>		<li id="li_19" >
		<label class="description" for="element_19">Caretaker </label>
		<div>
		<select class="element select medium" id="element_19" name="client_caretaker"> 
			<option value="Spouse" >Spouse</option>
			<option value="Parent" >Parent</option>
			<option value="Guardian" >Guardian</option>
		</select>
		</div> 
		</li>		<li id="li_11" >
		<label class="description" for="element_11">Name </label>
		<div>
			<input id="element_11" name="client_caretaker_name" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_20" >
		<label class="description" for="element_20">Occupation </label>
		<div>
		<select class="element select medium" id="element_20" name="client_caretaker_occupation"> 
			<option value="Student" >Student</option>
			<option value="Unemployed" >Unemployed</option>
			<option value="Teacher" >Teacher</option>
			<option value="Domestic worker" >Domestic worker</option>
			<option value="Driver" >Driver</option>
			<option value="Farmer" >Farmer</option>
			<option value="Labor" >Labor</option>
			<option value="Others" >Others</option>
		</select>
		</div> 
		</li>
		
		<div class="form_description">
		<h2>DETAILS OF INCIDENT</h2>
		</div> 
		
		<li id="li_12" >
		<label class="description" for="element_12">Date of incident </label>
		<span>
			<input type="text" class="element text large" id="client_date_of_incident" name="client_date_of_incident" readonly value="">
		</span>
		</li>		
		<li id="li_21" >
		<label class="description" for="element_21">Causative Reason</label>
		<div>
		<select class="element select medium" id="element_21" name="client_causative_reason"> 
		<option value="Kerosene" >Kerosene</option>
		<option value="Petrol" >Petrol</option>
		<option value="Acid" >Acid</option>
		<option value="Hot liquids" >Hot liquids</option>
		<option value="Flame" >Flame</option>
		<option value="Chemicals" >Chemicals</option>
		<option value="Electricity" >Electricity</option>
		</select>
		</div> 
		</li>

		<li id="li_21" >
		<label class="description" for="element_21">Cause of the incident </label>
		<div>
		<select class="element select medium" id="element_21" name="client_incident_cause"> 
			<option value="Accident" >Accident</option>
			<option value="Attempt to murder" >Attempt to murder</option>
			<option value="Attempt to suicide" >Attempt to suicide</option>
		</select>
		</div> 
		</li>

		<li id="li_13" >
		<label class="description" for="element_13">Offender-victim-relationship </label>
		<div>
			<input id="element_13" name="client_offender_relationship" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_22" >
		<label class="description" for="element_22">Prevalence of DV in the family </label>
		<div>
		<select class="element select medium" id="element_22" name="client_dv_reason"> 
			<option value="Physical" >Physical</option>
			<option value="Verbal" >Verbal</option>
			<option value="Emotional" >Emotional</option>
			<option value="Threats" >Threats</option>
			<option value="Financial" >Financial</option>
			<option value="Sexual" >Sexual</option>
			<option value="None" >None</option>
		</select>
		</div> 
		</li>		<li id="li_23" >
		<label class="description" for="element_23">Incident reported to police </label>
		<span>
			<input id="element_23_1" name="client_reported_to_police" class="element radio" type="radio" value="Yes" />
<label class="choice" for="element_23_1">Yes</label>
<input id="element_23_2" name="client_reported_to_police" class="element radio" type="radio" value="No" />
<label class="choice" for="element_23_2">No</label>
		</span> 
		</li>		<li id="li_24" >
		<label class="description" for="element_24">Admission to hospital via </label>
		<div>
		<select class="element select medium" id="element_24" name="client_admitted_person"> 
			<option value="Police" >Police</option>
			<option value="Family, family-members" >Family, family-members</option>
			<option value="Friends, acquaintances" >Friends, acquaintances</option>
			<option value="Emergency ambulance" >Emergency ambulance</option>
			<option value="PCVC" >PCVC</option>
			<option value="Others"" >Others</option>
		</select>
		</div> 
		</li>		
		
		<div class="form_description">
		<h2>MEDICAL PROFILE</h2>
		</div> 
		
		<li id="li_14" >
		<label class="description" for="element_14">Image of burns </label>
		<div>
			<input id="element_14" name="client_burns_image" class="element file" type="file"> 
		</div>  
		</li>		
		<li id="li_25" >
		<label class="description" for="element_25">Degrees of burning</label>
		<span>
			<input id="element_25_1" name="client_degrees_of_burning" class="element radio" type="radio" value="I" />
<label class="choice" for="element_25_1">I</label>
<input id="element_25_2" name="client_degrees_of_burning" class="element radio" type="radio" value="II" />
<label class="choice" for="element_25_2">II</label>
<input id="element_25_3" name="client_degrees_of_burning" class="element radio" type="radio" value="III" />
<label class="choice" for="element_25_3">III</label>

		</span> 
		</li>

		<div class="form_description">
		<h2>Physical Symptoms post trauma</h2>
		</div>

		<li id="li_26" >
		<span>
			<input id="element_26_1" name="client_physical_symptoms" class="element checkbox" type="checkbox" value="Mobility on bed" />
<label class="choice" for="element_26_1">Mobility on bed</label>
<input id="element_26_2" name="client_physical_symptoms" class="element checkbox" type="checkbox" value="Lying to sitting" />
<label class="choice" for="element_26_2">Lying to sitting</label>
<input id="element_27_1" name="client_physical_symptoms" class="element checkbox" type="checkbox" value="Sitting to standing" />
<label class="choice" for="element_27_1">Sitting to standing</label>
<input id="element_27_2" name="client_physical_symptoms" class="element checkbox" type="checkbox" value="Standing to squatting" />
<label class="choice" for="element_27_2">Standing to squatting</label>
<input id="element_28_1" name="client_physical_symptoms" class="element checkbox" type="checkbox" value="Eating" />
<label class="choice" for="element_28_1">Eating</label>
<input id="element_28_2" name="client_physical_symptoms" class="element checkbox" type="checkbox" value="Walking" />
<label class="choice" for="element_28_2">Walking</label>
<input id="element_29_1" name="client_physical_symptoms" class="element checkbox" type="checkbox" value="Walking independent" />
<label class="choice" for="element_29_1">Walking independent</label>
<input id="element_29_2" name="client_physical_symptoms" class="element checkbox" type="checkbox" value="Walking dependent" />
<label class="choice" for="element_29_2">Walking dependent</label>
		</span> 
		</li>
		
		<div class="form_description">
		<h2>Phychosocial Symptoms post trauma</h2>
		</div>
		
		
		<li id="li_27" >
		<span>
<input id="element_27_1" name="client_psychosocial_symptoms" class="element checkbox" type="checkbox" value="Feeling isolated" />
<label class="choice" for="element_27_1">Feeling isolated</label>
<input id="element_27_2" name="element_27_2" class="element checkbox" type="checkbox" value="Attending seeking behaviour" />
<label class="choice" for="element_27_2">Attending seeking behaviour</label>
<input id="element_27_3" name="element_27_3" class="element checkbox" type="checkbox" value="Blaming herself for the mishap" />
<label class="choice" for="element_27_3">Blaming herself for the mishap </label>
<input id="element_27_2" name="element_27_2" class="element checkbox" type="checkbox" value="Tried to harm herself" />
<label class="choice" for="element_27_4">Tried to harm herself </label>
<input id="element_27_1" name="element_28_1" class="element checkbox" type="checkbox" value="Tired to harm others" />
<label class="choice" for="element_28_5">Tired to harm others</label>
<input id="element_27_2" name="element_28_2" class="element checkbox" type="checkbox" value="Complete change in behaviour" />
<label class="choice" for="element_28_6">Complete change in behaviour </label>
		</span> 
			
					<li class="buttons">
				<input id="client_enrolled_by" type="hidden" name="client_enrolled_by" value="<?php if((isset($_COOKIE) && (isset($_COOKIE['admin_name'])))) { echo  $_COOKIE['admin_name'] ; } ?>" />
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
	</div>