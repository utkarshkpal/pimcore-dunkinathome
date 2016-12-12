<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) 2009-2016 pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

use Pimcore\Db;
use Pimcore\Log;
use Pimcore\Log\Writer;
use Pimcore\Log\Handler\ApplicationLoggerDb;

class Admin_LogController extends \Pimcore\Controller\Action\Admin
{
    public function init()
    {
        parent::init();
    }

    public function showAction()
    {
        $offset = $this->getParam("start");
        $limit = $this->getParam("limit");

        $orderby = "ORDER BY id DESC";
        $sortingSettings = \Pimcore\Admin\Helper\QueryParams::extractSortingSettings($this->getAllParams());
        if ($sortingSettings['orderKey']) {
            $orderby = "ORDER BY " . $sortingSettings['orderKey'] . " " . $sortingSettings['order'];
        }


        $queryString = " WHERE 1=1";

        if ($this->getParam("priority") != "-1" && ($this->getParam("priority") == "0" || $this->getParam("priority"))) {
            $levels = [];
            foreach (["emergency", "alert", "critical", "error", "warning", "notice", "info", "debug"] as $level) {
                $levels[] = "priority = '" . $level . "'";
                
                if ($this->getParam("priority") == $level) {
                    break;
                }
            }

            $queryString .= " AND (" . implode(" OR ", $levels) . ")";
        }

        if ($this->getParam("fromDate")) {
            $datetime = $this->getParam("fromDate");
            if ($this->getParam("fromTime")) {
                $datetime =  substr($datetime, 0, 11) . $this->getParam("fromTime") . ":00";
            }
            $queryString .= " AND timestamp >= '" . $datetime . "'";
        }
        if ($this->getParam("toDate")) {
            $datetime = $this->getParam("toDate");
            if ($this->getParam("toTime")) {
                $datetime =  substr($datetime, 0, 11) . $this->getParam("toTime") . ":00";
            }
            $queryString .= " AND timestamp <= '" . $datetime . "'";
        }
        
        if ($this->getParam("component")) {
            $queryString .= " AND component =  '" . $this->getParam("component") . "'";
        }
         
        if ($this->getParam("relatedobject")) {
            $queryString .= " AND relatedobject = " . $this->getParam("relatedobject");
        }

        if ($this->getParam("message")) {
            $queryString .= " AND message like '%" . $this->getParam("message") ."%'";
        }


        $db = Db::get();
        $count = $db->fetchCol("SELECT count(*) FROM " . \Pimcore\Log\Handler\ApplicationLoggerDb::TABLE_NAME . $queryString);
        $total = $count[0];


        $result = $db->fetchAll("SELECT * FROM " . \Pimcore\Log\Handler\ApplicationLoggerDb::TABLE_NAME . $queryString . " $orderby LIMIT $offset, $limit");

        $errorDataList = [];
        if (!empty($result)) {
            foreach ($result as $r) {
                $parts = explode("/", $r['filelink']);
                $filename = $parts[count($parts)-1];
                $fileobject = str_replace(PIMCORE_DOCUMENT_ROOT, "", $r['fileobject']);

                $errorData =  ["id"=>$r['id'],
                                    "pid" => $r['pid'],
                                    "message"=>$r['message'],
                                    "timestamp"=>$r['timestamp'],
                                    "priority"=>$this->getPriorityName($r['priority']),
                                    "filename" => $filename,
                                    "fileobject" => $fileobject,
                                    "relatedobject" => $r['relatedobject'],
                                    "component" => $r['component'],
                                    "source" => $r['source']];
                $errorDataList[] = $errorData;
            }
        }

        $results = ["p_totalCount"=>$total, "p_results"=>$errorDataList];
        $this->_helper->json($results);
    }

    private function getPriorityName($priority)
    {
        $p = ApplicationLoggerDb::getPriorities();

        return $p[$priority];
    }
    
    public function priorityJsonAction()
    {
        $priorities[] = ["key" => "-1", "value" => "-"];
        foreach (ApplicationLoggerDb::getPriorities() as $key => $p) {
            $priorities[] = ["key" => $key, "value" => $p];
        }

        $this->_helper->json(["priorities" => $priorities]);
    }

    public function componentJsonAction()
    {
        $components[] = ["key" => "-", "value" => ""];
        foreach (ApplicationLoggerDb::getComponents() as $p) {
            $components[] = ["key" => $p, "value" => $p];
        }

        $this->_helper->json(["components" => $components]);
    }
}
