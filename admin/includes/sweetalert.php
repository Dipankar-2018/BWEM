<?php
    session_start();

    if(isset($_SESSION['formStatus'])){
      if($_SESSION['formStatus']==true){
            echo "
            <script>
                swal({
                  title: 'Success',
                  text: 'Form Submitted Successful',
                  icon: 'success',
                });
            </script>   
            ";
        }else{
          echo "
          <script>
              swal({
                title: 'Failure',
                text: 'Form Submitted Unsuccessful',
                icon: 'error',
              });
          </script>   
          ";
        }
      unset($_SESSION['formStatus']);
    }; 


    
    if(isset($_SESSION['inserted'])){

      if($_SESSION['inserted'] == true){
        echo "
        <script>
            swal({
              title: 'Success',
              text: 'Form Submitted Successfully',
              icon: 'success',
            });
        </script>   
        ";


      }else{

        echo "
        <script>
            swal({
              title: 'Failure',
              text: 'Form Submitted Unsuccessful',
              icon: 'error',
            });
        </script>   
        ";
      }
        unset($_SESSION['inserted']);


      }



      if(isset($_SESSION['file_type'])){

        if($_SESSION['file_type'] == true){
          echo "
          <script>
          swal({
            title: 'Failure',
            text: 'Upload file should be in PDF formate',
            icon: 'error',
          });
         </script>   
          "; 
  
        }
        unset($_SESSION['file_type']);

  
  
        }
        



        if(isset($_SESSION['imgsuccess'])){

          if($_SESSION['imgsuccess'] == true){
            echo "
            <script>
                swal({
                  title: 'Success',
                  text: 'Image Submitted Successfully',
                  icon: 'success',
                });
            </script>   
            ";
    
    
          }else{
    
            echo "
            <script>
                swal({
                  title: 'Failure',
                  text: 'Image Submitted Unsuccessful',
                  icon: 'error',
                });
            </script>   
            ";
          }
            unset($_SESSION['imgsuccess']);



        }





        //img formate error
        if(isset($_SESSION['imgerror']) && $_SESSION['imgerror'] == true){

          echo "
          <script>
          swal({
            title: 'Failure',
            text: 'Upload file should be in PDF formate',
            icon: 'error',
          });
         </script>   
          "; 

          unset($_SESSION['imgerror']);

        }


    








  ?>