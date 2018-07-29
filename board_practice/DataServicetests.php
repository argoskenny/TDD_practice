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

    public function testFetchMemberNewestArticle() {
        $article1 = new ArticleData("hello1" , "test1 content", 1, 3);
        $this->db->addArticle($article1);
        $article2 = new ArticleData("hello2" , "test2 content", 1, 3);
        $this->db->addArticle($article2);
        $article3 = new ArticleData("hello3" , "test3 content", 1, 3);
        $this->db->addArticle($article3);

        $articleData = $this->db->fetchNewestArticleByMemberNo(3);
        $this->assertEquals("hello3", $articleData->title);
        $this->assertEquals("test3 content", $articleData->content);
        $this->assertEquals(3, $articleData->authorNo);
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
        $this->assertEquals(1532850886, $penalty->startTime);
        $this->assertEquals(1532850900, $penalty->endTime);
    }

    
}