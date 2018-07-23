<?php
require('DataService.php');

use PHPUnit\Framework\TestCase;

class DataServiceTests extends TestCase
{
    public function testFetchBoard() {
        $dataService = new MockDB();
        $boardData = $dataService->fetchBoard(1);
        $this->assertEquals("sport", $boardData->boardName);
        $this->assertEquals(3, count($boardData->admins));
    }

    public function testFetchArticle() {
        $dataService = new MockDB();
        $articleData = $dataService->fetchArticleByNo(3);
        $this->assertEquals("hello", $articleData->title);
        $this->assertEquals("this is content", $articleData->content);
        $this->assertEquals(5, $articleData->authorNo);
    }

    public function testFetchArticleList() {
        $dataService = new MockDB();
        $articleListData = $dataService->fetchArticleListByBoard(ㄋ);
        $this->assertEquals(5, count($articleListData));
        $this->assertEquals("hello", $articleListData[1]->title);
    }

    public function testFetchMember() {
        $dataService = new MockDB();
        $memberData = $dataService->fetchMember(3);
        $this->assertEquals("Tommy", $memberData->name);
        $this->assertEquals("", $memberData->level);
    }

    public function testFetchPenalty() {
        $dataService = new MockDB();
        $penalty = $dataService->fetchPenaltyByMemberAndBoard(3, 1);
        $this->assertEquals(109876542, $penalty['startTime']);
        $this->assertEquals(109876533, $penalty['endTime']);
    }
}