<?php
require('DataService.php');

interface BoardTransaction {
    public function execute();
}

class PostArticleTransaction implements BoardTransaction
{
    private $articleData;
    private $db;

    public function __construct($articleData) {
        $this->articleData = $articleData;
        $this->db = new MockDB();
    }

    public function execute() {
        if ($this->checkPenaltyPass() == true) {
            $this->db->addArticle($this->articleData);
        }
    }

    private function checkPenaltyPass() {
        $penalty = $this->db->fetchPenaltyByMemberAndBoard($articleData->authorNo, $articleData->boardNo);
        if ($penalty == NULL) {
            return true;
        }
        if (time() < $penalty->startTime || time() > $penalty->endTime) {
            return true;
        }
        return false;;
    }
}

class UpdateArticleTransaction implements BoardTransaction
{
    private $articleData;
    private $db;

    public function __construct($articleData) {
        $this->articleData = $articleData;
        $this->db = new MockDB();
    }

    public function execute() {
        if ($this->checkPenaltyPass() == true) {
            $this->db->updateArticle($this->articleData);
        }
    }

    private function checkPenaltyPass() {
        $penalty = $this->db->fetchPenaltyByMemberAndBoard($articleData->authorNo, $articleData->boardNo);
        if ($penalty == NULL) {
            return true;
        }
        if (time() < $penalty->startTime || time() > $penalty->endTime) {
            return true;
        }
        return false;;
    }
}
