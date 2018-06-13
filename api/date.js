$('#date').daterangepicker({

  singleDatePicker: true,
  showDropdowns: false,
  locale: {
    "format": 'YYYY-MM-DD',
    "applyLabel": "Bijwerken",
    "cancelLabel": "Anulleren",
    "fromLabel": "Van",
    "toLabel": "Tot",
    "customRangeLabel": "Custom",
    "weekLabel": "W",
    "daysOfWeek": [
      "Zo",
      "Ma",
      "Di",
      "Wo",
      "Do",
      "Fr",
      "Sa"
    ],
    "monthNames": [
      "januari",
      "Februari",
      "Maart",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Augustus",
      "September",
      "October",
      "November",
      "December"
    ]
  }
});
var keuring_dat = moment().add(1, 'year');
$('#keuring_info').daterangepicker({
  startDate: keuring_dat,
  singleDatePicker: true,
  drops: "up",
  showDropdowns: false,
  locale: {
    "format": 'YYYY-MM-DD',
    "applyLabel": "Bijwerken",
    "cancelLabel": "Anulleren",
    "fromLabel": "Van",
    "toLabel": "Tot",
    "customRangeLabel": "Custom",
    "weekLabel": "W",
    "daysOfWeek": [
      "Zo",
      "Ma",
      "Di",
      "Wo",
      "Do",
      "Fr",
      "Sa"
    ],
    "monthNames": [
      "januari",
      "Februari",
      "Maart",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Augustus",
      "September",
      "October",
      "November",
      "December"
    ]
  }
});


function updateLabel(start, end, label) {
  if (label === 'Custom Range') {
    $("#report-date-range span").html(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'));
  } else {
    $("#report-date-range span").html(label);
  }
}

$('input[name="monteur_datum"]').daterangepicker({
  locale: {
    format: 'YYYY/MM/DD'
  },
  startDate: moment().startOf('day'),
  endDate: moment().endOf('day'),
  opens: "right",
  drops: "down",
  autoApply: true,
  ranges: {
    'Vandaag': [moment().startOf('day'), moment().endOf('day')],
    'Gisteren': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    '7 Dagen geleden': [moment().subtract(6, 'days'), moment()],
    '30 Dagen geleden': [moment().subtract(29, 'days'), moment()],
    '6 Maanden Geleden': [moment().subtract(6, 'month').startOf('month'), moment().endOf('day')],
    'Deze Maand': [moment().startOf('month'), moment().endOf('month')],
    'Vorige Maand': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
    'Vorig Jaar': [moment().subtract(1, 'year'), moment().endOf('day')],
    'Dit Jaar': [moment().startOf('year'), moment().endOf('year')]


  }
}, );

$('input[name="werk_datum"]').daterangepicker({
  locale: {
    format: 'YYYY/MM/DD'
  },
  startDate: moment().startOf('day'),
  endDate: moment().endOf('day'),
  opens: "right",
  drops: "down",
  autoApply: true,
  ranges: {
    'Vandaag': [moment().startOf('day'), moment().endOf('day')],
    'Gisteren': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    '7 Dagen geleden': [moment().subtract(6, 'days'), moment()],
    '30 Dagen geleden': [moment().subtract(29, 'days'), moment()],
    '6 Maanden Geleden': [moment().subtract(6, 'month').startOf('month'), moment().endOf('day')],
    'Deze Maand': [moment().startOf('month'), moment().endOf('month')],
    'Vorige Maand': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
    'Vorig Jaar': [moment().subtract(1, 'year'), moment().endOf('day')],
    'Dit Jaar': [moment().startOf('year'), moment().endOf('year')]
  }

}, );

$('input[name="auto_datum"]').daterangepicker({
  locale: {
    format: 'YYYY/MM/DD'
  },
  startDate: moment().startOf('day'),
  endDate: moment().endOf('day'),
  opens: "right",
  drops: "down",
  autoApply: true,
  ranges: {
    'Vandaag': [moment().startOf('day'), moment().endOf('day')],
    'Gisteren': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    '7 Dagen geleden': [moment().subtract(6, 'days'), moment()],
    '30 Dagen geleden': [moment().subtract(29, 'days'), moment()],
    '6 Maanden Geleden': [moment().subtract(6, 'month').startOf('month'), moment().endOf('day')],
    'Deze Maand': [moment().startOf('month'), moment().endOf('month')],
    'Vorige Maand': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
    'Vorig Jaar': [moment().subtract(1, 'year'), moment().endOf('day')],
    'Dit Jaar': [moment().startOf('year'), moment().endOf('year')]
  }


}, );

$('input[name="keuring_datum"]').daterangepicker({
  locale: {
    format: 'YYYY/MM/DD'
  },
  startDate: moment().startOf('day'),
  endDate: moment().endOf('day'),
  opens: "right",
  drops: "down",
  autoApply: true,
  ranges: {
    'Vandaag': [moment().startOf('day'), moment().endOf('day')],
    'Gisteren': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    '7 Dagen geleden': [moment().subtract(6, 'days'), moment()],
    '30 Dagen geleden': [moment().subtract(29, 'days'), moment()],
    '6 Maanden Geleden': [moment().subtract(6, 'month').startOf('month'), moment().endOf('day')],
    'Deze Maand': [moment().startOf('month'), moment().endOf('month')],
    'Vorige Maand': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
    'Vorig Jaar': [moment().subtract(1, 'year'), moment().endOf('day')],
    'Dit Jaar': [moment().startOf('year'), moment().endOf('year')],
    'Een Jaar verder': [moment(), moment().add(1, 'year').endOf('day')]

  }
}, );


$('input[name="modal_winstperiode"]').daterangepicker({
  startDate: moment().startOf('day'),
  endDate: moment().endOf('day'),
  opens: "right",
  drops: "down",
  autoApply: true,
  ranges: {
    'Vandaag': [moment().startOf('day'), moment().endOf('day')],
    'Gisteren': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    '7 Dagen geleden': [moment().subtract(6, 'days'), moment()],
    '30 Dagen geleden': [moment().subtract(29, 'days'), moment()],
    '6 Maanden Geleden': [moment().subtract(6, 'month').startOf('month'), moment().endOf('day')],
    'Deze Maand': [moment().startOf('month'), moment().endOf('month')],
    'Vorige Maand': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
    'Vorig Jaar': [moment().subtract(1, 'year'), moment().endOf('day')],
    'Dit Jaar': [moment().startOf('year'), moment().endOf('year')]
  }
}, );
