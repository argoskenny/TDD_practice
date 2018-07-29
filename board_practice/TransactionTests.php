<?php
require('BoardTransaction.php');

use PHPUnit\Framework\TestCase;

class TransactionTests extends TestCase
{
    protected function setUp() {

    }

    public function testPostArticle() {
        $articleData = ArticleData("測試文章", "這是測試文章", 1, 3);
        $postTransaction = new PostArticleTransaction($articleData);
        $postTransaction->execute();
        $this->assertEquals("sport", $boardData->boardName);
        $this->assertEquals(3, count($boardData->admins));
    }

    public function testUpdateArticle() {
        $postTransaction = new PostArticleTransaction($articleData);
        $postTransaction->execute();
        $this->assertEquals("sport", $boardData->boardName);
        $this->assertEquals(3, count($boardData->admins));
    }
    
}