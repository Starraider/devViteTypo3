import 'bootstrap-icons/font/bootstrap-icons.scss'
import '../Scss/main.scss'
// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'

// Import all of DataTables.net's JS
// See https://datatables.net
import 'datatables.net-bs5/css/dataTables.bootstrap5.min.css'
import 'datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css'
import 'datatables.net-searchpanes-bs5/css/searchPanes.bootstrap5.min.css'
import 'datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'
import 'datatables.net-select-bs5/css/select.bootstrap5.min.css'
import { DateTime } from 'luxon'
import jszip from 'jszip'
import pdfmake from 'pdfmake'
import DataTable from 'datatables.net-bs5'
import 'datatables.net-buttons-bs5'
import 'datatables.net-buttons/js/buttons.html5.mjs'
import 'datatables.net-buttons/js/buttons.print.mjs'
//import DateTime from 'datatables.net-datetime'
import 'datatables.net-responsive-bs5'
import 'datatables.net-searchpanes-bs5'
import 'datatables.net-select-bs5'
import languageDE from 'datatables.net-plugins/i18n/de-DE.mjs'
//import 'datatables.net-plugins/sorting/datetime-moment.js'
const now = DateTime.local()
//DataTable.use(DateTime)
//DataTable.datetime('dd.mm.YYYY')

let tablePersonList = new DataTable('#personList', {
  select: true,
  searchPanes: true,
  responsive: true,
  language: languageDE,
  layout: {
    topStart: {
      buttons: ['copyHtml5', 'pdfHtml5', 'csvHtml5', 'print'],
    },
    bottom: {
      searchPanes: {
        initCollapsed: true,
      },
    },
  },
  columnDefs: [
    {
      searchPanes: {
        show: true,
      },
      targets: [2],
    },
    {
      searchPanes: {
        show: true,
      },
      targets: [3],
    },
  ],
})

let tableOrganizationList = new DataTable('#organizationList', {
  select: true,
  searchPanes: true,
  responsive: true,
  language: languageDE,
  layout: {
    topStart: {
      buttons: ['copyHtml5', 'pdfHtml5', 'csvHtml5', 'print'],
    },
    bottom: {
      searchPanes: {
        initCollapsed: true,
      },
    },
  },
  columnDefs: [
    {
      searchPanes: {
        show: true,
      },
      targets: [1],
    },
    {
      searchPanes: {
        show: true,
      },
      targets: [2],
    },
    {
      searchPanes: {
        show: true,
      },
      targets: [3],
    },
  ],
})

let tableEventList = new DataTable('#eventList', {
  select: true,
  searchPanes: true,
  responsive: true,
  language: languageDE,
  layout: {
    topStart: {
      buttons: ['copyHtml5', 'pdfHtml5', 'csvHtml5', 'print'],
    },
    bottom: {
      searchPanes: {
        initCollapsed: true,
      },
    },
  },
  columnDefs: [
    {
      searchPanes: {
        show: true,
      },
      visible: false,
      targets: [0],
    },
    {
      searchPanes: {
        show: true,
      },
      targets: [0],
    },
    {
      searchPanes: {
        show: true,
      },
      targets: [1],
    },
    {
      searchPanes: {
        show: true,
      },
      targets: [2],
    },
    {
      orderable: false,
      searchPanes: {
        show: false,
      },
      targets: [3],
    },
  ],
})

console.log('Hello Vite, hello TYPO3!')
