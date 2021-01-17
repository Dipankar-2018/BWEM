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
                      <input type="text" class="form-control" placeholder="Enter Your Name" name="member_name[]">
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                      <label for="SelectGender" class="text-info"><b>SELECT GENDER</b></label> <br>
                        <select class="form-control" data-style="select-with-transition" title="Select Gender" data-size="7" name="member_gender[]">
                        <option value="">Select Gender</option>
                        <option value="male">MALE</option>
                        <option value="female">FEMALE</option>
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <div class="form-group has-default">
                      <label for="InputAge" class="text-info"><b>AGE</b></label>
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Age" name="member_age[]">
                     
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <div class="form-group has-default">
                      <label for="InputQualification" class="text-info"><b>QUALIFICATION</b></label>
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Qualification, if any" name="member_qualification[]">
                     
                    </div>
                  </div>
         
                  <div class="text-center">
                    <button type="button" class="btn btn-danger btn-round" onclick="removeElement(this)">Remove Member</button>                            
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
//image preview
function readURL(input,targetId) {
  let FileUploadPath = input.value;
    //To check if user upload any file
    if (FileUploadPath == '') {
        alert("Please upload an image");
    } else {
        let Extension = FileUploadPath.substring(
        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
        if (Extension == "png"|| Extension == "jpeg" || Extension == "jpg") {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#'+targetId).attr('src', e.target.result).width(200).height(150).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }

            } 
    //The file upload is NOT an image
        else {
                alert("File Extension Must be (jpg ,png,jpeg,gif)");

            }
      }
}

//utility function
const capitalize = (s) => {
  if (typeof s !== 'string') return ''
  return s.charAt(0).toUpperCase() + s.slice(1)
}
//Local Preview
function previewForm(){ 
  document.querySelector('#registration_no').innerHTML=$('input[name="registration_no"]').val();  
  document.querySelector('#group_name').innerHTML=$('input[name="group_name"]').val();
  document.querySelector('#address').innerHTML=$('input[name="address"]').val();
  document.querySelector('#post_office').innerHTML=$('input[name="post_office"]').val();
  document.querySelector('#police_station').innerHTML=$('input[name="police_station"]').val();
  document.querySelector('#dist').innerHTML=capitalize($('select[name="dist"]').val());
  document.querySelector('#pin').innerHTML=$('input[name="pin"]').val();
  document.querySelector('#state').innerHTML=capitalize($('select[name="state"]').val());
  document.querySelector('#constituency').innerHTML=capitalize($('select[name="constituency"]').val());
  document.querySelector('#head_position').innerHTML=capitalize($('select[name="head_position"]').val());
  document.querySelector('#head_name').innerHTML=$('input[name="head_name"]').val();
  document.querySelector('#head_mobile').innerHTML=$('input[name="head_mobile"]').val();
  document.querySelector('#head_email').innerHTML=$('input[name="head_email"]').val();
  document.querySelector('#area_of_interest').innerHTML=$('input[name="area_of_interest"]').val();
  document.querySelector('#group_exp').innerHTML=$('input[name="group_exp"]').val();
  document.querySelector('#acc_no').innerHTML=$('input[name="acc_no"]').val();
  document.querySelector('#ifsc_code').innerHTML=$('input[name="ifsc_code"]').val();
  document.querySelector('#bank_name').innerHTML=$('input[name="bank_name"]').val();
  document.querySelector('#branch_name').innerHTML=$('input[name="branch_name"]').val();

  let mem_name = $('input[name="member_name[]"]');
  let mem_gender= $('select[name="member_gender[]"]');
  let mem_age = $('input[name="member_age[]"]');
  let mem_qualification= $('input[name="member_qualification[]"]');
  let str='';
  for(let i=0;i<mem_name.length;i++){
    let mname=mem_name[i].value;
    let mgen=capitalize(mem_gender[i].value);
    let mage=mem_age[i].value;
    let mq=mem_qualification[i].value;
    str+=`
      <div class="form-row">                      
        <div class="col-lg-12 col-sm-12">
          <div class="form-group has-default">
            <label for="MemberName" class="text-info"><b>MEMBER NAME</b></label>
            <span class="form-control" class="member_name">${mname}</span>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="form-group">
            <label for="SelectGender" class="text-info"><b>GENDER</b></label> <br>
            <span class="form-control" class="member_gender">${mgen}</span>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="form-group has-default">
            <label for="InputAge" class="text-info"><b>AGE</b></label>
            <span class="form-control" class="member_age">${mage}</span>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="form-group has-default">
            <label for="InputQualification" class="text-info"><b>QUALIFICATION</b></label>
            <span class="form-control" class="member_qualification">${mq}</span>
          </div>
        </div>
    </div>
    `;
  }
  document.querySelector('#member-list').innerHTML=str;
}