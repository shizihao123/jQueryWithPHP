<?php require( 'header.php'); ?>
<header>
  <nav>
    <div class="header-title">
      <div class="header-back monograph-back"><span class="glyphicon glyphicon-menu-left"></span></div>
      <div class="header-main-title monograph-header">
          <ul>
            <li class="header-skillsEvaluating-li"><span class="glyphicon glyphicon-eye-open"></span> <span id="viewer-count">0</span></li>
            <li class="header-skillsEvaluating-li"><span class="glyphicon glyphicon-inbox"></span></li>
            <li class="header-skillsEvaluating-li"><span class="glyphicon glyphicon-link" id="mono-share"></span></li>
          </ul>
      </div>
    </div>
  </nav>
</header>

  <section>
     
     <div class="monograph-img1">
       <img src="">
     </div>

      <div class="skills-evaluating-title">
          <h4>0</h4>
          <p>0</p>
        </div>

        <div class="content-summary">
         <div class="content-summaryIn">
           内容摘要
         </div>
       </div>

        <div class="skeva-content">
              内容
        </div>

        <div class="skeva-xiaocai">
            <div class="skeva-xiaocai-content">
                晓菜
            </div>
        </div>



  </section>
  <script type="text/javascript">
    $(document).ready(function(){
 
        $('#monograph-back').click(function(){
            backPreviosPage('monograph.php');
        });

        $('.header-back').click(function(){
          history.go(-1);
        });

        $('.monograph-header ul li:last-child').click(function(){
            displayShareForm();
        });

        var currentHref=document.location.href;
        tag = currentHref.split('#')[2];
        displayALertForm('正在加载...');
        if(tag == 'type1'){
             if(currentHref.indexOf('#')!=-1){
                currentHref=currentHref.split('#')[1];
                getSkillsInfo(currentHref,0,1,10,function(data){
                var jsonData=JSON.parse(data);
                //console.log(jsonData);
                  if(jsonData['msg']=='成功'){
                      $('.monograph-img1 img').attr('src',jsonData['data']['info']['big_image']);
                      $('.monograph-header ul .header-skillsEvaluating-li #viewer-count').html(jsonData['data']['info']['browse_num']);
                      $('.skills-evaluating-title h4').html(jsonData['data']['info']['title']);
                      $('.skills-evaluating-title p').html(jsonData['data']['info']['created_time']);
                      $('.content-summaryIn').html(jsonData['data']['info']['paper']);
                      $('.skeva-content').html(jsonData['data']['info']['content']);
                      $('.skeva-content p').css('background','rgb(226,224,227)');  
                  }else{
                       displayALertForm(jsonData['msg']);
                       }
               });
        }else{
          window.location.href="skills.php";
        }
      }
      //首页文章单个信息
      var currentHref = window.location.href;
      tag = currentHref.split('#')[2];
       if(tag == 'type'){
          displayALertForm('正在加载...');
          if(currentHref.indexOf('#')!=-1){
          currentHref=currentHref.split('#')[1];
          getHomeInfo(currentHref,0,1,10,function(data){
              var jsonData=JSON.parse(data);
              if(jsonData['msg']=='成功'){
                  $('.monograph-img1 img').attr('src',jsonData['data']['info']['big_image']);
                  $('.monograph-header ul .header-skillsEvaluating-li #viewer-count').html(jsonData['data']['info']['browse_num']);
                  $('.skills-evaluating-title h4').html(jsonData['data']['info']['title']);
                  $('.skills-evaluating-title p').html(jsonData['data']['info']['created_time']);
                  $('.content-summaryIn').html(jsonData['data']['info']['paper']);
                  $('.skeva-content').html(jsonData['data']['info']['content']);
                  $('.skeva-content p').css('background','rgb(226,224,227)');  
              }else{
                  displayALertForm(jsonData['msg']);
              }
          });
        }else{
          window.location.href="index.php";
        }
      }

      //专题(首页的幻灯片)单个信息
      getProjectInfo(1,0,1,10,function(data){
        if(data!=''){
          var jsonData = JSON.parse(data);
          if(jsonData['msg'] == '成功'){
            $('.monograph-img1 img').attr('src',jsonData['data']['info']['image']);
            $('.monograph-header ul .header-skillsEvaluating-li #viewer-count').html(jsonData['data']['info']['browse_num']);
            $('.skills-evaluating-title h4').html(jsonData['data']['info']['title']);
            $('.skills-evaluating-title p').html(jsonData['data']['info']['created_time']);
            $('.content-summaryIn').html(jsonData['data']['info']['paper']);
            // $('.skeva-content').html(jsonData['data']['info']['content']);
            $('.skeva-content p').css('background','rgb(226,224,227)');  
            }else{
              displayALertForm(jsonData['msg']);
            }
        }else{
          displayALertForm('获取失败,请重试');
        }
      });

      $('section').css('marginTop',$('header').height());

    });
  </script>

  <?php require('footer.php'); ?>

  <script>
    $('.main-footer').hide();
  </script>