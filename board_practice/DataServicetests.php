<?php
require('DataService.php');

use PHPUnit\Framework\TestCase;

class DataServiceTests extends TestCase
{
    protected $db;

    protected function setUp() {
        $this->db = new MockDB();
    }

    public function testFetchBoard() {
        $boardData = $this->db->fetchBoard(1);
        $this->assertEquals("sport", $boardData->boardName);
        $this->assertEquals(3, count($boardData->admins));
    }

    public function testFetchArticle() {
        $dataService = new MockDB();
        $articleData = $this->db->fetchArticleByNo(3);
        $this->assertEquals("hello", $articleData->title);
        $this->assertEquals("this is content", $articleData->content);
        $this->assertEquals(5, $articleData->authorNo);
    }

    public function testFetchArticleList() {
        $articleListData = $this->db->fetchArticleListByBoard(1);
        $this->assertEquals(5, count($articleListData));
        $this->assertEquals("hello", $articleListData[0]->title);
    }

    public function testFetchMember() {
        $memberData = $this->db->fetchMember(3);
        $this->assertEquals("Tommy", $memberData->name);
        $this->assertEquals("", $memberData->level);
    }

    public function testFetchPenalty() {
        $penalty = $this->db->fetchPenaltyByMemberAndBoard(3, 1);
        $this->assertEquals(109876542, $penalty->startTime);
        $this->assertEquals(109876533, $penalty->endTime);
    }

    
}