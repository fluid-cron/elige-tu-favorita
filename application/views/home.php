<style>
.container-fluid {
    
}
.img-container{
	padding: 0px!important;
	text-align: center;
}

.container-left{
	padding: 2%;
}
.container-right{

	padding: 0px;

}

.papel-favorita{
	margin-top: 2%;
	user-select:none;
}
.favorita-2{
    z-index: -1;
    height: 100%;
    padding: 0px;
    position: fixed;
    right: 1px;
}
.error {
    border: 1px solid red;
}
#mensaje {
    font-style: italic;
    font-family: trebuchet ms;
    font-size: 22px;
    color: #1140A6;
    font-weight: bold;    
}
.fondo {
	height: 100vh;
    background-size: cover;
    background-position: 95%;
    background-image: url(img/background-2.png);
    background-repeat: no-repeat;
}

#div-participar {
	display: none;
}
.bases {	
	position: relative;
	    height: 11px;
}
.bases a {	
    font-style: italic;
    font-size: 11px;
    color: #172D9F;
    float: right;
}
</style>

<div class="container-fluid img-container">

		<div class="col-lg-6 col-md-6 col-sm-6 container-left " id="div-participar" >
			<div class="row">
				<div class="col-lg-12 ">
					<img src="<?php echo base_url();?>img/txt-1.png" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<img src="<?php echo base_url();?>img/favorita.png"  class="papel-favorita" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<img src="<?php echo base_url();?>img/txt-2.png" style="user-select:none;" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 ">
					<div><a href="javascript:void(0);" id="btn-participar" ><img src="<?php echo base_url();?>img/btn.png" alt="" style="margin-top:50px; user-select:none;"></a></div>
				</div>
			</div>
		</div>

    <div class="col-lg-6 col-md-6 col-sm-6 container-left" id="div-formulario" >
			<div class="row">
				<div class="col-lg-12 ">
					<img src="<?php echo base_url();?>img/txt-1.png" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12" style="padding-top: 30px;">
					<img src="<?php echo base_url();?>img/txt-3.png"  class="papel-favorita" alt="">
				</div>
			</div>
                        <br>
			<div class="row">
				<div class="col-lg-12">
					<form id="datos" method="post" >
					<div class="form-group">
                                            <select class="form-control" name="producto" id="producto" >
                                                <option value="" >Elije tu producto...</option>
                                                <option value="Luxury Almond Touch + giftcard $100.000">Luxury Almond Touch + giftcard $100.000</option>
                                                <option value="Soft Care + giftcard $100.000">Soft Care + giftcard $100.000</option>
                                                <option value="Acolchado + giftcard $100.000">Acolchado + giftcard $100.000</option>
                                            </select>                                            
  					</div>
					<div class="form-group">
  					 <input type="text"  class="form-control" name="nombre" id="nombre" placeholder="Nombre Completo"  maxlength="50">
  					</div>
					<div class="form-group">
  					 <input type="text"  class="form-control" name="edad" id="edad" placeholder="Edad"  maxlength="3">
  					</div>  					
  					<div class="form-group">
  					  <input type="text" class="form-control" placeholder="Email" name="email" id="email" maxlength="50">                                          
  					</div>
  					<div class="form-group">
  					  <input type="text" class="form-control" placeholder="Teléfono" name="telefono" id="telefono" maxlength="12">                                          
  					</div>
					<p class="bases" >					
  					  <a href="<?php echo base_url(); ?>pdf/bases.docx" target="_blank" >Bases y condiciones*</a>
  					</p> 
                    <div class="form-group">    
                        <a id="btn-enviar" href="javascript:void(0);"><img src="img/btn-enviar.png" alt="" style="margin-top:50px;user-select:none;"></a>
                    </div>                                            
					</form>
                                    <br><br>
                                        <p id="mensaje"></p>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 container-right hidden-xs fondo">
			<!--img src="<?php //echo base_url();?>img/background-2.png"  alt=""-->
		</div>

</div>