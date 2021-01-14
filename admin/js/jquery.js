//Add New member function
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".content-wrapper-add-member"); //Fields wrapper
    var add_button      = $("#add-member"); //Add button ID
   
    var x = 1; //initlal text box count
	
	
   $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
	
		     //text box increment
            $(wrapper).append(            
          `
          <div class="col-12">
          <hr>
            <div class="row">            
              <div class="col-11"></div> 
              <span onclick="removeElement(this)" class="closebtn fas fa-trash fa-adjust text-danger"></span>                            
              <div class="col-lg-12">
                <div class="form-group" id="input_fields_wrap">
                  <label for="form-control-label">Member Name</label>
                  <input type="text" class="form-control" placeholder="Enter member name" name="member_name[]" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                <label for="form-control-label">Select gender</label>
                <select class="selectpicker form-control" data-style="btn btn-white" onchange = "//showHideMajor(this.value);" name="member_gender[]" required>
                  <option value="">Select gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="other">Others</option>                              
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="form-control-label">Enter age</label>
                <input type="text" class="form-control" placeholder="Enter age" name="member_age[]" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="form-control-label">Enter Qualification</label>
                <input type="text" class="form-control" placeholder="Enter Qualification" name="member_qualification[]" required>
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
 return (e.parentElement.parentElement.parentElement.querySelectorAll('.col-12').length>1)?(e.parentElement).parentElement.remove():false;
}

//DATA-TABLES

$(function () {
  $("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

});



//generate password

function randomPassword(length) {
  var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
  var pass = "";
  for (var x = 0; x < length; x++) {
      var i = Math.floor(Math.random() * chars.length);
      pass += chars.charAt(i);
  }
  form_password.password.value = pass;
}

$(".readonly").keydown(function(e){
  e.preventDefault();
});

//utility function
const capitalize = (s) => {
  if (typeof s !== 'string') return ''
  return s.charAt(0).toUpperCase() + s.slice(1)
}
//delete entry
function deleteEntry(cat,id){
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this entry!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      //mycode
      $.ajax({
        url:"data.php",
        method:"POST",
        data:{id:id,cat:cat},
        dataType:"text",
        success:function(data){
            swal("Entry has been deleted!", {
              icon: "success",
            });
            window.location.reload();
        },
        error:function(err){
          swal("Some Error Occured!", {
            icon: "error",
          });
        }
    });
   
    } 

  });
  
}
//delete existing member
//delete entry
function deleteMember(memberId,element){
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this entry!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      //mycode
      $.ajax({
        url:"editform.php",
        method:"POST",
        data:{memberId:memberId},
        dataType:"text",
        success:function(data){
            swal("Entry has been deleted!", {
              icon: "success",
            });
            removeElement(element);
        },
        error:function(err){
          swal("Some Error Occured!", {
            icon: "error",
          });
        }
    });
   
    } 
  });
  
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
            <div class="col-12">
            <div class="row">                           
              <div class="col-lg-12">
                <div class="form-group" id="input_fields_wrap">
                  <label for="form-control-label">Member Name</label>
                  <span class="form-control" class="member_name">${mname}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                <label for="form-control-label">Gender</label>
                <span class="form-control" class="member_gender">${mgen}</span>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="form-control-label">Age</label>
                <span class="form-control" class="member_age">${mage}</span>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="form-control-label">Enter Qualification</label>
                <span class="form-control" class="member_qualification">${mq}</span>
                </div>
              </div>
            </div>
        </div>    
    `;
  }
  document.querySelector('#member-list').innerHTML=str;
}


//post view from db
function postViewForm(cat,id){ 
  // alert(cat);
  $.ajax({
    url:"backend/getjsondata.php",
    method:"post",
    data:{id:id,cat:cat},
    dataType:"json",
    success:function(data){
      document.querySelector('#registration_no').innerHTML=data[0].registration_no;  
      document.querySelector('#group_name').innerHTML=data[0].group_name;
      document.querySelector('#address').innerHTML=data[0].address;
      document.querySelector('#post_office').innerHTML=data[0].post_office;
      document.querySelector('#police_station').innerHTML=data[0].police_station;
      document.querySelector('#dist').innerHTML=capitalize(data[0].district);
      document.querySelector('#pin').innerHTML=data[0].pin;
      document.querySelector('#state').innerHTML=capitalize(data[0].state);
      document.querySelector('#constituency').innerHTML=capitalize(data[0].constituency);
      document.querySelector('#head_position').innerHTML=capitalize(data[0].category);
      document.querySelector('#head_name').innerHTML=data[0].name_of_head;
      document.querySelector('#head_mobile').innerHTML=data[0].head_mobile;
      document.querySelector('#head_email').innerHTML=data[0].head_email;
      document.querySelector('#area_of_interest').innerHTML=data[0].aoi;
      document.querySelector('#group_exp').innerHTML=data[0].group_experience;
      document.querySelector('#acc_no').innerHTML=data[0].bank_account_no;
      document.querySelector('#ifsc_code').innerHTML=data[0].ifsc;
      document.querySelector('#bank_name').innerHTML=data[0].bank_name;
      document.querySelector('#branch_name').innerHTML=data[0].branch_name;
      document.querySelector('#blahClone').setAttribute("src", "./images/bankPassbook/"+data[0].passbook_file);
      document.querySelector('#blahClone2').setAttribute("src", "./images/registrationCertificate/"+data[0].registration_certificate_file);

      let str='';
      for(let i=0;i<data[1].length;i++){
        let mname=data[1][i].name;
        let mgen=capitalize(data[1][i].gender);
        let mage=data[1][i].age;
        let mq=data[1][i].qualification;
        str+=`
                <div class="col-12">
                <div class="row">                           
                  <div class="col-lg-12">
                    <div class="form-group" id="input_fields_wrap">
                      <label for="form-control-label">Member Name</label>
                      <span class="form-control" class="member_name">${mname}</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                    <label for="form-control-label">Gender</label>
                    <span class="form-control" class="member_gender">${mgen}</span>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                    <label for="form-control-label">Age</label>
                    <span class="form-control" class="member_age">${mage}</span>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                    <label for="form-control-label">Enter Qualification</label>
                    <span class="form-control" class="member_qualification">${mq}</span>
                    </div>
                  </div>
                </div>
            </div>    
        `;
      }
      document.querySelector('#member-list').innerHTML=str;
    },
    error:function(err){
      swal("Some Error Occured!", {
        icon: "error",
      });
    }
});



  
}
