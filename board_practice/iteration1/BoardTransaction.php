<?php
require('DataService.php');

abstract class BoardTransaction {
    
    protected $db;
    abstract public function execute();

    protected function checkPenaltyPass($authorNo, $boardNo) {
        $penalty = $this->db->fetchPenaltyByMemberAndBoard($articleData->authorNo, $articleData->boardNo);
        if ($penalty == NULL) {
            return true;
        }
        if (time() < $penalty->startTime || time() > $penalty->endTime) {
            return true;
        }
        return false;
    }
}

class PostArticleTransaction extends BoardTransaction
{
    private $articleData;
    protected $db;

    public function __construct($articleData) {
        $this->articleData = $articleData;
        $this->db = new MockDB();
    }

    public function execute() {
        if ($this->checkPenaltyPass($articleData->authorNo, $articleData->boardNo) == true) {
            $this->db->addArticle($this->articleData);
        }
    }
}

class UpdateArticleTransaction extends BoardTransaction
{
    private $articleData;
    protected $db;

    public function __construct($articleData) {
        $this->articleData = $articleData;
        $this->db = new MockDB();
    }

    public function execute() {
        if ($this->checkPenaltyPass($articleData->authorNo, $articleData->boardNo) == true) {
            $this->db->updateArticle($this->articleData);
        }
    }
}

class DeleteArticleTransaction extends BoardTransaction
{
    private $articleData;
    protected $db;

    public function __construct($articleData) {
        $this->articleData = $articleData;
        $this->db = new MockDB();
    }

    public function execute() {
        if ($this->checkPenaltyPass($articleData->authorNo, $articleData->boardNo) == true) {
            $this->db->deleteArticle($this->articleData);
        }
    }
}

class AddPenaltyTransaction extends BoardTransaction
{
    private $penaltyData;
    protected $db;

    public function __construct($penaltyData) {
        $this->penaltyData = $penaltyData;
        $this->db = new MockDB();
    }

    public function execute() {
        $this->db->addPenalty($this->penaltyData);
    }
}
