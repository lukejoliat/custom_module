<?php 
/**
 * @file
 * Contains \Drupal\cc_user\Controller\registerUserController.
 */

namespace Drupal\cc_user\Controller;

use Drupal\cc_user\ccUser;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

//add 'controller' to name of file
//here-docs controller base documentation

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
    
    $result = $user->createUser();
    
    $json['id'] = $user->id->value;
        
    return new JsonResponse($json);
    
  }
}