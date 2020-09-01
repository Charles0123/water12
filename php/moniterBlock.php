<div id="moniter" style="">
    <h1 id="staID_">土城所＿青雲－加壓站</h1>
    <div class="tabpanel">
      <div class="main">
        <!-- p1 -->
        <div id="p1" class="panel active">
          <div class="container-fluder">
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="ex1">測站項目</label>
                  <input type="text" class="form-control" id="ex1" placeholder="">
                </div>
              </div>
            </div>
            <div class="stationinfoTable">
              <div id="grid-data" class="col-sm-12" style="padding:0;">
              </div>
            </div>
          </div>
        </div>
        <!-- p2 -->
        <div id="p2" class="panel">
          <div class="menu1" id="">
            <ul>
<!--
              <li class="" style="display: none;">
                <a href="#" class="z0">
                  <div class="text">測站<br>照片</div>
                </a>
              </li>
-->
              <li class="">
                <a href="#" class="z1">
                  <div class="text">加壓站<br>系統圖</div>
                </a>
              </li>
              <li class="">
                <a href="#" class="z2">
                  <div class="text">加壓站設<br>備配置圖</div>
                </a>
              </li>
              <li id="">
                <a href="#" class="z3">
                  <div class="text">水位<br>關係圖</div>
                </a>
              </li>
              <li id="">
                <a href="#" class="z4">
                  <div class="text">進出水管<br>資料圖</div>
                </a>
              </li>
              <li>
                <a href="#" class="z5">
                  <div class="text">配電盤<br>配線圖</div>
                </a>
              </li>
              <li>
                <a href="#" class="z6">
                  <div class="text">攝影機<br>位置圖</div>
                </a>
              </li>
              <li>
                <a href="#" class="z7">
                  <div class="text">設備履歷</div>
                </a>
              </li>
            </ul>
          </div>
          <div class="line">
              <div class="box">
                <div class="stationInfo">
                  <div class="stationEdit active">
                    <button class="stat-crud-btn" onclick="locatInforEdit(this,'R');" ><i class="fa fa-plus-square-o" aria-hidden="true" ></i>新增</button>
                    <button class="stat-crud-btn" onclick="locatInforEdit(this,'U');" ><i class="fa fa-pencil-square-o" aria-hidden="true" ></i>修改</button>
                    <button class="stat-crud-btn" onclick="locatInforEdit(this,'D');" ><i class="fa fa-trash-o" aria-hidden="true"></i>刪除</button>
                    <button class="stat-crud-btn" onclick="locatInforEdit(this,'UL');" ><i class="fa fa-cloud-upload" aria-hidden="true"></i>上傳</button>
                  </div>
                  <div>
                    <div><label>名稱: </label>
                      <div id="STATION_ID" class="inlie"><input class="underline" readonly value="123"></div>
                    </div>
                    <div><label>類別: </label>
                      <div id="STATION_TYPE"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>管轄: </label>
                      <div id="CITY_NAME"  class="inlie"><input class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>地址: </label>
                      <div id="ADDRESS"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>座標(緯): </label>
                      <div id="LAT"  class="inlie"><input type="number" class="underline" readonly></div>
                    </div>
                    <div><label>座標(經): </label>
                      <div id="LNG"  class="inlie"><input type="number" class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>供水系統: </label>
                      <div id="SUPPLY"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>加壓站運作模式: </label>
                      <div id="OPERATION_MODE"  class="inlie"><input class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>配水池: </label>
                      <div id="POOL"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>水池大小: </label>
                      <div id="POOL_SIZE"  class="inlie"><input class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>電號: </label>
                      <div id="ELECTRIC_NO"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>契約容量(KW): </label>
                      <div id="ELECTRIC_CONTRACT"  class="inlie"><input type="number" class="underline" readonly></div>
                    </div>
                    <div><label>用電總類(需量/裝置): </label>
                      <div id="ELECTRIC_TYPE"  class="inlie"><input class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>時間電價: </label>
                      <div id="ELECTRIC_PRICE"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>功率因數(%): </label>
                      <div id="PF"  class="inlie"><input type="number" class="underline" readonly></div>
                    </div>
                    <div><label>用電總類2(需量/裝置): </label>
                      <div id="infoeletyp2"  class="inlie"><input class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>抽水機數量: </label>
                      <div id="POOL"  class="inlie"><input class="underline" readonly></div>
                    </div>
                    <div><label>變頻器數量: </label>
                      <div id="POOL_SIZE"  class="inlie"><input type="number" class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div><label>電動閥資料: </label>
                      <div id="ELECTRIC_NO"  class="inlie"><input class="underline" readonly></div>
                    </div>
                  </div>
                  <div>
                    <div>
                      <label for="">圖片:</label>
                      <div id="PICTURE">
                      </div>
                    </div>
                  </div>
                  <div class="down imgbox1">                   
                    <div><img src="images/map0001.png" alt=""></div>
                    <div><img src="images/map0001.png" alt=""></div>
                    <div><img src="images/map0001.png" alt=""></div>
                  </div>
                  <div style="display: none; margin: 5px 20px;">
                    <label>維修紀錄:</label>
                    <div id="MAINTAIN">

                    </div>
                  </div>
                  <div>
                    <div style="display: none; margin: 5px 20px;">
                      <label for="">備註:</label>
                      <div id="NOTE" class=""></div>
                    </div>
                  </div>
                  <div style="display: none; margin: 5px 20px;">
                    <label for="">設備資訊:</label>
                    <div id="PUMP"></div>
                  </div>
                   
                </div>
                <div class="stationPic" id="t1">
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this, 't1');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);">上傳</button>
                  </div>
                </div>
              </div>
              <!-- z0 -->
              <div id="z0" class="panel">
                <div class="left">                  
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this, 'z0');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);" title="上傳圖片">上傳</button>
                  </div>
                </div>                
                <div class="right imgbox"> 
                  <div><img src="images/map0001.png" alt=""></div>
                  <div><img src="images/map0001.png" alt=""></div>
                  <div><img src="images/map0001.png" alt=""></div>
                </div>
              </div>
              <!-- z1 -->
              <div id="z1" class="panel">
                <div class="left">
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this,'z1');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this,'z1');" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);">上傳</button>
                  </div>
                </div>
                <div class="right imgbox">
