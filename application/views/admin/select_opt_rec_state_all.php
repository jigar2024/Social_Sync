<table class="table tablerec" id="rectbl" >
 <thead class="thead-inverse">
    <tr>
			<th>City_Id</th>
            <th>State_name</th>
 		    <th>City_Name</th>
			<th>Operation</th>
   </tr>
 </thead>
     <tbody>
		<?php foreach($ss as $row){ ?>
              <tr>
				<td><?php echo $row['city_id'];?></td>
                <td><?php echo $row['state_name'];?></td>
                <td><?php echo $row['city_name'];?></td>
				<td><a href="<?php echo site_url('admin/City/delete_city/'.$row['city_id']);?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-cross"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="<?php echo site_url('admin/City/update_city/'.$row['city_id']);?>" data-i18n="nav.invoice.invoice_template" class="menu-item"><i class="icon-plus2"></i></a></td>
              </tr>
		<?php }?>
     </tbody>
</table>