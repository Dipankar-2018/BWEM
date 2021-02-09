<?php include("includes/navbar.php"); ?>
<?php include("includes/sidenav.php"); ?>

<?php 

include("conn/database.php");
$obj = new query();

$condition_arr = array('category' => 'shg');
$shg = $obj->getData('gallary', '*', $condition_arr);

$condition_arr = array('category' => 'entre');
$entre = $obj->getdata('gallary', '*', $condition_arr);

$condition_arr = array('category' => 'ngo');
$ngo = $obj->getdata('gallary', '*', $condition_arr);




if(isset($_GET['type']) && $_GET['type']=='delete'){
	$id=$obj->get_safe_str($_GET['id']);
	$condition_arr=array('id'=>$id);
    $obj->deleteData('gallary',$condition_arr);
    echo "<script>window.location.assign('gallary_data.php')</script>";
}

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-database"></i> Gallary</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="gallary.php">Gallary</a></li>
                        <li class="breadcrumb-item active">Edit Gallary</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
  


    <section class="content">
        <div class="row">

      
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Image Gallary</h4>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> SHG </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> NGO's </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> Entrepreneurs </a>                    
                  </div>
                  <div class="mb-2">
                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                    <div class="float-right">
                      <select class="custom-select" style="width: auto;" data-sortOrder>
                        <option value="index"> Sort by Position </option>
                        <option value="sortData"> Sort by Custom Data </option>
                      </select>
                      <div class="btn-group">
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row">

                    <?php foreach($shg as $list): ?>
                    <div class="filtr-item col-sm-2" data-category="1">                      
                        <img src="images/gallary/<?php echo $list['image']; ?>" class="img-fluid mb-2" height="400" width="300">
                        <a href="?type=delete&id=<?php echo $list['id']?>" class="btn btn-danger btn-sm">Delete</a>
                      </a>
                    </div>
                    <?php endforeach; ?>

                    <?php foreach($ngo as $list): ?>
                    <div class="filtr-item col-sm-2" data-category="2">                      
                        <img src="images/gallary/<?php echo $list['image']; ?>" class="img-fluid mb-2" height="400" width="300">
                        <a href="?type=delete&id=<?php echo $list['id']?>" class="btn btn-danger btn-sm">Delete</a>
                      </a>
                    </div>
                    <?php endforeach; ?>

                    <?php foreach($entre as $list): ?>
                    <div class="filtr-item col-sm-2" data-category="3">                      
                        <img src="images/gallary/<?php echo $list['image']; ?>" class="img-fluid mb-2" height="400" width="300">
                        <a href="?type=delete&id=<?php echo $list['id']?>" class="btn btn-danger btn-sm">Delete</a>
                      </a>
                    </div>
                    <?php endforeach; ?>
                    
                

                    
                  </div>
                </div>

              </div>
            </div>
          </div>




            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


    <!-- /.content -->
</div>

<?php include('includes/footer.php');?>