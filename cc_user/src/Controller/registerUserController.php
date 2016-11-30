<?php 
/**
 * @file
 * Contains \Drupal\cc_user\Controller\registerUserController.
 */

namespace Drupal\cc_user\Controller;

use Drupal\cc_user\ccUser;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

class registerUserController extends ControllerBase {
  
  public function register () {
    
    $json = array();
    
    $json['username'] = $_POST['username'];
    $json['password'] = $_POST['password'];
    $json['email'] = $_POST['email'];
    $json['phone'] = $_POST['phone'];
    
    $user = new ccUser();
    $user->name = $json['username'];
    $user->email = $json['email'];
    $user->password = $json['password'];
    $user->phone = $json['phone'];
    
    $users = user_load_multiple($uids = NULL, $reset = FALSE);
    $usernames = array();
    foreach ($users as $key => $value) {
      $usernames[] = $value->getUserName();
    }
    
    $json['usernames'] = $usernames;
    
    if (in_array($user->name, $usernames)) {
      $error = "Please try a different user name.";
      return new JsonResponse($error);
    } else {
      $result = $user->createUser();
      return new JsonResponse($json);

    }   
    
  }
}