<!--                  <div><img src="images/map0002.png" alt=""></div>-->
                </div>
              </div>
              <!-- z2 -->
              <div id="z2" class="panel">
                <div class="left">
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this,'z2');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this,'z2');" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);">上傳</button>
                  </div>
                </div>
                <div class="right imgbox">
                  <div><img src="images/map0003.png" alt=""></div>
                </div>
              </div>
              <!-- z3 -->
              <div id="z3" class="panel">
                <div class="left">
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this,'z3');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this,'z3');" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);">上傳</button>
                  </div>
                </div>
                <div class="right imgbox">
                  <div><img src="images/map0004.png" alt=""></div>
                </div>
              </div>
              <!-- z4 -->
              <div id="z4" class="panel">
                <div class="left">
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this,'z4');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this,'z4');" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);">上傳</button>
                  </div>
                </div>
                <div class="right imgbox">
                  <div><img src="images/map0005.png" alt=""></div>
                </div>
              </div>
              <!-- z5 -->
              <div id="z5" class="panel">
                <div class="left">
                  <h3>檔案上傳</h3>
                  <p>選擇圖片或拖曳圖片至此</p>
                  <div class="file-upload">
                    <div class="image-upload-wrap">
                      <input id="" class="file-upload-input" type='file' onchange="readURL(this,'z5');" accept="image/*" />
                      <!-- <input class="file-upload-input" type='file' onchange="readURL(this,'z5');" accept="image/*" /> -->
                      <div class="drag-text">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        <h3>.PNG .JPG</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload(this)" class="remove-image">移除 <span class="image-title">上傳圖片</span></button>
                      </div>
                    </div>
                    <button class="file-upload-btn" type="button" onclick="saveImgfile(this);">上傳</button>
                  </div>
                </div>
                <div class="right imgbox">
                  <div><img src="images/map0004.png" alt=""></div>
                </div>
              </div>
              <!-- z6 -->
              <div id="z6" class="panel">
                <h5>維護紀錄</h5>
                <div id="grid_table01"></div><br>
                <h5>設備履歷</h5>
                <div id="grid_pump"></div>
              </div>
            </div>
        </div>
        <!-- p3 -->
        <div id="p3" class="panel">
          <div class="dataCCTV" style="background-color: black">
            <!-- <div class="dataCCTV_title">觀音山加壓站</div> -->
            <div class="dataCCTV_content_picture_controll" style="display: none;">
              <img src="./images/icons/open.png" alt="">
            </div>
            <div class="dataCCTV_wrapper">
              <div class="dataCCTV_content cctv_block0">
                <div class="dataCCTV_content_title"><img src="./images/icons/cctv-icon3.png" alt=""><span>CAM1</span>
                  <div class="dataCCTV_content_controll"><img src="" alt=""></div>
                </div>
                <div class="dataCCTV_content_cam ">
                  <div class="cam">
                    <video id="videompv_0" class="video-js vjs-default-skin" poster="" controls autoplay>
                      <source src="" type="application/x-mpegurl">
                    </video>
                  </div>
                </div>
              </div>
              <div class="dataCCTV_content cctv_block1">
                <div class="dataCCTV_content_title"><img src="./images/icons/cctv-icon3.png" alt=""><span>CAM2</span>
                  <div class="dataCCTV_content_controll"><img src="" alt=""></div>
                </div>
                <div class="dataCCTV_content_cam ">
                  <div class="cam">
                    <video id="videompv_1" class="video-js vjs-default-skin" poster="" controls autoplay>
                      <source src="" type="application/x-mpegurl">
                    </video>
                  </div>
                </div>
              </div>
              <div class="dataCCTV_content cctv_block2">
                <div class="dataCCTV_content_title"><img src="./images/icons/cctv-icon3.png" alt=""><span>CAM3</span>
                  <div class="dataCCTV_content_controll"><img src="" alt=""></div>
                </div>
                <div class="dataCCTV_content_cam ">
                  <div class="cam">
                    <video id="videompv_2" class="video-js vjs-default-skin" poster="" controls autoplay>
                      <source src="" type="application/x-mpegurl">
                    </video>
                  </div>
                </div>
              </div>
              <div class="dataCCTV_content cctv_block3">
                <div class="dataCCTV_content_title"><img src="./images/icons/cctv-icon3.png" alt=""><span>CAM4</span>
                  <div class="dataCCTV_content_controll"><img src="" alt=""></div>
                </div>
                <div class="dataCCTV_content_cam ">
                  <div class="cam">
                    <video id="videompv_3" class="video-js vjs-default-skin" poster="" controls autoplay>
                      <source src="" type="application/x-mpegurl">
                    </video>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- p4 -->
        <div id="p4" class="panel">
          <div class="dataPicture">
            <!-- <div class="dataPicture_title">大漢監控站</div> -->
            <div class="dataPicture_content">
              <div class="dataPicture_content_menu">
                <div class="dataPicture_content_button dataPicture_content_button-active">大漢監控站</div>
              </div>
              <div class="dataPicture_content_picture">
                <div class="dataPicture_content_picture_title">
                  <div class="dataPicture_content_picture_controll" style="display: none;">
                    <img src="./images/icons/open.png" alt="">
                  </div>
                </div>
                <div class="dataPicture_content_picture_wrapper"></div>
                <div class="dataPicture_content_picture_time"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- p5 -->
        <div id="p5" class="panel">
          <div class="container-fluder">
            <div class="row">
              <div class="col-sm-8 col-xs-12">
                <div class="form-group">
                  <label for="ex1">測站項目</label>
                  <input type="text" class="form-control" id="ex2" placeholder="">
                </div>
              </div>
            </div>
            <div class="stationinfoTable">

              <!--kendoUI table插入點-->
              <div class="table-over" id="gridalarm">

                <table id="data_table" class="table table-sm table-responsive-sm">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">日期時間</th>
                      <th scope="col">測站名稱</th>
                      <th scope="col">物理量</th>
                      <th scope="col">測站項目</th>
                      <th scope="col">測值</th>
                      <th scope="col">警報訊息</th>
                      <th scope="col">高高警報</th>
                      <th scope="col">高警報値</th>
                      <th scope="col">低警報値</th>
                      <th scope="col">低低警報</th>
                      <th scope="col"><span style="color: red;"><img src="./images/icons/stdev.png" alt=""> ※</span>
                    </tr>
                  </thead>
                </table>
              </div>
              <!--kendoUI table結束點-->
              <br>
              <h7><span style="color: red;">※<img src="./images/icons/stdev.png" alt=""></span> 標準差算法: HI、LO使用兩倍標準差；HIHI、LOLO使用三倍標準差。</h7><br>
              <h7>水壓、水量當系統未設定警報值時，改使用標準差計算。</h7>
            </div>

          </div>
        </div>
      </div>
      <!-- main -->
      <!--TGOS搜尋功能-->
      <div class="menu" id="">
        <ul>
          <li class="active">
            <a href="#" class="p1">
              <div class="icon"></div>
              <div class="text">即時列表</div>
            </a>
          </li>
          <li class="">
            <a href="#" class="p2">
              <div class="icon"></div>
              <div class="text">場站資訊</div>
            </a>
          </li>
          <li id="moniter_CCTV">
            <a href="#" class="p3">
              <div class="icon"></div>
              <div class="text">即時影像</div>
            </a>
          </li>
          <li id="moniter_iFix">
            <a href="#" class="p4">
              <div class="icon"></div>
              <div class="text">即時圖控</div>
            </a>
          </li>
          <li>
            <a href="#" class="p5">
              <div class="icon"></div>
              <div class="text">警報列表</div>
            </a>
          </li>

          <li>
            <a href="#" class="close_all">
              <div class="icon"></div>
              <div class="text">關 閉</div>
            </a>
          </li>
        </ul>
        <!--        <input id="InfoWin" type="text" value="123">-->
      </div>
      <!--資訊視窗-->
    </div>
  </div>