<div class="datalist">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50"><?= trans('id') ?></th>
               
                <th><?= trans('username') ?></th>
                <th>First Name</th>
                <th>Last Name</th>
                <th><?= trans('email') ?></th>
                <th><?= trans('role') ?></th>
              
                <th width="120"><?= trans('action') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($info as $row): ?>
            <tr>
            	<td>
					<?=$row['admin_id']?>
                </td>
            
                <td>
                    <?=$row['username']?>
                </td> 
                <td>
                    <?=$row['firstname']?>
                </td>
                <td>
                    <?=$row['lastname']?>
                </td>
                <td>
					<?=$row['email']?>
                </td>
                <td>
                   <?=$row['admin_role_title']?>
                </td> 
          
                <td>
                    <a href="<?= base_url("admin/admin/edit/".$row['admin_id']); ?>" class="btn btn-warning btn-xs mr5" >
                    <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?= base_url("admin/admin/delete/".$row['admin_id']); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

