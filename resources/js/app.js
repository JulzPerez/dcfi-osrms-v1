/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

import Inputmask from "inputmask";

import 'admin-lte/plugins/jquery/jquery.min.js';
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js';
import 'admin-lte/plugins/select2/js/select2.full.min.js';
import 'admin-lte/plugins/daterangepicker/daterangepicker.js';
import 'admin-lte/plugins/bootstrap4-dualListbox/jquery.bootstrap-duallistbox.min.js';
import 'admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js';
import 'admin-lte/plugins/inputmask/jquery.inputmask.min.js'
import 'admin-lte/dist/js/adminlte.min.js';
import 'admin-lte/plugins/datatables/jquery.dataTables.js';
/* 
$(function () {

        //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    $('#from_date').daterangepicker({
        singleDatePicker: true,
        
    })

    $('#to_date').daterangepicker({
        singleDatePicker: true,
    
    })

    $('[data-mask]').inputmask()

    $('#selectDocument').change(function(){

        var selectVal = $(this).val();
        console.log(selectVal);
    });

}) */

$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });

    //Date range picker
    $('#daterange').daterangepicker()
  });
      

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
