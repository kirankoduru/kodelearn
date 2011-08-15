<div class="r pagecontent">
    <div class="pageTop withBorder">
        <div class="pageTitle l">replace_here_page_title</div>
        <div class="pageDesc r">replace_here_page_description</div>
        <div class="clear"></div>
    </div><!-- pageTop -->
    
    <table class="vm10 datatable fullwidth">
        <tr>
            <th>&nbsp;</th>
            <th>Role</th>
            <th>No. of Users</th>
            <th>Actions</th>
        </tr>
        <?php if ($roles) { ?>
        <?php foreach ($roles as $role) { ?>
        <tr>
            <td>&nbsp;</td>
            <td><?php echo $role['name']; ?></td>
            <td><?php echo $role['num_users']; ?></td>
            <td>
                <p><?php if( Acl::instance()->is_allowed('role_edit')){?>
                        <?php echo $role['action_edit']; ?>
                <?php }?></p>
                <p><?php if( Acl::instance()->is_allowed('role_set_permission')){?>
                        <?php echo $role['action_permissions']; ?>
                <?php }?></p>
                <p><?php if( Acl::instance()->is_allowed('role_delete')){?>
                        <?php if($role['num_users'] < 1){echo $role['action_delete'];} ?>
                <?php }?></p>
            </td>
        </tr>
        <?php } ?>
        <?php } ?>        
    </table>

</div><!-- content -->

<div class="clear"></div>
