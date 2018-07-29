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

    // public function testUpdateArticle() {
    //     $postTransaction = new PostArticleTransaction($articleData);
    //     $postTransaction->execute();
    //     $this->assertEquals("sport", $boardData->boardName);
    //     $this->assertEquals(3, count($boardData->admins));
    // }
    
}