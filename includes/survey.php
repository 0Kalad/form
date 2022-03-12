<?php

include_once 'db.php';

class Survey extends DB
{
    private $totalVotes;
    private $optionSelected;

    function setOptionSelected($option)
    {
        $this->optionSelected = $option;
    }

    function getOptionSelected()
    {
        return $this->optionSelected;
    }

    function vote()
    {
        $query = $this->connect()->prepare('UPDATE foods SET votes = votes + 1 WHERE food = :food');
        $query->bindValue(':food', $this->optionSelected);
        $query->execute();
    }
    
    function showResults()
    {
        return $this->connect()->query('SELECT * FROM foods');
    }

    function showTotalVotes()
    {
        $query = $this->connect()->query('SELECT SUM(votes) as total_votes FROM foods');
        $this->totalVotes = $query->fetch(PDO::FETCH_OBJ)->total_votes ;
        return $this->totalVotes;
    }

    function getPorcentages($votes)
    {
        return round(($votes / $this->totalVotes) * 100);
    }
}