<?php 
  @session_start();  
  if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    //login fail
    header("Location:login.php");
  }
  else{
    //login pass
    $nam=$_SESSION['NAM'];
    $id=$_SESSION['ID'];
    $pw=$_SESSION['PW'];
    $date=$_SESSION['DAT'];
    $time=$_SESSION['TIM'];
    if($nam == '') $nam = $id;
  
    include_once "./php/dirReadfiles.php";
    $filePath = "deviceList";
     $x = getfolderFiles($filePath);
  //   print_r($x);
     foreach($x as $key => $value)
     {
      $dateArry = $x[0];  
      $sizeArry = $x[1];  
     }
    }
$no = 0;
?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>手冊專區 | 第十二區管理處供水調配操控整合管理系統</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="第十二區管理處供水調配操控整合管理系統" /><link rel="shortcut icon" href="images/favicon-32.ico" type="image/x-icon">

  <link rel="stylesheet" href="css/kendoUI.css" type="text/css" />
  <link rel="stylesheet" href="css/bastlayer.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/gen.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css" />
  <link rel="stylesheet" href="css/operation.css" />

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <!-- <script type="text/javascript" src="./js/jquery-3.4.0.min.js"></script> -->
  <script type="text/javascript" src="js/gen.js"></script>
  <script src="./js/parameter_def.js"></script>
  <script src="./js/script_inner.js"></script>
  <script src="searchbase-new.js"></script>

</head>

