<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>PINC ASSESSMENT CENTRE</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'><link rel="stylesheet" href="../../assets/login/style.css">

</head>
<body>

<div class="pen-title">
<img src="/kinerja/logo.png" alt="logo" width="100" height="100">
  <h2>PINC ASSESSMENT CENTRE</h2>
</div>
<div class="module form-module">
  <div class="toggle">
    
  </div>
  <div class="form">
    <h2></h2>
    <?php echo form_open(base_url('admin/auth/login'), 'class="form" '); ?>
      <input type="text" name="username" id="name" placeholder="User Name"/>

      <input type="password" name="password" placeholder="Password"/>
      <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Login" style="background-color:#33b5e5;color:white">
 
			<?php echo form_close(); ?>
			<?php $this->load->view('admin/includes/_messages.php') ?>
  </div>
  </div>
  


  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


</body>
</html>
