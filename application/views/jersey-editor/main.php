<!doctype html>
<html>
	<head>
		<title>UPSI Custom Jersey</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		
		<link rel="shortcut icon" href="<?=base_url();?>assets/logo/favicon.png" />
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Pacifico|VT323|Quicksand|Inconsolata' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?=base_url()?>assets-editor/css/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets-editor/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets-editor/js/colorpicker/css/bootstrap-colorpicker.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets-editor/css/style.min.css?v=1.1.3">
	</head>

	<body>	
		<div id="wrap">
			<div class="container-fluid">
				<div class="row">
                    <!-- left column -->
					<div class="col-md-2">
						<div class="leftLayout" id="leftLayoutContainer">
							<div>Type</div>
							<div class="btn-group" data-toggle="buttons">
								<? $no = 1; ?>
								<? foreach ($kits as $key) { ?>
                                <div class="btn typeButton <? if($no == 1){ echo "active"; } ?> ">
                                    <input type="radio" name="form_shirt_type" value="<?=$no?>" autocomplete="off" <? if($no == '1'){ echo "checked"; } ?> />
                                    <img src="<?=base_url($key['path'])?>/<?=$key['filename']?>" /><br/>
                                    <!-- <div class="typename">Men</div> -->
                                </div>
                            	<? $no++;} ?>
                            	<?/*
                                <div class="btn typeButton">
                                    <input type="radio" name="form_shirt_type" value="2" autocomplete="off" />
                                    <img src="<?=base_url()?>assets-editor/images/shirts/women_black_front.png" /><br/>
                                    <div class="typename">Women</div>
                                </div>
                                */?>
							</div>
							<!-- <div id="div_colors_title">Color</div>
							<div class="btn-group" data-toggle="buttons" id="div_colors">
                                <div class="btn colorButton active" style="background-color: #0268b0;">
                                    <input type="radio" name="form_shirt_color" value="1" autocomplete="off" checked />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="btn colorButton" style="background-color: #ffffff;">
                                    <input type="radio" name="form_shirt_color" value="2" autocomplete="off" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
							</div> -->
							<div class="btn-toolbar">
								<div class="add_image btn-group">
									<iframe id="ifr_upload" name="ifr_upload" height="0" width="0" frameborder="0"></iframe>
									<form id="frm_upload" action="" method="post" enctype="multipart/form-data" target="ifr_upload">
									<label class="btn btn-default btn-file">
										<i class="fa fa-picture-o"></i>&nbsp;&nbsp;Add image<input type="file" name="image_upload" accept=".gif,.jpg,.jpeg,.png,.ico">
									</label>
									</form>
								</div>
								<div class="add_text btn-group">
									<button type="button" class="btn btn-default" id="btn_addtext"><i class="fa fa-font"></i>&nbsp;&nbsp;Add text</button>
								</div>
								<?/*
								<div class="add_album btn-group">
									<button type="button" class="btn btn-default" data-toggle="modal" data-target="#albumModal"><i class="fa fa-th"></i>&nbsp;&nbsp;Album</button>
								</div>
								*/?>
							</div>
							<div class="message">
							</div>
						</div>
					</div>	
                    <!-- center column -->
					<div class="col-md-8">
						<div class="centerLayout" id="centerLayoutContainer">
							<div class="shirt"><img src="<?=base_url($default_kit['path'])?>/<?=$default_kit['filename']?>" id="img_shirt" /></div>
							<div class="cvtoolbox">
								<div class="btn-group">
									<button type="button" class="btn btn-default" id="toolbox_centerh"><i class="fa fa-arrows-h fa-lg"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_up"><i class="fa fa-arrow-up"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_centerv"><i class="fa fa-arrows-v fa-lg"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_flipx"><i class="fa fa-road fa-lg"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_flipy"><i class="fa fa-road fa-lg fa-rotate-90"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_remove"><i class="fa fa-trash-o fa-lg"></i></button>
								</div>
							</div>
							<div class="cvtoolbox cvtoolbox_2nd">
								<div class="btn-group">
									<button type="button" class="btn btn-default" id="toolbox_left"><i class="fa fa-arrow-left"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_center"><i class="fa fa-arrows fa-lg"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_right"><i class="fa fa-arrow-right"></i></button>
									<button type="button" class="btn btn-default nobtn">&nbsp;</button>
									<button type="button" class="btn btn-default nobtn">&nbsp;</button>
									<button type="button" class="btn btn-default nobtn">&nbsp;</button>
								</div>
							</div>
							<div class="cvtoolbox cvtoolbox_3rd">
								<div class="btn-group">
									<button type="button" class="btn btn-default" id="toolbox_totop"><i class="fa fa-step-backward fa-lg fa-rotate-90"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_down"><i class="fa fa-arrow-down"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_tobottom"><i class="fa fa-step-forward fa-lg fa-rotate-90"></i></button>
									<button type="button" class="btn btn-default nobtn">&nbsp;</button>
									<button type="button" class="btn btn-default nobtn">&nbsp;</button>
									<button type="button" class="btn btn-default nobtn">&nbsp;</button>
								</div>
							</div>
							<div class="cvtoolbox_info"><div><span></span></div></div>
							<div id="div_canvas_front" style="margin-top: 155px;">
								<canvas id="mainCanvas_front" width="260" height="350" class="shirt_canvas"></canvas>
							</div>
							<div id="div_canvas_back" style="margin-top: 155px;">
								<canvas id="mainCanvas_back" width="260" height="350" class="shirt_canvas"></canvas>
							</div>
							<div class="div_reviewbtn">
								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#reviewModal"><i class="fa fa-eye"></i> Preview</button>
                                <div class="dropup">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownDownload" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-save"></i> Download
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownDownload">
                                        <li><a href="#" id="btnDownloadDesign">Design Only</a></li>
                                        <li><a href="#" id="btnDownloadShirt">Design & Shirt</a></li>
                                    </ul>
                                </div>
							</div>
						</div>
					</div>	
                    <!-- right column -->
					<div class="col-md-2">
						<div class="rightLayout" id="rightLayoutContainer">
							<div class="texttoolbox">
							</div>
							<div class="message">
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		
		<!-- Preview Modal -->
		<div id="reviewModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">&nbsp;</h4>
			  </div>
			  <div class="modal-body">
				<div class="shirt"><img src="" /></div>
				<div class="shirtdesign"><img src="" /></div>
			  </div>
			</div>
		  </div>
		</div>
        
		<!-- Album Modal -->
		<?/*
		<div id="albumModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Album</h4>
			  </div>
			  <div class="modal-body">
                <a href="#" class="album-item"><div style="background-image: url(images/album/image1.png)"><img bgsrc="<?=base_url()?>assets-editor/images/album/image1.png" src="<?=base_url()?>assets-editor/images/blank.png" /></div></a>
                <a href="#" class="album-item"><div style="background-image: url(images/album/image2.png)"><img bgsrc="<?=base_url()?>assets-editor/images/album/image2.png" src="<?=base_url()?>assets-editor/images/blank.png" /></div></a>
                <a href="#" class="album-item"><div style="background-image: url(images/album/image3.png)"><img bgsrc="<?=base_url()?>assets-editor/images/album/image3.png" src="<?=base_url()?>assets-editor/images/blank.png" /></div></a>
                <a href="#" class="album-item"><div style="background-image: url(images/album/image4.png)"><img bgsrc="<?=base_url()?>assets-editor/images/album/image4.png" src="<?=base_url()?>assets-editor/images/blank.png" /></div></a>
                <a href="#" class="album-item"><div style="background-image: url(images/album/image5.png)"><img bgsrc="<?=base_url()?>assets-editor/images/album/image5.png" src="<?=base_url()?>assets-editor/images/blank.png" /></div></a>
                <a href="#" class="album-item"><div style="background-image: url(images/album/image6.png)"><img bgsrc="<?=base_url()?>assets-editor/images/album/image6.png" src="<?=base_url()?>assets-editor/images/blank.png" /></div></a>
                <a href="#" class="album-item"><div style="background-image: url(images/album/image7.png)"><img bgsrc="<?=base_url()?>assets-editor/images/album/image7.png" src="<?=base_url()?>assets-editor/images/blank.png" /></div></a>
                <a href="#" class="album-item"><div style="background-image: url(images/album/image8.png)"><img bgsrc="<?=base_url()?>assets-editor/images/album/image8.png" src="<?=base_url()?>assets-editor/images/blank.png" /></div></a>
                <a href="#" class="album-item"><div style="background-image: url(images/album/image9.png)"><img bgsrc="<?=base_url()?>assets-editor/images/album/image9.png" src="<?=base_url()?>assets-editor/images/blank.png" /></div></a>
			  </div>
			</div>
		  </div>
		</div>
		*/?>
		
		<script type="text/javascript">var base_url = "<?=base_url()?>";</script>
		<script type="text/javascript" src="<?=base_url()?>assets-editor/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets-editor/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets-editor/js/placeholders.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets-editor/js/colorpicker/js/bootstrap-colorpicker.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets-editor/js/fabric4.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>assets-editor/js/fontfaceobserver.js"></script>
        <script type="text/javascript" src="<?=base_url()?>assets-editor/js/merge-images.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets-editor/js/main.min.js?v=1.1.2"></script>
	</body>

</html>
