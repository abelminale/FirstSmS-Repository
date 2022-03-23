

<label for="your_email">Project Number</label>
										<input type="text" name="Project_No" id="Project_No" class="form-control"  placeholder="CCCC" >
								
<div class="form-group">
 	<label for="password">RFQ</label>
										<select  name="RFQ" id="RFQ" class="form-control"  >
										
										<option value="Received" >Received</option>
											<option value="On Going">On Going</option>
												<option value="NA">NA</option>
										</select>
</div>
<div class="form-group">
 	<label for="confirm_password">Quotation status</label>
										<select  name="Quotation_Status" id="Quotation_Status" class="form-control"  >
										
										<option value="Received" >Issued</option>
											<option value="On Going">On Going</option>
												<option value="NA">Negotation</option>
										</select>
</div>
<div class="form-group">
 <label for="confirm_password">Contract status</label>
										<select  name="Contract_Status" id="Contract_Status" class="form-control"  >
										
										<option value="Signed" >Signed</option>
											<option value="On Going Negotation">On Going Negotation</option>
											
										</select></div>
<div class="form-group">
 <label for="cvc">Manufacturing</label>
										<select  name="Manufacturing" class="form-control" id="Manufacturing" >
										
										<option value="On Process" >On Process</option>
											<option value="Done">Done</option>
											<option value="Planned to Start">Planned to Start</option>
										</select>									</div>
									<div class="form-group">
									<label for="your_email">Contract Signed Date</label>
										<input type="date" name="Contract_Signed_Date" id="Contract_Signed_Date" class="form-control"   >
									
 	</div>
									
		<div class="form-group">
 
										<label for="your_email">Delivery Due Date</label>
										<input type="date" name="Delivery_Due_Date" id="Delivery_Due_Date" class="form-control"   >
										</div>	
							
		<div class="form-group">
 
									<label for="your_email">Pricing  Contract amount (ETB)</label>
										<input type="text" name="Contract_Amount" id="Contract_Amount" class="form-control"   >
																		
	</div>	
				
<div class="form-group">
 
								<label for="your_email">Pricing  Collected amount (ETB)</label>
										<input type="text" name="Collected_Amount" id="Collected_Amount" class="form-control"   >
										
	</div>
												
				<div class="form-group">
 	<label for="cvc">Attachment Link</label>
										<input type="text" class="form-control name_list" name="Document" id="Document" class="form-control"  />
									</div>					
<script>
 $(document).ready(function () {

   var Project_No = localStorage.getItem('Project_No');
  var RFQ = localStorage.getItem('RFQ');
  var Quotation_Status = localStorage.getItem('Quotation_Status');
  var Contract_Status = localStorage.getItem('Contract_Status');
  var Contract_Signed_Date = localStorage.getItem('Contract_Signed_Date');
  var Manufacturing = localStorage.getItem('Manufacturing');
 var Contract_Amount = localStorage.getItem('Contract_Amount');
  var Collected_Amount = localStorage.getItem('Collected_Amount');
  var Document = localStorage.getItem('Document');
  var Delivery_Due_Date = localStorage.getItem('Delivery_Due_Date');
  $('#Project_No').val(Project_No);
  $('#RFQ').val(RFQ);
  $('#Quotation_Status').val(Quotation_Status);
  $('#Contract_Status').val(Contract_Status);
  $('#Contract_Signed_Date').val(Contract_Signed_Date);
  $('#Manufacturing').val(Manufacturing);
 $('#Contract_Amount').val(Contract_Amount);
   $('#Collected_Amount').val(Collected_Amount);
    $('#Document').val(Document);
	 $('#Delivery_Due_Date').val(Delivery_Due_Date);
	 });

</script>