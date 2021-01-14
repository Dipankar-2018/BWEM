<?php include("conn/database.php");
if(!isset($_GET['cat']) || !isset($_GET['id']))
{
  header('location:./');
}
    $obj = new query();
$cat=array('shg'=>'self_help_group','ep'=>'entrepreneur','ng'=>'ngo','as'=>'association');  
$table="self_help_group";
if(isset($_GET['cat'])&& $_GET['cat']!="" && array_key_exists($obj->get_safe_str($_GET['cat']),$cat))
    $table=$cat[$obj->get_safe_str($_GET['cat'])];
else
    header('location:./');


if(isset($_POST['memberId'])){

    $condition_arr=array('id'=>$obj->get_safe_str($_POST['memberId']));
    $obj->deleteData($table.'_members',$condition_arr);
    echo 1;
    die();
}


if(isset($_GET['id'])){
$id=$obj->get_safe_str($_GET['id']);
$result=$obj->getData($table,'*',array('id'=>$id))[0];
$members=$obj->getData($table.'_members','*',array('parent_id'=>$id));
// print_r($result);
// print_r(sizeof($members));
// exit;

$key='shg';
$val='Self Help Group';
$cat=array('shg'=>'Self Help Group','ep'=>'Entreprenures','ng'=>'NGO','as'=>'Association');
if(isset($_GET['cat'])&& $_GET['cat']!="" && array_key_exists($obj->get_safe_str($_GET['cat']),$cat)){
    $key=$obj->get_safe_str($_GET['cat']);
    $val=$cat[$key];
  }
?>





<?php include("includes/navbar.php"); ?>
<?php include("includes/sidenav.php"); ?>

<style>
.closebtn {
  float: right!important;
  cursor: pointer!important;;
}
.closebtn:hover {
  color: #000!important;;
}
</style>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">FORM EDIT</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
     
        
             <!-- general form elements -->
             <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><?php echo strtoupper($val);?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add-data" method="post" action="backend/<?php echo $key;?>_update.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="registrationNumber">Enter Registration Number</label>
                    <input value="<?php echo $result['registration_no'];?>" type="text" class="form-control" id="registrationNumber" placeholder="Enter Registration Number" name="registration_no">
                    <input value="<?php echo $_GET['cat'];?>" type="hidden" name="type"/>  
                    <input value="<?php echo $id;?>" type="hidden" name="id"/>  
                </div>
                  <div class="form-group">
                    <label for="group_name">Group Name</label>
                    <input value="<?php echo $result['group_name'];?>" type="text" class="form-control" id="registrationNumber" placeholder="Enter Group Name" name="group_name">
                  </div>             
               <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small mb-4 text-success text-bold">Contact Information</h6>       
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input value="<?php echo $result['address'];?>" id="input-address" class="form-control" placeholder="Address - Street / Village / Town / City" type="text" name="address">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Post Office</label>
                        <input value="<?php echo $result['post_office'];?>" type="text" id="input-city" class="form-control" placeholder="Post Office" value="" name="post_office">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Police Station</label>
                        <input value="<?php echo $result['police_station'];?>" type="text" id="input-postal-code" class="form-control" placeholder="Police Station" name="police_station">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">District</label>
                        <!-- <input value="<?php //echo $result['district'];?>"  type="text" id="input-country" class="form-control" placeholder="District" value="" name="dist"> -->
                        <select class="selectpicker form-control" data-style="btn btn-white"  name="dist" required>
                        <option value="<?php echo $result['district'];?>"><?php echo ucfirst($result['district']);?></option>
                            <option value="Kokrajhar">Kokrajhar</option>
                            <option value="Chirang">Chirang</option>
                            <option value="Baksa">Baksa</option> 
                            <option value="Udalguri">Udalguri</option>                              
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Constituency</label>
                        <select class="selectpicker form-control" data-style="btn btn-white"  name="constituency" required>
                            <option value="<?php echo $result['constituency'];?>"><?php echo $result['constituency'];?></option>
                            <option value="Ujanpara">Ujanpara</option>
                            <option value="North West">North West</option>
                            <option value="South West">South West</option>
                            <option value="Debitola">Debitola</option>
                            <option value="Kazigaon">Kazigaon</option>
                            <option value="Modati">Modati</option>
                            <option value="Monglajhora">Monglajhora</option>
                            <option value="Polashguri-Debitola">Polashguri-Debitola</option>
                            <option value="Tipkai">Tipkai</option>
                            <option value="Aflagaon">Aflagaon</option>
                            <option value="Binnachara">Binnachara</option>
                            <option value="Bongshigaon">Bongshigaon</option>
                            <option value="Bonorgaon">Bonorgaon</option>
                            <option value="Boragari">Boragari</option>
                            <option value="Borshijhora">Borshijhora</option>
                            <option value="Chithila">Chithila</option>
                            <option value="Dhauliguri-Dotma">Dhauliguri-Dotma</option>
                            <option value="Dumuriguri">Dumuriguri</option>
                            <option value="Gossainichima">Gossainichima</option>
                            <option value="Habrubari">Habrubari</option>
                            <option value="Hokmabil">Hokmabil</option>
                            <option value="Jagdai">Jagdai</option>
                            <option value="Jharbari">Jharbari</option>
                            <option value="Koraitari">Koraitari</option>
                            <option value="Mahendrapur/Saralpara">Mahendrapur/Saralpara</option>
                            <option value="Nepalpara">Nepalpara</option>
                            <option value="Onthaibil">Onthaibil</option>
                            <option value="Pochagarh">Pochagarh</option>
                            <option value="Pratapkhata">Pratapkhata</option>
                            <option value="Ramfalbil">Ramfalbil</option>
                            <option value="Serfanguri">Serfanguri</option>
                            <option value="Shaktiashram">Shaktiashram</option>
                            <option value="Sialmari">Sialmari</option>
                            <option value="Murshuljhora">Murshuljhora</option>
                            <option value="Babubil">Babubil</option>
                            <option value="Bhoraguri">Bhoraguri</option>
                            <option value="Bhumka">Bhumka</option>
                            <option value="Dhoulaguri/Gossaigaon">Dhoulaguri/Gossaigaon</option>
                            <option value="Habrubari">Habrubari</option>
                            <option value="Harbhanga/Gossaigaon">Harbhanga/Gossaigaon</option>
                            <option value="Joypur">Joypur</option>
                            <option value="Kartimari">Kartimari</option>
                            <option value="Kartimari/Asharkandi">Kartimari/Asharkandi</option>
                            <option value="Milon Bazar">Milon Bazar</option>
                            <option value="Padmabil">Padmabil</option>
                            <option value="Panbari">Panbari</option>
                            <option value="Rimijhimi">Rimijhimi</option>
                            <option value="Satyapur">Satyapur</option>
                            <option value="Tulsibil">Tulsibil</option>
                            <option value="Bhairaguri">Bhairaguri</option>
                            <option value="Failaguri">Failaguri</option>
                            <option value="Grahampur">Grahampur</option>
                            <option value="Haraputa">Haraputa</option>
                            <option value="Majadabri">Majadabri</option>
                            <option value="Rangsupur">Rangsupur</option>
                            <option value="Srirampur">Srirampur</option>
                            <option value="Thakurpur">Thakurpur</option>
                            <option value="Anthaibari (Amritpur)">Anthaibari (Amritpur)</option>
                            <option value="Bairali">Bairali</option>
                            <option value="Balagaon">Balagaon</option>
                            <option value="Ballimari">Ballimari</option>
                            <option value="Barzabil">Barzabil</option>
                            <option value="Bhomrabil">Bhomrabil</option>
                            <option value="Bhorpur">Bhorpur</option>
                            <option value="Binnyakhata">Binnyakhata</option>
                            <option value="Borobhadha">Borobhadha</option>
                            <option value="Boshgaon">Boshgaon</option>
                            <option value="Burachara">Burachara</option>
                            <option value="Gardenpur">Gardenpur</option>
                            <option value="Gongia">Gongia</option>
                            <option value="Guwabari">Guwabari</option>
                            <option value="Hatigarh">Hatigarh</option>
                            <option value="Hawriapet">Hawriapet</option>
                            <option value="Hudumkata">Hudumkata</option>
                            <option value="Janaligaon">Janaligaon</option>
                            <option value="Jaraguri-Goladangi">Jaraguri-Goladangi</option>
                            <option value="Joleswari">Joleswari</option>
                            <option value="Kachugaon">Kachugaon</option>
                            <option value="Kamalsing">Kamalsing</option>
                            <option value="Kashibari">Kashibari</option>
                            <option value="Maktaigaon">Maktaigaon</option>
                            <option value="Malaguri">Malaguri</option>
                            <option value="Mojati">Mojati</option>
                            <option value="Polashguri">Polashguri</option>
                            <option value="Raikhunbari">Raikhunbari</option>
                            <option value="Raimona">Raimona</option>
                            <option value="Sapkata">Sapkata</option>
                            <option value="Simultapu">Simultapu</option>
                            <option value="Takampur">Takampur</option>
                            <option value="Amguri">Amguri</option>
                            <option value="Baruapara">Baruapara</option>
                            <option value="Bhadranpur/Basbari">Bhadranpur/Basbari</option>
                            <option value="Bhatiapara">Bhatiapara</option>
                            <option value="Bhotgaon">Bhotgaon</option>
                            <option value="Bishmuri">Bishmuri</option>
                            <option value="Daloagaon">Daloagaon</option>
                            <option value="Deborgaon">Deborgaon</option>
                            <option value="Dholmara">Dholmara</option>
                            <option value="East Maligaon/Mohanpur">East Maligaon/Mohanpur</option>
                            <option value="Fulguri">Fulguri</option>
                            <option value="Haloadol">Haloadol</option>
                            <option value="Haltugaon">Haltugaon</option>
                            <option value="Harinaguri">Harinaguri</option>
                            <option value="Kalipukhuri">Kalipukhuri</option>
                            <option value="Kalugaon/Subaijhar">Kalugaon/Subaijhar</option>
                            <option value="Karigaon Tarang Serfang">Karigaon Tarang Serfang</option>
                            <option value="Kurshakati-Kokrajhar">Kurshakati-Kokrajhar</option>
                            <option value="Magurmari">Magurmari</option>
                            <option value="Maoriagaon">Maoriagaon</option>
                            <option value="Nadangari">Nadangari</option>
                            <option value="No. 2 Gendrabil">No. 2 Gendrabil</option>
                            <option value="North Nayekgaon">North Nayekgaon</option>
                            <option value="Owabari">Owabari</option>
                            <option value="Pachim Maligaon">Pachim Maligaon</option>
                            <option value="Patgaon">Patgaon</option>
                            <option value="Salakati">Salakati</option>
                            <option value="Sijuguri">Sijuguri</option>
                            <option value="Simborgaon">Simborgaon</option>
                            <option value="South Nayekgaon">South Nayekgaon</option>
                            <option value="Sukanjhora">Sukanjhora</option>
                            <option value="Tilokgaon">Tilokgaon</option>
                            <option value="Tinali">Tinali</option>
                            <option value="Titaguri">Titaguri</option>
                            <option value="Ultapani - Labanyapur">Ultapani - Labanyapur</option>
                            <option value="Jalabila">Jalabila</option>
                            <option value="Mohamaya">Mohamaya</option>
                            <option value="Bashbari">Bashbari</option>
                            <option value="Joldoba">Joldoba</option>
                            <option value="Kurshakati - Rupshi">Kurshakati - Rupshi</option>
                            <option value="Rupshi">Rupshi</option>
                            <option value="Ananda-Betini">Ananda-Betini</option>
                            <option value="Ashrabari">Ashrabari</option>
                            <option value="Bamungaon-Dattapur">Bamungaon-Dattapur</option>
                            <option value="Bangaldoba">Bangaldoba</option>
                            <option value="Bengtol">Bengtol</option>
                            <option value="Bengtol-Serfang">Bengtol-Serfang</option>
                            <option value="Besorbari-Nangalbanga">Besorbari-Nangalbanga</option>
                            <option value="Birhangaon">Birhangaon</option>
                            <option value="Chapaguri">Chapaguri</option>
                            <option value="Dangtol">Dangtol</option>
                            <option value="Deosri">Deosri</option>
                            <option value="Fulguri">Fulguri</option>
                            <option value="Garubhasa">Garubhasa</option>
                            <option value="Hatisar">Hatisar</option>
                            <option value="Kajalgaon">Kajalgaon</option>
                            <option value="Kashikotra">Kashikotra</option>
                            <option value="Khungring">Khungring</option>
                            <option value="Kodamtola">Kodamtola</option>
                            <option value="Malivita">Malivita</option>
                            <option value="Ouguri">Ouguri</option>
                            <option value="Paddapur">Paddapur</option>
                            <option value="Patabari">Patabari</option>
                            <option value="Ranchaidham">Ranchaidham</option>
                            <option value="Runikhata">Runikhata</option>
                            <option value="Santipur">Santipur</option>
                            <option value="Shyamthaibari">Shyamthaibari</option>
                            <option value="Sidli">Sidli</option>
                            <option value="Subaijhar">Subaijhar</option>
                            <option value="Thaikajhora">Thaikajhora</option>
                            <option value="Tilokgaon">Tilokgaon</option>
                            <option value="Tukrajhar">Tukrajhar</option>
                            <option value="Alaori">Alaori</option>
                            <option value="Amguri">Amguri</option>
                            <option value="Amteka">Amteka</option>
                            <option value="Bagargaon">Bagargaon</option>
                            <option value="Ballamguri">Ballamguri</option>
                            <option value="Barlawgaon">Barlawgaon</option>
                            <option value="Barpathar">Barpathar</option>
                            <option value="Bhabanipur">Bhabanipur</option>
                            <option value="Bhangnamari">Bhangnamari</option>
                            <option value="Bishnupur">Bishnupur</option>
                            <option value="Deosri">Deosri</option>
                            <option value="Fulguri">Fulguri</option>
                            <option value="Garubhasa">Garubhasa</option>
                            <option value="Hatisar">Hatisar</option>
                            <option value="Kajalgaon">Kajalgaon</option>
                            <option value="Kashikotra">Kashikotra</option>
                            <option value="Khungring">Khungring</option>
                            <option value="Kodamtola">Kodamtola</option>
                            <option value="Malivita">Malivita</option>
                            <option value="Ouguri">Ouguri</option>
                            <option value="Paddapur">Paddapur</option>
                            <option value="Patabari">Patabari</option>
                            <option value="Ranchaidham">Ranchaidham</option>
                            <option value="Runikhata">Runikhata</option>
                            <option value="Santipur">Santipur</option>
                            <option value="Shyamthaibari">Shyamthaibari</option>
                            <option value="Sidli">Sidli</option>
                            <option value="Subaijhar">Subaijhar</option>
                            <option value="Thaikajhora">Thaikajhora</option>
                            <option value="Tilokgaon">Tilokgaon</option>
                            <option value="Tukrajhar">Tukrajhar</option>
                            <option value="Alukhunda">Alukhunda</option>
                            <option value="Bhangnamari">Bhangnamari</option>
                            <option value="Bijni Gaon">Bijni Gaon</option>
                            <option value="Chatianguri">Chatianguri</option>
                            <option value="Dangaigaon">Dangaigaon</option>
                            <option value="Dewanpara">Dewanpara</option>
                            <option value="Gargaon Bhalatal">Gargaon Bhalatal</option>
                            <option value="Malipara">Malipara</option>
                            <option value="Monakocha">Monakocha</option>
                            <option value="Mongolian">Mongolian</option>
                            <option value="Pashlabari Gargaon">Pashlabari Gargaon</option>
                            <option value="Barama">Barama</option>
                            <option value="Debachara">Debachara</option>
                            <option value="Kaklabari">Kaklabari</option>
                            <option value="Kharuajan">Kharuajan</option>
                            <option value="Merkuchi">Merkuchi</option>
                            <option value="Puransripur">Puransripur</option>
                            <option value="Adalbari">Adalbari</option>
                            <option value="Ambari (Mushalpur)">Ambari (Mushalpur)</option>
                            <option value="Athiabari">Athiabari</option>
                            <option value="Banganabari">Banganabari</option>
                            <option value="Bathouguri">Bathouguri</option>
                            <option value="Bhogpara">Bhogpara</option>
                            <option value="Borbari">Borbari</option>
                            <option value="Doomni">Doomni</option>
                            <option value="Madhupur">Madhupur</option>
                            <option value="Narayanpur">Narayanpur</option>
                            <option value="Nikashi">Nikashi</option>
                            <option value="Thamna">Thamna</option>
                            <option value="Adla">Adla</option>
                            <option value="Angardhowa">Angardhowa</option>
                            <option value="Baganpara">Baganpara</option>
                            <option value="Bagulamari">Bagulamari</option>
                            <option value="Gerua">Gerua</option>
                            <option value="Ghoramara">Ghoramara</option>
                            <option value="Jopadong">Jopadong</option>
                            <option value="Pakhamara">Pakhamara</option>
                            <option value="Subankhata">Subankhata</option>
                            <option value="Bahbari">Bahbari</option>
                            <option value="Barapeta">Barapeta</option>
                            <option value="Bonmaja">Bonmaja</option>
                            <option value="Chunbari">Chunbari</option>
                            <option value="Dakhin Howly">Dakhin Howly</option>
                            <option value="Dhekiajani">Dhekiajani</option>
                            <option value="Gobardhana">Gobardhana</option>
                            <option value="Khusrabari">Khusrabari</option>
                            <option value="Mainamata Pathar">Mainamata Pathar</option>
                            <option value="Mairajhar Pathar">Mairajhar Pathar</option>
                            <option value="Nimua">Nimua</option>
                            <option value="Paschim Howly">Paschim Howly</option>
                            <option value="Pub Howly">Pub Howly</option>
                            <option value="Uttar Howly">Uttar Howly</option>
                            <option value="Uttar Kharija Bijni">Uttar Kharija Bijni</option>
                            <option value="Baghdoba">Baghdoba</option>
                            <option value="Balabari">Balabari</option>
                            <option value="Barghuli">Barghuli</option>
                            <option value="Betna">Betna</option>
                            <option value="Deosunga">Deosunga</option>
                            <option value="Deulkuchi">Deulkuchi</option>
                            <option value="Dhepargaon">Dhepargaon</option>
                            <option value="Gopchar">Gopchar</option>
                            <option value="Goreswar">Goreswar</option>
                            <option value="Gurmow Balahati">Gurmow Balahati</option>
                            <option value="Kaurbaha">Kaurbaha</option>
                            <option value="Khandikar">Khandikar</option>
                            <option value="Maharipara">Maharipara</option>
                            <option value="Naokata">Naokata</option>
                            <option value="Niz-Betna">Niz-Betna</option>
                            <option value="Oubari">Oubari</option>
                            <option value="Rampur">Rampur</option>
                            <option value="Suagpur">Suagpur</option>
                            <option value="Tengajhar">Tengajhar</option>
                            <option value="Borphena">Borphena</option>
                            <option value="Dangari Gaon">Dangari Gaon</option>
                            <option value="Gadhuligaon">Gadhuligaon</option>
                            <option value="Ghoramara Rupahi">Ghoramara Rupahi</option>
                            <option value="Gola Gaon">Gola Gaon</option>
                            <option value="Jalah">Jalah</option>
                            <option value="Jalah Gaon">Jalah Gaon</option>
                            <option value="Kaklabari">Kaklabari</option>
                            <option value="Kamardwisa">Kamardwisa</option>
                            <option value="Rabanguri">Rabanguri</option>
                            <option value="Ramchartari">Ramchartari</option>
                            <option value="Rupahi">Rupahi</option>
                            <option value="Rupaphuli">Rupaphuli</option>
                            <option value="Salbari">Salbari</option>
                            <option value="Silbari">Silbari</option>
                            <option value="Gandhibari">Gandhibari</option>
                            <option value="Kaurbaha">Kaurbaha</option>
                            <option value="Khatarbari">Khatarbari</option>
                            <option value="Mazagari">Mazagari</option>
                            <option value="Nagrijuli">Nagrijuli</option>
                            <option value="Nizdefeli">Nizdefeli</option>
                            <option value="No 1 Pachim Defali">No 1 Pachim Defali</option>
                            <option value="No 1 Pub-Kumarikata">No 1 Pub-Kumarikata</option>
                            <option value="No 2 Pub-Kumarikata">No 2 Pub-Kumarikata</option>
                            <option value="No 3 Pachim Defali">No 3 Pachim Defali</option>
                            <option value="No 3 Pub-Kumarikata">No 3 Pub-Kumarikata</option>
                            <option value="Panbari">Panbari</option>
                            <option value="Duwarkuchi">Duwarkuchi</option>
                            <option value="No 1 Dakhin Kumarikata">No 1 Dakhin Kumarikata</option>
                            <option value="No 1 Pachim Kumarikata">No 1 Pachim Kumarikata</option>
                            <option value="No 1 Tamulpur">No 1 Tamulpur</option>
                            <option value="No 2 Dakhin Kumarikata">No 2 Dakhin Kumarikata</option>
                            <option value="No 2 Pachim Kumarikata">No 2 Pachim Kumarikata</option>
                            <option value="No 2 Tamulpur">No 2 Tamulpur</option>
                            <option value="No 3 Dakhin Kumarikata">No 3 Dakhin Kumarikata</option>
                            <option value="No 3 Pachim Kumarikata">No 3 Pachim Kumarikata</option>
                            <option value="No 3 Tamulpur">No 3 Tamulpur</option>
                            <option value="No 4 Dakhin Kumarikata">No 4 Dakhin Kumarikata</option>
                            <option value="No 4 Pachim Kumarikata">No 4 Pachim Kumarikata</option>
                            <option value="No 4 Tamulpur">No 4 Tamulpur</option>
                            <option value="No 5 Tamulpur">No 5 Tamulpur</option>
                            <option value="Dalakati Borobazar">Dalakati Borobazar</option>
                            <option value="Gerua">Gerua</option>
                            <option value="Attareekhat">Attareekhat</option>
                            <option value="Bamunjuli">Bamunjuli</option>
                            <option value="Bhergami">Bhergami</option>
                            <option value="Bholatar">Bholatar</option>
                            <option value="Budura">Budura</option>
                            <option value="Dimakuchi">Dimakuchi</option>
                            <option value="Garuajhar">Garuajhar</option>
                            <option value="Gopachachuba">Gopachachuba</option>
                            <option value="Goybari">Goybari</option>
                            <option value="Hahchara">Hahchara</option>
                            <option value="Jabangapathar">Jabangapathar</option>
                            <option value="Kalikhola">Kalikhola</option>
                            <option value="Khagrabari">Khagrabari</option>
                            <option value="Khasiachuba">Khasiachuba</option>
                            <option value="Mwilapara">Mwilapara</option>
                            <option value="Nagachuba">Nagachuba</option>
                            <option value="No. 1 Sonajuli">No. 1 Sonajuli</option>
                            <option value="Nonaikhuti">Nonaikhuti</option>
                            <option value="Orengajuli">Orengajuli</option>
                            <option value="Panesheli">Panesheli</option>
                            <option value="Paschim Patla">Paschim Patla</option>
                            <option value="Rajagarh">Rajagarh</option>
                            <option value="Rupakhat">Rupakhat</option>
                            <option value="Suklai">Suklai</option>
                            <option value="Tenkibasti">Tenkibasti</option>
                            <option value="Totolapara">Totolapara</option>
                            <option value="Kacharison">Kacharison</option>
                            <option value="Natunpanbari">Natunpanbari</option>
                            <option value="Koupati">Koupati</option>
                            <option value="Balipara">Balipara</option>
                            <option value="Bhakatpara">Bhakatpara</option>
                            <option value="Bhuyankhat">Bhuyankhat</option>
                            <option value="Chengapathar">Chengapathar</option>
                            <option value="Dumuruguri">Dumuruguri</option>
                            <option value="Gerua">Gerua</option>
                            <option value="Jhargaon Kadamguri">Jhargaon Kadamguri</option>
                            <option value="Kacharitol">Kacharitol</option>
                            <option value="Kalaigaon Town">Kalaigaon Town</option>
                            <option value="Majorchuba">Majorchuba</option>
                            <option value="Naptipara">Naptipara</option>
                            <option value="Niz-Kalaigaon">Niz-Kalaigaon</option>
                            <option value="Ranipukhuri">Ranipukhuri</option>
                            <option value="Tepakhat">Tepakhat</option>
                            <option value="Jhargaon">Jhargaon</option>
                            <option value="Khoirabari">Khoirabari</option>
                            <option value="Kuhiarkuchi">Kuhiarkuchi</option>
                            <option value="Mahaliapara">Mahaliapara</option>
                            <option value="Niz-Chinakona">Niz-Chinakona</option>
                            <option value="64 Dhansiri">64 Dhansiri</option>
                            <option value="66 Dhansiri">66 Dhansiri</option>
                            <option value="Alabari">Alabari</option>
                            <option value="Bahipukhuri">Bahipukhuri</option>
                            <option value="Gelabil">Gelabil</option>
                            <option value="Habigaon">Habigaon</option>
                            <option value="Jagyapur">Jagyapur</option>
                            <option value="Lamabari">Lamabari</option>
                            <option value="Mazbat">Mazbat</option>
                            <option value="Merabil">Merabil</option>
                            <option value="Naoherua">Naoherua</option>
                            <option value="Orang">Orang</option>
                            <option value="Phulaguri">Phulaguri</option>
                            <option value="Rangapani">Rangapani</option>
                            <option value="Rowtagaon">Rowtagaon</option>
                            <option value="Saikia chuburi">Saikia chuburi</option>
                            <option value="Mudoibari">Mudoibari</option>
                            <option value="Bhakatpara">Bhakatpara</option>
                            <option value="Mudoibari">Mudoibari</option>
                            <option value="Barigaon">Barigaon</option>
                            <option value="Barnagaon">Barnagaon</option>
                            <option value="Dhansiri">Dhansiri</option>
                            <option value="Ekrabari">Ekrabari</option>
                            <option value="Kajiamati">Kajiamati</option>
                            <option value="Mohanpur">Mohanpur</option>
                            <option value="Phuhurabari">Phuhurabari</option>
                            <option value="Purani Garaibari">Purani Garaibari</option>
                            <option value="Purani Hapagaon">Purani Hapagaon</option>
                            <option value="Rowta">Rowta</option>
                            <option value="Rowta Bagan">Rowta Bagan</option>
                            <option value="Rowta Station">Rowta Station</option>
                            <option value="Sivapur">Sivapur</option>
                            <option value="Alabari">Alabari</option>
                            <option value="Ambagaon">Ambagaon</option>
                            <option value="Amjuli">Amjuli</option>
                            <option value="Bangaon">Bangaon</option>
                            <option value="Barnagaon">Barnagaon</option>
                            <option value="Bengbari">Bengbari</option>
                            <option value="Bhairaguri">Bhairaguri</option>
                            <option value="Bhutiachang">Bhutiachang</option>
                            <option value="Borigaon">Borigaon</option>
                            <option value="Borla">Borla</option>
                            <option value="Chumuapara">Chumuapara</option>
                            <option value="Ghagra">Ghagra</option>
                            <option value="Harisinga">Harisinga</option>
                            <option value="Hatigarh">Hatigarh</option>
                            <option value="Jaberitola">Jaberitola</option>
                            <option value="Khairajangal">Khairajangal</option>
                            <option value="Khamabari">Khamabari</option>
                            <option value="Khowrang">Khowrang</option>
                            <option value="Merbangchuba">Merbangchuba</option>
                            <option value="Murmela">Murmela</option>
                            <option value="Odala">Odala</option>
                            <option value="Panery">Panery</option>
                            <option value="Purandia">Purandia</option>
                            <option value="Ratanpur">Ratanpur</option>
                            <option value="Santipur">Santipur</option>
                            <option value="Sapangaon">Sapangaon</option>
                            <option value="Sapkhaiti">Sapkhaiti</option>
                            <option value="Sastrapara">Sastrapara</option>
                            <option value="Simluguri">Simluguri</option>
                            <option value="Sonaigaon">Sonaigaon</option>
                            <option value="Tamulbari">Tamulbari</option>
                            <option value="Udalguri">Udalguri</option>
                            <option value="Borobazar">Borobazar</option>
                            <option value="Rowmari">Rowmari</option>
                            <option value="Panbari">Panbari</option>
                            <option value="Bhagpuri">Bhagpuri</option>
                            <option value="Borla">Borla</option>
                            <option value="Simla">Simla</option>

                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input value="<?php echo $result['pin'];?>" type="number" id="input-postal-code" class="form-control" placeholder="Postal code" name="pin">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-state">State</label>
                        <!-- <input value="<?php //echo $result['state'];?>" type="text" id="input-state" class="form-control" placeholder="State" name="state" > -->
                        <select class="selectpicker form-control" data-style="btn btn-white"  name="state" required>
                            <option value="<?php echo $result['state'];?>"><?php echo ucfirst($result['state']);?></option>
                            <option value="Assam">Assam</option>                              
                        </select>
                      </div>
                    </div>
                 
                  </div>
                <hr class="my-4" />     
                  <h6 class="heading-small mb-4 text-success text-bold">Head Information</h6>  

                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">

                     <label for="form-control-label">Select Category</label>
                     <select class="selectpicker form-control" data-style="btn btn-white" id="HonourSelect"  onchange = "showHideMajor(this.value);" name="head_position" required>
                     <option value="<?php echo ucwords($result['category']);?>"><?php echo $result['category'];?></option>
                        <option value="President">President</option>
                        <option value="Secretary">Secretary</option>
                        <option value="Director">Director</option>                              
                     </select>

                    </div>
                    </div>
                    <div class="col-lg-8">
                    <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Name</label>
                        <input value="<?php echo $result['name_of_head'];?>" type="text" id="input-first-name" class="form-control" placeholder="Enter your name" name="head_name" required>
                      </div>
                    </div>       
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="form-control-label" for="input-mobile">Mobile</label>
                           <input value="<?php echo $result['head_mobile'];?>" type="text" id="input-mobile" class="form-control" placeholder="Enter your mobile" name="head_mobile" required>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="form-control-label" for="input-email">Email</label>
                           <input value="<?php echo $result['head_email'];?>" type="text" id="input-email" class="form-control" placeholder="Enter your email" name="head_email" required >
                        </div>
                      </div>            
                    </div>
                    <hr class="my-4" />     
                     <h6 class="heading-small mb-4 text-success text-bold">Member Information</h6>
                      <div class="button">
                        <button class="btn btn-success btn-sm mb-2" id="add-member">Add Member</button>
                      </div>
                      <!-- add-member-start -->
                      <div class="content-wrapper-add-member">
                        <?php
                        for($i=0;$i<count($members);$i++){
                            echo '
                                <div class="col-12">
                                <div class="row">            
                                <div class="col-11"></div> 
                                <span onclick="deleteMember('.$members[$i]['id'].',this)" class="closebtn fas fa-trash fa-adjust text-danger"></span>                            
                                <div class="col-lg-12">
                                    <div class="form-group" id="input_fields_wrap">
                                    <label for="form-control-label">Member Name</label>
                                    <input value="'.$members[$i]['name'].'" type="text" class="form-control" placeholder="Enter member name" name="member_name[]" required>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label for="form-control-label">Select gender</label>
                                    <select class="selectpicker form-control" data-style="btn btn-white" onchange = "showHideMajor(this.value);" name="member_gender[]" required>
                                    <option value="'.$members[$i]['gender'].'">'.ucwords($members[$i]['gender']).'</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Others</option>                              
                                    </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label for="form-control-label">Enter age</label>
                                    <input value="'.$members[$i]['age'].'" type="text" class="form-control" placeholder="Enter age" name="member_age[]" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label for="form-control-label">Enter Qualification</label>
                                    <input value="'.$members[$i]['qualification'].'" type="text" class="form-control" placeholder="Enter Qualification" name="member_qualification[]" required>
                                    </div>
                                </div>
                                </div>
                            </div>                          
                            ';
                        }
                        ?>

                       </div>
                      <!-- add-member-end -->

                    <hr class="my-4" />     
                      <h6 class="heading-small mb-4 text-success text-bold">Extra Information</h6>  
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <div class="form-control-label text-bold">Area of Interest</div>
                              <input value="<?php echo $result['aoi'];?>" type="text" id="input-area-of-interest" class="form-control" placeholder="Enter Area of Interest" name="area_of_interest">
                            </div>
                          </div>                       
                          <div class="col-lg-6">
                            <div class="form-group">
                              <div class="form-control-label text-bold">Group Experience</div>
                              <input value="<?php echo $result['group_experience'];?>" type="text" id="input-area-of-experience" class="form-control" placeholder="Enter group experience" name="group_exp">
                            </div>
                          </div>
                        </div>

                          <!-- BANK____DETAILS -->

                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small mb-4 text-success text-bold">Bank Details</h6>
         
                
                  <div class="row">
                    <div class="col-6 col-lg-6">
                      <div class="form-group">                       
                        <label class="form-control-label" for="input-username">A/C Number</label>                   
                        <input value="<?php echo $result['bank_account_no'];?>" type="text" id="input-username" class="form-control" placeholder="A/C Number" name="acc_no">
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">IFSC Code</label>
                        <input value="<?php echo $result['ifsc'];?>" type="text" id="input-username" class="form-control" placeholder="IFSC Code" name="ifsc_code">
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Bank Name</label>
                        <input value="<?php echo $result['bank_name'];?>" type="text" id="input-username" class="form-control" placeholder="Bank Name" name="bank_name">
                     
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Branch Name</label>
                        <input value="<?php echo $result['branch_name'];?>" type="text" id="input-username" class="form-control" placeholder="Branch Name" name="branch_name">
                        
                      </div>
                    </div>
                    </div>                 
                  <div class="form-group">
                  
                      <div class="btn btn-default btn-file  col-6">
                      <label for="exampleInputFile">Upload Bank document</label>                 
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile2"  onchange="readURL(this,'blah');readURL(this,'blahClone');" name="passbook_file">
                            <label class="custom-file-label" for="exampleInputFile2">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <!-- <p class="help-block">Max. 500KB</p> -->
                      <?php if(isset($result['passbook_file'])&&$result['passbook_file']!=""){
                                echo '<img id="blah" src="./images/bankPassbook/'.$result['passbook_file'].'" style="height:150px;width:200px"/>';                            
                          }
                          else{
                              echo '<img id="blah" src="#" style="display: none;" />';
                          }
                          
                        ?>
                  </div>
                  <div class="form-group">                  
                      <div class="btn btn-default btn-file  col-6">
                      <label for="exampleInputFile">Upload registration document (if any)</label>
                      <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile2"  onchange="readURL(this,'blah2');readURL(this,'blahClone2');" name="registration_file">
                            <label class="custom-file-label" for="exampleInputFile2">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <!-- <p class="help-block">Max. 500KB</p> -->
                      <?php if(isset($result['registration_certificate_file'])&&$result['registration_certificate_file']!=""){
                                echo '<img id="blah2" src="./images/registrationCertificate/'.$result['registration_certificate_file'].'" style="height:150px;width:200px"/>';                            
                          }
                          else{
                              echo '<img id="blah2" src="#" style="display: none;" />';
                          }
                          
                        ?>
                      
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-success" onclick="previewForm()" data-toggle="modal" data-target="#myModal">Preview</button>
                  <button type="submit" id="submitForm" class="btn btn-warning" name="submit">Submit</button>
                </div>
              </form>
            </div>


</div>
          
          
          <!-- /.col-md-6 -->
        </div>



        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>




    
    <!-- /.content -->
  </div>

<!-- Modal -->
  <div class="modal fade" id="myModal" style="height:95vh;overflow-y: scroll;">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 aliign="center" class="modal-title font-weight-bolder">Form Preview</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                <div class="card-body">
                  <div class="form-group">
                    <label class="form-control-label">Registration Number:</label>
                    <span class="form-control" id="registration_no">1234</span>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Group Name:</label>
                    <span class="form-control" id="group_name">1234</span>
                  </div>             
               <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small mb-4 text-success text-bold">Contact Information</h6>       
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <span class="form-control" id="address">1234</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Post Office</label>
                        <span class="form-control" id="post_office">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Police Station</label>
                        <span class="form-control" id="police_station">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">District</label>
                        <span class="form-control" id="dist">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">Constituency</label>
                        <span class="form-control" id="constituency">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <span class="form-control" id="pin">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">State</label>
                        <span class="form-control" id="state">1234</span>
                      </div>
                    </div>
                 
                  </div>
                <hr class="my-4" />     
                  <h6 class="heading-small mb-4 text-success text-bold">Head Information</h6>  

                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">

                     <label for="form-control-label">Category</label>
                     <span class="form-control" id="head_position">1234</span>
                    </div>
                    </div>
                    <div class="col-lg-8">
                    <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Name</label>
                        <span class="form-control" id="head_name">1234</span>
                      </div>
                    </div>       
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="form-control-label" for="input-mobile">Mobile</label>
                          <span class="form-control" id="head_mobile">1234</span>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="form-control-label" for="input-email">Email</label>
                          <span class="form-control" id="head_email">1234</span>
                        </div>
                      </div>            
                    </div>
                    <hr class="my-4" />     
                     <h6 class="heading-small mb-4 text-success text-bold">Member Information</h6>
                      
                      <!-- loop-member-list -->
                      <div id="member-list">
                          
                          

                       </div>
                      <!-- member-list-end -->

                    <hr class="my-4" />     
                      <h6 class="heading-small mb-4 text-success text-bold">Extra Information</h6>  
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <div class="form-control-label text-bold">Area of Interest</div>
                              <span class="form-control" id="area_of_interest">1234</span>
                            </div>
                          </div>                       
                          <div class="col-lg-6">
                            <div class="form-group">
                              <div class="form-control-label text-bold">Group Experience</div>
                              <span class="form-control" id="group_exp">1234</span>
                            </div>
                          </div>
                        </div>

                          <!-- BANK____DETAILS -->

                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small mb-4 text-success text-bold">Bank Details</h6>       
                  <div class="row">
                    <div class="col-6 col-lg-6">
                      <div class="form-group">                       
                        <label class="form-control-label" for="input-username">A/C Number</label>          
                        <span class="form-control" id="acc_no">1234</span>   
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">IFSC Code</label>
                        <span class="form-control" id="ifsc_code">1234</span>
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Bank Name</label>
                        <span class="form-control" id="bank_name">1234</span>                     
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Branch Name</label>
                        <span class="form-control" id="branch_name">1234</span>                        
                      </div>
                    </div>
                    </div>                        
                    <hr style="margin:2px 0px 2px 0px;"/>           
                  <div class="col-12">                  
                      <div class="col-6">
                        <label class="form-control-label col-6">Bank document</label>
                        <?php if(isset($result['passbook_file'])&&$result['passbook_file']!=""){
                                echo '<img id="blahClone" src="./images/bankPassbook/'.$result['passbook_file'].'" style="height:150px;width:200px"/>';                            
                          }
                          else{
                              echo '<img id="blahClone" src="#" style="display: none;" />';
                          }
                          
                        ?>
                      </div>
                      <hr style="margin:2px 0px 2px 0px;"/>
                      <div class="col-6">
                      <label class="form-control-label col-6">Registration Document</label>
                      <?php if(isset($result['registration_certificate_file'])&&$result['registration_certificate_file']!=""){
                                echo '<img id="blahClone2" src="./images/registrationCertificate/'.$result['registration_certificate_file'].'" style="height:150px;width:200px"/>';                            
                          }
                          else{
                              echo '<img id="blahClone2" src="#" style="display: none;" />';
                          }
                          
                        ?>
                      </div>
                  </div>
              </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" onclick="$('#submitForm').click();"  data-dismiss="modal">Final Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <!-- /.content-wrapper -->
<?php include('includes/footer.php');

}
?>