<body onload="showtime();">
  <!-- #top_header [top] -->
  <div id="top_header">
    <div class="current_date pos_left">
      <div class="date">
        <span id="currdate" style="display: inline-block;"></span><img src="images/time.png" /><span id="currtime"></span>
      </div>
    </div>

    <div class="pos_center">
      <h3 class=""><img src="images/icons/title.png" /></h3>
    </div>

    <div class="pos_right">
      <span>訪客</span>
      <div class="avator">
        <img src="images/icons/test.png" />
      </div>
    </div>
    <a href="#" class="mobile_menu"></a>
  </div>
  <a href="#" id="header_closed" class="open">
    <img src="images/xright.svg" />
  </a>

  <!-- #top_header [end] -->
  <header>
    <div class="mobile_mask"></div>
    <div id="menu">
      <!-- main_menu [begin] -->
      <nav class="main_menu  center">
        <ul>
          <li class="">
            <a href="./mapview.php" class="m1"><img src="images/icons/btn-icon01a.png" />全區供水<span>Map view</span></a>
            <ul class="child_menu">
              <li>
                <a href="javascript:void(0);" class="left_menu1 ">
                  <div class="pic"><img src="images/m1.png" /></div>
                  快速選單
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="left_menu2 ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  基本圖層
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" class="m2"><img src="images/icons/btn-icon02a.png" />即時水情看板<span>Instant board</span></a>
            <ul class="child_menu">
             <li><a href="javascript:void(0)" class=" " onclick="console.log($(this).next('.show_popinfo').fadeToggle('fast'))">
                  <div class="pic"><img src="images/m2.png" /></div>
                  儀表板
                </a>
                <div class="show_popinfo" style="width:180px">
                  <a href="./DashboardSupply.php">全區供水<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="./DashboardPull.php">原水資訊<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="./DashboardWell.php">板新淨水資訊<div class="pic"><img src="images/m2.png" /></div></a>
                </div>
              </li>
              <li>
                <a href="./WaterBalance.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  供水平衡圖
                </a>
              </li>
              <li>
                <a href="./WaterSanxia.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  原水三峽河
                </a>
              </li>
              <li>
                <a href="./WaterYushan.php" class=" ">
                  <div class="pic"><img src="images/m1.png" /></div>
                  原水鳶山堰
                </a>
              </li>
              <li>
                <a href="./WaterBanxin.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  板新導水
                </a>
              </li>
              <li>
                <a href="./WaterBanxinScr.php" class=" ">
                  <div class="pic"><img src="images/m1.png" /></div>
                  板新供水
                </a>
                <div class="show_banxioverview">
                  <a href="./mapBanxin.php"><div class="pic"><img src="images/m2.png" /></div>板新調配總覽</a>
                </div>
              </li>
              <li><a href="./WaterOfMainPipe.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  八大管線
                </a></li>
              <li>
                <a href="./WaterLevel.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  水位總覽圖
                </a>
              </li>
               <li>
                <a href="./ElevationSystem.php" class=" ">
                  <div class="pic"><img src="images/m2.png" /></div>
                  供水高程系統
                </a>
              </li>
            </ul>
          </li>
          <li class="">
            <a href="javascript:void(0);" class="m3"><img src="images/icons/btn-icon03a.png" />監控系統資訊<span>Monitoring system</span></a>
            <ul class="child_menu" style="">
              <li>
                <a href="./DataQuery.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  數值查詢
                </a>
              </li>
              <li>
                <a href="./DataPicture.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時圖控
                </a>
              </li>
              <li>
                <a href="./DataCCTV.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  即時影像
                </a>
              </li>
              <li>
                <a href="./DataReport.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  日常報表
                </a>
              </li>
              <li><a href="./DataAnalyzeFlow.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  配水系統
                </a>
              </li>
              <li><a href="./DataWaterinfoReport.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  水情通報
                </a>
              </li> 
              <li>
                <a href="javascript:void(0)" class=" " onclick="console.log($(this).next('.show_popinfo').fadeToggle('fast'))">
                  <div class="pic"><img src="images/m2.png" /></div>
                  設備履歷管理系統
                </a>
                <div class="show_popinfo">
                  <a href="./PushImportXls.php" onclick="$('.show_popinfo').css({'display':'none'})">匯入資料<div class="pic"><img src="images/m2.png" /></div></a>
                  <a href="https://61.222.53.185/WaterEqp/" target="_new">進入管理系統<div class="pic"><img src="images/m2.png" /></div></a>
                </div>
              </li> 
            </ul>
          </li>
          <li class="active">
            <a href="javascript:void(0)" class="m4"><img src="images/icons/btn-icon04a.png" />綜合資訊<span>Comprehensive</span></a>
            <ul class="child_menu" style="">
              <li>
                <a href="./DisasterInfo.php" class="">
                  <div class="pic"><img src="images/m1.png" /></div>
                  防災專區
                </a>
              </li>
              <li>
                <a href="./operation.php" class="active">
                  <div class="pic"><img src="images/m2.png" /></div>
                  手冊專區
                </a>
              </li>
              <li>
                <a href="./ExtraLinking.php" class="">
                  <div class="pic"><img src="images/m2.png" /></div>
                  外部連結
                </a>
              </li>
            </ul>
          </li>
          <li class=""><a href="./rowmap.php" class="m4"><img src="images/icons/btn-icon04a.png" />網站地圖<span>Row Map</span></a></li>
        </ul>
      </nav>
      <!-- main_menu [end] -->
    </div>
  </header>
  <div id="dsr_Info" class="container1">
    <div class="contan">
      <ul class="tab_sheet">
        <li><span><a href="./operation.php">操作手冊</a></span></li>
        <li><span><a href="./Manage.php">管理手冊</a></span></li>
        <li><span><a href="./Maintain.php">維護手冊</a></span></li>
        <li class="active"><span><a href="./device.php">設備統計表</a></span></li>
        <li><span><a href="./statistics.php">站場點位統計總表</a></span></li>
      </ul>
      <div id="tab_contant">
        <div id="operation1" class="tab_contant"></div>
        <div id="operation2" class="tab">
        </div>
        <div id="operation3" class="tab active">
          <div class="tab-content">
              <div class="table-responsive">
                <form id="uploadForm" method="post" style="position: relative; margin-bottom: 20px;">
                <input type="hidden" name="max_file_size" value="104857600"> 
                <input name="userImage" type="file" class="inputFile btn-outline-primary"  accept=".mp4, .ppt, .pptx, .doc, .docx, .pdf, .wav, .wmv, .xls, .xlsx, .dwg, .png, .jpg, .bmp"/>
                <input type="submit" value="上傳" style="width:80px" class="btnSubmit btn btn-outline-secondary btn-sm del_" />
              </form>

                <div>
                <style type="text/css">
                  .tg  {border-collapse:collapse;border-spacing:0;word-break:break-all;}
                  .tg td{font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;color:#fff;}
                  .tg th{font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;color:#fff;}
                  .tg .tg-9wq8{border-color:inherit;text-align:center;vertical-align:middle}
                  .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
                  .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top;padding-left:6px !important}
                  </style>
                  <table class="tg" style="width: 100%;">
                  <colgroup>
                  <col style="width: 8%">
                  <col style="width: 8%">
                  <col style="width: 34%">
                  <col style="width: 15%">
                  <col style="width: 15%">
                  <col style="width: 15%">
                  <col style="width: 5%">
                  </colgroup>
                    <tr>
                      <th class="tg-0pky" colspan="7">設備統計表</th>
                    </tr>
                    <tr>
                      <td class="tg-0pky" colspan="7">標的名稱：第12區處分區計量供水調配操控整合二期建置</td>
                    </tr>
                    <tr>
                      <td class="tg-0pky" colspan="3">建置時間 : 2019/08/20</td>
                      <td class="tg-0pky" colspan="4">保固年限 : 2022/08/20</td>
                    </tr>
                    <tr>
                      <td class="tg-0pky" colspan="7">建置廠商 : 盟立自動化股份有限公司</td>
                    </tr>
                    <tr>
                      <td class="tg-9wq8" rowspan="2">序號</td>
                      <td class="tg-9wq8" rowspan="2">場所</td>
                      <td class="tg-9wq8" rowspan="2">名稱</td>
                      <td class="tg-9wq8" rowspan="2">計量單位</td>
                      <td class="tg-c3ow" colspan="2">統計數量</td>
                      <td class="tg-9wq8" rowspan="2">備註</td>
                    </tr>
                    <tr>
                      <td class="tg-0pky" style="text-align:center;">良善設備</td>
                      <td class="tg-0pky" style="text-align:center;">損壞設備</td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">1</td>
                      <td class="tg-9wq8" rowspan="16">板<br>新<br>控<br>制<br>中<br>心</td>
                      <td class="tg-0pky">伺服器電腦(含作業軟體)2U</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">5</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-0pky">RT 型UPS 1.5KVA AC110</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">3</td>
                      <td class="tg-0pky">KVM 1對8</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">1</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">4</td>
                      <td class="tg-0pky">高階網路交換器 24P</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">3</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">5</td>
                      <td class="tg-0pky">監控電腦</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">1</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">6</td>
                      <td class="tg-0pky">雷射彩色印表機(網路)(含一年耗材)</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">1</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">7</td>
                      <td class="tg-0pky">超窄邊電視牆顯示器(55")</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">22</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">8</td>
                      <td class="tg-0pky">模組化電視牆處理器(24進24出 VGAx12+HDMI INx12/HDMI 輸出卡x4+HDBaseTx20)</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">9</td>
                      <td class="tg-0pky">數位多功能混音前級8(in)8(out)</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">10</td>
                      <td class="tg-0pky">240W喇叭擴大器</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">11</td>
                      <td class="tg-0pky">電源時序控制器</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">1</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">12</td>
                      <td class="tg-0pky">環控系統控制主機含電源供應</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">1</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">13</td>
                      <td class="tg-0pky">門禁主機</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">14</td>
                      <td class="tg-0pky">門禁讀卡機</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">15</td>
                      <td class="tg-0pky">門禁主機螢幕</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">16</td>
                      <td class="tg-0pky">門禁網路交換器</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">17</td>
                      <td class="tg-9wq8" rowspan="7">板<br>新<br>淨<br>水<br>廠</td>
                      <td class="tg-0pky">高解析網路型攝影機</td>
                      <td class="tg-c3ow">支</td>
                      <td class="tg-c3ow">16</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">18</td>
                      <td class="tg-0pky">全功能網路型攝影機(室內用)</td>
                      <td class="tg-c3ow">支</td>
                      <td class="tg-c3ow">3</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">19</td>
                      <td class="tg-0pky">全功能網路型攝影機(室外用)</td>
                      <td class="tg-c3ow">支</td>
                      <td class="tg-c3ow">13</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">20</td>
                      <td class="tg-0pky">槍型攝影機支架</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">16</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">21</td>
                      <td class="tg-0pky">全功能攝影機掛架</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">16</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">22</td>
                      <td class="tg-0pky">全數位錄影主機</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">1</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">23</td>
                      <td class="tg-0pky">24埠供電型網路交換器</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">3</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">24</td>
                      <td class="tg-9wq8" rowspan="14">板<br>新<br>簡<br>報<br>室</td>
                      <td class="tg-0pky">3KVA機架式不斷電系統</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">1</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">25</td>
                      <td class="tg-0pky">超窄邊電視牆顯示器(55")</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">12</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">26</td>
                      <td class="tg-0pky">彩色無線觸控面板+無線AP(for IPAD專用)</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">1</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">27</td>
                      <td class="tg-0pky">吸頂喇叭</td>
                      <td class="tg-c3ow">支</td>
                      <td class="tg-c3ow">8</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">28</td>
                      <td class="tg-0pky">無線麥克風含手握2支</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">29</td>
                      <td class="tg-0pky">無線麥克風含手握、領夾各1</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">1</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">30</td>
                      <td class="tg-0pky">120W喇叭擴大器</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">3</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">31</td>
                      <td class="tg-0pky">HDMI影音分離器-含線3進1出(4K切換器含遙控器)</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">1</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">32</td>
                      <td class="tg-0pky">HDMI訊號延伸器</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">33</td>
                      <td class="tg-0pky">5Port網路交換器</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">34</td>
                      <td class="tg-0pky">4port mDP顯示卡(含轉接線材)</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">1</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">35</td>
                      <td class="tg-0pky">無線鍵盤(含觸控板)</td>
                      <td class="tg-c3ow">組</td>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">36</td>
                      <td class="tg-0pky">經典綠光雷射筆</td>
                      <td class="tg-c3ow">支</td>
                      <td class="tg-c3ow">1</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                    <tr>
                      <td class="tg-c3ow">37</td>
                      <td class="tg-0pky">監控電腦</td>
                      <td class="tg-c3ow">台</td>
                      <td class="tg-c3ow">2</td>
                      <td class="tg-c3ow">0</td>
                      <td class="tg-0pky"></td>
                    </tr>
                  </table>
                </div>

                <br/>
                <table class="table table-bordered table-hover">
                  <thead class="thead-light">
                    <tr>
                      <th class="col-1">項次</th>
                      <th class="col-2">檔案名稱</th>
                      <th class="col-3">檔案大小</th>
                      <th class="col-4">更新時間</th>
                      <th class="col-5">編輯</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($dateArry)):?>
                    <?php foreach($dateArry as $key => $value):?>
                    <tr>
                      <td>
                        <?php echo $no+=1;?>
                      </td>
                      <td>
                        <?php echo $key;?>
                      </td>
                      <td>
                        <?php echo $sizeArry[$key]?>
                      </td>
                      <td>
                        <?php echo $dateArry[$key]?>
                      </td>
                      <td>
                        <button id="edit_<?php echo $no;?>" type="button" class="btn btn-outline-secondary btn-sm donld_"><a href="files/<?php echo $filePath.'/'.$key;?>">下載</a></button>
                        <button id="del_<?php echo $no;?>" type="button" class="btn btn-outline-secondary btn-sm del_">刪除</button>
                      </td>
                    </tr>
                    <?php endforeach;?>
                    <?php else: echo "<h6 class='animated infinite flash' style='color: red; text-align: center;'>尚無搜尋到檔案。</h6>"?>
                  <?php endif;?>                    
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once "./php/footer.php";?>

  <script type="text/javascript" src="./js/nicescroll.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>

  <script language="javascript">
    $(".pos_right > span").text("<?php echo $nam?>");
    $(".inputFile").bind("click",function(){
      alert("最大上傳檔案大小為: 100MB。");
    });        
    $('[type=button]').on("click", function(e) {
      var id_ = $(this).attr("id");
      var td_ = id_.split("_");
      //td_[0] <= name, td_[1] <= td count number 
      if (td_[0] == 'del') { //刪除按鈕
        var td_name = $(this).closest('tbody').find("tr:nth-of-type(" + td_[1] + ")").find("td:nth-of-type(2)").text();
        var status = "delete";
        var filePath = "../files/<?php echo $filePath?>/";
        $.ajax({
          type: "POST",
          url: "./php/dirControlfile.php",
          data: {
            'td_no': td_[1],
            'name': td_name,
            'status': status,
            'path': filePath
          },
          dataType: 'html'
        }).done(function(data) {
          console.log(data);          
          if(data = "PASS")
            location.reload();          
          else
            alert("未成功刪除。");
        }).fail(function(jqXHR, textSataus, errorThrown) {
          alert("有錯誤產生，請看console log");
          console.log(jqXHR.responseText);
        });
      }
    });
    
    $("#uploadForm").on('submit', (function(e) {
      var folderName = "<?php echo $filePath?>";
      e.preventDefault();
      $.ajax({
        url: './php/upload_file.php?folder=' + folderName,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
//          console.log(data);
          $(".inputFile").val('');
          $("input[type=submit]").attr("disabled", true);
          location.reload();          
        },
        error: function() {}
      });
    }));

  

    //禁止ctrl+滾輪
    var scrollFunc = function(e) {
      e = e || window.event;
      if (e.wheelDelta && event.ctrlKey) {
        //IE/Opera/Chrome
        event.returnValue = false;
      } else if (e.detail) {
        //Firefox
        event.returnValue = false;
      }
    };
    if (document.addEventListener) {
      document.addEventListener("DOMMouseScroll", scrollFunc, false);
    } //W3C
    window.onmousewheel = document.onmousewheel = scrollFunc; //IE/Opera/Chrome/Safari

  </script>

  <!-- checkbox選擇按鈕程式 -->
  <script>
    $("td input").click(function() {
      if ($(this).prop("checked")) {
        $(this).parents('tr').addClass("color-blue");
      } else {
        $(this).parents('tr').removeClass("color-blue");
      }
    });

  </script>

  <!-- lightbox程式 -->
  <script>
    $(document).ready(function() {
      $("button#show-panel").click(function() {
        $("#lightbox, #lightbox-panel").fadeIn(300);
      });
      $("a#close-panel").click(function() {
        $("#lightbox, #lightbox-panel").fadeOut(300);
      })
      $("#lightbox").click(function() {
        $("#lightbox, #lightbox-panel").fadeOut(300);
      });
    });

  </script>
</body>

</html>
