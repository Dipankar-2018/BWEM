//Add New member function
$(document).ready(function() {
    var max_fields      = 100; //maximum input boxes allowed
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


function previewTrainerForm(){ 
  let form=new FormData(document.querySelector('form'));
  document.querySelector('#name').innerHTML=$('input[name="name"]').val();  
  document.querySelector('#email').innerHTML=$('input[name="email"]').val();
  document.querySelector('#contact').innerHTML=$('input[name="contact"]').val();
  document.querySelector('#gname').innerHTML=$('input[name="gname"]').val();
  document.querySelector('#relation').innerHTML=document.querySelector('[name="relation"]').selectedOptions[0].innerHTML;//capitalize($('select[name="relation"]').val());
  document.querySelector('#dob').innerHTML=$('input[name="dob"]').val();

  document.querySelector('#category').innerHTML=document.querySelector('[name="category"]').selectedOptions[0].innerHTML;//capitalize($('select[name="category"]').val());
  document.querySelector('#religion').innerHTML=document.querySelector('[name="religion"]').selectedOptions[0].innerHTML;//capitalize($('select[name="religion"]').val());  
  document.querySelector('#education').innerHTML=document.querySelector('[name="education"]').selectedOptions[0].innerHTML;//capitalize($('select[name="education"]').val());
  document.querySelector('#state').innerHTML=document.querySelector('[name="state"]').selectedOptions[0].innerHTML;//capitalize($('select[name="state"]').val());
  document.querySelector('#constituency').innerHTML=document.querySelector('[name="constituency"]').selectedOptions[0].innerHTML;
  document.querySelector('#address').innerHTML=$('input[name="address"]').val();
  document.querySelector('#dist').innerHTML=$('input[name="dist"]').val();
  document.querySelector('#post_office').innerHTML=$('input[name="post_office"]').val();
  document.querySelector('#police_station').innerHTML=$('input[name="police_station"]').val();
  document.querySelector('#pin').innerHTML=$('input[name="pin"]').val();

  document.querySelector('#aoi').innerHTML=document.querySelector('[name="aoi"]').selectedOptions[0].innerHTML;// capitalize($('select[name="aoi"]').val());
  document.querySelector('#year_of_exp').innerHTML=document.querySelector('[name="year_of_exp"]').selectedOptions[0].innerHTML;//capitalize($('select[name="year_of_exp"]').val());
  document.querySelector('#location').innerHTML=document.querySelector('[name="location"]').selectedOptions[0].innerHTML;//capitalize($('select[name="location"]').val());
  document.querySelector('#ac_no').innerHTML=$('input[name="ac_no"]').val();
  document.querySelector('#ifsc').innerHTML=$('input[name="ifsc"]').val();
  document.querySelector('#bank_name').innerHTML=$('input[name="bank_name"]').val();
  document.querySelector('#branch').innerHTML=$('input[name="branch"]').val();

}


function previewTraineeForm(){ 
  document.querySelector('#name').innerHTML=$('input[name="name"]').val();  
  document.querySelector('#email').innerHTML=$('input[name="email"]').val();
  document.querySelector('#contact').innerHTML=$('input[name="contact"]').val();
  document.querySelector('#gname').innerHTML=$('input[name="gname"]').val();
  document.querySelector('#relation').innerHTML=document.querySelector('[name="relation"]').selectedOptions[0].innerHTML;//capitalize($('select[name="relation"]').val());
  document.querySelector('#dob').innerHTML=$('input[name="dob"]').val();

  document.querySelector('#category').innerHTML=document.querySelector('[name="category"]').selectedOptions[0].innerHTML;//capitalize($('select[name="category"]').val());
  document.querySelector('#religion').innerHTML=document.querySelector('[name="religion"]').selectedOptions[0].innerHTML;//capitalize($('select[name="religion"]').val());  
  document.querySelector('#education').innerHTML=document.querySelector('[name="education"]').selectedOptions[0].innerHTML;//capitalize($('select[name="education"]').val());
  document.querySelector('#state').innerHTML=document.querySelector('[name="state"]').selectedOptions[0].innerHTML;//capitalize($('select[name="state"]').val());
  document.querySelector('#district').innerHTML=document.querySelector('[name="district"]').selectedOptions[0].innerHTML;
  document.querySelector('#constituency').innerHTML=document.querySelector('[name="constituency"]').selectedOptions[0].innerHTML;
  document.querySelector('#address').innerHTML=$('input[name="address"]').val();


  document.querySelector('#post').innerHTML=$('input[name="post"]').val();
  document.querySelector('#police').innerHTML=$('input[name="police"]').val();
  document.querySelector('#pin').innerHTML=$('input[name="pin"]').val();

  document.querySelector('#course').innerHTML=document.querySelector('[name="course"]').selectedOptions[0].innerHTML;// capitalize($('select[name="aoi"]').val());
  document.querySelector('#course_duration').innerHTML=document.querySelector('[name="course_duration"]').selectedOptions[0].innerHTML;//capitalize($('select[name="year_of_exp"]').val());
  document.querySelector('#location').innerHTML=document.querySelector('[name="location"]').selectedOptions[0].innerHTML;//capitalize($('select[name="location"]').val());
  document.querySelector('#ac_no').innerHTML=$('input[name="ac_no"]').val();
  document.querySelector('#ifsc').innerHTML=$('input[name="ifsc"]').val();
  document.querySelector('#bank_name').innerHTML=$('input[name="bank_name"]').val();
  document.querySelector('#branch_name').innerHTML=$('input[name="branch_name"]').val();
}


//Form Status Logic
if(document.querySelector('#formStatusBtn')!==null){
document.querySelector('#formStatusBtn').addEventListener('click',()=>{
  document.querySelector('#formResultStatus').innerHTML="";
  const formId=document.querySelector('#inputFormID').value;
  const cat=document.querySelector('#cat').value;
  if(formId==="" || cat===""){
    swal("All fields are Mandatory!");
  }else{
      $.ajax({
        url:"./admin/backend/search_form_status.php",
        method:"post",
        data:{formId:formId,cat:cat},
        dataType:"json",
        success:function(data){
          if(data[0].error===1){
            swal("Form Details Not found, Please enter the details correctly and try again");
          }else{
            const sDate=new Date(data[0].form_submitted_on.toString());
            let rDate=null;
            if(data[0].form_reviewed_on!==null)
              rDate=new Date(data[0].form_reviewed_on.toString());
          
            const fStatus=parseInt(data[0].formStatus.toString());
            let color="warning";
            let icon="query_builder";
            let status="Pending";
            if(fStatus===1){
              color="success";
              icon="check_circle_outline";
              status="Approved";
            }else if(fStatus===0){
              color="danger";
              icon="error_outline";
              status="Rejected";
            }
            const props={
              error:parseInt(data[0].error.toString()),
              submissionDate:`${sDate.getDate().toString().padStart(2,"0")}-${(sDate.getMonth()+1).toString().padStart(2,"0")}-${sDate.getFullYear()}`,
              color:color,
              icon:icon,
              status:status,
              reviewDate:rDate
            }
            if(rDate!==null)
              props.reviewDate=`${rDate.getDate().toString().padStart(2,"0")}-${(rDate.getMonth()+1).toString().padStart(2,"0")}-${rDate.getFullYear()}`;
            formStatusMsg(props);
          }          
        },
      });
  }
});
function formStatusMsg(props){
  str=`
  <div class="col-md-10" style="margin-top:6rem;">
      <div class="card">
          <div class="card-header card-header-text card-header-${props.color}">
            <div class="card-text"><h5>Form Submission Date: ${props.submissionDate}</h5>
            <span class="material-icons">${props.icon}</span> <h4 class="card-title"> Your Application status: ${props.status}</h4>
            </div>
          </div>
          <div class="card-body">
             Your application has been ${props.status}${props.reviewDate!==null?` on ${props.reviewDate}`:``}. For more information please visit our office.
          </div>
      </div>
  </div>
  `;
  document.querySelector('#formResultStatus').innerHTML=str;
}
}


//login modal transion to forgot pass
$(document).ready(function(){
  $("#forgotPwd").on("click", function(){
    $("#login").css("display", "none");
    $("#email_otp").css("display", "block");
  });

  $("#login_show").on("click", function(){
    $("#login").css("display", "block");
    $("#email_otp").css("display", "none");
    document.querySelector('#reset-email').value="";
    document.querySelector('#err_msg').innerHTML="";
  });


}); 

//reset pass
if(document.querySelector('#passrset')!=null){
document.querySelector('#passrset').addEventListener("click", function() {
  const btn=document.querySelector('#passrset');
  const btnProcessing=`<i class="fa fa-spinner fa-spin"></i>Processing`;
  btn.innerHTML=btnProcessing;
  const btnFinished=`Request a new password`;
  const email = document.querySelector('#reset-email').value;
  const errMsg=document.querySelector('#err_msg');
  errMsg.innerHTML="";
  $.ajax({
    url: "./admin/backend/passwordreseter.php",
    method: "POST",
    data: {
      resetpass: 1,
      email: email,
    },
    dataType: "text",
    success: function(data) {
      if(data=="1"){
        document.querySelector('#back').click();
        swal("Reset link has been sent to your email, Please Check!");
      }else
        errMsg.innerHTML=data;
        btn.innerHTML=btnFinished;
    }
  })
});
}
//contact page send msg
function sendMsg(btn){
  const btnProcessing=`<i class="fa fa-spinner fa-spin"></i>Processing`;
  const temp=btn.innerHTML;
  btn.innerHTML=btnProcessing;
  btn.disabled=true;
  const name=document.querySelector('#name').value;
  document.querySelector('#name').value="";
  const email=document.querySelector('#email').value;
  document.querySelector('#email').value="";
  const phone=document.querySelector('#phone').value;
  document.querySelector('#phone').value="";
  const message=document.querySelector('#message').value;
  document.querySelector('#message').value="";
  $.ajax({
    url: "./contact-us.php",
    method: "POST",
    data: {
      name: name,
      email: email,
      phone:phone,
      message:message,
      contactSendMsg:true
    },
    dataType: "text",
    success: function(data) {
      if(Number(data)===1){
        swal("Your Message is Sent Successfully!", {
          icon: "success",
        });
      }else{
        swal("Message Not Sent, Some Problem Occured!", {
          icon: "error",
        });
      }
      btn.innerHTML=temp;
      btn.disabled=false;
    },
    error: function(error){
      swal("Some Error Occured!", {
        icon: "error",
      });
      btn.innerHTML=temp;
      btn.disabled=false;
    }
  });
 
}

//Main form logic

if(document.querySelector('#submitMainForm')!=null){
  let firstTime=true;
  document.querySelector('form').addEventListener("submit", function(event) {
    if(!firstTime){
      event.preventDefault();
      btn.removeAttribute('type','submit');
      btn.setAttribute('type','button');
    }
    const btn=document.querySelector('#submitMainForm');
    const btnProcessing=`<i class="fa fa-spinner fa-spin"></i>Processing`;
    btn.innerHTML=btnProcessing;
    firstTime=false;
  });
  }



//Internet Activity
let netState=true;
   let internetCheck=setInterval(()=>{
     let alert="";
     let act=document.querySelector("#net-activity");
        if(navigator.onLine){
            
           alert+= `<div class="alert alert-success alert-dismissible fade show">
                      <strong>Success !</strong> Internet Connection is Back...
                    </div>
                  `;
            if(!netState){
              act.innerHTML=alert;
              setTimeout(()=>{act.innerHTML=""; act.style.zIndex=0;},1000);
              netState=true;
            }
            
        }else{
          alert+= `<div class="alert alert-danger alert-dismissible fade show">
                       <strong>Lost !</strong> Internet Connection is Gone...
                  </div>
                 `;
             act.innerHTML=alert;
             act.style.zIndex=3000;
            netState=false;
        }
   },2000); 