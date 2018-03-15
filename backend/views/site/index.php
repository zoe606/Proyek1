<?php


/* @var $this yii\web\View */
$this->title = 'ADMIN SPECTA';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>WELCOME <?php echo Yii::$app->user->identity->username; ?>
    </div>



    <div class="info-box">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Hehe</span>
    <span class="info-box-number">93,139</span>
  </div>
  <!-- /.info-box-content -->
</div>
<!-- /.info-box -->


<!-- Apply any bg-* class to to the info-box to color it -->
<div class="info-box bg-red">
  <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Likes</span>
    <span class="info-box-number">41,410</span>
    <!-- The progress section is optional -->
    <div class="progress">
      <div class="progress-bar" style="width: 70%"></div>
    </div>
    <span class="progress-description">
      70% Increase in 30 Days
    </span>
  </div>
  <!-- /.info-box-content -->
</div>
<!-- /.info-box -->
          <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Default Box Example</h3>
        <div class="box-tools pull-right">
          <!-- Buttons, labels, and many other things can be placed here! -->
          <!-- Here is a label for example -->
          <span class="label label-primary">Label</span>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        The body of the box
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        The footer of the box
      </div>
      <!-- box-footer -->
    </div>
    <!-- /.box -->

    <div class="box box-default">...</div>
<div class="box box-primary">...</div>
<div class="box box-info">...</div>
<div class="box box-warning">...</div>
<div class="box box-success">...</div>
<div class="box box-danger">...</div>

<div class="box box-solid box-default">...</div>
<div class="box box-solid box-primary">...</div>
<div class="box box-solid box-info">...</div>
<div class="box box-solid box-warning">...</div>
<div class="box box-solid box-success">...</div>
<div class="box box-solid box-danger">...</div>

<div class="box box-default" data-widget="box-widget">
  <div class="box-header">
    <h3 class="box-title">Box Tools</h3>
    <div class="box-tools">
      <!-- This will cause the box to be removed when clicked -->
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      <!-- This will cause the box to collapse when clicked -->
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
</div>

<div class="overlay">
  <i class="fa fa-refresh fa-spin"></i>
</div>

<!-- Construct the box with style you want. Here we are using box-danger -->
<!-- Then add the class direct-chat and choose the direct-chat-* contexual class -->
<!-- The contextual class should match the box, so we are using direct-chat-danger -->
<div class="box box-danger direct-chat direct-chat-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Direct Chat</h3>
    <div class="box-tools pull-right">
      <span data-toggle="tooltip" title="3 New Messages" class="badge bg-red">3</span>
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <!-- In box-tools add this button if you intend to use the contacts pane -->
      <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <!-- Conversations are loaded here -->
    <div class="direct-chat-messages">
      <!-- Message. Default to the left -->
