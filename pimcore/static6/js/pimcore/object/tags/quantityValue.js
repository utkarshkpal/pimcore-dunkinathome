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

pimcore.registerNS("pimcore.object.tags.quantityValue");
pimcore.object.tags.quantityValue = Class.create(pimcore.object.tags.abstract, {

    type: "quantityValue",

    initialize: function (data, fieldConfig) {
        this.defaultValue = null;
        this.defaultUnit = null;
        if ((typeof data === "undefined" || data === null) && (fieldConfig.defaultValue || fieldConfig.defaultUnit)) {
            data = {
                value: fieldConfig.defaultValue,
                unit: fieldConfig.defaultUnit,
            };
            this.defaultValue = data.value;
            this.defaultUnit = data.unit;
        }

        this.data = data;
        this.fieldConfig = fieldConfig;

        this.store = new Ext.data.JsonStore({
            autoDestroy: true,
            root: 'data',
            fields: ['id', 'abbreviation']
        });

        pimcore.helpers.quantityValue.initUnitStore(this.setData.bind(this), fieldConfig.validUnits);
    },

    setData: function(data) {
        this.storeData = data;
        this.store.loadData(data.data);

        if (this.unitField) {
            this.unitField.reset();
        }

    },

    getLayoutEdit: function () {

        var input = {
            fieldLabel: this.fieldConfig.title,
            componentCls: "object_field",
            labelWidth: 100
        };

        if (this.data && !isNaN(this.data.value)) {
            input.value = this.data.value;
        }

        if (this.fieldConfig.width) {
            input.width = this.fieldConfig.width;
        }

        if (this.fieldConfig.labelWidth) {
            input.labelWidth = this.fieldConfig.labelWidth;
        }

        var options = {
            width: 100,
            triggerAction: "all",
            autoSelect: true,
            editable: true,
            selectOnFocus: true,
            allowBlank: true,
            forceSelection: false,
            store: this.store,
            valueField: 'id',
            displayField: 'abbreviation',
            queryMode: 'local'
        };

        if(this.data) {
            options.value = this.data.unit;
        }

        this.unitField = new Ext.form.ComboBox(options);

        this.inputField = new Ext.form.field.Number(input);

        this.component = new Ext.form.FieldContainer({
            layout: {
                type: 'table',
                tdAttrs: {
                    valign: 'center'
                }
            },
            margin: '0 0 10 0',
            combineErrors: false,
            items: [this.inputField, this.unitField],
            cls: "object_field",
            isDirty: function() {
                return this.inputField.isDirty() || this.unitField.isDirty()
            }.bind(this)
        });

        return this.component;
    },

    getGridColumnConfig:function (field) {
        var renderer = function (key, value, metaData, record) {
            this.applyPermissionStyle(key, value, metaData, record);

            if (record.data.inheritedFields[key] && record.data.inheritedFields[key].inherited == true) {
                try {
                    metaData.tdCls += " grid_value_inherited";
                } catch (e) {
                    console.log(e);
                }
            }

            if (value) {
                return value.value + " " + value.unit;
            } else {
                return "";
            }

        }.bind(this, field.key);
        
        return {
            header:ts(field.label),
            sortable:true,
            dataIndex:field.key,
            renderer:renderer
        };
    },


    getLayoutShow: function () {

        this.getLayoutEdit();
        this.unitField.disable();
        this.inputField.disable();

        return this.component;
    },

    getValue: function () {
        return {
            unit: this.unitField.getValue(),
            value: this.inputField.getValue()
        };
    },

    getName: function () {
        return this.fieldConfig.name;
    },

    isInvalidMandatory: function () {
        if (this.unitField.getValue() && this.inputField.getValue()) {
            return false;
        }
        return true;
    }
});