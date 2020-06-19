console.log('Hello Webpack Encore! Edit me in assets/js/adminLte.js');
const $ = require('jquery');
global.$ = global.jQuery = $;

require('bootstrap');


$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});


import '../css/adminLte.scss';

require('admin-lte/dist/js/adminlte.min.js');
require('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js');
require('./uploadfile');

