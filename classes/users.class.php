<?php

class users extends mysqlconn
{
    protected $title, $links, $live;
    public function  addNewUser($email, $password, $sexe, $nom, $prenom)
    {

        $this->email = $this->esc($this->html($email));
        $this->password = $this->html($this->esc($password));
        $this->sexe = $this->html($this->esc($sexe));
        $this->nom = $this->html($this->esc($nom));
        $this->prenom = $this->html($this->esc($prenom));
        $this->time = time();
        $this->date = date("d.m.Y");


        if (empty($this->email)) {
            messages::setMsg('error!!', 'email est vide', 'danger');
            echo messages::getMsg();
        } elseif (empty($this->password)) {
            messages::setMsg('error!!', ' mot de passe est vide', 'danger');
            echo messages::getMsg();
        } elseif (empty($this->sexe)) {
            messages::setMsg('error!!', 'sexe est vide', 'danger');
            echo messages::getMsg();
        } elseif (empty($this->nom)) {
            messages::setMsg('error!!', ' nom est vide', 'danger');
            echo messages::getMsg();
        } elseif (empty($this->prenom)) {
            messages::setMsg('error!!', ' prenom est vide', 'danger');
            echo messages::getMsg();
        } else {
            if ($this->checkUser()) {


                $this->insert('users', "`nom`, `prenom`, `email`, `password`, `date_insr`, `enfent`, `status`, `lastpay`, `isAdmin`, `profile`, `sexe`,`allpay`", "'$this->nom','$this->prenom','$this->email','$this->password','$this->date','0',0,0,0,'default.png','$this->sexe',0");
                if ($this->execute()) {

                    messages::setMsg('à succès', 'votre employé ajoute succès ', 'success animate bonceIn');
                    echo messages::getMsg();
                } else {

                    messages::setMsg('desole!!', 'ajoute  n est pas succès ', 'warning animate wobble');
                    echo messages::getMsg();
                }
            } else {
                messages::setMsg('desole!!', 'email deja ajoutes une autre  employé', 'warning animate wobble');
                echo messages::getMsg();
            }
        }
    }
    private function checkUser()
    {
        $this->query('email', 'users', "WHERE `email` = '$this->email'");
        $this->execute();
        if ($this->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function addEnf($nom,$prenom ,$age,$datees,$user){
        $this->nom = $this->html($this->esc($nom));
        $this->prenom = $this->html($this->esc($prenom));
        $this->age = $this->html($this->esc($age));
        $this->time = time();
        $this->user = $user;
        $this->date = date("d.m.Y");
        $this->datees =  $this->html($this->esc($datees));


        if (empty($this->datees)) {
            messages::setMsg('error!!', 'date est vide', 'danger');
            echo messages::getMsg();
        }elseif  (empty($this->nom)) {
            messages::setMsg('error!!', 'nom est vide', 'danger');
            echo messages::getMsg();
        }elseif (empty($this->prenom)) {
            messages::setMsg('error!!', 'prenom est vide', 'danger');
            echo messages::getMsg();
        }
        elseif (empty($this->age)) {
            messages::setMsg('error!!', 'prenom est vide', 'danger');
            echo messages::getMsg();
        }else{
            if($this->nomPren()){
            $this->insert('enfent', " `prenom`, `nom`, `age`, `date_nes`, `userId`, `status`, `dateajoute`", "'$this->nom','$this->prenom','$this->age','$this->datees','$this->user',0,'$this->date'");
                if ($this->execute()) {

                    messages::setMsg('à succès', 'votre enfent ajoute succès attente de accepte admin ', 'success animate bonceIn');
                    echo messages::getMsg();
                } else {

                    messages::setMsg('desole!!', 'ajoute  n est pas succès ', 'warning animate wobble');
                    echo messages::getMsg();
                } 
            }else{
                messages::setMsg('desole!!', 'nom ou prenom deja  ajoute', 'warning animate wobble');
                echo messages::getMsg();
            }
        }
    }
    private function nomPren()
    {
        $this->query('nom,prenom', 'enfent', "WHERE `nom` = '$this->nom' || `nom` = '$this->prenom' ");
        $this->execute();
        if ($this->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }
    public function showpost($other = null)
    {
        $this->query('*', 'users', $other);
        $this->execute();
        while ($row = $this->fetch()) {
            $rows[] = $row;
        }
        if (empty($rows))
            return NULL;
        return $rows;
    }



    public function enfent($other = null)
    {
        $this->query('*', 'enfent', $other);
        $this->execute();
        while ($row = $this->fetch()) {
            $rows[] = $row;
        }
        if (empty($rows))
            return NULL;
        return $rows;
    }

    public function getUser($id)
    {
        $id = $id;
        $this->query('id_post', 'users', "WHERE `id_users` = '{$id}'");
        if ($this->execute() and $this->rowCount() > 0) {
            $id = $this->fetch();

            return $id['id_users'];
        } else {

            include('404.php');
            die();
        }
    }



    public function time($time)
    {
        $val = $time;
        $time = time();




        $timeall = $time - $val;
        if ($timeall < 60) {
            echo "قبل قليل";
        } else if ($timeall > 60 and $timeall < 3600) {
            $timed = $timeall / 60;
            $timed = floor($timed);
            echo '' . $timed . ' دقيقة';
        } else if ($timeall > 3600 and $timeall < 86400) {
            $timed = $timeall / 3600;
            $timed = floor($timed);
            echo '' . $timed . 'ساعة';
        } else if ($timeall > 86400 and $timeall < 604800) {
            $timed = $timeall / 86400;
            $timed = floor($timed);
            echo '' . $timed . ' يوم';
        } else if ($timeall > 604800 and $timeall < 18144000) {
            $timed = $timeall / 604800;
            $timed = floor($timed);
            echo '' . $timed . ' اسبوع';
        } else {
            echo 'غير محدد';
        }
    }

    public function times($time)
    {
        $val = $time;
        $time = time();

        $timeall = $time - $val;
        if ($timeall < 60) {
            echo "قبل قليل";
        } else if ($timeall > 60 and $timeall < 3600) {
            $timed = $timeall / 60;
            $timed = floor($timed);
            $success['success'] = 'منذ  ' . $timed . ' دقيقة';
        } else if ($timeall > 3600 and $timeall < 86400) {
            $timed = $timeall / 3600;
            $timed = floor($timed);
            $success['success'] = 'منذ ' . $timed . ' ساعة';
        } else if ($timeall > 86400 and $timeall < 604800) {
            $timed = $timeall / 86400;
            $timed = floor($timed);
            $success['success'] = 'منذ ' . $timed . ' يوم';
        } else if ($timeall > 604800 and $timeall < 18144000) {
            $timed = $timeall / 604800;
            $timed = floor($timed);
            $success['success'] = 'منذ ' . $timed . ' اسبوع';
        } else {
            $success['success'] =  'null';
        }

        echo json_encode($success);
    }
}