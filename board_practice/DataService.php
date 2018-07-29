<?php
require('DataObjects.php');

interface DataService {
    public function fetchBoard($boardNo);
    public function fetchArticleByNo($articleNo);
    public function fetchArticleListByBoard($boardNo);
    public function addArticle($article);
    public function updateArticle($article);
    public function fetchMember($memberNo);
    public function fetchPenaltyByMemberAndBoard($memberNo, $boardNo);
}

class MockDB implements DataService
{
    static $articles = array();

    public function fetchBoard($boardNo) {
        $result = array(1 => new BoardData(1, "sport" ,[0,1,2]),
                        2 => new BoardData(2, "news" ,[2,5,8]),
                        3 => new BoardData(3, "game" ,[1,2,4])
                    );
        return $result[$boardNo];
    }

    public function fetchArticleByNo($articleNo) {
        return self::$articles[$articleNo];
    }

    public function fetchNewestArticleByMemberNo($memberNo) {
        $result = array();
        foreach (self::$articles as $key => $value) {
            if ($value->authorNo == $memberNo) {
                $result[] = $value;
            }
        }
        return $result[count($result) - 1];
    }

    public function addArticle($article) {
        $newArticle = new ArticleData($article->title, $article->content, $article->boardNo, $article->authorNo);
        $newArticle->no = count(self::$articles) + 1;
        self::$articles[$newArticle->no] = $newArticle;
    }

    public function updateArticle($article) {
        self::$articles[$article->no] = $article;
    }

    public function fetchArticleListByBoard($boardNo) {
        $result = array();
        $result[1] = array(new ArticleData("hello" , "test1 content", 0, 5),
                            new ArticleData("ABC" , "test2 content", 0, 7),
                            new ArticleData("ABC" , "test3 content", 0, 2),
                            new ArticleData("ABC" , "test4 content", 0, 1),
                            new ArticleData("ABV" , "test content", 0, 5)
                        );
        return $result[$boardNo];
    }

    public function fetchMember($memberNo) {
        $result = array();
        $result[1] = new MemberData(1, "Amy" , "");
        $result[2] = new MemberData(2, "Jack" , "");
        $result[3] = new MemberData(3, "Tommy" , "");
        return $result[$memberNo];
    }

    public function fetchPenaltyByMemberAndBoard($memberNo, $boardNo) {
        $penalityData = new PenaltyData();
        $penalityData->memberNo = 3;
        $penalityData->boardNo = 1;
        $penalityData->startTime = 1532850886;
        $penalityData->endTime = 1532850900;
        return $penalityData;
    }
}
