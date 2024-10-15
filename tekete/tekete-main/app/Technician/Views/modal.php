
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title></title>
  </head>

  <body>

  <table class="modal-table" cellspacing="0" cellpadding="0">
    <tr>
        <th>Ticket Number:&nbsp;&nbsp;</th>
        <td style="text-align:left"><?php echo htmlspecialchars($row['date'] . ' ' . $row['tick_id']); ?></td>
    </tr>
    <tr>
        <th>Name:&nbsp;&nbsp;</th>
        <td style="text-align:left"><?php echo htmlspecialchars($row['fname'] . " " . $row['lname']); ?></td>
    </tr>
    <tr>
        <th>Cell Number:&nbsp;&nbsp;</th>
        <td style="text-align:left"><?php echo htmlspecialchars($row['mobile']); ?></td>
    </tr>
    <tr>
        <th>Email Address:&nbsp;&nbsp;</th>
        <td style="text-align:left"><?php echo htmlspecialchars($row['email']); ?></td>
    </tr>
    <tr>
        <th>Operating System:&nbsp;&nbsp;</th>
        <td style="text-align:left"><?php echo htmlspecialchars($row['os']); ?></td>
    </tr>
    <tr>
        <th>Description:&nbsp;&nbsp;</th>
        <td style="text-align:left"><?php echo htmlspecialchars($row['description']); ?></td>
    </tr>
    <tr>
        <th>Department:&nbsp;&nbsp;</th>
        <td style="text-align:left"><?php echo htmlspecialchars($row['department']); ?></td>
    </tr>
    <tr>
        <th>Status:&nbsp;&nbsp;</th>
        <td style="text-align:left"><?php echo htmlspecialchars($row['status']); ?></td>
    </tr>
    <tr>
        <th>Date:&nbsp;&nbsp;</th>
        <td style="text-align:left"><?php echo htmlspecialchars($row['date']); ?></td>
    </tr>
    <tr>
        <th>Company Name:&nbsp;&nbsp;</th>
        <td style="text-align:left"><?php echo htmlspecialchars($row['c_name']); ?></td>
    </tr>
</table>

            
  <script defer src="../../../../tekete-main/public/assets/js/toggle_menu.js"></script>
      
</body>
</html>
