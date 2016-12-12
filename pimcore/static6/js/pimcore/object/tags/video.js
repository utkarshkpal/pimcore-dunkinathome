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

pimcore.registerNS("pimcore.object.tags.video");
pimcore.object.tags.video = Class.create(pimcore.object.tags.abstract, {

    type: "video",
    dirty: false,

    initialize: function (data, fieldConfig) {
        if (data) {
            this.data = data;
        } else {
            this.data = {};
        }

        this.fieldConfig = fieldConfig;
    },

    getGridColumnConfig: function(field) {

        return {header: ts(field.label), width: 100, sortable: false, dataIndex: field.key,
                    renderer: function (key, value, metaData, record) {
                                    this.applyPermissionStyle(key, value, metaData, record);

                                    if(record.data.inheritedFields[key] && record.data.inheritedFields[key].inherited
                                                                        == true) {
                                        metaData.tdCls += " grid_value_inherited";
                                    }

                                    if (value) {
                                        return '<img src="/admin/asset/get-video-thumbnail/id/' + value
                                            + '/width/88/height/88/frame/true" />';
                                    }
                                }.bind(this, field.key)};
    },

    getLayoutEdit: function () {

        if (intval(this.fieldConfig.width) < 1) {
            this.fieldConfig.width = 300;
        }
        if (intval(this.fieldConfig.height) < 1) {
            this.fieldConfig.height = 300;
        }

        var conf = {
            width: this.fieldConfig.width,
            height: this.fieldConfig.height,
            border: true,
            style: "padding-bottom: 10px",
            tbar: [{
                xtype: "tbtext",
                text: "<b>" + this.fieldConfig.title + "</b>"
            },"->",{
                xtype: "button",
                iconCls: "pimcore_icon_video pimcore_icon_overlay_edit",
                handler: this.openEdit.bind(this)
            }, {
                xtype: "button",
                iconCls: "pimcore_icon_delete",
                handler: this.empty.bind(this)
            }],
            componentCls: "object_field",
            bodyCls: "pimcore_video_container"
        };

        this.component = new Ext.Panel(conf);


        this.component.on("afterrender", function (el) {
            if (this.data) {
                this.updateVideo();
            }
        }.bind(this));

        return this.component;
    },

    getLayoutShow: function () {

        if (intval(this.fieldConfig.width) < 1) {
            this.fieldConfig.width = 300;
        }
        if (intval(this.fieldConfig.height) < 1) {
            this.fieldConfig.height = 300;
        }

        var conf = {
            width: this.fieldConfig.width,
            height: this.fieldConfig.height,
            title: this.fieldConfig.title,
            border: true,
            style: "padding-bottom: 10px",
            cls: "object_field",
            bodyCls: "pimcore_video_container"
        };

        this.component = new Ext.Panel(conf);

        this.component.on("afterrender", function (el) {
            if (this.data) {
                this.updateVideo();
            }
        }.bind(this));

        return this.component;
    },

    addDataFromSelector: function (item) {

        this.empty();

        if (item) {
            this.fieldData.setValue(item.fullpath);
            return true;
        }
    },

    openEdit: function () {
        this.data["path"] = this.data["data"];
        this.window = pimcore.helpers.editmode.openVideoEditPanel(this.data, {
            save: function () {
                this.window.hide();

                var values = this.window.getComponent("form").getForm().getFieldValues();
                values["data"] = values["path"];
                delete values["path"];
                this.data = values;

                this.dirty = true;
                this.updateVideo();
            }.bind(this),
            cancel: function () {
                this.window.hide();
            }.bind(this)
        });
    },

    updateVideo: function () {

        var width = this.getBody().getWidth();
        //need to geht height this way, because element has no hight at afterrender (whyever)
        var height = this.fieldConfig.height - 55; //this.getBody().getHeight();

        var content = '';

        if(this.data.type == "asset" && pimcore.settings.videoconverter) {
            content = '<img src="/admin/asset/get-video-thumbnail/width/'
                + width + "/height/" + height + '/frame/true?' +  Ext.urlEncode({path: this.data.data}) + '" />';
        } else if(this.data.type == "youtube") {
            content = '<iframe width="' + width + '" height="' + height + '" src="//www.youtube.com/embed/' + this.data.data + '" frameborder="0" allowfullscreen></iframe>';
        } else if (this.data.type == "vimeo") {
            content = '<iframe src="//player.vimeo.com/video/' + this.data.data + '?title=0&amp;byline=0&amp;portrait=0" width="' + width + '" height="' + height + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
        } else if (this.data.type == "dailymotion") {
            content = '<iframe src="//www.dailymotion.com/embed/video/' + this.data.data + '" width="' + width + '" height="' + height + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
        }

        this.getBody().update(content);
    },

    getBody: function () {
        // get the id from the body element of the panel because there is no method to set body's html
        // (only in configure)
        var result = Ext.get(this.component.getEl().dom).query(".pimcore_video_container");
        var bodyId = result[0].getAttribute("id");
        return Ext.get(bodyId);
    },

    empty: function () {
        this.data = {
            type: "asset",
            data: ""
        };

        this.getBody().update("");

        this.dirty = true;
    },

    getValue: function () {
        delete this.data["path"];
        return this.data;
    },

    getName: function () {
        return this.fieldConfig.name;
    },

    isInvalidMandatory: function () {
        if (this.getValue()) {
            return false;
        }
        return true;
    },

    isDirty: function() {
        if(!this.isRendered()) {
            return false;
        }

        return this.dirty;
    }
});
