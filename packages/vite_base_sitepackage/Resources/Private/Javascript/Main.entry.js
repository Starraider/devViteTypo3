import 'bootstrap-icons/font/bootstrap-icons.scss'
import '../Scss/main.scss'
// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'
// Enable popovers
// const popoverTriggerList = document.querySelectorAll(
//   '[data-bs-toggle="popover"]'
// )
// const popoverList = [...popoverTriggerList].map(
//   popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl)
// )

// Import vanillajs-datepicker
// See https://mymth.github.io/vanillajs-datepicker/#/
import { Datepicker } from 'vanillajs-datepicker'

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
        show: false,
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
      searchPanes: {
        show: true,
      },
      targets: [3],
    },
    {
      searchPanes: {
        show: true,
      },
      targets: [4],
    },
    {
      searchPanes: {
        show: false,
      },
      targets: [5],
    },
    {
      searchPanes: {
        show: false,
      },
      targets: [6],
    },
    {
      searchPanes: {
        show: true,
      },
      targets: [7],
    },
    {
      searchPanes: {
        show: false,
      },
      targets: [8],
    },
    {
      orderable: false,
      searchPanes: {
        show: false,
      },
      targets: [9],
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
        show: false,
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
      searchPanes: {
        show: true,
      },
      targets: [3],
    },
    {
      orderable: false,
      searchPanes: {
        show: false,
      },
      targets: [4],
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
    {
      searchPanes: {
        show: false,
      },
      targets: [4],
    },
    {
      orderable: false,
      searchPanes: {
        show: false,
      },
      targets: [5],
    },
  ],
})

const birthday = document.querySelector('input[id="birthday"]')
if (birthday !== null) {
  const datepicker1 = new Datepicker(birthday, {
    format: 'dd.mm.yyyy',
    buttonClass: 'btn',
    autohide: true,
    todayButton: true,
    clearButton: true,
    todayHighlight: true,
  })
}

const statuschangeDate = document.querySelector('input[id="statuschangeDate"]')
if (statuschangeDate !== null) {
  const datepicker2 = new Datepicker(statuschangeDate, {
    format: 'dd.mm.yyyy',
    buttonClass: 'btn',
    autohide: true,
    todayButton: true,
    clearButton: true,
    todayHighlight: true,
  })
}

const statusbeginDate = document.querySelector('input[id="statusbeginDate"]')
if (statusbeginDate !== null) {
  const datepicker3 = new Datepicker(statusbeginDate, {
    format: 'dd.mm.yyyy',
    buttonClass: 'btn',
    autohide: true,
    todayButton: true,
    clearButton: true,
    todayHighlight: true,
  })
}
const statusendDate = document.querySelector('input[id="statusendDate"]')
if (statusendDate !== null) {
  const datepicker4 = new Datepicker(statusendDate, {
    format: 'dd.mm.yyyy',
    buttonClass: 'btn',
    autohide: true,
    todayButton: true,
    clearButton: true,
    todayHighlight: true,
  })
}
const startDate = document.querySelector('input[id="startDate"]')
if (startDate !== null) {
  const datepicker5 = new Datepicker(startDate, {
    format: 'dd.mm.yyyy',
    buttonClass: 'btn',
    autohide: true,
    todayButton: true,
    clearButton: true,
    todayHighlight: true,
  })
}
const endDate = document.querySelector('input[id="endDate"]')
if (endDate !== null) {
  const datepicker6 = new Datepicker(endDate, {
    format: 'dd.mm.yyyy',
    buttonClass: 'btn',
    autohide: true,
    todayButton: true,
    clearButton: true,
    todayHighlight: true,
  })
}
console.log('Hello Sven, hello TYPO3!')
