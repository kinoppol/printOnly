<!DOCTYPE html>
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
  </head>
  <body>
    <div class="container">
      <ul class="nav nav-tabs" id="navigation">
        <li>
          <a href="./upload#">Upload</a>
        </li>
        <li class="active">
          <a href="../view.php?u=<?php print $_GET['u']; ?>#">viewer</a>
        </li>
      </ul>

    <!--
      Place the following <div> element where you want the PDF to be displayed in your website. You can change the size using the width and height attributes.
    -->
    <div>
      <object
        data='<?php print $_GET['u']; ?>'
        type="application/pdf"
        width="500"
        height="678"
      >

        <iframe
          src='<?php print $_GET['u']; ?>'
          width="500"
          height="678"
        >
        <p>This browser does not support PDF!</p>
        </iframe>
      </object>
    </div>

  </body>
</html>
