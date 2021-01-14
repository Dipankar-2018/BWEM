//Add New member function
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#add_member_container"); //Fields wrapper
    var add_button      = $("#add_member"); //Add button ID
   
    var x = 1; //initlal text box count
	
	
   $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
	
		     //text box increment
            $(wrapper).append(            
          `
          <div class="col-md-12 remove">
          <div class="card card-signup">
          <h4 class="card-title text-center">Member Information</h4>
          <div class="card-body">
              <div class="form-row">                      
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group has-default">
                      <label for="MemberName" class="text-info"><b>MEMBER NAME</b></label>
                      <input type="text" class="form-control" placeholder="Enter Your Name">
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                      <label for="SelectGender" class="text-info"><b>SELECT GENDER</b></label> <br>
                        <select class="selectpicker" data-style="select-with-transition" title="Select Gender" data-size="7">
                        <option value="">Select Gender</option>
                        <option value="male">MALE</option>
                        <option value="female">FEMALE</option>
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <div class="form-group has-default">
                      <label for="InputAge" class="text-info"><b>AGE</b></label>
                      <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter Age">
                     
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <div class="form-group has-default">
                      <label for="InputQualification" class="text-info"><b>QUALIFICATION</b></label>
                      <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter Qualification, if any">
                     
                    </div>
                  </div>
         
                  <div class="text-center">
                    <button type="button" class="btn btn-danger btn-round btn-sm" onclick="removeElement(this)">Remove Member</button>                            
                  </div>
                </div>
        
          </div>
        </div>
        </div>
     
          `
            
            ); //add input box
            x++; 
	  }
    });
});
//remove element 
function removeElement(e){
 return e.parentElement.parentElement.parentElement.parentElement.remove();
}