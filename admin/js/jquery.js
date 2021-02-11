//Add New member function
const pending = $("#pending");
const acpt=$("#acpt-app");
const rjct=$("#rjct-app");
const pendingDiv=$("#pending-app");
const acptDiv=$("#accepted-app");
const rjctDiv=$("#rejected-app");
(()=>{
  if(pending !== null){
    pending.click();
  }
})()

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
                  <input type="text" class="member_name form-control" placeholder="Enter member name" name="member_name[]" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                <label for="form-control-label">Select gender</label>
                <select class="selectpicker member_gender form-control" data-style="btn btn-white" onchange = "//showHideMajor(this.value);" name="member_gender[]" required>
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
                <input type="text" class="member_age form-control" placeholder="Enter age" name="member_age[]" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="form-control-label">Enter Qualification</label>
                <input type="text" class="member_qualification form-control" placeholder="Enter Qualification" name="member_qualification[]" required>
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
    if (willDelete && (element.parentElement.parentElement.parentElement.querySelectorAll('.col-12').length>1)) {
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
   
    }else{
      swal("Atleast Single Member Required!", {
        icon: "warning",
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

  let mem_name = $('.member_name');
  let mem_gender= $('.member_gender');
  let mem_age = $('.member_age');
  let mem_qualification= $('.member_qualification');
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
  document.querySelector('#address').innerHTML=$('input[name="address"]').val();
  document.querySelector('#dist').innerHTML=document.querySelector('[name="dist"]').selectedOptions[0].innerHTML;
  document.querySelector('#constituency').innerHTML=document.querySelector('[name="constituency"]').selectedOptions[0].innerHTML;
  document.querySelector('#post_office').innerHTML=$('input[name="post_office"]').val();
  document.querySelector('#police_station').innerHTML=$('input[name="police_station"]').val();
  document.querySelector('#pin').innerHTML=$('input[name="pin"]').val();

  document.querySelector('#aoi').innerHTML=document.querySelector('[name="aoi"]').selectedOptions[0].innerHTML;// capitalize($('select[name="aoi"]').val());
  document.querySelector('#year_of_exp').innerHTML=document.querySelector('[name="year_of_exp"]').selectedOptions[0].innerHTML;//capitalize($('select[name="year_of_exp"]').val());
  document.querySelector('#location').innerHTML=document.querySelector('[name="location"]').selectedOptions[0].innerHTML;//capitalize($('select[name="location"]').val());
  document.querySelector('#ac_no').innerHTML=$('input[name="ac_no"]').val();
  document.querySelector('#ifsc').innerHTML=$('input[name="ifsc"]').val();
  document.querySelector('#bank_name').innerHTML=$('input[name="bank_name"]').val();
  document.querySelector('#branch_name').innerHTML=$('input[name="branch_name"]').val();

}


function previewTraineeForm(){ 
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

//post View for trainer
function postViewFormTrainer(cat,id){ 
  // alert(cat);
  $.ajax({
    url:"backend/getjsondata.php",
    method:"post",
    data:{id:id,cat:cat},
    dataType:"json",
    success:function(data){
      document.querySelector('#name').innerHTML=data[0].name;  
      document.querySelector('#email').innerHTML=data[0].email;
      document.querySelector('#contact').innerHTML=data[0].contact;
      document.querySelector('#gname').innerHTML=data[0].gname;
      document.querySelector('#relation').innerHTML=data[0].relation;
      document.querySelector('#dob').innerHTML=data[0].dob;

      document.querySelector('#category').innerHTML=data[0].category;
      document.querySelector('#religion').innerHTML=data[0].religion;  
      document.querySelector('#education').innerHTML=data[0].education;
      document.querySelector('#state').innerHTML=data[0].state;
      document.querySelector('#address').innerHTML=data[0].address;
      document.querySelector('#dist').innerHTML=data[0].district;
      document.querySelector('#constituency').innerHTML=data[0].constituency;
      document.querySelector('#post_office').innerHTML=data[0].post_office;
      document.querySelector('#police_station').innerHTML=data[0].pstation;
      document.querySelector('#pin').innerHTML=data[0].pin;      
      document.querySelector('#aoi').innerHTML=data[0].aoi;
      document.querySelector('#year_of_exp').innerHTML=data[0].exp;
      document.querySelector('#location').innerHTML=data[0].location;
      document.querySelector('#ac_no').innerHTML=data[0].ac_no;
      document.querySelector('#ifsc').innerHTML=data[0].ifsc;
      document.querySelector('#bank_name').innerHTML=data[0].bank_name;
      document.querySelector('#branch_name').innerHTML=data[0].branch_name;

      document.querySelector('#passbook_fileClone').setAttribute("src", "./images/bankPassbook/"+data[0].bank_doc);
      document.querySelector('#work_expClone').setAttribute("src", "./images/expCertificate/"+data[0].work_exp_doc);
      document.querySelector('#education_cerClone').setAttribute("src", "./images/educationCer/"+data[0].education_doc);
      document.querySelector('#voter_aadhaarClone').setAttribute("src", "./images/addressProof/"+data[0].voter_aadhaar);
      document.querySelector('#photoClone').setAttribute("src", "./images/photo/"+data[0].photo);



    },
    error:function(err){
      swal("Some Error Occured!", {
        icon: "error",
      });
    }
});  
}

//post View for trainee
function postViewFormTrainee(cat,id){ 
  // alert(cat);
  $.ajax({
    url:"backend/getjsondata.php",
    method:"post",
    data:{id:id,cat:cat},
    dataType:"json",
    success:function(data){
      document.querySelector('#name').innerHTML=data[0].name;  
      document.querySelector('#email').innerHTML=data[0].email;
      document.querySelector('#contact').innerHTML=data[0].contact;
      document.querySelector('#gname').innerHTML=data[0].gname;
      document.querySelector('#relation').innerHTML=data[0].relation;
      document.querySelector('#dob').innerHTML=data[0].dob;

      document.querySelector('#category').innerHTML=data[0].category;
      document.querySelector('#religion').innerHTML=data[0].religion;  
      document.querySelector('#education').innerHTML=data[0].education;
      document.querySelector('#state').innerHTML=data[0].state;
      document.querySelector('#address').innerHTML=data[0].address;
      document.querySelector('#district').innerHTML=data[0].district;
      document.querySelector('#constituency').innerHTML=data[0].constituency;
      document.querySelector('#post').innerHTML=data[0].post_office;
      document.querySelector('#police').innerHTML=data[0].pstation;
      document.querySelector('#pin').innerHTML=data[0].pin;
      document.querySelector('#course').innerHTML=data[0].course;
      document.querySelector('#course_duration').innerHTML=data[0].duration;
      
      document.querySelector('#location').innerHTML=data[0].location;

      document.querySelector('#ac_no').innerHTML=data[0].ac_no;
      document.querySelector('#ifsc').innerHTML=data[0].ifsc;
      document.querySelector('#bank_name').innerHTML=data[0].bank_name;
      document.querySelector('#branch_name').innerHTML=data[0].branch_name;

      document.querySelector('#passbook_fileClone').setAttribute("src", "./images/bankPassbook/"+data[0].bank_doc);
      document.querySelector('#education_cerClone').setAttribute("src", "./images/educationCer/"+data[0].education_doc);
      document.querySelector('#voter_aadhaarClone').setAttribute("src", "./images/addressProof/"+data[0].voter_aadhaar);
      document.querySelector('#photoClone').setAttribute("src", "./images/photo/"+data[0].photo);

    },
    error:function(err){
      swal("Some Error Occured!", {
        icon: "error",
      });
    }
});  
}







function printChart(element){
    let arr=[12, 19, 3, 5];
    $.ajax({
      url:"backend/getjsondata.php",
      method:"POST",
      data:{element:element},
      dataType:"json",
      success:function(data){
        // console.log(data[0]['kokrajhar']);
          arr[0]=data[0]['kokrajhar'];
          arr[1]=data[1]['Chirang'];
          arr[2]=data[2]['Baksa'];
          arr[3]=data[3]['Udalguri'];
          // console.log(arr);
          drawChart(element,arr);
      },
      error:function(data){
        drawChart(element,arr);
      }
     
  });
  // console.log(arr);
  
}
function drawChart(element,arr){
  if(document.getElementById(element+"chart")!=null){
  const ctx = document.getElementById(element+"chart").getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: ['Kokrajhar', 'Chirang', 'Baksa', 'Udalguri'],
          datasets: [{
              
              data: arr,
              backgroundColor: [
                  'rgba(255, 99, 132, 0.9)',
                  'rgba(54, 162, 235, 0.9)',
                  'rgba(255, 206, 86, 0.9)',
                  'rgba(75, 192, 192, 0.9)',
                  'rgba(153, 102, 255, 0.9)',
                  'rgba(255, 159, 64, 0.9)'
                  
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
                  
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
}
}
(
  ()=>{
    printChart("shg");
    printChart('ep');
    printChart('ng');
    printChart('as');
    printChart('tr');
    printChart('tre');
  }
)();

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




   //gallary

   $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  });