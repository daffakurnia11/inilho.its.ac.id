<?php

function is_logged_in()
{
  $systemObject = get_instance();
  if (!$systemObject->session->userdata('username')) {
    redirect('auth');
  }
}
