	<div id="form_container">
	
		<!-- <h1><a>Phone Follow-Up Check List</a></h1> -->
		<form id="form_1076783" class="appnitro" enctype="multipart/form-data" method="post" action="client_phone_followup_save_view.php">
					<div class="form_description">
			<h2>Phone Follow-Up Check List</h2>
			<p></p>
		</div>						
			<ul >
						<li id="li_1" >
		<label class="description" for="client_id">Client ID </label>
		<div>
			<input id="element_1" name="client_id" class="element text medium" type="text" maxlength="255" value="<?php if(isset($_GET) && isset($_GET['client_id'])) { echo $_GET['client_id'];}?>" readonly> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="phone_date">Phone Follow Up Date </label>
		<div>
			<input id="element_2" name="phone_date" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="last_phone_date">Last Called Date </label>
		<div>
			<input id="element_3" name="last_phone_date" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="conversation">Conversation Held With (Name & Relation) </label>
		<div>
			<input id="element_4" name="conversation" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="conversation_status">Status Of Phone Conversation </label>
		<div>
			<textarea id="element_5" name="conversation_status" class="element textarea medium"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3>Medical History</h3>
			<p></p>
		</li>		<li id="li_9" >
		<label class="description" for="element_9">Wound Recovery </label>
		<span>
			<input id="element_9_1" name="client_wound_recovery" class="element checkbox" type="checkbox" value="Presence of open wounds" />
            <label class="choice" for="element_9_1">Presence of open wounds</label>
            <input id="element_9_2" name="client_wound_recovery" class="element checkbox" type="checkbox" value="Wounds healed" />
            <label class="choice" for="element_9_2">Wounds healed</label>
            <input id="element_9_3" name="client_wound_recovery" class="element checkbox" type="checkbox" value="Formation/Thickening of scars" />
            <label class="choice" for="element_9_3">Formation/Thickening of scars</label>
            <input id="element_9_4" name="client_wound_recovery" class="element checkbox" type="checkbox" value="Contractures" />
            <label class="choice" for="element_9_4">Contractures</label>

		</span> 
		</li>		<li class="section_break">
			<h3>Psychological History</h3>
			<p></p>
		</li>		<li id="li_10" >
		<label class="description" for="element_10">Sleeping Pattern </label>
		<div>
		<select class="element select medium" id="element_10" name="client_sleeping_pattern"> 
			<option value="Disturbed Sleep" >Disturbed Sleep</option>
            <option value="Nightmares" >Nightmares</option>
            <option value="Excess Sleeping" >Excess Sleeping</option>
            <option value="Normal Sleep" selected="selected">Normal Sleep</option>

		</select>
		</div> 
		</li>		<li id="li_11" >
		<label class="description" for="element_11">Emotional Status </label>
		<div>
		<select class="element select medium" id="element_11" name="client_emotional_status"> 
			<option value="Feels low" >Feels low</option>
            <option value="Cries offten" >Cries offten</option>
            <option value="Remains isolated" >Remains isolated</option>
            <option value="Aggressive" >Aggressive</option>
            <option value="Normal" selected="selected">Normal</option>

		</select>
		</div> 
		</li>		<li id="li_12" >
		<label class="description" for="element_12">Home Visit </label>
		<span>
			<input id="element_12_1" name="client_home_visit" class="element radio" type="radio" value="Yes" />
            <label class="choice" for="element_12_1">Yes</label>
            <input id="element_12_2" name="client_home_visit" class="element radio" type="radio" value="No" />
            <label class="choice" for="element_12_2">No</label>

		</span> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Remarks & Summary </label>
		<div>
			<textarea id="element_8" name="client_remarks" class="element textarea medium"></textarea> 
		</div> 
		</li>
					<li class="buttons">
				<input id="client_enrolled_by" type="hidden" name="client_enrolled_by" value="<?php if((isset($_COOKIE) && (isset($_COOKIE['admin_name'])))) { echo  $_COOKIE['admin_name'] ; } ?>" />
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
	</div>