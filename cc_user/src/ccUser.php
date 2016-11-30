<?php 
/**
 * @file
 * Contains \Drupal\cc_user.
 */

namespace Drupal\cc_user;

use Drupal\user\Entity\User;

class ccUser {
  
  public $username;
  public $password;
  public $email;
  public $phone;
  
  public function createUser () {
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $user = User::create();
    // Mandatory.
    $pass = strtolower($this->password);
    $user->setPassword($pass);
    $user->enforceIsNew();
    $user->setEmail($this->email);
    $user->setUsername($this->name);
    $user->field_contact_number->value = $this->phone;
    $user->activate();
    
    $result = $user->save();
    user_login_finalize($user);
        
    return $result;
    
  }
  
}