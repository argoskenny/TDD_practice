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

    private function checkPenaltyPass() {
        $penalty = $this->db->fetchPenaltyByMemberAndBoard($articleData->authorNo, $articleData->boardNo);
        if ($penalty == NULL) {
            return true;
        }
        if (time() > $penalty->startTime && time() > $penalty->startTime) {
            # code...
        }
    }

    public function execute() {

    }
}
