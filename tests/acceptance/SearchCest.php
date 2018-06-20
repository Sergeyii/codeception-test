<?php
/*
Я хочу убедиться что поиск работает
Я на странице '/'
Я вижу "Найти"

Я заполняю поле 'input[name=text]' значением 'Codeception'
Я кликаю 'button[type=submit]'

Я вижу в адресе '/search/?text=Codeception'
Я вижу на странице 'Codeception - BDD-style php testing'

------
I want to ensure that search works
I am on page '/'
I see 'Найти'

I am filling field 'input[name=text]' with value 'Codeception'
I am clicking on 'button[type=submit]'

I see in address '/search/?text=Codeception'
I see on page 'Codeception - BDD-style php testing'

*/

class SearchCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function findWordInYandexTest(AcceptanceTester $I)
    {
        $I->wantTo('ensure that search works');
        $I->amOnPage('/');
        $I->see('Найти');

        $I->fillField('input[name=text]', 'Codeception');
        $I->click('button[type=submit]');
        $I->wait(3);
        $I->seeInCurrentUrl('text=Codeception');
        $I->see('Codeception — тестирование по-новому');
    }
}
