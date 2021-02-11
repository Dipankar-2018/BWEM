<div class="card">
<div class="card-header">
    <div style="display:flex;justify-content:space-between;">
    <h3 class="card-title text-primary text-bold">BTRLM- <?php echo strtoupper($catagory).' '.strtoupper($dist).'\'S ';?> DATA </h3>
        <a class="btn btn-success btn-sm" href="./download/csv.php?cat=<?php echo $cat;?>&dist=<?php echo $dist;?>" >
            <i class="fas fa-file-pdf"></i> Download All</a>
    </div>
</div>
<!-- /.card-header -->
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <?php if($exclusion){
        echo "<th>NAME</th>";
        }else{
        echo "<th>GROUP NAME</th>";
        } ?>                  
        <th>CONTACT</th>
        <th>ADDRESS</th>
        <th>STATUS</th>
        <th>Approval</th>
        <th>EDIT</th>                 
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <?php
        for($i=0;$i<count($result);$i++){
        ?>
            <tr>
            <td><?php echo $exclusion==true?$result[$i]['formID']:$result[$i]['formID']; ?></td>
            <td><?php echo $exclusion==true?$result[$i]['name']:$result[$i]['group_name'];?></td>
            <td><?php echo $exclusion==true?$result[$i]['contact']:$result[$i]['head_mobile'];?></td>
            <td><?php echo $result[$i]['address'];?></td>
            <td>
                Pending  
            
            </td>
            <td>
            <a href="" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Accept</a>
            <a href="" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> Reject</a>                  
            </td>
            <td>
            
            <a class="btn btn-warning btn-sm" href="<?php echo $editFormHrefLocation.$result[$i]['id'];?>">
            <i class="fas fa-cog"></i> Edit</a>
            
            <button class="btn btn-danger btn-sm" onclick='<?php echo "deleteEntry(\"".$_GET['cat']."\",".$result[$i]['id'].")";?>'><i class="far fa-trash-alt"></i> Delete</button>  
            
            </td>
            <td>
            
            <button class="btn btn-primary btn-sm" onclick='<?php echo $postViewForm."(\"".$_GET['cat']."\",".$result[$i]['id'].")";?>' data-toggle="modal" data-target="<?php echo $modalId;?>"><i class="fas fa-eye"></i>View</button>
            
            <a class="btn btn-success btn-sm" href="./download/csv.php?cat=<?php echo $cat;?>&id=<?php echo $result[$i]['id'];?>" >
            <i class="fas fa-file-pdf"></i> Download</a>
            
            
            </td>
            </tr>
    <?php }?>
    </tbody>
    </table>
</div>
<!-- /.card-body -->