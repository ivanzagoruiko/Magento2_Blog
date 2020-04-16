define(['uiComponent'], function (Component) {
    'use strict';

    return Component.extend({
        defaults: {
            template: "Mag_Blog/blog"
        },
        initialize: function () {
            this._super();

            return this;
        },
        getData: function (value) {
            const data = new Date(value);

            const formatter = new Intl.DateTimeFormat('en', {month: 'short'});
            const month = formatter.format(data);
            return month + ' ' + data.getDate() + ', ' + data.getFullYear();
        }
    })
});