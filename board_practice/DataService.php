<?php
require('DataObjects.php');

interface DataService {
    public function fetchBoard($boardNo);
    public function fetchArticleByNo($articleNo);
    public function fetchArticleListByBoard($boardNo);
    public function fetchMember($memberNo);
    public function fetchPenaltyByMemberAndBoard($memberNo, $boardNo);
}

class MockDB implements DataService
{
    public function fetchBoard($boardNo) {
        $result = array(1 => new BoardData(1, "sport" ,[0,1,2]),
                        2 => new BoardData(2, "news" ,[2,5,8]),
                        3 => new BoardData(3, "game" ,[1,2,4])
                    );
        return $result[$boardNo];
    }

    public function fetchArticleByNo($articleNo) {
        $result = array(1 => new ArticleData(1, "ABC" , "test content", 0, 0),
                        2 => new ArticleData(2, "ABC" , "test content", 0, 1),
                        3 => new ArticleData(3, "hello" , "this is content", 0, 5)
                    );
        return $result[$articleNo];
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
        $penalityData->startTime = 109876542;
        $penalityData->endTime = 109876533;
        return $penalityData;
    }
}
