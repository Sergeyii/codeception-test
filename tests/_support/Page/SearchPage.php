<?php
namespace Page;

use Codeception\Actor;

class SearchPage
{
    // include url of current page
    public static $URL = '';
    /* @var Actor */
    private $I;

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    public function __construct(Actor $I)
    {
        $this->I = $I;
    }

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }

    public function search()
    {
        $this->I->amOnPage('/');
        $this->I->see('Найти');

        $this->I->fillField('input[name=text]', 'Codeception');
        $this->I->click('button[type=submit]');
        $this->I->wait(3);
        $this->I->seeInCurrentUrl('text=Codeception');
        $this->I->see('Codeception — тестирование по-новому');
    }
}
