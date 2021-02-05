<?php include("includes/navbar.php"); ?>
<?php include("includes/sidenav.php"); ?>

<?php 

include("conn/database.php");
$obj = new query();
$result = $obj->getData('notice');


if(isset($_GET['type']) && $_GET['type']=='delete'){
	$id=$obj->get_safe_str($_GET['id']);
	$condition_arr=array('id'=>$id);
    $obj->deleteData('notice',$condition_arr);
    echo "<script>window.location.assign('notice_data.php')</script>";
}

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-database"></i> DataTables of Notice.</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="notice.php">Notice</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
  


    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> <i class="fas fa-edit"></i> You can go back to the Notice update section by click notice button on right</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>id</th>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Notice</th>
                                    <th>Document</th>                                  
                                    <th>Category</th>                                  
                                    <th>Delete</th>                                  
                                
                                </tr>
                            </thead>

                                <tbody>
                                
                               
                                <?php 
                                 $i = 1;
                                foreach($result as $list):                              
                                                                 
                                ?>
                                       
                                    <tr>
                                        <td> <?php echo $i++;?> </td>
                                        <td><?php echo $list['date']; ?></td>
                                        <td><?php  echo $list['title'];?></td>
                                        <td><?php echo $list['text'] ?></td>
                                        <?php if( $list['doc'] != '0'): ?>
                                        <td><a class="btn btn-secondary btn-sm" href="images/notice/<?php echo $list['doc'] ?>" target="_blank"> Document</a></td>                                   
                                        <?php else: ?>
                                        <td><button type="button" disabled class="btn btn-secondary btn-sm">Document</button></td>  
                                        <?php endif; ?>
                                        <td><?php echo $list['category']; ?></td>
                                        <td> <a href="?type=delete&id=<?php echo $list['id']?>" class="btn btn-danger btn-sm">Delete</a></td>
                                    </tr>
                                  
                                <?php endforeach; ?>
                                </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


    <!-- /.content -->
</div>

<?php include('includes/footer.php');?>