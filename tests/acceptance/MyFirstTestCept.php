<?php
$i = new AcceptanceTester($scenario);
$i->wantTo('open the root books app webpage');
$i->amOnPage('book');
$i->see('Index page');
