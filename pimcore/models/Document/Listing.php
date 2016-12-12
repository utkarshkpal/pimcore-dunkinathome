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
 * @category   Pimcore
 * @package    Document
 * @copyright  Copyright (c) 2009-2016 pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\Document;

use Pimcore\Model;
use Pimcore\Model\Document;

/**
 * @method int getTotalCount()
 * @method int getCount()
 * @method int loadIdList()
 */
class Listing extends Model\Listing\AbstractListing implements \Zend_Paginator_Adapter_Interface, \Zend_Paginator_AdapterAggregate, \Iterator
{

    /**
     * Return all documents as Type Document. eg. for trees an so on there isn't the whole data required
     *
     * @var boolean
     */
    public $objectTypeDocument = false;

    /**
     * Contains the results of the list
     *
     * @var array
     */
    public $documents = null;

    /**
     * @var boolean
     */
    public $unpublished = false;

    /**
     * Valid order keys
     *
     * @var array
     */
    public $validOrderKeys = [
        "creationDate",
        "modificationDate",
        "id",
        "key",
        "index"
    ];

    /**
     * Tests if the given key is an valid order key to sort the results
     *
     * @return boolean
     */
    public function isValidOrderKey($key)
    {
        return true;
    }

    /**
     * @return array
     */
    public function getDocuments()
    {
        if ($this->documents === null) {
            $this->load();
        }

        return $this->documents;
    }

    /**
     * @param array $documents
     * @return $this
     */
    public function setDocuments($documents)
    {
        $this->documents = $documents;

        return $this;
    }

    /**
     * @return bool
     */
    public function getUnpublished()
    {
        return $this->unpublished;
    }

    /**
     * @return bool
     */
    public function setUnpublished($unpublished)
    {
        $this->unpublished = (bool) $unpublished;

        return $this;
    }

    public function getCondition()
    {
        $condition = parent::getCondition();

        if ($condition) {
            if (Document::doHideUnpublished() && !$this->getUnpublished()) {
                $condition = " (" . $condition . ") AND published = 1";
            }
        } elseif (Document::doHideUnpublished() && !$this->getUnpublished()) {
            $condition = "published = 1";
        }

        return $condition;
    }

    /**
     *
     * Methods for \Zend_Paginator_Adapter_Interface
     */

    public function count()
    {
        return $this->getTotalCount();
    }

    public function getItems($offset, $itemCountPerPage)
    {
        $this->setOffset($offset);
        $this->setLimit($itemCountPerPage);

        return $this->load();
    }

    public function getPaginatorAdapter()
    {
        return $this;
    }


    /**
     * Methods for Iterator
     */

    public function rewind()
    {
        $this->getDocuments();
        reset($this->documents);
    }

    public function current()
    {
        $this->getDocuments();
        $var = current($this->documents);

        return $var;
    }

    public function key()
    {
        $this->getDocuments();
        $var = key($this->documents);

        return $var;
    }

    public function next()
    {
        $this->getDocuments();
        $var = next($this->documents);

        return $var;
    }

    public function valid()
    {
        $this->getDocuments();
        $var = $this->current() !== false;

        return $var;
    }
}
