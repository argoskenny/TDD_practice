<?php
require('BoardTransaction.php');

use PHPUnit\Framework\TestCase;

class TransactionTests extends TestCase
{
    protected $db;

    protected function setUp() {
        $this->db = new MockDB();
    }

    public function testPostArticle() {
        $articleData = new ArticleData("測試文章", "這是測試文章", 1, 3);
        $postTransaction = new PostArticleTransaction($articleData);
        $postTransaction->execute();
        
        $result = $this->db->fetchNewestArticleByMemberNo(3);
        $this->assertEquals("測試文章", $result->title);
    }

    public function testUpdateArticle() {
        $articleData = new ArticleData("測試文章", "這是測試文章", 1, 3);
        $postTransaction = new PostArticleTransaction($articleData);
        $postTransaction->execute();
        $result = $this->db->fetchNewestArticleByMemberNo(3);
        $this->assertEquals("測試文章", $result->title);

        $updateArticleData = new ArticleData("測試文章 update", "這是測試文章 update", 1, 3);
        $updateTransaction = new UpdateArticleTransaction($updateArticleData);
        $updateTransaction->execute();
        $result = $this->db->fetchNewestArticleByMemberNo(3);
        $this->assertEquals("測試文章 update", $result->title);
    }

    public function testDeleteArticle() {
        $articleData = new ArticleData("測試文章", "這是測試文章", 1, 3);
        $postTransaction = new PostArticleTransaction($articleData);
        $postTransaction->execute();
        $result = $this->db->fetchNewestArticleByMemberNo(3);
        $this->assertEquals("測試文章", $result->title);

        $deleteArticleData = new ArticleData("測試文章", "這是測試文章", 1, 3);
        $deleteArticleData->no = $result->no;
        $deleteTransaction = new DeleteArticleTransaction($deleteArticleData);
        $deleteTransaction->execute();
        $result = $this->db->fetchArticleByNo($deleteArticleData->no);
        $this->assertEquals(NULL, $result);
    }

    public function testAddPenalty() {
        $penalityData = new PenaltyData(3, 1, 1532850886, 1532850900);
        $addPenalityTransaction = new AddPenaltyTransaction($penalityData);
        $addPenalityTransaction->execute();

        $penalty = $this->db->fetchPenaltyByMemberAndBoard(3, 1);
        $this->assertEquals(1532850886, $penalty->startTime);
        $this->assertEquals(1532850900, $penalty->endTime);
    }
    
}