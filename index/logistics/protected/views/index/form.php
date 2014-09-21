<!DOCTYPE html>
<html>
<head>
   <title>Bootstrap 实例 - 堆叠的水平</title>
   <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <meta  charset='utf-8'>
   <style>
          body{font-weight:bold; color: #fff; font-size: 25px; text-align: center;}
          .default{  background-color: #A8B1B2;/*  opacity: 0.5; */
         box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444; padding:0; }
         /*#header{ background-color: #EFF6F6; }*/
         textarea{width:100%; height:250px;}
         input[type=file] { height:40px; width: 100%;/* display:none */;}
         #btn{ height:50px; width:100%; }
         input[type=submit] {height:55px; width:98%;  background-color: #cecece;}
         select { width:100%; height:50px; text-align: center;}
         .Length{ width: 180px;}
         .width30{width:100%;}

   </style>
</head>
<?php CHtml::$afterRequiredLabel = '';?>

<body>   

    <diV id = "header" style="height:100px;" class = "col-md-12  default" >  头部    </div>    
    <div class="col-md-8  col-md-offset-2 default"   style=" margin-top:30px;  margin-bottom:30px; height:500px; ">
        
            <?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'advice-form',
  'enableAjaxValidation'=>false,
   // 'enableAjaxValidation'=>true,
    // 'enableClientValidation'=>true,
  'htmlOptions'=>array('enctype'=>'multipart/form-data') 
)); ?>
        <?php echo $form->errorSummary($adviceModel); ?>

             <div class="col-md-12 default"   style="margin-bottom:5px; height:50px">
           
                    <div class="col-md-2 default" style="height:50px;" >  <div  style="margin-top:10px;"> <?php echo $form->labelEx($adviceModel,'picture'); ?></div> </div>
                    <div  class="col-md-6 default" style="height:50px;"   >  <div  style="margin-top:5px; margin-left:20px;">    <?php echo $form->fileField($adviceModel,'picture'); ?> </div> 
                             
                              <!--  <div  class="col-md-8 default" style="height:50px;"  id="path" >            
                                                            </div>
                                                            <div  class="col-md-4 default" style="height:50px;" >           
                                         <button  id= 'btn' >选择图片</button>
                                                            </div> -->

                    </div>
                    <div class="col-md-4 default" style="height:50px;"  >   <!--   <?php echo $form->labelEx($adviceModel,'cid'); ?> -->
    <?php echo $form->dropDownList($adviceModel,'cid',  $category); ?> </div>
          
            </div>

            <div class="col-md-12 default"   style="margin-bottom:5px; height:50px">
                 <div  style="margin-top:10px;">   <?php echo $form->labelEx($adviceModel,'content'); ?>  </div>
                <!--   <?php echo $form->error($adviceModel,'content'); ?> -->
             </div>
        
             <div class="col-md-12 default"   style="margin-bottom:5px; height:250px"> 
                   <?php echo $form->textArea($adviceModel,'content'); ?>
             </div>

            <div class="col-md-12 default"   style="margin-bottom:5px; height:130px">
                  <div class="col-md-6 default"   style="margin:0; height:130px">
                           <div class="col-md-12 default"   style="margin:0; height: 45px">
                              <div class="col-md-4 default"   style="margin:0; height: 45px">
                             <div  style="margin-top:5px;"> <?php echo $form->labelEx($userModel,'username'); ?> </div>
                          </div>
                                      <div class="col-md-8 default"   style="margin:0; height: 45px">
                                       <?php echo $form->textField($userModel,'username'); ?>
                                      </div>
                           </div>
                            <div class="col-md-12 default"   style="margin:0; height: 45px">
                                     
                                     <div class="col-md-4 default"   style="margin:0; height: 45px">
                                       <div  style="margin-top:5px;">  <?php echo $form->labelEx($userModel,'mobile_phone'); ?> </div>
                                       </div>
                                        <div class="col-md-8 default"   style="margin:0; height: 45px">
                                        <?php echo $form->textField($userModel,'mobile_phone'); ?>
                                         </div>         
                     </div>
                          <div class="col-md-12 default"   style="margin:0; height: 40px">
                                  <div class="col-md-4 default"   style="margin:0; height: 40px">
                                     <div  style="margin-top:5px;">   <?php echo $form->labelEx($userModel,'email'); ?> </div>
                                  </div>
                                    <div class="col-md-8 default"   style="margin:0; height: 40px">
                                     <?php echo $form->emailField($userModel,'email'); ?>
                                   </div>
                                     
                   </div>
                  </div>
   
                    <div class="col-md-6 default"   style="margin:0; height:130px">
                                <?php if(CCaptcha::checkRequirements()): ?>
                                <div class="col-md-12 default"   style="margin:0; height: 75px"> 
                                            <div class="col-md-7 default"   style="margin-top: 17px ; align-text: left;"> 
                                                    <?php echo $form -> labelEx($adviceModel, 'verifyCode')  ?>
                                                    <?php $this->widget('CCaptcha',  array(
                                                      'showRefreshButton' => false,
                                                      'clickableImage' => true, 'imageOptions' =>  array('style'=>'cursor:pointer'))); ?>
                                            </div>
                                          <div class="col-md-5 default"   style="margin-top:17px;" > 
                                                      <?php echo $form->textField($adviceModel,'verifyCode', array( 'class' => 'width30'));  ?>
                                                      <?php $form -> error($adviceModel, 'verifyCode') ?>
                                          </div>
                                </div>
                                   <?php endif; ?>
                                <div class="col-md-12 default"   style="margin:0; height: 55px">
                                       <input type="submit" value="submit" >
                                 </div>
                    </div>
            </div>

          <?php $this->endWidget(); ?>
</div>
<diV id = "fonter" style="height: 100px;" class = "col-md-12 default " >   尾部 </div>
</body>
 <script language="javascript" > 
$(function(){
    // setInterval(file_change, 3000);
      $('#aaa').click(function(){ alert(  $('input[type=file]').val() );}) 
     // $('input[type=file]').change(function(){})
     $('#btn').click(function(){
          $('input[type=file]').click();
     })
})
function file_change() {
  alert($('input[type=file]').val());
 // alert($('input[type=file]').val());
 }

</script>

</html>
