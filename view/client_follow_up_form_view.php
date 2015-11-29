<div id="form_container">
	<form id="form_1076823" class="appnitro"  enctype="multipart/form-data" method="post" action="client_follow_up_save_view.php">
					<div class="form_description">
			<h2>Follow Up After Intake</h2>
			<p></p>
		</div>						
			<ul >
			
					<li id="li_4" >
		<label class="description" for="element_4">Aspect Oriented </label>
		<span>
			<input id="oriented" name="client_aspect_oriented" class="element checkbox" type="checkbox" value="Aspect Oriented" />
			<label class="choice" for="element_4_1">Aspect Oriented</label>

		</span> 
		</li>

 <li>
  <span> 
		1) Diet intake </br>
		2) Importance of hygiene </br>
		3) Importance of pressure garments </br>
		4) Emotional support </br>
		5) Assistance at recovery & healing center </br>
		6) Significance of physical excercise and physiotheraphy </br>
		7) Home visit </br>
		8) Follow-up after discharge from KMC
</span>		
		
</li>



		<li id="li_3" >
		<label class="description" for="element_3">Patients Physical Activity </label>
		<li>
  <span> 
		1) Mostly on Bed / Walks around / Does not walk around but sits up in bed. </br>

		2) Regular with excercises prescribed /reluctant to excercise </br>

		3) Progress on health and nutrition.                       </br>         

		4) in health / no improvement                 </br>      

		5) Able to eat well /does not eat /eats but not able to digest.</br>

		6) Dietician's opinion in nutriotional health of patient.
</span>		
		
</li>
		<div>
			<label class="description" for="element_13">Client Physical Activities</label>
			<textarea id="dietician_opinion" name="client_physical_activities" class="element textarea medium"></textarea>
		</div> 
		</li>
			
					<li class="buttons">
					<input name="client_id" type="hidden" value="<?php if(isset($_GET) && isset($_GET['client_id'])) { echo $_GET['client_id'];}?>" readonly> 			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>
	</div>