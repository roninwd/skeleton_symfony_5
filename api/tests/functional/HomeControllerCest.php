<?php namespace App\Tests;

class HomeControllerCest
{

    // tests
    public function testHomePage(FunctionalTester $I)
    {
        $I->sendPOST('/');
        $I->seeResponseCodeIsSuccessful();
    }
}
