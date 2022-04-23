<?php
class User
{
    private $nom;
    private $pseudo;
    public function getnom ()
    {
        $this->nom ="lala";
        echo("sorty");
        return $this-> nom;
    }
    public function setnom ()
    {
        $this->nom ="azfef";
        echo("sorty");
    }
    public function envoyerEMail($titre, $message)
    {
        mail($this->email, $titre, $message);
    }
    public function maille()
    {
        $this->actif = false;
        $this->envoyerEMail('Vous avez été banni', 'Ne revenez plus');

    }
    public function getPseudo()
    {
    return $this->pseudo;
    }
}
?>