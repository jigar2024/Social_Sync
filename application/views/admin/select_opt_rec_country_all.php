<table class="table tablerec" id="rectbl" >
	<thead class="thead-inverse">
		<tr>
			<th>State_Id</th>
        	<th>Country_Name</th>
         	<th>State_Name</th>
			<th>Operation</th>
        </tr>
   </thead>
   <tbody>
   <?php foreach($ss as $row){ ?>
       <tr>
			<td><?php echo $row['state_id'];?></td>
            <td><?php echo $row['country_name'];?></td>
            <td><?php echo $row['state_name'];?></td>
			<td><a href="<?php echo site_url('admin/State/delete_state/'.$row['state_id']);?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-cross"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="<?php echo site_url('admin/State/update_state/'.$row['state_id']);?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-plus2"></i></a></td>
       </tr>
	<?php }?>
    </tbody>
</table>