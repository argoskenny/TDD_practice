<?php
class BoardData
{
    public $boardNo;
    public $boardName;
    public $admins;

    public function __construct($boardNo, $boardName, $admins) {
        $this->boardNo = $boardNo;
        $this->boardName = $boardName;
        $this->admins = $admins;
    }
}

class ArticleData
{
    public $title;
    public $content;
    public $boardNo;
    public $authorNo;

    public function __construct($title, $content, $boardNo, $authorNo) {
        $this->title = $title;
        $this->content = $content;
        $this->boardNo = $boardNo;
        $this->authorNo = $authorNo;
    }
}

class MemberData
{
    public $memberNo;
    public $name;
    public $level;

    public function __construct($memberNo, $name, $level) {
        $this->memberNo = $memberNo;
        $this->name = $name;
        $this->level = $level;
    }
}

class PenaltyData
{
    public $memberNo;
    public $boardNo;
    public $startTime;
    public $endTime;
}
