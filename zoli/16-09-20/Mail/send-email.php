<?php

  //sending mail from phh, but you need to have an smtp server, so
  //usually you have to upload it on your domain server to make it work
  if ( mail("fraknoiz@gmail.com", "test", "test2") ) {
    echo "email sent";
  } else {
    echo "email not sent";
  }

 ?>
