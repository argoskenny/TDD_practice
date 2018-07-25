<?php
require('BoardTransaction.php');

use PHPUnit\Framework\TestCase;

class TransactionTests extends TestCase
{
    protected function setUp() {

    }

    public function testFetchBoard() {
        $postTransaction = new PostArticleTransaction($articleData);
        $postTransaction->execute();
        $this->assertEquals("sport", $boardData->boardName);
        $this->assertEquals(3, count($boardData->admins));
    }
    
}