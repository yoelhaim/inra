<?php

class login extends mysqlconn
{
  private $email, $password;

  public function setInput($email, $password)
  {
    $this->email = $this->esc($this->html($email));
    $this->password = $this->esc($this->html($password));

    if (empty($this->email)) {
      messages::setMsg('error ', 'l email est vide', 'danger');
      echo messages::getMsg();
    } else if (empty($this->password)) {
      messages::setMsg('error ', 'mot de passe est vide', 'danger');
      echo messages::getMsg();
    } else {

      if ($this->checkUser()) {
        $this->query('*', 'users', "WHERE `email` = '$this->email' AND `password` = '$this->password'");
        $this->execute();
        // $user = $this->fetch();
        while ($row = $this->fetch()) {
          $_SESSION['is_logged'] = true;
          $_SESSION['id_users'] = $row['id_users'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['password'] = $row['password'];
          $_SESSION['nom'] = $row['nom'];
          $_SESSION['prenom'] = $row['prenom'];
          $_SESSION['isAdmin'] = $row['isAdmin'];
          if ($row['isAdmin'] != 1) {
            echo "<script type='text/javascript'>window.location.href = 'ajoute'</script>";
          } else {
            echo "<script type='text/javascript'>window.location.href = 'home'</script>";
          }
        }
      } else {
        messages::setMsg('error ', ' connect', 'warning');
        echo messages::getMsg();
      }
    }
  }

  private function checkUser()
  {
    $this->query('*', 'users', "WHERE `email` = '$this->email' AND `password` = '$this->password'");
    $this->execute();
    if ($this->rowCount() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
}