<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <p>Mail sent</p>
            <div class="content">
<h1>Contact Us List</h1>
    <div class="">
    <a href="/myProject/public/contact"><span style="font-size: 20px">Contact Us</span></a><br><br><br>
        <table border="1">
            <tr><td>Name</td><td>Mail</td><td>Message</td><td>M Date</td><td>Time</td></tr>
            <?php $data = array_reverse($data); ?>
            <?php foreach($data as $row): ?>

                 <tr><td><?php echo $row['name']; ?></td><td><?php echo  $row['email']; ?></td><td><?php echo  $row['user_message']; ?></td><td><?php echo  $row['m_date']; ?></td><td><?php echo  $row['time']; ?></td></tr>
           
            <?php endforeach; ?>
        </table>
    </div>

            </div>
        </div>
    </body>
</html>
