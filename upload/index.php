<!DOCTYPE html>
<?php
if(!empty($_GET['hidebutton'])){
  if($_GET['hidebutton']=='yes'){
    setcookie("hidebutton", "yes", time()+(3600*24*365),"/");
  }else if($_GET['hidebutton']=='no'){
    setcookie("hidebutton", "no", time()+(3600*24*365),"/");
  }
}
?>
<!--
/*
 * jQuery File Upload Demo
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */
-->
<html lang="en">
  <head>
    <!-- Force latest IE rendering engine or ChromeFrame if installed -->
    <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <![endif]-->
    <meta charset="utf-8" />
    <title>อัพโหลดไฟล์</title>
    <meta
      name="description"
      content="File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads and client-side image resizing. Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads."
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap styles -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous"
    />
    <!-- Generic page styles -->
    <style>
      #navigation {
        margin: 10px 0;
      }
      @media (max-width: 767px) {
        #title,
        #description {
          display: none;
        }
      }
    </style>
    <!-- blueimp Gallery styles -->
    <link
      rel="stylesheet"
      href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css"
    />
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="css/jquery.fileupload.css" />
    <link rel="stylesheet" href="css/jquery.fileupload-ui.css" />
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript
      ><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"
    /></noscript>
    <noscript
      ><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"
    /></noscript>
    <link rel="stylesheet" href="../style.css"
    />
  </head>
  <body class="mydiv">
    <div class="container" style="background-color:white;">
      <ul class="nav nav-tabs" id="navigation">
        <!--
        <li>
          <a href="https://github.com/blueimp/jQuery-File-Upload">Project</a>
        </li>
        -->
        <li class="active">
          <a href="#">Upload</a>
        </li>
        <!--
        <li>
          <a href="https://github.com/blueimp/jQuery-File-Upload/wiki">Wiki</a>
        </li>
        <li>
          <a href="https://blueimp.net">Author</a>
        </li>
      -->
      </ul>
      <h1 id="title">อัพโหลดไฟล์เข้าระบบพิมพ์เอกสาร printonly.bncc.ac.th</h1>
      <blockquote id="description">
        <p>
          ไฟล์ที่จะพิมพ์จะต้องเป็นไฟล์ PDF เท่านั้น คลิกที่ชื่อไฟล์เอกสารด้านล่างเพื่อดำเนินการพิมพ์ <br>สแกน QR-Code เพื่อนำเข้าไฟล์จากโทรศัพท์จากนั้นกดปุ่ม <strong>รีเฟรช</strong> <br><span class="btn btn-primary fileinput-button" onclick="location.reload();">
            <i class="glyphicon glyphicon-refresh"></i>
            <span>รีเฟรช</span>
          </span>
            <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=https://printonly.bncc.ac.th&choe=UTF-8">
          
        </p>
      </blockquote>
      <!-- The file upload form used as target for the file upload widget -->
      <form
        id="fileupload"
        action="https://jquery-file-upload.appspot.com/"
        method="POST"
        enctype="multipart/form-data"
      >
        <!-- Redirect browsers with JavaScript disabled to the origin page -->
        <noscript
          ><input
            type="hidden"
            name="redirect"
            value="https://blueimp.github.io/jQuery-File-Upload/"
        /></noscript>
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
       
        <div class="row fileupload-buttonbar">
        
          <div class="col-lg-7">
          <?php
        if(!empty($_COOKIE['hidebutton'])&&$_COOKIE['hidebutton']=="yes"){

        }else{
        ?>
            <!-- The fileinput-button span is used to style the file input field as button -->
            <span class="btn btn-success fileinput-button">
              <i class="glyphicon glyphicon-plus"></i>
              <span>เพิ่มไฟล์...</span>
              <input type="file" name="files[]" multiple />
            </span>
            <button type="submit" class="btn btn-primary start">
              <i class="glyphicon glyphicon-upload"></i>
              <span>อัพโหลดไฟล์</span>
            </button>
            <button type="reset" class="btn btn-warning cancel">
              <i class="glyphicon glyphicon-ban-circle"></i>
              <span>ยกเลิกการอัพโหลด</span>
            </button>
            <button type="button" class="btn btn-danger delete">
              <i class="glyphicon glyphicon-trash"></i>
              <span>ลบไฟล์ที่เลือก</span>
            </button>
            เลือกทุกไฟล์
            <input type="checkbox" class="toggle" />
            
            <?php
        }
            ?>
            <!-- The global file processing state -->
            <span class="fileupload-process"></span>
          </div>
          <!-- The global progress state -->
          <div class="col-lg-5 fileupload-progress fade">
            <!-- The global progress bar -->
            <div
              class="progress progress-striped active"
              role="progressbar"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              <div
                class="progress-bar progress-bar-success"
                style="width: 0%;"
              ></div>
            </div>
            <!-- The extended global progress state -->
            <div class="progress-extended">&nbsp;</div>
          </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped">
          <tbody class="files"></tbody>
        </table>
      </form>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">หมายเหตุ</h3>
        </div>
        <div class="panel-body">
          <ul>
            <li>
              ขนาดไฟล์ใหญ่สุดไม่เกิน
              <strong>100 MB</strong>
            </li>
            <li>
              อนุญาตให้อัพโหลดไฟล์ <strong>PDF</strong> เท่านั้น
            </li>
            <li>
              ไฟล์จะถูกเก็บไว้ในระบบไม่เกิน
              <strong>30 นาที</strong>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- The blueimp Gallery widget -->
    <div
      id="blueimp-gallery"
      class="blueimp-gallery blueimp-gallery-controls"
      aria-label="image gallery"
      aria-modal="true"
      role="dialog"
      data-filter=":even"
    >
      <div class="slides" aria-live="polite"></div>
      <h3 class="title"></h3>
      <a
        class="prev"
        aria-controls="blueimp-gallery"
        aria-label="previous slide"
        aria-keyshortcuts="ArrowLeft"
      ></a>
      <a
        class="next"
        aria-controls="blueimp-gallery"
        aria-label="next slide"
        aria-keyshortcuts="ArrowRight"
      ></a>
      <a
        class="close"
        aria-controls="blueimp-gallery"
        aria-label="close"
        aria-keyshortcuts="Escape"
      ></a>
      <a
        class="play-pause"
        aria-controls="blueimp-gallery"
        aria-label="play slideshow"
        aria-keyshortcuts="Space"
        aria-pressed="false"
        role="button"
      ></a>
      <ol class="indicator"></ol>
    </div>
    
    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-upload fade{%=o.options.loadImageFileTypes.test(file.type)?' image':''%}">
              <td>
                  <span class="preview"></span>
              </td>
              <td>
                  <p class="name">{%=file.name%}</p>
                  <strong class="error text-danger"></strong>
              </td>
              <td>
                  <p class="size">Processing...</p>
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
              </td>
              <td>
                  {% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
                    <button class="btn btn-success edit" data-index="{%=i%}" disabled>
                        <i class="glyphicon glyphicon-edit"></i>
                        <span>แก้ไข</span>
                    </button>
                  {% } %}
                  {% if (!i && !o.options.autoUpload) { %}
                      <button class="btn btn-primary start" disabled>
                          <i class="glyphicon glyphicon-upload"></i>
                          <span>อัพโหลด</span>
                      </button>
                  {% } %}
                  {% if (!i) { %}
                      <button class="btn btn-warning cancel">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>ยกเลิก</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-download fade{%=file.thumbnailUrl?' image':''%}">
              <td>
                  <span class="preview">
                      {% if (file.thumbnailUrl) { %}
                          <a href="{%=file.url%}" title="{%=file.name%}" target="_blank" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                      {% } %}
                  </span>
              </td>
              <td>
                  <p class="name">
                      {% if (file.url) { %}
                          <a href="../view.php?u={%=file.url%}" title="{%=file.name%}" data-target="#modal_print" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                      {% } else { %}
                          <span>{%=file.name%}</span>
                      {% } %}
                  </p>
                  {% if (file.error) { %}
                      <div><span class="label label-danger">ผิดพลาด</span> {%=file.error%}</div>
                  {% } %}
              </td>
              <td>
                  <span class="size">{%=o.formatFileSize(file.size)%}</span>
              </td>
              <td>
                  {% if (file.deleteUrl) { %}
                      <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                          <i class="glyphicon glyphicon-trash"></i>
                          <span>ลบ</span>
                      </button>
                      <input type="checkbox" name="delete" value="1" class="toggle">
                  {% } else { %}
                      <button class="btn btn-warning cancel">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
    </script>
    <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"
      integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
      crossorigin="anonymous"
    ></script>
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="js/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- blueimp Gallery script -->
    <script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="js/jquery.fileupload-image.js"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="js/jquery.fileupload-audio.js"></script>
    <!-- The File Upload video preview plugin -->
    <script src="js/jquery.fileupload-video.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="js/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="js/jquery.fileupload-ui.js"></script>
    <!-- The main application script -->
    <script src="js/demo.js"></script>
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <!--[if (gte IE 8)&(lt IE 10)]>
      <script src="js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->
   
    <script>
      $( document ).ready(function() {
    //$("#modal_print").modal();
/*
$("#modal_print").on("show.bs.modal", function(e) {
var link = $(e.relatedTarget);
$(this).find(".modal-body").html("<i class=\"fa fa-refresh fa-spin\"></i> กำลังโหลดโปรดรอสักครู่");
$(this).find(".modal-body").load(link.attr("href"));
});*/
});
<?php
        if(!empty($_COOKIE['hidebutton'])&&$_COOKIE['hidebutton']=="yes"){

        ?>
function reloadList(){
  //$('#fileupload').empty();
  $("tr"). remove();
  //$('#fileupload').addClass('fileupload-processing');
    $.ajax({
      // Uncomment the following to send cross-domain cookies:
      //xhrFields: {withCredentials: true},
      url: $('#fileupload').fileupload('option', 'url'),
      dataType: 'json',
      context: $('#fileupload')[0]
    })
      .always(function () {
        //$(this).removeClass('fileupload-processing');
      })
      .done(function (result) {
        $(this)
          .fileupload('option', 'done')
          // eslint-disable-next-line new-cap
          .call(this, $.Event('done'), { result: result });
      });
}

setInterval(reloadList, 5000);
<?php
        }
        ?>
      </script>
  </body>
</html>
