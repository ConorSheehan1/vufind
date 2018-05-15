<?php

/**
 * Mink record actions test class.
 *
 * PHP version 7
 *
 * Copyright (C) Villanova University 2011.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category VuFind
 * @package  Tests
 * @author   Conor Sheehan <csheehan@nli.ie>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://vufind.org Main Page
 */

namespace VuFindTest\Mink;

class NliNextPrevSearchBug extends \VuFindTest\Unit\NliMinkTestCase
{

    public function testNextPrevSearchBugDoesNotOccur()
    {
        // TODO ensure next prev navigation is set for this test
        // $this->enableNextPrevNavigation();

        // when a search returns no results
        // make sure no errors occur when visiting a collection record after
        $session = $this->getMinkSession();
        $session->visit($this->getVuFindUrl() . "/Search/Results?lookfor=__ReturnNoResults__&type=AllField");
        $this->assertEquals($this->findCss($session->getPage(), ".search-stats > h2")->getText(), "No Results Found");

        // collection should render as normal
        $session = $this->visitCollection($this->getNliTestDataUrl("the_james_joyce_collection"));
        $this->assertContains('The James Joyce', $this->findCss($session->getPage(), "#collection-title")->getText());

        // $this->disableNextPrevNavigation();
    }

    public function testNextPrevWorksOnCollections()
    {
        // run a blank search and click on the first collection
        $session = $this->getMinkSession();
        $session->visit($this->getVuFindUrl() . "/Search/Results?lookfor=&type=AllFields&limit=20&sort=relevance");
        // $collectionLink = $this->findXpath($this->findCss($session->getPage(), ".result-body"), "//div//text()[contains(., '1897 Royal Visit Album')]");

        $session = $this->visitCollection($this->getNliTestDataUrl("the_james_joyce_collection"));
        $pagerText = $this->findCss($session->getPage(), ".pager")->getText();
        $pageControls = ["First", "Previous", "Next", "Last"];
        foreach ($pageControls as $controlText) {
            $this->assertContains($controlText, $pagerText);
        }
    }
   
}
