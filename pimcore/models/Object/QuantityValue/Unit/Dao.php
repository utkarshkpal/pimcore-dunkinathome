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
 * @package    Object
 * @copyright  Copyright (c) 2009-2016 pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\Object\QuantityValue\Unit;

use Pimcore\Model;

class Dao extends Model\Dao\AbstractDao
{
    const TABLE_NAME = "quantityvalue_units";

    /**
     * Contains all valid columns in the database table
     *
     * @var array
     */
    protected $validColumns = [];

    /**
     * Get the valid columns from the database
     *
     * @return void
     */
    public function init()
    {
        $this->validColumns = $this->getValidTableColumns(self::TABLE_NAME);
    }

    /**
     * @param string $abbreviation
     * @return void
     */
    public function getByAbbreviation($abbreviation)
    {
        $classRaw = $this->db->fetchRow("SELECT * FROM " . self::TABLE_NAME . " WHERE abbreviation=" . $this->db->quote($abbreviation));
        if (empty($classRaw)) {
            throw new \Exception("Unit " . $abbreviation . " not found.");
        }
        $this->assignVariablesToModel($classRaw);
    }

    /**
     * @param string $reference
     * @return void
     */
    public function getByReference($reference)
    {
        $classRaw = $this->db->fetchRow("SELECT * FROM " . self::TABLE_NAME . " WHERE reference=" . $this->db->quote($reference));
        if (empty($classRaw)) {
            throw new \Exception("Unit " . $reference . " not found.");
        }
        $this->assignVariablesToModel($classRaw);
    }

    /**
     * @param string $abbreviation
     * @return void
     */
    public function getById($id)
    {
        $classRaw = $this->db->fetchRow("SELECT * FROM " . self::TABLE_NAME . " WHERE id=" . $this->db->quote($id));
        if (empty($classRaw)) {
            throw new \Exception("Unit " . $id . " not found.");
        }
        $this->assignVariablesToModel($classRaw);
    }


    /**
     * Create a new record for the object in database
     *
     * @return boolean
     */
    public function create()
    {
        $this->db->insert(self::TABLE_NAME, []);
        $this->model->setId($this->db->lastInsertId());

        $this->save();
    }

    /**
     * Save object to database
     *
     * @return void
     */
    public function save()
    {
        if ($this->model->getId()) {
            return $this->update();
        }

        return $this->create();
    }

    /**
     * @return void
     */
    public function update()
    {
        $class = get_object_vars($this->model);

        foreach ($class as $key => $value) {
            if (in_array($key, $this->validColumns)) {
                if (is_array($value) || is_object($value)) {
                    $value = serialize($value);
                } elseif (is_bool($value)) {
                    $value = (int)$value;
                }
                $data[$key] = $value;
            }
        }

        $this->db->update(self::TABLE_NAME, $data, "id=" . $this->db->quote($this->model->getId()));
    }

    /**
     * Deletes object from database
     *
     * @return void
     */
    public function delete()
    {
        $this->db->delete(self::TABLE_NAME, "id=" . $this->db->quote($this->model->getId()));
    }
}
